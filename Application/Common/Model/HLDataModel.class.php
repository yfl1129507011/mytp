<?php
/**
 * Created by PhpStorm.
 * User: Fenlon Yang
 * Date: 2017/6/15
 * Time: 14:46
 */
namespace Common\Model;

use Think\Model;

class HLDataModel extends Model{

    protected $tableName = 'hl_rt_data';

    private $apiUrl;
    private $offsetId = '2017_06_160';
    const APP_KEY = '6374632664313368411';
    const TASK_ID = '1410202159262894';
    const NUM = 2;
    const DATA_TYPE = '4';  //微博

    public function _initialize(){
        $this->apiUrl = $this->getHLApi();
    }

    //获取海量api地址
    public function getHLApi(){
        if(C('HYLANDA_API_NORMAL')){
            return C('HYLANDA_API_ONLINE');
        }else{
            return C('HYLANDA_API_TEST');
        }
    }


    /**
     * 获取实时任务数据
     * @param string $offsetId 开始提供数据日 例如：2011-01-05， 则初始值为
    2011_01_050 日期相当于release_date_day
     * @param string $condition  高级检索条件，具体格式如下：{"includes":"","excludes":""}
     * @return mixed
     */
    private function getRTData($condition=''){
        if($condition) $param['condition'] = $condition;
        $param['offset_id'] = $this->offsetId;
        $param['appKey'] = self::APP_KEY;
        $param['service'] = 'HLTopic.hl_get_data';
        $param['type'] = self::DATA_TYPE;
        $param['task_id'] = self::TASK_ID;
        $param['num'] = self::NUM;
        $param['sign'] = get_sign($param);
        $data = curlHttp($this->apiUrl, $param);
        $data = json_decode($data, true);
        return ($data['res'] == 0) ? $data['data']['response'] : false;
    }


    /**
     * 实时数据入库
     * @param string $condition
     */
    public function addRtData($condition=''){
        $data = self::getRTData($condition);
        //echo '<pre>';print_r($data);die;
        if($data['resource']){
            $_addData = array();
            $_fields = $this->getDbFields();
            unset($_fields[array_search($this->getPk(),$_fields)]);
            if($_fields){
                foreach($data['resource'] AS $k=>$v){
                    foreach($_fields as $field){
                        if(empty($v[$field])) continue;
                        if($field == 'related_info'){
                            $_addData[$k][$field] = json_encode($v[$field]);
                            continue;
                        }
                        $_addData[$k][$field] = $v[$field];
                    }
                }
            }
            echo '<pre>';print_r($_addData);die;
            $res = $this->addAll($_addData);
        }
        if(empty($data['next_id'])){
            $this->offsetId = null;
        }else{
            $this->offsetId = $data['next_id'];
        }
    }


    /**
     * 获取dpt数据
     * @param $urlcrcs  urlcrc，以逗号隔开，最多支持50个
     * @param string $date 指定获取哪天的dpt数据，未指定，默认为当天
     * @param int $islatest 是否最新的,0为当天最早，1为当天最新，默认为1
     * @return bool|mixed
     */
    public function getDptData($urlcrcs, $date='', $islatest=1){
        if(empty($urlcrcs)) return false;
        $param['service'] = 'HLTopic.omi_get_dpt_data';
        $param['urlcrcs'] = $urlcrcs;
        $param['appKey'] = self::APP_KEY;
        if(empty($date)) $param['date'] = date('Y-m-d H:i:s');
        $param['islatest'] = $islatest;
        $data = curlHttp($this->apiUrl, $param);

        return json_decode($data, true);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: yangfeilong
 * Date: 2017/5/26
 * Time: 15:16
 */

namespace Admin\Controller;

class IndexController extends AdminController {
    public function index(){
        if(UID){
            $this->meta_title = '管理首页';
            $this->display();
        } else {
            $this->redirect('Public/login');
        }
    }

    public function main(){
        $this->display();
    }

    public function info(){
        $model = D('Member');
        if(IS_POST){
            $data = I('post.');
            foreach($data as $k=>$v){
                if(empty($v)){
                    unset($data[$k]);
                }
            }
            /* 检测密码 */
            if($data['password']) {
                if ($data['password'] != $data['repassword']) {
                    $this->error('密码和重复密码不一致！');
                }
                $data['password'] = md5_sha1($data['password']);
            }
            $res = $model->modifyUser($data);
            if($res === true){
                $this->success('用户修改成功！',U('Index/info',array('mid'=>$data['mid'])));
            }else{
                $this->error($res);
            }
        }
        $mid = intval(I('mid'));
        $info = $model->find($mid);
        $this->assign('_info',$info);
        $this->display('Member/info');
    }
}
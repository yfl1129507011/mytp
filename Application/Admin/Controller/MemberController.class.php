<?php
/**
 * Created by PhpStorm.
 * User: yangfeilong
 * Date: 2017/5/26
 * Time: 15:16
 */

namespace Admin\Controller;
use Admin\Model\MemberModel;

class MemberController extends AdminController {
    private $model = null;

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->model = new MemberModel();
        $this->_action = ACTION_NAME;
    }

    public function index($p=1){
        $username       =   I('username','');
        $map['status']  =   array('eq',0);
        if($username) {
            if (is_numeric($username)) {
                $map['mid|username'] = array(intval($username), array('like', '%' . $username . '%'), '_multi' => true);
            } else {
                $map['username'] = array('like', '%' . (string)$username . '%');
            }
        }

        $limit = 10;
        $order = 'last_login_time DESC,add_time DESC,mid';
        $count = $this->model->where($map)->count();
        $page = new \Think\Page($count, $limit);
        $show = $page->show();
        $list = $this->model->order($order)->where($map)->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('_page', $p);
        $this->assign('_show',$show);
        $this->assign('_limit',$limit);
        $this->assign('_list', $list);
        $this->assign('_username', $username);

        $this->display('list');
    }

    public function add(){
        if(IS_POST){
            $data = I('post.');
            /* 检测密码 */
            if($data['password'] != $data['repassword']){
                $this->error('密码和重复密码不一致！');
            }
            $res = $this->model->modifyUser($data);
            if($res === true){
                $this->success('用户添加成功！',U('index'));
            }else{
                $this->error($res);
            }
        }
        $this->display();
    }


    public function edit(){
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
            $res = $this->model->modifyUser($data);
            if($res === true){
                $this->success('用户修改成功！',U('index'));
            }else{
                $this->error($res);
            }
        }
        $mid = intval(I('mid'));
        $info = $this->model->find($mid);
        $this->assign('_info',$info);
        $this->display('add');
    }

    public function del($id = 0){
        $ids = [];
        if(!is_array($id)){
            $ids[] = intval($id);
        }else {
            $ids = array_values($id);
        }
        $where[$this->model->getPK()] = array('in',$ids);
        $res = $this->model->where($where)->save(array('status'=>1));
        if($res){
            $this->success('用户删除成功！',U('index'));
        }else{
            $this->error('未知错误');
        }
    }
}
<?php
namespace app\index\controller;

use app\admin\controller\Common;

use app\admin\model\HuiyuanModel;
use app\index\validate\HuiYuanValidate;

class Index extends Common
{

    protected $db;
    public function initialize()
    {
        parent::initialize();

        $this->db = new HuiyuanModel();
    }

    public function index()
    {

        return $this->fetch();
    }


    /**
     * 保存新建的资源
     *
     * @param \think\Request $request
     * @return \think\Response
     */
    public function save()
    {
        $this->db->startTrans();
        $data = $this->request->param();
        $res = $this->db->_update($data);
        $validate = new HuiYuanValidate();
        if (!$validate->check($data)) {return json(['code'=>0,'msg'=>$validate->getError()]);}
        if ($res) {
            $this->db->commit();
            return $this->Res($res);
        } else {
            $this->db->rollback();
            return $this->Res($res);
        }

    }
}

<?php
namespace app\index\controller;

use app\admin\controller\Common;

use app\admin\model\HuiyuanModel;
use app\index\validate\HuiYuanValidate;

class Query extends Common
{

    protected $db;
    public function initialize()
    {
        parent::initialize();

        $this->db = new HuiyuanModel();
    }

    public function index()
    {
        $mobile=$this->request->param();
        $mobile['mobile']??$mobile['mobile']="";
        $res = $this->db ->where('mobile',$mobile['mobile'])->select();
        $this->assign('list', $res);
        return $this->fetch();
    }

    public function select()
    {


    }


}

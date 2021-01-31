<?php


namespace app\admin\controller;


use app\admin\model\HuiyuanModel;
use app\admin\validate\HuiYuanValidate;

class Result extends Common
{
    protected $db;
    public function initialize()
    {
        parent::initialize();

        $this->db = new HuiyuanModel();
    }

    /**
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $data = $this->request->param();
        $list = $this->db

            ->where(function ($query) use ($data) {
                $search = isset($data['qrcode']) ? trim($data['qrcode']) : '';
                if ($search) {
                    $query->where('qrcode', 'like', '%' . $search . '%');
                }
            })

            ->order('uid asc')->paginate(10);

        $this->assign('list', $list);
        $this->assign('total', $list->count());

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
        $data  = $this->request->post();
        $ids =$data['ids'];

        $this->db->startTrans();
        $res = $this->db->where('uid', 'in', $ids)
            ->update([
                'result'  => $data['result'],
            ]);
        if($res){
            $this->db->commit();
            return $this->Res($res);
        }else{
            $this->db->rollback();
            return $this->Res($res);
        }

    }

//    /**
//     * 显示编辑资源表单页.
//     *
//     * @param int $id
//     * @return \think\Response
//     */
//    public function edit($id)
//    {
//
//        $info = $this->db->where('uid', $id)->find();
//        $this->assign('info', $info);
//        return $this->fetch();
//    }
//    /**
//     * 删除指定资源
//     *
//     * @param int $id
//     * @return \think\Response
//     */
//    public function delete($id)
//    {
//
//        $this->db->startTrans();
//        $res = $this->db->where('uid', $id)->delete();
//        if ($res) {
//            $this->db->commit();
//            return $this->delRes($res);
//        } else {
//            $this->db->rollback();
//            return $this->delRes($res);
//        }
//    }
//
//    /**
//     * 禁用启用
//     * @param Request $request
//     * @return \think\response\Json
//     * @throws \think\Exception
//     * @throws \think\exception\PDOException
//     */
//    public function upstatus()
//    {
//        $db = new HuiyuanModel();
//        $id = $this->request->param('id');
//        $info = $db->where('uid', $id)->find();
//        if ($info['model'] == 1) {
//            $res = $db->where('uid', $id)->update(['model' => 0]);
//        } else {
//            $res = $db->where('uid', $id)->update(['model' => 1]);
//        }
//        return $this->editres($res);
//    }
//
//
//    /**
//     * @param Request $request
//     * @return \think\response\Json
//     * @throws \think\Exception
//     * @throws \think\exception\PDOException
//     */
//    public function delall()
//    {
//        $ids = $this->request->param('ids');
//        $this->db->startTrans();
//        $res = $this->db->where('uid', 'in', $ids)->delete();
//        if ($res) {
//            $this->db->commit();
//            return $this->delRes($res);
//        } else {
//            $this->db->rollback();
//            return $this->delRes($res);
//        }
//    }


}

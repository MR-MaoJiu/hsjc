<?php


namespace app\admin\model;


class HuiyuanModel extends CommonModel
{

    protected $table = 'user';
    protected $autoWriteTimeStamp = true;
    protected $updateTime = 'last_login_time';
}
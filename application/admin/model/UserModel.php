<?php

namespace app\admin\model;

use think\Model;

class UserModel extends CommonModel
{
    protected $table = 'admin';
    protected $name = 'admin';
    protected $autoWriteTimeStamp = true;
    protected $updateTime = 'last_login_time';
}

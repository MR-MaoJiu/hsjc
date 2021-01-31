<?php
namespace app\admin\controller;


class Index extends Common
{
    /**
     * @return mixed
     */
    public function index()
    {
       return $this->fetch();
    }
    /**
     * @return mixed
     */
    public function welcome(){
        return $this->fetch();
    }

}

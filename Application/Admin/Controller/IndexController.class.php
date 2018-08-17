<?php
/**
 * Created by PhpStorm.
 * User: jiangyongjian
 * Date: 2018/8/16
 * Time: 上午10:28
 */

namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    public function top(){
        $this->display();
    }

    public function menu(){
        $this->display();
    }

    public function main(){
        $this->display();
    }
}

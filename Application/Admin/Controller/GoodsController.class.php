<?php
/**
 * Created by PhpStorm.
 * User: jiangyongjian
 * Date: 2018/8/16
 * Time: 上午11:11
 */

namespace Admin\Controller;
use Think\Controller;

class GoodsController extends Controller {
    // 显示和处理表单
    public function add(){
        // 判断用户是否提交了表单
        if (IS_POST) {
            $model = D('goods');

            // create方法：a. 接收数据并保存到模型中 b.根据模型中定义的规则验证表单
            /**
             * 第一个参数：要接收的数据类型默认是$_POST
             * 第二个参数：表单类型。当前是添加还是修改表单，1：添加 2：修改
             */

            if ($model->create(I("post."), 1)) {
                // 插入到数据库中
                if ($model->add()) { // 在add()里先调用了_before_insert方法
                    // 显示成功信息并等待1秒之后跳转
                    $this->success('操作成功', U('lst'));
                    exit;
                }
            }

            // 说明上面添加失败了，处理失败的请求
            // 从模型中取出失败原因
            $error = $model->getError();
            // 由控制器显示错误信息，并在3秒跳回上一个页面
            $this->error($error);
        }

        // 显示表单
        $this->display();
    }

    // 商品列表页
    public function lst(){

        $model = D('goods');

        // 返回数据和翻页
        $data = $model->search();
        $this->assign($data);

        $this->display();
    }
}
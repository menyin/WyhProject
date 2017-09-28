<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.doudouchongkeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 兜兜虫科技
// +---------------------------------------------------------------------- 

namespace app\admin\controller;  
/**
 * 后台首页控制器
 * @author 兜兜虫科技  <doudouchongkeji.com>
 */
class Index extends Base  {

    /**
     * 后台首页
     * @author 兜兜虫科技  <doudouchongkeji.com>
     */
    public function index(){ 
        $this->assign('meta_title','管理首页') ;
        return $this->fetch();
    }

}

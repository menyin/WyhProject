<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.doudouchongkeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 兜兜虫科技
// +----------------------------------------------------------------------
namespace app\admin\controller;

use think\Validate;
use think\Db;

/**
 * 后台内容控制器
 * @author 兜兜虫科技  <doudouchongkeji.com>
 */
class Area extends Base 
{

	public function getCities()
	{
		$id = input('id/d',0);
		$cities = Db::name('area')->where(['pid'=>$id, 'level'=>2])->select();

	    return $cities;
	}

	public function getAreas()
	{
		$cityId = input('id/d', 0);
		$areas = \think\Db::name('area')->where(['pid'=>$cityId, 'level'=>3])->select();

    	return $areas;
	}
}
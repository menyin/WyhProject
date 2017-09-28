<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.doudouchongkeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace app\home\controller;

use app\common\model as cModel;

/**
 * 地区控制器
 */
class Area extends Base
{
	public function changeLocation()
	{
		$name = input('name', '');
		$areaModel = new cModel\Area();
    	$areaModel->location($name);

		return;
	}
	public function getCities()
	{
		$id = input('id/d',0);
		$cities = \think\Db::name('area')->where(['pid'=>$id, 'level'=>2])->select();

	    return $cities;
	}

	public function getAreas()
	{
		$cityId = input('id/d', 0);
		$areas = \think\Db::name('area')->where(['pid'=>$cityId, 'level'=>3])->select();

    	return $areas;
	}
}

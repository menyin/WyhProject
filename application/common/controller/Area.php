<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.doudouchongkeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 兜兜虫科技
// +----------------------------------------------------------------------
namespace app\common\controller;

use think\Db;

class Area extends think\Controller {
	/**
	 * 获取省份
	 */
	public function getProvince()
	{
		$provinces = Db::name('area')->where(['pid'=>0, 'level'=>1])->column('name', 'id');

		return json_encode($provinces);
	}

	/**
	 * 获取城市
	 */
	public function getCities($provinceId)
	{
		$cities = Db::name()->where(['pid'=>$provinceId, 'level'=>2])->column('name', 'id');

		return json_encode($cities);
	}

	/**
	 * 获取地区
	 */
	public function getAreas($cityId)
	{
		$areas = Db::name()->where(['pid'=>$cityId, 'level'=>3])->column('name', 'id');

		return json_encode($areas);
	}
}

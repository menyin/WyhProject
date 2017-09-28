<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.doudouchongkeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 兜兜虫科技
// +----------------------------------------------------------------------
namespace app\common\model;

use think\Db;

class Area extends \think\Model
{
	protected $pk = 'id';
	protected $table = 'bx_area';

	/**
	 * 获取所有地区
	 */
	public function getArea()
	{

	}
	/**
	 * 定位
	 */
	public function location($city = null)
	{
		if ((int)$city > 0) {
			$cityId = $city;
		} else if (!is_null($city)){
			$cityChange = $this->where('name', $city)->find();

			if (empty($cityChange)) {
				return [];
			}

			$cityId = $cityChange['id'];
		} else {
			$cityId = null;
		}

		if ($cityId == null && session('?location')) {
    		return session('location');
    	}
    	if ($cityId > 0 && session('location.city_id') == $cityId) {
    		return session('location');
    	}

    	if ($cityId > 0) {
	    	$cityInfo = $this->where('id', $cityId)->find();
	    	$provinceInfo = $this->where('id', $cityInfo['pid'])->find();
    	} else {
	    	$ip = get_client_ip();
	    	// $ip = '218.203.99.0';
	    	// $url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip='.$ip;
	    	$url = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
	    	$areaTaobao = json_decode(file_get_contents($url), true);
	    	// $areaInfo = [];

			if (empty($areaTaobao['data']['city'])) {
				$areaInfo = [
		    		'province_name' => '福建省',
		    		'province_id' 	=> 1168,
		    		'city_name'		=> '厦门市',
		    		'city_id'		=> 1183,
		    	];

		    	session('location', $areaInfo);
		    	return $areaInfo;
			}
	    	$provinceName = mb_substr($areaTaobao['data']['region'], 0, -1);
	    	$cityName     = mb_substr($areaTaobao['data']['city'], 0, -1);

	    	$provinceInfo = $this->where('name', 'like', $provinceName . '%')->find();
	    	$cityInfo = $this->where('name', 'like', $cityName . '%')->where('pid', $provinceInfo['id'])->find();
    	}

    	$areaInfo = [
    		'province_name' => $provinceInfo['name'],
    		'province_id' 	=> $provinceInfo['id'],
    		'city_name'		=> $cityInfo['name'],
    		'city_id'		=> $cityInfo['id'],
    	];

    	session('location', $areaInfo);
    	return $areaInfo;
	}
}

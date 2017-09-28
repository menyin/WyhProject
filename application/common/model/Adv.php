<?php
namespace app\common\model;

class Adv extends \think\Model 
{
	protected $pk = 'ad_id';
	protected $table = 'bx_advertisement';
	protected $page = [
		'1' => '首页',
		'2' => '列表页'
	];
	protected $position = [
		'1' => '资深保险代理人推荐', // 1-1 首页
		'2' => '热门保险方案', // 1-2
		'3' => '保险专家', // 1-3
		'4' => '友情链接', // 1-3
	];
}
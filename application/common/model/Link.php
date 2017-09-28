<?php
namespace app\common\model;

class Link extends \think\Model {
	protected $pk = 'link_id';
	protected $table = 'bx_link';

	public $_typeTitle = [
		'1' => '友情链接',
		'2' => '合作品牌'
	];
}
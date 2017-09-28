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
 * 关于我们控制器
 */
class Test extends Base
{
	public function index()
	{
		return $this->fetch('insurance/plan_none');
	}
}
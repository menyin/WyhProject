<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://www.doudouchongkeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 兜兜虫科技  <82550565@qq.com>
// +----------------------------------------------------------------------
namespace app\user\controller;

use app\common\model as cModel;
use \think\Validate;
use \think\Db;

class About extends Base
{
	/**
	 * 关于我们
	 * @return [type] [description]
	 */
	public function index()
	{
		return $this->fetch('about/about');
	}
	/**
	 * 联系我们页面
	 * @return [type] [description]
	 */
	public function contact()
	{
		return $this->fetch('contact/contact');
	}
	/**
	 * 留言板
	 * @return [type] [description]
	 */
	public function message()
	{
		$agentId = input('id/d', 0);

		if (request()->isPost()) {
			$post = input('post.');
			// if(!captcha_check($post['code'])){
			// 	$this->error('验证码错误');
			// };
			unset($post['code']);
			$rule = [
				['name',		'require|length:1,6',			'请填写姓名|名字不能超过6个字'],
				['mobile',		'require|/^1[34578]\d{9}$/',	'请填写手机号|请填写正确的手机号'],
				['email',		'email',						'请填写正确的邮箱'],
				['message',		'min:1',						'请填写留言信息'],
			];

			$validate = new Validate($rule);
			$result = $validate->check($post);

			if (!$result) {
				$this->error($validate->getError());
			}

			if ($agentId > 0) {
				$post['agent_id'] = $agentId;
			}
			$insert = Db::name('message')->insert($post);

			if ($insert) {
				$this->success('留言成功');
			} else {
				$this->error('留言失败');
			}
		}
		return $this->fetch('contact/message');
	}
	/**
	 * 地图
	 * @return [type] [description]
	 */
	public function map()
	{
		return $this->fetch('public/map');
	}
}
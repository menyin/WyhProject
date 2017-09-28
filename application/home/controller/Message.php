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
use \think\Validate;
use \think\Db;

/**
 * 地区控制器
 */
class Message extends Base
{
	public function index()
	{
		$mMessage = new cModel\Message();
		$needInsurances = $mMessage->_needInsurance;

		$this->assign('needInsurances', $needInsurances);

        if (request()->isPost()) {
			$rule = [
	            ['name',    'require|length:1,10',   		'请输入姓名|名字不能超过10个字'],
	            ['mobile',   	'require|/^1[34578]\d{9}$/',    '请填写手机号|手机号格式不正确'],
	            ['message', 	'length:1,200',         		'留言不能超过200字'],
	            ['province_id', 'number',   			'请选择城市|请重新选择省份'],
	            ['city_id', 	'number',   			'请选择城市|请重新选择城市'],
	            ['area_id', 	'number',   			'请选择城市|请重新选择地区'],
	            ['sex',     	'number|min:1|max:3',   		'请选择性别|请选择性别|请选择性别'],
	            ['year',     	'number',   	'请选择生日年|请选择生日年|请选择生日年'],
	            ['month',     	'number|min:1|max:12',   		'请选择生日月|请选择生日月|请选择生日月'],
	            ['day',     	'number|min:1|max:31',   		'请选择生日|请选择生日|请选择生日'],
	            ['insurance',   'min:1',   						'请选择保险需求'],
	            ['agent_id',    'number',				   		'请选择代理人'],
	        ];
            $data = input('post.')['data'];
            if (isset($data['insurance']) && !empty($data['insurance'])){
            	$data['insurance'] = implode(',', $data['insurance']);
            }
            // $code = $data['code'];
            // unset($data['code']);
            $validate = new Validate($rule);
            $result = $validate->check($data);

            if (!$result) {
                $this->error($validate->getError());
            }

            $data['client_ip'] = request()->ip();
            $data['create_time'] = time();
// var_dump($data);die;
            $insert = Db::name('message')->insert($data);

            if ($insert) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        }
		$agentId = input('agent_id/d', 0);

		$agent = '';
		if ($agentId > 0) {
			$agent = cModel\Agent::find($agentId);

			if (empty($agent)) {
				$agentId = 0;
			}
		}
        $provinces = getProvinces(2);
        $this->assign([
            'provinces' => $provinces,
        ]);
        $this->assign('agent', $agent);
        $this->assign('agentId', $agentId);
        $this->_areaInfo();
		return $this->fetch('public/message');
	}
}
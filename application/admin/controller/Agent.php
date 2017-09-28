<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.doudouchongkeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 兜兜虫科技
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\common\model;
use \think\Db;

/**
 * 保险代理人管理控制器
 * @author 兜兜虫科技  <doudouchongkeji.com>
 */
class Agent extends Base {
	/**
	 * 保险代理人管理首页
	 */
	public function index()
	{
		$name = input('name', '');
        $map['status']  =   array('egt',0);
        if(is_numeric($name)){
            $map['agent_id|name']=   array('like','%'.$name.'%');
        }else{
            $map['name']    =   array('like', '%'.(string)$name.'%');
        }

        $list   = $this->lists('Agent', $map, 'agent_id desc');
        int_to_string($list);
        $this->assign('_list', $list);
        $this->assign('meta_title','保险代理人管理');
        return $this->fetch();
	}

	/**
	 * 注册保险代理人
	 */
	public function add()
	{
		if(request()->isPost()){
			$data = input('post.')['data'];

            /* 检测密码 */
            if($data['password'] != $data['repassword']) {
                $this->error('密码和重复密码不一致！');
            }

            $data = array(
				'name' => $data['username'],
				'password' => md5(think_encrypt($data['password'])),
				'email'    => $data['email'],
				'mobile'   => $data['mobile'],
			);

			//验证手机
			if(empty($data['mobile'])) unset($data['mobile']);
			// /* 规则验证 */
		    $validate = \think\Loader::validate('Agent');

    		if(!$validate->scene('add')->check($data)){
				$this->error($validate->getError());
			}
			/* 添加用户 */
			$result = model\Agent::create($data);

			if ($result) {
	            $this->success('用户添加成功！',url('index'));
			}

            $this->error('用户添加失败！');

        } else {
        	$provinces = getProvinces(2);
        	$this->assign('provinces', $provinces);
            $this->assign('meta_title','新增会员') ;
            return $this->fetch();
        }
	}

	/**
	 * 修改代理人的详细资料
	 */
	public function edit()
	{
		$agentId = input('id/d', 0);

		$agent = model\Agent::find($agentId);

		if (empty($agent)) $this->error('代理人不存在');

		if(request()->isPost()){
			$data = input('post.')['data'];

		    $validate = \think\Loader::validate('Agent');

    		if(!$validate->scene('edit')->check($data)){
				$this->error($validate->getError());
			}

			$data['birthday'] = strtotime($data['birthday']);
			$result = model\Agent::where('agent_id', $agentId)->update($data);

			if ($result) {
	            $this->success('修改资料成功！',url('index'));
			}

            $this->error('修改失败！');

        } else {
        	$provinces = getProvinces(2);
	        $cities = Db::name('area')->where(['pid'=>$agent['province_id'], 'level'=>2])->select();
	        $areas  = Db::name('area')->where(['pid'=>$agent['city_id'], 'level'=>3])->select();
	        $companies = model\InsuranceCompany::where('status',1)->select();
	        $experience = model\InsuranceCategory::where('pid', 29)->column('name', 'category_id');
	        
			$this->assign([
	            'provinces' => $provinces,
	            'experience' => $experience,
	            'cities' => $cities,
	            'areas' => $areas,
	            'companies' => $companies,
	        ]);

			$this->assign('meta_title', '修改代理人资料');
			$this->assign('agent', $agent);

			return $this->fetch();
        }
	}

	/**
	 * 删除
	 */
	public function changeStatus()
	{
		$method = input('method', '');
		$agentId = input('id/d', 0);

		$agent = model\Agent::find($agentId);

		if (empty($agent)) {
			$this->error('不存在');
		}

		if ($method == 'forbidAgent') {
			$status = 0;
			$msg = '禁用成功';
		} else if ($method == 'resumeAgent') {
			$status = 1;
			$msg = '启用成功';
		} else if ($method == 'deleteAgent') {
			$status = -1;
			$msg = '删除成功';
		} else {
			$this->error('非法请求， 请重试');
		}

		$delete = model\Agent::where('agent_id', $agentId)->update(['status'=>$status]);

		if ($delete) {
			$this->success($msg);
		} else {
			$this->error('操作失败');
		}

	}

	/**
	 * 管理保险代理人后台
	 */
	public function manage()
	{
        $this->assign('meta_title', '修改代理人资料');
        return $this->fetch("agent/photo");
    }
}
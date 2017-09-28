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
use \think\Validate;
use \think\Db;

/**
 * 保险代理人管理控制器
 * @author 兜兜虫科技  <doudouchongkeji.com>
 */
class AgentKeywords extends Base {
	protected $rule = [
		['title',		'require|min:1',		'关键词不能为空|请填写关键词'],
		['agent_id'	, 	'require|number',		'请选择保险代理人|请重新选择保险代理人'],
		['editor',		'require',				'管理员名称不正确'],
		['editor_id',	'require|number',		'管理员id必须|管理员id不正确'],
		['start_time',  'require|number',		'请选择开始时间|开始时间格式不正确'],
		['end_time'	, 	'require|number',		'请选择开始时间|结束时间格式不正确'],
		['create_time',	'number',				'添加时间格式不正确'],
		['update_time',	'number',				'更新时间格式不正确'],
	];
	/**
	 * 代理人关键词
	 */
	public function index()
	{
		$title = input('title', '');
		$agentId = input('id/d', 0);

		if ($agentId > 0) {
			$map['agent_id'] = $agentId;
			$agent = model\Agent::find($agentId);

			if (empty($agent)) {
				$this->error('代理人不存在');
			}
		}


        $map['status']  =   array('egt',0);

        if(is_numeric($title)){
            $map['agent_id|title']=   array('like','%'.$title.'%');
        }else{
            $map['title']    =   array('like', '%'.(string)$title.'%');
        }

        $list   = $this->lists('AgentKeywords', $map);
        int_to_string($list);

        $this->assign('_list', $list);
        $this->assign('meta_title','关键词管理');
        return $this->fetch();
	}

	/**
	 * 注册保险代理人
	 */
	public function add()
	{
		$agentId = input('id/d', 0);

		$agents = model\Agent::where('status', 1)->column('name', 'agent_id');
		$this->assign('agents', $agents);

		if ($agentId && !isset($agents[$agentId])) {
			$this->error('不存在');
		}

		if(request()->isPost()){
			$userAuth = session('user_auth');

			$data = input('post.')['data'];
	 
		    $validate = new Validate($this->rule);

			$title = str_replace('，', ',', $data['title']);
			$title = explode(',', $title);

			$insertData = [];

			foreach ($title as $v) {
				if (empty($v)) continue;

				$info = [
					'agent_id' => $agentId == 0 ? $data['agent_id'] : $agentId,
					'editor' => $userAuth['username'],
					'editor_id' => $userAuth['uid'],
					'start_time' => strtotime($data['start_time']),
					'end_time' => strtotime($data['end_time']),
					'create_time' => time(),
					'update_time' => time(),
					'title' => $v,
					'status' => $data['status'],
				];

				if(!$validate->check($info)){ 
					continue;
				}

				$insertData[] = $info;
			}

			/* 添加用户 */   
			$result = Db::name('agent_keywords')->insertAll($insertData);

			if ($result) { 
	            $this->success('添加成功！',url('index'));				
			} 

            $this->error('添加失败！');

        } else {
            $this->assign('meta_title','新增关键词') ;
            return $this->fetch();
        }
	}

	/**
	 * 修改代理人的详细资料
	 */
	public function edit()
	{
		$keywordsId = input('id/d', 0);

		$keywords = model\AgentKeywords::find($keywordsId);
		$agents = model\Agent::where('status', 1)->column('name', 'agent_id');

		$this->assign('agents', $agents);
		$this->assign('keywords', $keywords);

		if (empty($keywords)) {
			$this->error('关键词不存在');
		}

		if(request()->isPost()){
			$userAuth = session('user_auth');

			$data = input('post.')['data'];

            $info = array(
            	'agent_id' => $data['agent_id'],
				'editor' => $userAuth['username'],
				'editor_id' => $userAuth['uid'],
				'start_time' => strtotime($data['start_time']),
				'end_time' => strtotime($data['end_time']),
				'update_time' => time(),
				'title' => $data['title'],
				'status' => $data['status'],
			);
	 
		    $validate = new Validate($this->rule);

    		if(!$validate->check($info)){ 
				$this->error($validate->getError());
			}

			/* 添加用户 */   
			$result = model\AgentKeywords::where('keywords_id', $keywordsId)->update($info);

			if ($result) { 
	            $this->success('修改成功！',url('index'));				
			} 

            $this->error('修改失败！');

        } else {
            $this->assign('meta_title','修改关键词') ;
            return $this->fetch();
        }
	}

	/**
	 * 删除
	 */
	public function changeStatus()
	{
		$method = input('method', '');
		$keywords_Id = input('id/d', 0);

		$agentKeywords = model\AgentKeywords::find($keywords_Id);

		if (empty($agentKeywords)) {
			$this->error('关键词不存在');
		}

		if ($method == 'forbidKeywords') {
			$status = 0;
			$msg = '禁用成功';
		} else if ($method == 'resumeKeywords') {
			$status = 1;
			$msg = '启用成功';
		} else if ($method == 'deleteKeywords') {
			$status = -1;
			$msg = '删除成功';
		} else {
			$this->error('非法请求， 请重试');
		}

		$delete = model\AgentKeywords::where('keywords_id', $keywords_Id)->update(['status'=>$status]);

		if ($delete) {
			$this->success($msg);
		} else {
			$this->error('操作失败');
		}
	}
}
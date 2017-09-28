<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.doudouchongkeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 兜兜虫科技
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\common\model as cModel;
use \think\Db;
use \think\Validate;

/**
 * 保险代理人管理控制器
 * @author 兜兜虫科技  <doudouchongkeji.com>
 */
class InsurancePlan extends Base 
{
    public $rule = [
        ['title',                   'require',          '请填写标题'],
        ['reason',                  'require',          '请填写理由'],
        ['max',                     'float',            '最高重新选择'],
        ['pay_year',                'float',            '年缴重新选择'],
        ['company_id',              'require|number',   '请重新选择则个公司'],
        ['agent_id',                'require|number',   '请选择保险代理人|请重新选择保险代理人'],
        ['age_id',                  'number',           '年龄范围'],
        ['budget_id',               'number',           '预算'],
        ['insurance_id',            'number',           '主要保险'],
        ['personal_id',             'number',           '人寿险'],
        ['suitable',                'min:1',            '适用人群'],
        ['sex',                     'number',           '适用人群必须'],
        ['icon',                    'require',          '封面必填'],
        ['hot',                     'require|number',   '是否热门必填'],
        ['recommend',               'require|number',   '是否推荐必填'],
        ['views',                   'number',   '浏览量'],
        ['attention',               'number',   '关注'],
        ['like',                    'number',   '点赞'],
        ['desc',                    'min:1',   '说明'],
        ['status',                  'require|number',   '请重新选择状态'],
    ];

	/**
	 * 保险代理人管理首页
	 */
	public function index()
	{
		$title = input('title', '');
        $companyId = input('company_id', 0);

        $map['status']  =   array('egt',0);
        if(is_numeric($title)){
            $map['plan_id|title']=   array('like','%'.$title.'%');
        }else{
            $map['title']    =   array('like', '%'.(string)$title.'%');
        }

        if ($companyId) {
            $map['company_id'] = $companyId;
        }

        $companies = cModel\InsuranceCompany::where('status',1)->column('short_name', 'company_id');
        $this->assign('companies', $companies);
        $agents = cModel\Agent::where('status', 1)->column('name', 'agent_id');
        $this->assign('agents', $agents);
        $budgets = cModel\InsuranceCategory::where('pid', 40)->where('status', 1)->column('name', 'category_id');
        $this->assign('budgets', $budgets);
        $ages = cModel\InsuranceCategory::where('pid', 34)->where('status', 1)->column('name', 'category_id');
        $this->assign('ages', $ages);

        $list   = $this->lists('InsurancePlan', $map, 'plan_id desc');
        int_to_string($list);
        $this->assign('_list', $list);
        $this->assign('meta_title','保险产品');
        return $this->fetch();
	}

    /**
     * 注册保险产品
     */
    public function add()
    {
        if(request()->isPost()){
            $post = input('post.');   
            $data = $post['data'];


            if (empty($post['contains'])) {
                $this->error('请填写保障项目');
            }     

            $validate = new Validate($this->rule);
            $result = $validate->check($data);

            if (!$result) {
                $this->error($validate->getError());
            }
            $contains = [];         
            $count = count($post['contains']['name']);

            for ($i = 0; $i < $count-1; $i++) {
                $contains[] = [
                    'name' => $post['contains']['name'][$i],
                    'price' => $post['contains']['price'][$i],
                    'desc' => $post['contains']['desc'][$i],
                ];
            } 
            $data['contains'] = json_encode($contains);

            $insertResult = Db::name('insurance_plan')->insertGetId($data);

            if ($insertResult) {
                $this->success('添加成功');
            }
            $this->error('添加失败');

        } else {
            $companies = cModel\InsuranceCompany::where('status',1)->select();
            $agents    = cModel\Agent::where('status',1)->select();
            $ages      = cModel\InsuranceCategory::where('pid', 34)->column('name', 'category_id');
            $budgets   = cModel\InsuranceCategory::where('pid', 40)->column('name', 'category_id');
            $cates     = cModel\InsuranceCategory::where('pid', 1)->column('name', 'category_id');

            $this->assign('budgets', $budgets);
            $this->assign('cates', $cates);
            $this->assign('companies', $companies);
            $this->assign('agents', $agents);
            $this->assign('ages', $ages);
            $this->assign('meta_title','新增保险产品') ;
            return $this->fetch();
        }
    }

    /**
     * 修改代理人的详细资料
     */
    public function edit()
    {
        $planId = input('id/d', 0);

        $plan = cModel\InsurancePlan::find($planId);

        if (empty($plan)) $this->error('产品不存在');

        if(request()->isPost()){
            $post = input('post.');   
            $data = $post['data'];

            if (empty($post['contains'])) {
                $this->error('请填写保障项目');
            } 

            $validate = new Validate($this->rule);
            $result = $validate->check($data);

            if (!$result) {
                $this->error($validate->getError());
            }
            
            $contains = [];         
            $count = count($post['contains']['name']);
            for ($i = 0; $i < $count; $i++) {
                $contains[] = [
                    'name' => $post['contains']['name'][$i],
                    'price' => $post['contains']['price'][$i],
                    'desc' => $post['contains']['desc'][$i],
                ];
            } 

            $data['contains'] = json_encode($contains);

            $update = Db::name('insurance_plan')->where('plan_id', $planId)->update($data);

            if ($update) {
                $this->success('修改成功');
            }
            $this->error('修改失败');

        } else {
            $companies = cModel\InsuranceCompany::where('status',1)->select();
            $agents    = cModel\Agent::where('status',1)->select();
            $ages      = cModel\InsuranceCategory::where('pid', 34)->column('name', 'category_id');
            $budgets   = cModel\InsuranceCategory::where('pid', 40)->column('name', 'category_id');
            $cates     = cModel\InsuranceCategory::where('pid', 1)->column('name', 'category_id');
            $insurances = cModel\Insurance::where(['agent_id'=>$plan['agent_id'], 'status'=>1])->select();

            if (!empty($plan['contains'])) {
                $plan['contains'] = json_decode($plan['contains'],1);
            }
            $this->assign('budgets', $budgets);
            $this->assign('cates', $cates);
            $this->assign('companies', $companies);
            $this->assign('agents', $agents);
            $this->assign('ages', $ages);
            $this->assign('plan', $plan);
            $this->assign('insurances', $insurances);

            $this->assign('meta_title', '修改保险产品');

            return $this->fetch();
        }
    }

    /**
     * 删除
     */
    public function changeStatus()
    {
        $method = input('method', '');
        $planId = input('id/d', 0);

        $insurance = cModel\Insurance::find($planId);

        if (empty($insurance)) {
            $this->error('不存在');
        }

        if ($method == 'forbidInsurance') {
            $status = 0;
            $msg = '禁用成功';
        } else if ($method == 'resumeInsurance') {
            $status = 1;
            $msg = '启用成功';
        } else if ($method == 'deleteInsurance') {
            $status = -1;
            $msg = '删除成功';
        } else {
            $this->error('非法请求， 请重试');
        }

        $delete = cModel\Insurance::where('insurance_id', $planId)->update(['status'=>$status]);

        if ($delete) {
            $this->success($msg);
        } else {
            $this->error('操作失败');
        }

    }

    public function temp()
    {
        if(request()->isPost()){
            $post = input('post.');   
            $data = $post['data'];


            if (empty($post['contains'])) {
                $this->error('请填写保障项目');
            }     

            $validate = new Validate($this->rule);
            $result = $validate->check($data);

            if (!$result) {
                $this->error($validate->getError());
            }
            $contains = [];         
            $count = count($post['contains']['name']);

            for ($i = 0; $i < $count-1; $i++) {
                $contains[] = [
                    'name' => $post['contains']['name'][$i],
                    'price' => $post['contains']['price'][$i],
                    'desc' => $post['contains']['desc'][$i],
                ];
            } 
            $data['contains'] = json_encode($contains);

            $insertResult = Db::name('insurance_plan')->insertGetId($data);

            if ($insertResult) {
                $this->success('添加成功');
            }
            $this->error('添加失败');

        } else {
            $planId = input('id/d', 0);

            $plan = cModel\InsurancePlan::find($planId);

            if (empty($plan)) $this->error('产品不存在');
            
            $companies = cModel\InsuranceCompany::where('status',1)->select();
            $agents    = cModel\Agent::where('status',1)->select();
            $ages      = cModel\InsuranceCategory::where('pid', 34)->column('name', 'category_id');
            $budgets   = cModel\InsuranceCategory::where('pid', 40)->column('name', 'category_id');
            $cates     = cModel\InsuranceCategory::where('pid', 1)->column('name', 'category_id');
            $insurances = cModel\Insurance::where(['agent_id'=>$plan['agent_id'], 'status'=>1])->select();

            if (!empty($plan['contains'])) {
                $plan['contains'] = json_decode($plan['contains'],1);
            }
            $this->assign('budgets', $budgets);
            $this->assign('cates', $cates);
            $this->assign('companies', $companies);
            $this->assign('agents', $agents);
            $this->assign('ages', $ages);
            $this->assign('plan', $plan);
            $this->assign('insurances', $insurances);

            $this->assign('meta_title', '修改保险产品');

            return $this->fetch();
        }
    }
}
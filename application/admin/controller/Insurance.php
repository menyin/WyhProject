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
 * 保险产品管理控制器
 * @author 兜兜虫科技  <doudouchongkeji.com>
 */
class Insurance extends Base 
{
    public $rule = [
        ['name',                    'require',          '请填写标题'],
        ['company_id',              'require|number',   '公司必须|请重新选择则个公司'],
        ['group_id',                'require|number',   '适用人群必须|适用人群必须'],
        ['duration',                'require',          '年限必须'],
        ['pay_type',                'min:1',            '缴费方式请选择'],
        ['age',                     'require',          '投保年龄必须'],
        ['agent_id',                'require|number',   '请选择保险代理人|请重新选择保险代理人'],
        ['status',                  'require|number',   '状态必须|请重新选择状态'],
        ['personal_id',             'number',           '人寿重新选择'],
        ['property_id',             'number',           '财产险重新选择'],
        ['age_id',                  'number',           '年龄范围'],
        ['budget_id',               'number',           '预算'],
        ['feature',                 'require',          '产品特色必填'],
        ['icon',                    'require',          '封面必填'],
        ['hot',                     'number',           '热门必须是数字'],
        ['recommend',               'number',           '推荐必须是数字'],
        ['views',                   'number',           '浏览量必须是数字'],
        ['reason',                  'require',          '推荐理由必填'],
        ['tender_type',             'require',          '保单类型必填'],
    ];
	/**
	 * 保险产品管理首页
	 */
	public function index()
	{
        $name = input('name', '');
		$companyId = input('company_id', 0);
        $map['status']  =   array('egt',0);

        if(is_numeric($name)){
            $map['insurance_id|name']=   array('like','%'.$name.'%');
        }else{
            $map['name']    =   array('like', '%'.(string)$name.'%');
        }

        if ($companyId) {
            $map['company_id'] = $companyId;
        }

        $companies = cModel\InsuranceCompany::where('status',1)->column('short_name', 'company_id');
        $this->assign('companies', $companies);
        $agents = cModel\Agent::where('status', 1)->column('name', 'agent_id');
        $this->assign('agents', $agents);
        $groups = cModel\InsuranceCategory::where('pid', 23)->where('status', 1)->column('name', 'category_id');
        $this->assign('groups', $groups);
        $ages = cModel\InsuranceCategory::where('pid', 34)->where('status', 1)->column('name', 'category_id');
        $this->assign('ages', $ages);

        $list   = $this->lists('Insurance', $map, 'insurance_id desc');
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

            if (empty($post['guarantee'])) {
                $this->error('请填写保障项目');
            }     
            if (empty($post['notice'])) {
                $this->error('请填写特别提醒');
            }

            $validate = new Validate($this->rule);
            $result = $validate->check($data);

            if (!$result) {
                $this->error($validate->getError());
            }
            $guarantee = [];         
            $notice    = $post['notice'];  

            $count = count($post['guarantee']['name']);

            for ($i = 0; $i < $count-1; $i++) {
                $guarantee[] = [
                    'name' => $post['guarantee']['name'][$i],
                    'price' => $post['guarantee']['price'][$i],
                    'desc' => $post['guarantee']['desc'][$i],
                    'notice' => $post['guarantee']['notice'][$i],
                ];
            } 

            $data['guarantee'] = json_encode($guarantee);
            $data['notice'] = json_encode($notice);

            $insertResult = Db::name('insurance')->insertGetId($data);

            if ($insertResult) {
                $this->success('添加成功');
            }
            $this->error('添加失败');

        } else {
            $companies = cModel\InsuranceCompany::where('status',1)->select();
            $ages = cModel\InsuranceCategory::where('pid', 34)->column('name', 'category_id');
            $groups = cModel\InsuranceCategory::where('pid', 23)->column('name', 'category_id');
            $agents    = cModel\Agent::where('status',1)->select();
            $this->assign('agents', $agents);
            $this->assign('ages', $ages);
            $this->assign('groups', $groups);
            $this->assign('companies', $companies);
            $this->assign('meta_title','新增保险产品') ;
            return $this->fetch();
        }
    }

    /**
     * 修改代理人的详细资料
     */
    public function edit()
    {
        $insuranceId = input('id/d', 0);

        $insurance = cModel\Insurance::find($insuranceId);

        if (empty($insurance)) $this->error('产品不存在');

        if(request()->isPost()){
            $post = input('post.');   
            $data = $post['data'];

            $guarantee = $post['guarantee'];         
            $notice    = $post['notice'];    

            if (empty($guarantee)) {
                $this->error('请填写保障项目');
            }     
            if (empty($notice)) {
                $this->error('请填写特别提醒');
            }

            $validate = new Validate($this->rule);
            $result = $validate->check($data);

            if (!$result) {
                $this->error($validate->getError());
            }
            
            $guarantee = [];         
            $notice    = $post['notice'];  

            $count = count($post['guarantee']['name']);

            for ($i = 0; $i < $count-1; $i++) {
                $guarantee[] = [
                    'name' => $post['guarantee']['name'][$i],
                    'price' => $post['guarantee']['price'][$i],
                    'desc' => $post['guarantee']['desc'][$i],
                    'notice' => $post['guarantee']['notice'][$i],
                ];
            } 

            $data['guarantee'] = json_encode($guarantee);
            $data['notice'] = json_encode($notice);

            $insertResult = Db::name('insurance')->where('insurance_id', $insuranceId)->update($data);

            if ($insertResult) {
                $this->success('修改成功');
            }
            $this->error('修改失败');

        } else {
            $companies = cModel\InsuranceCompany::where('status',1)->select();
            $ages = cModel\InsuranceCategory::where('pid', 34)->column('name', 'category_id');
            $groups = cModel\InsuranceCategory::where('pid', 23)->column('name', 'category_id');
            $agents    = cModel\Agent::where('status',1)->select();

            if (!empty($insurance['guarantee'])) {
                $insurance['guarantee'] = json_decode($insurance['guarantee'],1);
            }
            if (!empty($insurance['notice'])) {
                $insurance['notice'] = json_decode($insurance['notice'],1);
            }

            $this->assign('insurance', $insurance);
            $this->assign('agents', $agents);
            $this->assign('ages', $ages);
            $this->assign('groups', $groups);
            $this->assign('companies', $companies);
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
        $insuranceId = input('id/d', 0);

        $insurance = cModel\Insurance::find($insuranceId);

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

        $delete = cModel\Insurance::where('insurance_id', $insuranceId)->update(['status'=>$status]);

        if ($delete) {
            $this->success($msg);
        } else {
            $this->error('操作失败');
        }

    }

    public function getInsurancesByAgentId()
    {
        $id = input('id/d', 0);

        if ($id == 0) return [];

        $insurances = cModel\Insurance::where('status', 1)->where('agent_id', $id)->select();

        return $insurances;
    }

    public function temp()
    {
        if(request()->isPost()){
            $post = input('post.');   
            $data = $post['data'];

            if (empty($post['guarantee'])) {
                $this->error('请填写保障项目');
            }     
            if (empty($post['notice'])) {
                $this->error('请填写特别提醒');
            }

            $validate = new Validate($this->rule);
            $result = $validate->check($data);

            if (!$result) {
                $this->error($validate->getError());
            }
            $guarantee = [];         
            $notice    = $post['notice'];  

            $count = count($post['guarantee']['name']);

            for ($i = 0; $i < $count-1; $i++) {
                $guarantee[] = [
                    'name' => $post['guarantee']['name'][$i],
                    'price' => $post['guarantee']['price'][$i],
                    'desc' => $post['guarantee']['desc'][$i],
                    'notice' => $post['guarantee']['notice'][$i],
                ];
            } 

            $data['guarantee'] = json_encode($guarantee);
            $data['notice'] = json_encode($notice);

            $insertResult = Db::name('insurance')->insertGetId($data);

            if ($insertResult) {
                $this->success('添加成功');
            }
            $this->error('添加失败');

        } else {
            $insuranceId = input('id/d', 0);

            $insurance = cModel\Insurance::find($insuranceId);

            if (empty($insurance)) $this->error('产品不存在');
            
            $companies = cModel\InsuranceCompany::where('status',1)->select();
            $ages = cModel\InsuranceCategory::where('pid', 34)->column('name', 'category_id');
            $groups = cModel\InsuranceCategory::where('pid', 23)->column('name', 'category_id');
            $agents    = cModel\Agent::where('status',1)->select();

            if (!empty($insurance['guarantee'])) {
                $insurance['guarantee'] = json_decode($insurance['guarantee'],1);
            }
            if (!empty($insurance['notice'])) {
                $insurance['notice'] = json_decode($insurance['notice'],1);
            }

            $this->assign('insurance', $insurance);
            $this->assign('agents', $agents);
            $this->assign('ages', $ages);
            $this->assign('groups', $groups);
            $this->assign('companies', $companies);
            $this->assign('meta_title', '修改保险产品');

            return $this->fetch();
        }
    }

}
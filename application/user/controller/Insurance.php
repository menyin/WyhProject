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

class Insurance extends Base
{
	/**
	 * 保险方案
	 */
	public function index()
	{
		$search = input('get.');

    	$insuranceIds = [];
        $cateIds = [];
    	$searchParams = [];
        $where = ['status'=>1];

        // 公司
    	if (isset($search['company_id']) && $search['company_id']) {
    		$searchParams['company_id'] = $search['company_id'];
            $where['company_id'] = $search['company_id'];
    	}
        // 人身保险
        if (isset($search['personal_id']) && $search['personal_id']) {
            $searchParams['personal_id'] = $search['personal_id'];
            $where['personal_id'] = $search['personal_id'];
        }
        // 群体（对象）
    	if (isset($search['group_id']) && $search['group_id']) {
    		$searchParams['group_id'] = $search['group_id'];
            $where['group_id'] = $search['group_id'];
    	}
        // 财产保险
        if (isset($search['property_id']) && $search['property_id']) {
            $searchParams['property_id'] = $search['property_id'];
            $where['property_id'] = $search['property_id'];
        }
        // 搜索框搜索
    	if (isset($search['title']) && $search['title']) {
    		$searchParams['title'] = $search['title'];
            $where['name'] = ['like', "%" . $search['title'] . "%"];
    	}
        // 排序
        $order = 'insurance_id desc';
        $orderId = isset($search['order_id']) ? $search['order_id'] : 0;
        if ($orderId == 1) {
            $order = 'hot desc';
        } else if ($orderId == 2) {
            $order = 'create_time desc';
        } else if ($orderId == 3) {
            $order = 'views desc';
        } else if ($orderId == 4) {
            $order = 'insurance_id desc';
        }

        /* 分类 */
    	$personalSearch = $orderSearch = $ageSearch = $companySearch = $groupSearch = $propertySearch = $searchParams;
        /* 排序 */
        // foreach ($this->_orderTitle as $k=>$v) {
        //     $orderSearch['order_id'] = $k;
        //     $orderTitle[$k] = [
        //         'name' => $v,
        //         'link' => url('Insurance/index') . '?' . http_build_query($orderSearch),
        //     ];
        // }
        // 公司
        $companiesArray = cModel\InsuranceCompany::where('status', 1)->select();

        unset($companySearch['company_id']);
        $companies[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Insurance/index') . '?' . http_build_query($companySearch)];
        foreach ($companiesArray as $k=>$v) {
            $companySearch['company_id'] = $v['company_id'];

            $companies[$v['company_id']] = [
                'name' => $v['name'],
                'id'   => $v['company_id'],
                'link' => url('Insurance/index') . '?' . http_build_query($companySearch),
            ];
        }
        $personalArray = cModel\InsuranceCategory::where('pid', 1)->column('name', 'category_id');
        $groupArray = cModel\InsuranceCategory::where('pid', 23)->column('name', 'category_id');
        $propertyArray = cModel\InsuranceCategory::where('pid', 2)->column('name', 'category_id');
        $ageArray = cModel\InsuranceCategory::where('pid', 34)->column('name', 'category_id');

        // 人身保险
        unset($personalSearch['personal_id']);
        $personal[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Insurance/index') . '?' . http_build_query($personalSearch)];
        foreach ($personalArray as $k=>$v) {
            $personalSearch['personal_id'] = $k;

            $personal[$k] = [
                'name' => $v,
                'id'   => $k,
                'link' => url('Insurance/index') . '?' . http_build_query($personalSearch),
            ];
        }
        // 群体（对象）
        unset($groupSearch['group_id']);
        $group[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Insurance/index') . '?' . http_build_query($groupSearch)];
        foreach ($groupArray as $k=>$v) {
            $groupSearch['group_id'] = $k;

            $group[$k] = [
                'name' => $v,
                'id'   => $k,
                'link' => url('Insurance/index') . '?' . http_build_query($groupSearch),
            ];
        }
        // 财产保险
        unset($propertySearch['group_id']);
        $property[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Insurance/index') . '?' . http_build_query($propertySearch)];
        foreach ($propertyArray as $k=>$v) {
            $propertySearch['property_id'] = $k;

            $property[$k] = [
                'name' => $v,
                'id'   => $k,
                'link' => url('Insurance/index') . '?' . http_build_query($propertySearch),
            ];
        }
        
    	// 结果
        $_config = config('paginate');
        $_config['query'] = $searchParams;

        $mInsurance = new cModel\Insurance();
    	$insurances = $mInsurance->where($where)->order($order)->paginate(10, false, $_config);
    	$pager = $insurances->render();

        foreach ($insurances as $k=>$v) {
            $insurances[$k] = $mInsurance->_formatInsurance($v);
        }

        $allCates = (new cModel\InsuranceCategory())->getAllCates(); // 所有分类

        // 地区资深代理人
        $whereAreaAgent = [
            'status' => 1,
            'agent_id' => $this->agentId,
            // 'city_id' => $areaInfo['city_id'],
        ];
        $areaAgents = (new cModel\Agent())->getAgent($whereAreaAgent, 4);

        // 热门产品
        $hotInsurances = cModel\Insurance::where('status', 1)->limit(5)->select();

        $this->assign('allCates', $allCates);
        $this->assign('hotInsurances', $hotInsurances);
        $this->assign('areaAgents', $areaAgents);
        $this->assign('insurances', $insurances);
        $this->assign('pager', $pager);
        $this->assign('companies', $companies);
        $this->assign('personal', $personal);
        $this->assign('group', $group);
        $this->assign('property', $property);

  		return $this->fetch('insurance/index');
	}

	public function detail()
	{
  		$planId = input('plan_id/d');
  		$where = [
  			'plan_id' => $planId,
  			'status'  => 1,
  		];
  		$plan = cModel\InsurancePlan::where($where)->select();

  		$this->assign('plan', $plan);

  		return $this->fetch('case/content');
	}
}
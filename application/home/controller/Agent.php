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
class Agent extends Base
{
    public function index()
    {
    	$search = input('get.');

    	$agentIds = [];
    	$searchParams = [];
    	$whereAgent = ['status'=>1];

        if (isset($search['area_id']) && $search['area_id']) {
            $searchParams['area_id'] = $search['area_id'];
            $whereAgent['area_id'] = $search['area_id'];
        }
        if (isset($search['company_id']) && $search['company_id']) {
            $searchParams['company_id'] = $search['company_id'];
            $whereAgent['company_id'] = $search['company_id'];
        }
        if (isset($search['category_id']) && $search['category_id']) {
            $searchParams['category_id'] = $search['category_id'];
            $agentIds = cModel\AgentAttr::where('category_id', $search['category_id'])->column('agent_id', 'attr_id');
        }
        if (isset($search['experience_id']) && $search['experience_id']) {
            $searchParams['experience_id'] = $search['experience_id'];
            $whereAgent['experience_id'] = $search['experience_id'];
        }
        // 搜索框搜索
        if (isset($search['title']) && $search['title']) {
            $searchParams['title'] = $search['title'];
            $whereAgent['name'] = ['like', "%" . $search['title'] . "%"];
        }
    	if (isset($search['city_id']) && $search['city_id']) {
    		$searchParams['city_id'] = $search['city_id'];
    		$whereAgent['city_id'] = $search['city_id'];
    	}

    	/* 分类 */
    	$area = $companies = $categories = $experience = [];
    	$areaSearch = $companySearch = $categorySearch = $experienceSearch = $searchParams;
    	$areaInfo = $this->_areaInfo();
        // $whereAgent['city_id'] = $areaInfo['city_id'];
    	// 地区
    	$areaArray = cModel\Area::where('pid', $areaInfo['city_id'])->field('id, name')->select();

        unset($areaSearch['area_id']);
        $area[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Agent/index') . '?' . http_build_query($areaSearch)];
    	foreach ($areaArray as $k=>$v) {
    		$areaSearch['area_id'] = $v['id'];

    		$area[$v['id']] = [
    			'name' => $v['name'],
    			'id'   => $v['id'],
    			'link' => url('Agent/index') . '?' . http_build_query($areaSearch),
    		];
    	}
    	// 公司
    	$companiesArray = cModel\InsuranceCompany::where('status', 1)->select();

        unset($companySearch['company_id']);
        $companies[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Agent/index') . '?' . http_build_query($companySearch)];
    	foreach ($companiesArray as $k=>$v) {
    		$companySearch['company_id'] = $v['company_id'];

    		$companies[$v['company_id']] = [
    			'name' => $v['short_name'],
    			'id'   => $v['company_id'],
    			'link' => url('Agent/index') . '?' . http_build_query($companySearch),
    		];
    	}
    	// 擅长险种
    	$categoriesArray = cModel\InsuranceCategory::where('pid', 'in', [1,2])->select();

        unset($categorySearch['company_id']);
        $categories[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Agent/index') . '?' . http_build_query($categorySearch)];
    	foreach ($categoriesArray as $k=>$v) {
    		$categorySearch['category_id'] = $v['category_id'];

    		$categories[$v['category_id']] = [
    			'name' => $v['name'],
    			'id'   => $v['category_id'],
    			'link' => url('Agent/index') . '?' . http_build_query($categorySearch),
    		];
    	}
    	// 从业年限
    	$experienceArray = cModel\InsuranceCategory::where('pid', 29)->select();

        unset($experienceSearch['experience_id']);
        $experience[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Agent/index') . '?' . http_build_query($experienceSearch)];
    	foreach ($experienceArray as $k=>$v) {
    		$experienceSearch['experience_id'] = $v['category_id'];

    		$experience[$v['category_id']] = [
    			'name' => $v['name'],
    			'id'   => $v['category_id'],
    			'link' => url('Agent/index') . '?' . http_build_query($experienceSearch),
    		];
    	}
    	// 保险精英
    	$whereElite = [
    		'status'   => 1,
    		'page'     => 2,
    		'position' => 1,
    	];
    	$elitesAdv = cModel\Adv::where($whereElite)->order('sort desc')->limit(5)->select();

        if (empty($elitesAdv)) {
            $elites = cModel\Agent::where(['status'=>1])->limit(5)->select();
        }
    	// 相关搜索
        // 友情链接
        $links = cModel\Link::where(['status'=>1, 'type'=>1])->limit(12)->select();
    	// 周边买保险
        $nearCities = cModel\Area::where('pid', $areaInfo['province_id'])->limit(12)->field('shortname,id')->select();
        foreach ($nearCities as $k=>$v) {
            $nearCities[$k]['link'] = url('Index/index', ['city_id'=>$v['id']]);
        }
    	// 猜您喜欢
        $guessLike = cModel\Insurance::where('status', 1)->limit(15)->select();
    	// 结果
        $_config = config('paginate');
        $_config['query'] = $searchParams;

        if (isset($search['category_id']) && $search['category_id'] && empty($agentIds)) {
            $agents = [];
            $pager = '';
        } else {
            if (!empty($agentIds)) $whereAgent['agent_id'] = ['IN', $agentIds];
    	    $agents = cModel\Agent::where($whereAgent)->paginate(10, false, $_config);
	        $pager = $agents->render();

            $allCates = (new cModel\InsuranceCategory())->getAllCates(); // 所有分类
            $goodatStr = '';

            foreach ($agents as $k=>$row) {
                $goodat = cModel\AgentAttr::where('agent_id', $row['agent_id'])->limit(3)->column('category_id', 'attr_id');

                if (empty($goodat)) {
                    $agents[$k]['goodat'] = '';
                } else {
                    foreach ($goodat as $value) {
                        $goodatStr .= ' ' . $allCates[$value];
                    }
                    $agents[$k]['goodat'] = $goodatStr;
                }
            }
        }
            
        $this->assign('allProvinces', getProvinces(2));
        $this->assign('allCities', getAllCities(2));
        $this->assign('search', $search);
        $this->assign('agents', $agents);
        $this->assign('pager', $pager);
        $this->assign('elites', $elites);
    	$this->assign('area', $area);
    	$this->assign('companies', $companies);
    	$this->assign('categories', $categories);
        $this->assign('experience', $experience);
        $this->assign('nearCities', $nearCities);
        $this->assign('links', $links);
    	$this->assign('guessLike', $guessLike);

        return $this->fetch('agent/agent');
    }

}

<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.doudouchongkeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace app\home\controller;

use app\home\model as hModel;
use app\common\model as cModel;
use \think\Db;
/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class Index extends Base{

	//系统首页
    public function index()
    {
        // var_dump(getCities(351));die;
        $nearCityId = input('city_id/d', 0);

        if ($nearCityId > 0) {
            changeLocation($nearCityId);
        }
        $areaInfo = $this->_areaInfo();
    	/* 分类 */
        // 人寿保险
        $lifeInsuranceCate = cModel\InsuranceCategory::where('pid', 1)->limit(6)->column('name', 'category_id');
        // 财产保险
        $propertyInsuranceCate = cModel\InsuranceCategory::where('pid', 2)->limit(4)->column('name', 'category_id');
        // 寿险公司
        $lifeCompany = cModel\InsuranceCompany::where('type', 1)->limit(4)->column('short_name', 'company_id');
        // 财险公司
        $propertyCompany = cModel\InsuranceCompany::where('type', 2)->limit(4)->column('short_name', 'company_id');

        $this->assign([
            'lifeInsuranceCate' => $lifeInsuranceCate,
            'propertyInsuranceCate' => $propertyInsuranceCate,
            'lifeCompany' => $lifeCompany,
            'propertyCompany' => $propertyCompany,
        ]);
    	/* 轮播图 */
    	// /* 资深保险经理人推荐 */
    	// $whereSenior = [
    	// 	'status'   => 1,
    	// 	'page'     => 1,
    	// 	'position' => 1,
    	// ];
    	// $seniorAgentAdv = cModel\Adv::where($whereSenior)->order('sort desc')->limit(5)->select();
     //    $this->assign('seniorAgent', $seniorAgentAdv);
    	// /* 热门保险方案 */
     //    $whereHot = [
     //        'status' => 1,
     //        'page' => 1,
     //        'position' => 2,
     //    ];
     //    $hotPlanAdv = cModel\Adv::where($whereHot)->order('sort desc')->limit(4)->select();
     //    $this->assign('hotPlan', $hotPlanAdv);
     //    /* 保险专家 */
     //    $whereExpert = [
     //        'status' => 1,
     //        'page' => 1,
     //        'position' => 3,
     //    ];
     //    $hotPlanAdv = cModel\Adv::where($whereExpert)->order('sort desc')->limit(4)->select();
     //    $this->assign('hotPlan', $hotPlanAdv);
    	// /* 保险专题 */
     //    $whereTopic = [
     //        'status' => 1,
     //        'page' => 1,
     //        'position' => 4,
     //    ];
     //    $hotPlanAdv = cModel\Adv::where($whereTopic)->order('sort desc')->limit(4)->select();
     //    $this->assign('hotPlan', $hotPlanAdv);
     //    /* 保险咨询 */
     //    $whereConsult = [
     //        'status' => 1,
     //        'page' => 1,
     //        'position' => 5,
     //    ];
     //    $hotPlanAdv = cModel\Adv::where($whereConsult)->order('sort desc')->limit(4)->select();
     //    $this->assign('hotPlan', $hotPlanAdv);
     //    /* 投保指南 */
     //    $whereGuide = [
     //        'status' => 1,
     //        'page' => 1,
     //        'position' => 6,
     //    ];
     //    $hotPlanAdv = cModel\Adv::where($whereGuide)->order('sort desc')->limit(4)->select();
     //    $this->assign('hotPlan', $hotPlanAdv);
    	// /* 合作品牌 */
     //    $wherePartner = [
     //        'status' => 1,
     //        'page' => 1,
     //        'position' => 7,
     //    ];
     //    $hotPlanAdv = cModel\Adv::where($wherePartner)->order('sort desc')->limit(4)->select();
     //    $this->assign('hotPlan', $hotPlanAdv);
    	// /* 友情链接 */
     //    $whereLink = [
     //        'status' => 1,
     //        'page' => 1,
     //        'position' => 8,
     //    ];
     //    $hotPlanAdv = cModel\Adv::where($whereLink)->order('sort desc')->limit(4)->select();

        // 资深保险代理人推荐
        $seniorAgent = (new cModel\Agent)->getAgent(['status'=>1], 5);
        // 热门保险方案
        $hotPlan = (new cModel\InsurancePlan)->getPlans(['status'=>1], 4);
        // 保险专家
        $expert = (new cModel\Agent)->getAgent(['status'=>1], 9);
        // 保险专题
        $topic = cModel\Article::where('status', 1)->where('category_id', 50)->limit(3)->select();
        // 险种导航
        $insurance = cModel\Insurance::where('status', 1)->limit(6)->column('name', 'insurance_id');
        // 保险案例
        $cases = cModel\Article::where('status', 1)->where('category_id', 51)->limit(6)->select();
        // 理赔技巧
        $skills = cModel\Article::where('status', 1)->where('category_id', 54)->limit(6)->select();
        // 友情链接
        $links = cModel\Link::where(['status'=>1, 'type'=>1])->limit(12)->select();
        // 合作品牌
        $partners = cModel\Link::where(['status'=>1, 'type'=>2])->limit(12)->select();
        // 保险资讯
        $asks_1 = cModel\Article::where('status', 1)->limit(6)->select();
        $asks_2 = cModel\Article::where('status', 1)->limit(10)->select();
        $provinces = getProvinces(2);
        $cities = Db::name('area')->where(['pid'=>$areaInfo['province_id'], 'level'=>2])->select();
        $areas  = Db::name('area')->where(['pid'=>$areaInfo['city_id'], 'level'=>3])->select();


        $this->assign([
            'seniorAgent' => $seniorAgent,
            'provinces' => $provinces,
            'cities' => $cities,
            'areas' => $areas,
            'hotPlan' => $hotPlan,
            'expert' => $expert,
            'topic' => $topic,
            'links' => $links,
            'partners' => $partners,
            'cases' => $cases,
            'skills' => $skills,
            'insurance' => $insurance,
            'asks_1' => $asks_1,
            'asks_2' => $asks_2,
        ]);

        return $this->fetch();
    }

}

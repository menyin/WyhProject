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
 * 关于我们控制器
 */
class Insurance extends Base
{
    public $_orderTitle = [
        '1' => '热销产品',
        '2' => '按时间排序',
        '3' => '按热度排序',
        '4' => '保险方案',
    ];
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
        // 年龄
        if (isset($search['age_id']) && $search['age_id']) {
            $searchParams['age_id'] = $search['age_id'];
            $where['age'] = $search['age_id'];
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
        foreach ($this->_orderTitle as $k=>$v) {
            $orderSearch['order_id'] = $k;
            $orderTitle[$k] = [
                'name' => $v,
                'link' => url('Insurance/index') . '?' . http_build_query($orderSearch),
            ];
        }
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

        // 年龄
        unset($ageSearch['age_id']);
        $age[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Insurance/index') . '?' . http_build_query($ageSearch)];
        foreach ($ageArray as $k => $v) {
            $ageSearch['age_id'] = $k;

            $age[$k] = [
                'name' => $v,
                'id'   => $k,
                'link' => url('Insurance/index') . '?' . http_build_query($ageSearch),
            ];
         }
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
        $areaInfo = $this->_areaInfo();
        $whereAreaAgent = [
            'status' => 1,
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
        $this->assign('age', $age);
        $this->assign('orderTitle', $orderTitle);

        return $this->fetch();
    }

    /**
     * 了解保险
     */
    public function know()
    {
        $mArticle = new cModel\Article();
        // 头条资讯
        $headline  = $mArticle->where(['status'=>1, 'headline'=>1])->limit(25)->column('title', 'article_id');
        // 推荐资讯
        $recommend = $mArticle->where(['status'=>1, 'recommend'=>1])->limit(13)->column('title', 'article_id');
        // 热门资讯
        $hot       = $mArticle->where(['status'=>1, 'hot'=>1])->limit(13)->column('title', 'article_id');
        // 保险学堂
        $school    = $mArticle->where(['status'=>1, 'category_id'=>50])->limit(10)->select();
        // 保险案例
        $case      = $mArticle->where(['status'=>1, 'category_id'=>51])->limit(17)->column('title', 'article_id');
        $casePhoto = $mArticle->where(['status'=>1, 'category_id'=>51])->order('publish_time desc,cover desc')->limit(6)->select();
        // 理财知识
        $money = $mArticle->where(['status'=>1, 'category_id'=>53])->limit(10)->select();
        // 人物专访
        $interview = $mArticle->where(['status'=>1, 'category_id'=>52])->limit(10)->select();
        // 政策解读
        $unscramble = $mArticle->where(['status'=>1, 'category_id'=>43])->limit(10)->select();

        $this->assign([
            'casePhoto'  => $casePhoto,
            'headline'  => $headline,
            'recommend' => $recommend,
            'hot'       => $hot,
            'school'    => $school,
            'case'      => $case,
            'money'     => $money,
            'interview' => $interview,
            'unscramble'=> $unscramble,
        ]);

        return $this->fetch();
    }
    public function knowDetail()
    {
        $id = input('id/d');
        $mArticle = new cModel\Article();

        $article = $mArticle->getArticle(['article_id'=>$id]);

        if ($id <= 0 || empty($article)) {
            $this->error('文章不存在');
        }

        cModel\Article::where('article_id', $id)->setInc('views');

        // 保险学堂
        $school    = $mArticle->where(['status'=>1, 'category_id'=>50])->limit(10)->select();

        $this->assign('article', $article);
        $this->assign('school', $school);

        $this->assign('metaTitle', $article['seo_title']);
        $this->assign('metaKeywords', $article['seo_keywords']);
        $this->assign('metaDescription', $article['seo_description']);

        return $this->fetch('insurance/know_detail');
    }
    /**
     * 收集终端用户资料
     */
    public function save()
    {
        $rule = [
            ['name',    'require|length:1,10',   '请输入姓名|名字不能超过10个字'],
            ['phone',   'require|/^1[34578]\d{9}$/',    '请填写手机号|手机号格式不正确'],
            ['sex',     'number|min:1|max:2',   '请选择性别|请选择性别|请选择性别'],
            ['message', 'length:1,200',         '留言不能超过200字'],
            ['province_id', 'require|number',   '请选择城市|请重新选择省份'],
            ['city_id', 'require|number',   '请选择城市|请重新选择城市'],
            ['area_id', 'require|number',   '请选择城市|请重新选择地区'],
        ];
        if (request()->isPost()) {
            $post = input('post.');

            $code = $post['code'];
            unset($post['code']);

            $validate = new Validate($rule);
            $result = $validate->check($post);

            if (!$result) {
                $this->error($validate->getError());
            }

            $insert = Db::name('message')->insert($post);

            if ($insert) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        }
        $this->_areaInfo();
        return $this->fetch('public/buy');
    }

    public function detail()
    {
        $id = input('id/d', 0);

        $mInsurance = new cModel\Insurance();

        $insurance = $mInsurance->getInsurance(['status'=>1, 'insurance_id'=>$id]);

        if (empty($insurance)) {
            $this->error('该产品不存在或已下架');
        }

        cModel\Insurance::where('insurance_id', $id)->setInc('views');

        // 保险案例
        $cases  = cModel\Article::where(['status'=>1, 'category_id'=>51])->limit(6)->select();
        // 保险专题
        $topics = cModel\Article::where(['status'=>1, 'category_id'=>2])->limit(5)->select();
        // 保险代理人
        $agent = cModel\Agent::find($insurance['agent_id']);

        $this->assign([
            'insurance' => $insurance,
            'cases' => $cases,
            'topics' => $topics,
            'agent' => $agent,
        ]);

        $config = session('default_seo_info');
        $this->assign('metaTitle', $insurance['name'] . '_' . $config[0]['value']);
        $this->assign('metaKeywords', $insurance['name'] . '_' . $config[1]['value']);
        $this->assign('metaDescription', $insurance['name'] . '_' . $config[2]['value']);

        return $this->fetch();
    }

    public function plan()
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
        // 年龄
        if (isset($search['age_id']) && $search['age_id']) {
            $searchParams['age_id'] = $search['age_id'];
            $where['age_id'] = $search['age_id'];
        }
        // 价格
        if (isset($search['budget_id']) && $search['budget_id']) {
            $searchParams['budget_id'] = $search['budget_id'];
            $where['budget_id'] = $search['budget_id'];
        }
        // 群体（对象）
        // if (isset($search['group_id']) && $search['group_id']) {
        //     $searchParams['group_id'] = $search['group_id'];
        //     $where['group_id'] = $search['group_id'];
        // }
        // 财产保险
        // if (isset($search['property_id']) && $search['property_id']) {
        //     $searchParams['property_id'] = $search['property_id'];
        //     $where['property_id'] = $search['property_id'];
        // }
        // 搜索框搜索
        if (isset($search['title']) && $search['title']) {
            $searchParams['title'] = $search['title'];
            $where['name'] = ['like'=>"%" . $search['title'] . "%"];
        }
        // 排序
        $order = 'plan_id desc';
        $orderId = isset($search['order_id']) ? $search['order_id'] : 0;
        if ($orderId == 1) {
            $order = 'hot desc';
        } else if ($orderId == 2) {
            $order = 'create_time desc';
        } else if ($orderId == 3) {
            $order = 'views desc';
        } else if ($orderId == 4) {
            $order = 'plan_id desc';
        }

        /* 分类 */
        $personalSearch = $budgetSearch = $orderSearch = $ageSearch = $companySearch = $searchParams;
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
        $companies[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Insurance/plan') . '?' . http_build_query($companySearch)];
        foreach ($companiesArray as $k=>$v) {
            $companySearch['company_id'] = $v['company_id'];

            $companies[$v['company_id']] = [
                'name' => $v['name'],
                'id'   => $v['company_id'],
                'link' => url('Insurance/plan') . '?' . http_build_query($companySearch),
            ];
        }
        $personalArray = cModel\InsuranceCategory::where('pid', 1)->column('name', 'category_id');
        $groupArray = cModel\InsuranceCategory::where('pid', 23)->column('name', 'category_id');
        $propertyArray = cModel\InsuranceCategory::where('pid', 2)->column('name', 'category_id');
        $ageArray = cModel\InsuranceCategory::where('pid', 34)->column('name', 'category_id');
        $budgetArray = cModel\InsuranceCategory::where('pid', 40)->column('name', 'category_id');

        // 年龄
        unset($ageSearch['age_id']);
        $age[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Insurance/plan') . '?' . http_build_query($ageSearch)];
        foreach ($ageArray as $k => $v) {
            $ageSearch['age_id'] = $k;

            $age[$k] = [
                'name' => $v,
                'id'   => $k,
                'link' => url('Insurance/plan') . '?' . http_build_query($ageSearch),
            ];
         }
        // 人身保险
        unset($personalSearch['personal_id']);
        $personal[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Insurance/plan') . '?' . http_build_query($personalSearch)];
        foreach ($personalArray as $k=>$v) {
            $personalSearch['personal_id'] = $k;

            $personal[$k] = [
                'name' => $v,
                'id'   => $k,
                'link' => url('Insurance/plan') . '?' . http_build_query($personalSearch),
            ];
        }
        // 价格
        unset($budgetSearch['budget_id']);
        $budget[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Insurance/plan') . '?' . http_build_query($budgetSearch)];
        foreach ($budgetArray as $k=>$v) {
            $budgetSearch['budget_id'] = $k;

            $budget[$k] = [
                'name' => $v,
                'id'   => $k,
                'link' => url('Insurance/plan') . '?' . http_build_query($budgetSearch),
            ];
        }
        // // 群体（对象）
        // unset($groupSearch['group_id']);
        // $group[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Insurance/index') . '?' . http_build_query($groupSearch)];
        // foreach ($groupArray as $k=>$v) {
        //     $groupSearch['group_id'] = $k;

        //     $group[$k] = [
        //         'name' => $v,
        //         'id'   => $k,
        //         'link' => url('Insurance/index') . '?' . http_build_query($groupSearch),
        //     ];
        // }
        // // 财产保险
        // unset($propertySearch['group_id']);
        // $property[0] = ['name'=>'不限', 'id'=>0, 'link'=>url('Insurance/index') . '?' . http_build_query($propertySearch)];
        // foreach ($propertyArray as $k=>$v) {
        //     $propertySearch['property_id'] = $k;

        //     $property[$k] = [
        //         'name' => $v,
        //         'id'   => $k,
        //         'link' => url('Insurance/index') . '?' . http_build_query($propertySearch),
        //     ];
        // }

        // 结果
        $_config = config('paginate');
        $_config['query'] = $searchParams;

        $mInsurancePlan = new cModel\InsurancePlan();
        $plans = $mInsurancePlan->where($where)->order($order)->paginate(10, false, $_config);
        if (!empty($plans)) {
            foreach ($plans as $k=>$v) {
                $plans[$k] = $mInsurancePlan->_formatInsurancePlan($v);
            }
        }

        // 地区资深代理人
        $areaInfo = $this->_areaInfo();
        $whereAreaAgent = [
            'status' => 1,
            // 'city_id' => $areaInfo['city_id'],
        ];
        $areaAgents = (new cModel\Agent())->getAgent($whereAreaAgent, 4);

        // 热门产品
        $hotInsurances = cModel\Insurance::where('status', 1)->limit(5)->select();

        $pager = $plans->render();

        $this->assign('areaAgents', $areaAgents);
        $this->assign('pager', $pager);
        $this->assign('companies', $companies);
        $this->assign('personal', $personal);
        $this->assign('age', $age);
        $this->assign('budget', $budget);
        $this->assign('plans', $plans);


        return $this->fetch('insurance/plan_list');
    }

    public function planDetail()
    {
        $planId = input('plan_id/d', 0);

        $mInsurancePlan = new cModel\InsurancePlan();

        $insurancePlan = $mInsurancePlan->getPlans(['plan_id'=>$planId],1);

        if (empty($insurancePlan) || $insurancePlan['status'] != 1) {
            $this->error('该方案不存在或已下架');
        }

        cModel\InsurancePlan::where('plan_id', $planId)->setInc('views');

        // 保险案例
        $cases  = cModel\Article::where(['status'=>1, 'category_id'=>51])->limit(6)->select();
        // 保险专题
        $topics = cModel\Article::where(['status'=>1, 'category_id'=>2])->limit(5)->select();
        // 保险代理人
        $agent = cModel\Agent::find($insurancePlan['agent_id']);

        $insurance = cModel\Insurance::find($insurancePlan['insurance_id']);

        $areaInfo = $this->_areaInfo();
        $provinces = getProvinces(2);
        $cities = Db::name('area')->where(['pid'=>$areaInfo['province_id'], 'level'=>2])->select();
        $areas  = Db::name('area')->where(['pid'=>$areaInfo['city_id'], 'level'=>3])->select();
        $this->assign([
            'insurance' => $insurance,
            'plan' => $insurancePlan,
            'cases' => $cases,
            'topics' => $topics,
            'agent' => $agent,
             'provinces' => $provinces,
            'cities' => $cities,
            'areas' => $areas,
        ]);

        $config = session('default_seo_info');
        $this->assign('metaTitle', $insurancePlan['title'] . '_' . $config[0]['value']);
        $this->assign('metaKeywords', $insurancePlan['title'] . '_' . $config[1]['value']);
        $this->assign('metaDescription', $insurancePlan['title'] . '_' . $config[2]['value']);

        return $this->fetch('insurance/plan_detail');
    }

}

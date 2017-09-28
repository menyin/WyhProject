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

class Index extends Base
{
    public function index(){
    	/* 荣誉墙 */
    	$whereHonor = [
    		'agent_id' => $this->agentId,
    		'status'   => 1,
    	];
    	$honors = cModel\AgentHonor::where($whereHonor)->select();

    	/* 精选方案 */
    	// $wherePlan = [
    	// 	'agent_id' => $this->agentId,
    	// 	'status'   => 1,
    	// ];
    	// $plans = cModel\InsurancePlan::where($wherePlan)->limit(3)->select();
        $cases = cModel\Article::where($whereHonor)->where('category_id', 51)->select();

    	/* 精选资讯 */
    	$whereArticle = [  
    		'agent_id' => $this->agentId,
    		'status'   => 1,
    	];
    	$articles = cModel\Article::where($whereArticle)->limit(5)->select();
        $firstArticle = $articles[0];
        unset($articles[0]);

    	$this->assign('agentId', $this->agentId);
    	$this->assign('honors', $honors);
    	// $this->assign('plans', $plans);
        $this->assign('articles', $articles);
        $this->assign('firstArticle', $firstArticle);
    	$this->assign('cases', $cases);

        return $this->fetch();
    }
}
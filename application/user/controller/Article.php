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

class Article extends Base
{
	/**
	 * 关于我们
	 * @return [type] [description]
	 */
	public function index()
	{
		$where = [
			'status' => 1,
			'agent_id' => $this->agentId,
		];
		$articles = cModel\InsurancePlan::where($where)->paginate(10);
		$pager = $articles->render();

		$this->assign('articles', $articles);
		$this->assign('pager', $pager);

		return $this->fetch('case/list');
	}

	public function detail()
	{
		$articleId = input('article_id/d',0);
		$where = [
			'article_id' => $articleId,
			'status'  => 1,
		];
		$article = (new cModel\Article)->getArticle($where);

		$this->assign('article', $article);

		return $this->fetch('case/content');
	}

	public function news()
	{
		$where = [
			'status' => 1,
			'agent_id' => $this->agentId,
			'category_id' => 42,
		];
		$articles = cModel\Article::where($where)->paginate(10);
		$pager = $articles->render();

		$this->assign('articles', $articles);
		$this->assign('pager', $pager);
		$category = cModel\Category::find(42);
		$this->assign('category', $category);

		return $this->fetch('article/list');
	}
}
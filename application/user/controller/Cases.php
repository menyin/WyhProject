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

class Cases extends Base
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
			'category_id' => 51,
		];
		$articles = cModel\Article::where($where)->paginate(10);
		$pager = $articles->render();

		$this->assign('articles', $articles);
		$this->assign('pager', $pager);

		return $this->fetch('case/list');
	}

	public function detail()
	{
		$articleId = input('article_id/d');
		$where = [
			'article_id' => $articleId,
			'status'  => 1,
		];
		$article = (new cModel\Article())->getArticle($where);

		if (empty($article)) {
			$this->error('案例不存在');
		}

		$this->assign('article', $article);

		return $this->fetch('case/content');
	}
}
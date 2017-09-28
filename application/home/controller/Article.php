<?php
namespace app\home\controller;

use app\common\model as cModel;
/**
 * 文档模型控制器
 * 文档模型列表和详情
 */
class Article extends Base 
{

	public function lists()
	{
		$searchParams = [];
		$categoryId = input('id/d', 51);

		if ($categoryId) {
    		$searchParams['category_id'] = $categoryId;
    		$where['category_id'] = $categoryId;
    	}
    	// 文章分类
    	$cates = cModel\Category::where(['pid'=>1, 'status'=>1])->column('title', 'id');

		$mArticle = new cModel\Article();

		$where = ['status'=>1];

		$_config = config('paginate');
        $_config['query'] = $searchParams;

		$articles = $mArticle->where($where)->paginate(12, false, $_config);
		$pager = $articles->render();

		$this->assign([
			'pager' => $pager,
			'articles' => $articles,
			'categoryId' => $categoryId,
			'cates' => $cates,
		]);
		return $this->fetch();
	}

	public function detail()
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

	public function likeInc()
	{
		$id = input('id/d');
        $result = cModel\Article::where('article_id', $id)->setInc('like');

        return $result;
	}


}

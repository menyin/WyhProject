<?php
namespace app\common\model;

class Article extends \think\Model {
	protected $pk = 'article_id';
	protected $table = 'bx_article';

	protected $_defaultSource = '法保兜保险网';

	/**
	 * 获取文章
	 */
	public function getArticle($where)
	{
		$article = $this->where($where)->find();

		if (empty($article)) return [];

		$content = ArticleContent::where('article_id', $article['article_id'])->find();

		if (empty($content)) return [];

		$article['content'] = $content['content'];
		$article['seo_title'] = $content['seo_title'];
		$article['seo_keywords'] = $content['seo_keywords'];
		$article['seo_description'] = $content['seo_description'];

		if ($article['agent_id'] > 0) {
			$agent = Agent::find($article['agent_id']);
			$article['source'] = $agent['name'];
		} else {
			$article['source'] = $this->_defaultSource;
		}

		$cCategory = Category::find($article['category_id']);
		$fCategory = Category::find($cCategory['pid']);

		$article['c_category'] = $cCategory['title'];
		$article['f_category'] = $fCategory['title'];

		return $article;
	}
}
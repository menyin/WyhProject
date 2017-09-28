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
use think\Validate;
use think\Db;

/**
 * 后台内容控制器
 * @author 兜兜虫科技  <doudouchongkeji.com>
 */
class Article extends Base {

    public $rule = [
        ['title',                   'require|length:1,30',      '标题不能为空|标题不能超过30个字'],
        ['desc',                    'require|length:1,500',     '简介不能为空|简介不能超过500个字'],
        ['category_id',             'number',                   '请重新选择分类'],
        ['content',                 'require|min:10',           '内容不能为空|内容不能少于10个字'],
        ['seo_title',               'require|length:1,100',     'seo标题不能为空|seo标题不能大于100个字'],
        ['seo_keywords',            'require|length:1,200',     'seo关键词不能为空|seo关键词不能大于200个字'],
        ['seo_description',         'require|length:1,300',     'seo简介不能为空|seo简介不能大于300个字'],
        ['views',                   'number',                   '浏览量是数字'],
        ['like',                    'number',                   '喜欢数量是数字'],
        ['dislike',                 'number',                   '不喜欢数量请填写数字'],
        ['publish_time',            'date',                     '发布时间格式不对'],
        ['agent_id',                'number',                   '请重新选择保险代理人'],
        ['status',                  'number',                   '请重新选择状态'],
        ['recommend',               'number',                   '请重新选择是否推荐'],
        ['hot',                     'number',                   '请重新选择是否热门'],
        ['headline',                'number',                   '请重新选择是否头条'],
        ['cover',                   'min:5',                    '请重新上传封面'],
        ['province_id',             'number',                   '请重新选择地区'],
        ['city_id',                 'number',                   '请重新选择地区'],
        ['area_id',                 'number',                   '请重新选择地区'],
    ];
    /**
     * 保险代理人管理首页
     */
    public function index()
    {
        $title = input('title', '');

        $map['status']  =   array('egt',0);
        if(is_numeric($title)){
            $map['article_id|title']=   array('like','%'.$title.'%');
        }else{
            $map['title']    =   array('like', '%'.(string)$title.'%');
        }

        $articleCategories = cModel\Category::where('status', 1)->column('title', 'id');
        $this->assign('articleCategories', $articleCategories);

        $list   = $this->lists('Article', $map, 'article_id desc');
        int_to_string($list);

        $this->assign('_list', $list);
        $this->assign('meta_title', '文章管理');
        return $this->fetch();
    }

    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.')['data'];

            $validate = new Validate($this->rule);

            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $data['create_time'] = time();
            $data['update_time'] = time();
            $data['editor'] = $this->admin['username'];
            $data['editor_id'] = $this->admin['uid'];
            $data['client_ip'] = request()->ip();

            if (empty($data['publish_time'])) {
                $data['publish_time'] = time();
            } else {
                $data['publish_time'] = strtotime($data['publish_time']);
            }

            $content['content'] = $data['content'];
            $content['seo_title'] = $data['seo_title'];
            $content['seo_keywords'] = $data['seo_keywords'];
            $content['seo_description'] = $data['seo_description'];

            unset($data['content']);
            unset($data['seo_title']);
            unset($data['seo_keywords']);
            unset($data['seo_description']);

            $createArticle = Db::name('article')->insertGetId($data);

            if ($createArticle) {
                $content['article_id'] = $createArticle;
                $createContent = Db::name('article_content')->insert($content);

                if ($createContent) {
                    $this->success('添加成功');
                } else {
                    Db::name('article')->where('article_id', $createArticle)->delete();
                    $this->error('添加失败');
                }
            }
        }

        $cates = cModel\Category::where('pid', 0)->where('status', 1)->select();
        $agents = cModel\Agent::where('status', 1)->select();
        $provinces = getProvinces(2);
        $this->assign([
            'agents' => $agents,
            'provinces' => $provinces,
            'cates' => $cates,
        ]);
        $this->assign('meta_title', '添加文章');

        return $this->fetch();
    }

    public function edit()
    {
        $articleId = input('id/d', 0);

        if (!$articleId) {
            $this->error('非法请求');
        }

        $article = Db::name('article')->where(['article_id'=>$articleId])->find();

        if (!$article) {
            $this->error('文章不存在');
        }

        if (request()->isPost()) {
            $data = input('post.')['data'];

            $validate = new Validate($this->rule);

            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $data['update_time'] = time();
            $data['editor'] = $this->admin['username'];
            $data['editor_id'] = $this->admin['uid'];

            if (empty($data['publish_time'])) {
                $data['publish_time'] = time();
            } else {
                $data['publish_time'] = strtotime($data['publish_time']);
            }

            $content['content'] = $data['content'];
            $content['seo_title'] = $data['seo_title'];
            $content['seo_keywords'] = $data['seo_keywords'];
            $content['seo_description'] = $data['seo_description'];

            unset($data['content']);
            unset($data['seo_title']);
            unset($data['seo_keywords']);
            unset($data['seo_description']);
// var_dump($data);die;
            $updateArticle = Db::name('article')->where(['article_id'=>$articleId])->update($data);
            $updateContent = Db::name('article_content')->where(['article_id'=>$articleId])->update($content);

            if ($updateArticle || $updateContent) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }
        }

        $content = Db::name('article_content')->where('article_id', $articleId)->find();

        $provinces = getProvinces(2);
        $cities = Db::name('area')->where(['pid'=>$article['province_id'], 'level'=>2])->select();
        $areas  = Db::name('area')->where(['pid'=>$article['city_id'], 'level'=>3])->select();
        $cates = cModel\Category::where('pid', 0)->where('status', 1)->select();
        $agents = cModel\Agent::where('status', 1)->select();
        $nowCate = cModel\Category::find($article['category_id']);
        $nowChildCates = cModel\Category::where('pid', $nowCate['pid'])->select();

        $this->assign([
            'provinces' => $provinces,
            'cities' => $cities,
            'areas' => $areas,
            'agents' => $agents,
            'cates' => $cates,
            'nowCate' => $nowCate,
            'nowChildCates' => $nowChildCates,
        ]);
        $this->assign('content', $content);
        $this->assign('article', $article);

        $this->assign('meta_title', '修改文章');

        return $this->fetch();
    }

    public function changeStatus()
    {
        $method = input('method', '');
        $articleId = input('id/d', 0);

        $agent = Db::name('article')->find($articleId);

        if (empty($agent)) {
            $this->error('不存在');
        }

        if ($method == 'forbidArticle') {
            $status = 0;
            $msg = '禁用成功';
        } else if ($method == 'resumeArticle') {
            $status = 1;
            $msg = '启用成功';
        } else if ($method == 'deleteArticle') {
            $status = -1;
            $msg = '删除成功';
        } else {
            $this->error('非法请求， 请重试');
        }

        $delete = Db::name('article')->where('article_id', $articleId)->update(['status'=>$status]);

        if ($delete) {
            $this->success($msg);
        } else {
            $this->error('操作失败');
        }

    }
}

<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.doudouchongkeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 兜兜虫科技
// +----------------------------------------------------------------------
namespace app\admin\controller;

use think\Validate;
use think\Db;
use app\common\model as cModel;

/**
 * 后台内容控制器
 * @author 兜兜虫科技  <doudouchongkeji.com>
 */
class Link extends Base {

    public $rule = [
        ['title',       'require|length:1,30',   '标题不能为空|标题不能超过30个字'],
        ['url',         'require|length:1,200',  '请填写地址|地址字数超过限制'],
        ['type',        'number',  '请重新选择分类'],
        ['province_id',             'number',                   '请重新选择地区'],
        ['city_id',                 'number',                   '请重新选择地区'],
        ['area_id',                 'number',                   '请重新选择地区'],
        ['status',      'number',  '状态'],
        ['update_time', 'date',    '更新时间不正确'],
        ['icon',        'min:5',    '链接不正确']
    ];
    /**
     * 保险代理人管理首页
     */
    public function index()
    {
        $title = input('title', '');

        $map['status']  =   array('egt',0);
        if(is_numeric($title)){
            $map['link_id|title']=   array('like','%'.$title.'%');
        }else{
            $map['title']    =   array('like', '%'.(string)$title.'%');
        }

        $list   = $this->lists('Link', $map);
        int_to_string($list);


        $mLink = new cModel\Link();
        $typeTitle = $mLink->_typeTitle;

        $this->assign('typeTitle', $typeTitle);
        $this->assign('_list', $list);
        $this->assign('meta_title', '友情链接管理');
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

            $createResult = Db::name('link')->insertGetId($data);

            if ($createResult) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        }
        $provinces = getProvinces(2);
        $this->assign([
            'provinces' => $provinces,
        ]);


        $this->assign('meta_title', '添加友情链接');

        return $this->fetch();
    }

    public function edit()
    {
        $linkId = input('id/d', 0);

        if (!$linkId) {
            $this->error('非法请求');
        }

        $mLink = new cModel\Link();

        $link = cModel\Link::find($linkId);

        if (!$link) {
            $this->error('文章不存在');
        }

        if (request()->isPost()) {
            $data = input('post.')['data'];

            $validate = new Validate($this->rule);

            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $updateResult = cModel\Link::where('link_id', $linkId)->update($data);

            if ($updateResult) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }

        }

        $typeTitle = $mLink->_typeTitle;
        $provinces = getProvinces(2);
        $cities = Db::name('area')->where(['pid'=>$link['province_id'], 'level'=>2])->select();

        $this->assign([
            'provinces' => $provinces,
            'cities' => $cities,
        ]);


        $this->assign('meta_title', '添加友情链接');
        $this->assign('link', $link);
        $this->assign('typeTitle', $typeTitle);

        return $this->fetch();
    }

    public function changeStatus()
    {
        $method = input('method', '');
        $linkId = input('id/d', 0);

        $agent = Db::name('link')->find($linkId);

        if (empty($agent)) {
            $this->error('不存在');
        }

        if ($method == 'forbidAgent') {
            $status = 0;
            $msg = '禁用成功';
        } else if ($method == 'resumeAgent') {
            $status = 1;
            $msg = '启用成功';
        } else if ($method == 'deleteAgent') {
            $status = -1;
            $msg = '删除成功';
        } else {
            $this->error('非法请求， 请重试');
        }

        $delete = Db::name('link')->where('link_id', $linkId)->update(['status'=>$status]);

        if ($delete) {
            $this->success($msg);
        } else {
            $this->error('操作失败');
        }

    }
}

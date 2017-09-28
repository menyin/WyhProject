<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://www.doudouchongkeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 兜兜虫科技  <82550565@qq.com>
// +----------------------------------------------------------------------
namespace app\user\controller;

use app\common\controller\Common;
use app\common\model as cModel;

class Base extends Common
{
    public $agentInfo;
    public $agentId;
    public function __construct()
    {
        /* 读取站点配置 */
        $config = api('Config/lists');
        config($config); //添加配置
        parent::__construct();

        $agentId = input('id/d');
        /* 头部信息 */
        $whereAgent = [
            'agent_id' => $agentId,
            'status'   => 1,
        ];
        $agentInfo = (new cModel\Agent)->getAgent($whereAgent);

        if (empty($agentInfo)) {
            $this->error('该保险代理人不存在');
        }
        $this->agentInfo = $agentInfo;
        $this->agentId   = $agentId;

        $this->assign('agentInfo', $agentInfo);
        $this->assign('agentId', $this->agentId);
        $this->assign('metaTitle', '保险代理人_法保兜保险网');
        $this->assign('metaKeywords', '法保兜保险网');
        $this->assign('metaDescription', '法保兜保险网');
    }
}
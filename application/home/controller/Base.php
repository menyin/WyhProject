<?php


namespace app\home\controller;

use think\Db;
use think\Controller;
use app\common\model as cModel;


/**
 * 前台公共控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */
class Base extends Controller {
	public function __construct(){
		/* 读取站点配置 */
		$config = api('Config/lists');$config['home_view_path']='default';
		$config ['template']['taglib_pre_load'] =   'app\common\taglib\Think,app\common\taglib\Article';
		$config ['template']['view_path'] = APP_PATH.'home/view/'.$config['home_view_path'].'/';
		config($config); //添加配置
		parent::__construct();
        $this->_hotSearch();
        $this->_areaInfo();
        $this->_getAllCitiesForChange();
        $this->_getDefaultSeo();
	}

    public function _getDefaultSeo()
    {
        if (session('?default_seo_info')) {
            $config = session('default_seo_info');
        } else {
            $config = Db::name('config')->where('id', 'IN', [1,2,3])->order('id asc')->select();
            session('default_seo_info', $config);
        }

        $this->assign('metaTitle', $config[0]['value']);
        $this->assign('metaKeywords', $config[1]['value']);
        $this->assign('metaDescription', $config[2]['value']);
    }

	/* 空操作，用于输出404页面 */
	public function _empty(){
		$this->redirect('Index/index');
	}


    protected function _initialize(){
        if(!config('web_site_close')){
            $this->error('择日上线，敬请期待~');
        }
    }

    /**
     * 根据IP获取城市信息
     */
    public function _areaInfo()
    {
    	$areaInfo = (new cModel\Area())->location();

    	$this->assign('areaInfo', $areaInfo);

    	return $areaInfo;
    }

    /**
     * 热门搜索
     */
    public function _hotSearch()
    {
        $hotCates = cModel\InsuranceCategory::where('pid', '>', 0)->order('hot desc')->limit(7)->column('name', 'category_id');
        // 人身保险
        foreach ($hotCates as $k=>$v) {
            $hotSearchs['personal_id'] = $k;

            $personal[$k] = [
                'name' => $v,
                'id'   => $k,
                'link' => url('Insurance/index') . '?' . http_build_query($hotSearchs),
            ];
        }

        $this->assign('hotCates', $personal);
    }

    /**
     * 获取所有城市，用于切换城市
     */
    public function _getAllCitiesForChange()
    {
        if (session('?allCitiesForChange')) {
            $result = session('allCitiesForChange');
        } else {
            $cities = cModel\Area::where('level', 2)->order('hot desc')->select();

            $result = [];
            foreach ($cities as $row) {
                $data = [$row['name'], $row['pinyin'], $row['pinyin']];
                $result[] = implode('|', $data);
            }

            session('allCitiesForChange', $result);

        }
        $this->assign('allCitiesForChange', json_encode($result));

        return $result;
    }
}

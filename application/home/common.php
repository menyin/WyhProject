<?php 
/**
 * 前台公共库文件
 * 主要定义前台公共函数库
 */ 

/**
 * 获取导航URL
 * @param  string $url 导航URL
 * @return string      解析或的url 
 */
function get_nav_url($url)
{
    switch ($url) {
        case 'http://' === substr($url, 0, 7):
        case '#' === substr($url, 0, 1):
            break;        
        default:
            $url = url($url);
            break;
    }
    return $url;
}
/**
 * 获取导航信息并缓存导航
 * @param  integer $id    导航ID
 * @param  string  $field 要获取的字段名
 * @return string         导航信息
 */
function get_channel($id = null, $field = null)
{
    static $list; 
    /* 读取缓存数据 */
    if(empty($list)){
        $list = cache('sys_channel_list');
    }
    if(empty($list)){
    	$data = db('Channel')->select();
    	foreach ($data as $key => $value) {	 
            $list[$value['id']] = $value;
        }
    	cache('sys_channel_list',$list);
    } 
    if(empty($id)){
    	return $list;
    }else{
    	if(isset($list[$id])){
    		return is_null($field) ? $list[$id] : $list[$id][$field];
    	}
    	return false;
    } 
}

/**
 * 切换城市
 */
function changeLocation($cityId)
{
    $areaModel = new app\common\model\Area();
    $areaModel->location($cityId);

    return;
}

 
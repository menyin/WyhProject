<?php
 
namespace app\common\validate;
use think\Validate;
/**
*  UC验证模型
*/
class Agent extends Validate{
    // 验证规则
    protected $rule = [
        ['name',            'require|length:1,30',         '请填写用户名|用户已存在|用户名长度1-30'],
        ['email',           'require|email|length:1,32',   '邮箱必须|邮箱已存在|邮箱格式不正确|邮箱长度不合法'],
        ['mobile',          '/^1[34578]\d{9}$/',           '手机号格式不正确|手机号已存在'],
        ['password',        'require|min:6',                            '密码必须|密码长度6-30'],
        ['birthday',        'date',                                   '请选择生日'],
        ['qq',              'number',                                   'qq格式不正确'],
        ['wechat',          'min:1',                                    '请填写微信号'],
        ['wechat_qrcode',   'max:255',                                  '微信头像地址过长'],
        ['phone',           'max:31',                                   '电话号码过长'],
        ['address',         'max:1023',                                 '地址填写过长'],
        ['slogan',          'max:1023',                                 '口号过长'],
        ['hot',             'require|number',                           '请选择是否热门|请重新选择是否热门'],
        ['recommend',       'require|number',                           '请选择是否推荐|请重新选择是否推荐'],
        ['new',             'require|number',                           '请选择是否新加入|请重新选择是否新加入'],
        ['status',          'require|number',                           '请选择状态|请重新选择状态'],
        ['province_id',     'number',                                   '请重新选择地区'],
        ['city_id',         'number',                                   '请重新选择地区'],
        ['area_id',         'number',                                   '请重新选择地区'],
        ['company_id',      'number',                                   '请重新选择公司'],
        ['experience_id',   'number',                                   '请重新选择年限'],
        ['hot',             'number',                                   '请重新选择是否热门'],
        ['recommend',       'number',                                   '请重新选择是否推荐'],
        ['new',             'number',                                   '请重新选择是否新加入'],
        ['license',         'min:1',                                    '请填写执业证号'],
        ['certification',   'min:1',                                    '请填写资格证'],
        ['honor',           'min:10',                                   '个人荣誉至少10个字'],
        ['introduction',    'min:10',                                   '自我介绍至少10个字'],
        ['head_img',        'min:10',                                   '请重新上传头像'],
    ]; 
    protected $scene = array(
        'add'     => 'name,email,password,mobile',
        'edit'    => 'name,birthday,company_id,qq,wechat,wechat_qrcode,phone,address,slogan,hot,recommend,new,status,province_id,city_id,area_id,experience_id,hot,recommend,new,license,certification,honor,introduction,head_img',
    );

}
<?php
namespace app\common\model;

use \think\Db;


class Message extends \think\Model {
	protected $pk = 'msg_id';
	protected $table = 'bx_message';

	public    $_needInsurance = [
		'1' => '重疾险',
		'2' => '养老险',
		'3' => '人寿险',
		'4' => '少儿险',
		'5' => '意外险',
		'6' => '医疗险',
		'7' => '理财险',
		'8' => '车险',
		'9' => '其他',
	];

	static function sendMsg($mobile, $params, $tempId)
	{
		$result = sendMsg($mobile, $params, $tempId);
		$code = Message::getMessageCode($mobile);

		$data = [
			'code' => $code,
			'create_time' => time(),
			'mobile' => $mobile,
			'temp_id' => $tempId,
			'error' => $result['error'],
			'error_msg' => $result['msg'],
			'params' => json_encode($params),
		];

		Db::name('message_code')->insert($data);

		return $result;
	}

	static function getMessageCode($mobile)
	{
		$prefix = config('message.prefix');
		$name = $prefix . $mobile;

		if (session("?{$name}")) {
			return session("?{$name}");
		}

		return '';
	}

	static function makeCode($mobile)
	{
		$config = config('message');
		$name = $config['prefix'] . $mobile;

		$code = rand(1234, 9876);
		$encryptCode = think_encrypt($code, $config['encrypt']);

		session($name, $encryptCode);

		return $code;
	}
}
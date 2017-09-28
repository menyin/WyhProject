<?php
namespace app\common\model;

class InsuranceCategory extends \think\Model {
	protected $pk = 'category_id';
	protected $table = 'bx_insurance_category';

	/**
	 * 获取所有分类
	 */
	public function getAllCates()
	{
		if (session('?allInsuranceCates')) {
			return session('allInsuranceCates');
		}

		$cates = $this->where('status', 1)->column('name', 'category_id');

		session('allInsuranceCates', $cates);

		return $cates;
	}
}
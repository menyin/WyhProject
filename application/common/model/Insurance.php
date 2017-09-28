<?php
namespace app\common\model;

class Insurance extends \think\Model {
	protected $pk = 'insurance_id';
	protected $table = 'bx_insurance';

	public function _formatInsurance($insurance)
	{
		// 保障项目
		$ensure = InsuranceCategory::where('pid', 55)->column('name', 'category_id');
		$ensureIds = array_keys($ensure);

		$insuranceEnsure = InsuranceAttr::where('insurance_id', $insurance['insurance_id'])->where('category_id', 'IN', $ensureIds)->select();

		$insurance['ensure'] = [];
		foreach ($insuranceEnsure as $k=>$v) {
			$insurance['ensure'][$v['category_id']] = $ensure[$v['category_id']];
		}

		if (!empty($insurance['guarantee'])) {
			$insurance['guarantee'] = json_decode($insurance['guarantee'],1);
		}
		if (!empty($insurance['notice'])) {
			$insurance['notice'] = json_decode($insurance['notice'],1);
		}

		return $insurance;
	}

	public function getInsurance($where, $limit=1)
	{
		if ($limit > 1) {
			$insurances = $this->where($where)->limit($limit)->select();
		} else {
			$insurances = $this->where($where)->select();
		}

		if (empty($insurances)) return [];

		foreach ($insurances as $k=>$v) {
			$insurances[$v['insurance_id']] = $this->_formatInsurance($v);
		}

		if ($limit == 1) {
			return $insurances[0];
		} 

		return $insurances;
	}
}
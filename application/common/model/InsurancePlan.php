<?php
namespace app\common\model;

class InsurancePlan extends \think\Model 
{
	protected $pk = 'plan_id';
	protected $table = 'bx_insurance_plan';
	protected $dateFormat = false;

	protected $sex = [
		'1' => '男',
		'2' => '女',
		'3' => '不限',
	];

	public function getPlans($where, $limit=null)
	{
		if ($limit > 1) {
			$plans = $this->where($where)->limit($limit)->select();
		} else {
			$plans = $this->where($where)->select();
		}

		if (empty($plans)) return [];

		foreach ($plans as $k=>$plan) {
			$company = InsuranceCompany::find($plan['company_id']);
			$plan['company'] = $company['short_name'];

			$agent = Agent::find($plan['agent_id']);
			$category = PlanAttr::where('plan_id', $plan['plan_id'])->select();

			$planCates = [];
			$plan['categoies_title'] = '';
			$plan['categories'] = '';

			if (!empty($category)) {
				$allCates = (new InsuranceCategory())->getAllCates();
				$cateTitle = '';
				foreach ($category as $row) {
					$planCates = $allCates[$row['category_id']];
					$cateTitle .= $allCates[$row['category_id']] . '、';
				}
				$plan['categoies_title'] = $cateTitle;
				$plan['categories'] = $planCates;
			}

			$province = Area::find($agent['province_id']);
			$city = Area::find($agent['city_id']);

			$plan['province_name'] = $province['shortname'];
			$plan['city_name'] = $city['shortname'];

			$plan['sex_type'] = $this->sex[$plan['sex']];
			$plan = $this->_formatInsurancePlan($plan);
			$plans[$k] = $plan;
		}

		if ($limit == 1) {
			return $plans[0];
		} 

		return $plans;
	}

	public function _formatInsurancePlan($plan)
	{
		if (!empty($plan['contains'])) {
			$plan['contains'] = json_decode($plan['contains'],1);
		}
		return $plan;
	}
}
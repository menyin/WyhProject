<?php
namespace app\common\model;

class Agent extends \think\Model {
	protected $pk = 'agent_id';
	protected $table = 'bx_agent';

	public function getAgent($where, $limit=1)
	{

		if ($limit > 1) {
			$agents = $this->where($where)->limit($limit)->select();
		} else {
			$agents = $this->where($where)->select();
		}

		if (empty($agents)) return [];

		foreach ($agents as $k=>$agent) {
			$company = InsuranceCompany::find($agent['company_id']);

			$agent['company'] = $company['short_name'];

			$experience = InsuranceCategory::find($agent['experience']);

			$agent['experience_title'] = $experience['name'];

			$province = Area::find($agent['province_id']);
			$city = Area::find($agent['city_id']);
			$area = Area::find($agent['area_id']);

			$agent['province_name'] = $province['shortname'];
			$agent['city_name'] = $city['shortname'];
			$agent['area_name'] = $area['shortname'];

			$agents[$k] = $agent;
		}

		if ($limit == 1) {
			return $agents[0];
		} 

		return $agents;
	}
}
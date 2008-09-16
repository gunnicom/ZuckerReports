<?php

require_once('modules/ZuckerReports/config.php');
require_once('modules/Users/User.php');

class SimpleTeams {
	
	function SimpleTeams() {
	}

	function getImplementationType() {
		global $zuckerreports_config;
	
		if ($zuckerreports_config["team_implementation"] == "auto") {
			if (file_exists("modules/Teams/Team.php")) {
				return "sugar";
			} else if (!empty($zuckerreports_config["teams"])) {
				return "simple";
			} else {
				return "none";
			}
		} else if ($zuckerreports_config["team_implementation"] == "sugar" && exists("modules/Teams/Team.php")) {
			return "sugar";
		} else if ($zuckerreports_config["team_implementation"] == "simple") {
			return "simple";
		} else {
			return "none";
		}
	}
	
	
	function prepareBean($bean) {
		$impl = SimpleTeams::getImplementationType();
		if ($impl == "sugar") {
			global $current_user;
			if (!empty($current_user))
			{
				$bean->team_id = $current_user->default_team;
			}
			else
			{
				$bean->team_id = 1;  // global team
			}
		} else if ($impl == "simple") {
			$bean->disable_row_level_security = true;
			$bean->team_id = "none";
		} else {
			$bean->disable_row_level_security = true;
		}
	}
	
	function xtplGetTeamSelection($xtpl, $focus) {
		global $app_strings;
		global $current_language;
		global $current_user;
		
		$mod_strings = return_module_language($current_language, "ZuckerReports");

		$xtpl_teams = new XTemplate ('modules/ZuckerReports/SimpleTeams.html');
		$xtpl_teams->assign("MOD", $mod_strings);
		$xtpl_teams->assign("APP", $app_strings);
		
		$impl = SimpleTeams::getImplementationType();
		if ($impl == "sugar") {
			$json = getJSONobj();
			
			$team_array = get_team_array();
			asort($team_array);
			if (empty($focus->id)) {	
				$xtpl_teams->assign("TEAM_OPTIONS", get_select_options_with_id(get_team_array(), $current_user->default_team));
				$xtpl_teams->assign("TEAM_NAME", $current_user->default_team_name);
				$xtpl_teams->assign("TEAM_ID", $current_user->default_team);
			}
			else {
				$xtpl_teams->assign("TEAM_OPTIONS", get_select_options_with_id(get_team_array(), $focus->team_id));
				$xtpl_teams->assign("TEAM_NAME", $focus->team_name);
				$xtpl_teams->assign("TEAM_ID", $focus->team_id);
			}
			$popup_request_data = array(
				'call_back_function' => 'set_return',
				'form_name' => 'EditView',
				'field_to_name_array' => array(
					'id' => 'team_id',
					'name' => 'team_name',
					),
				);
			$xtpl_teams->assign('encoded_team_popup_request_data', $json->encode($popup_request_data));
			$xtpl_teams->parse("sugarpro");
			return $xtpl_teams->text("sugarpro");
			
		} else if ($impl == "simple") {
			$team_options = SimpleTeams::getTeamOptions();
			asort($team_options);
			$xtpl_teams->assign("TEAM_OPTIONS", get_select_options_with_id($team_options, $focus->team_id));
			$xtpl_teams->parse("simpleteams");
			return $xtpl_teams->text("simpleteams");
		} else {
			return "";
		}
	}

	function get_assigned_team_name($focus) {
		$impl = SimpleTeams::getImplementationType();
		if ($impl == "sugar") {
			return get_assigned_team_name($focus->team_id);
		} else if ($impl == "simple") {
			global $zuckerreports_config;
		
			$team = $zuckerreports_config["teams"][$focus->team_id];
			return $team["name"];
		} else {
			return "";
		}
	}
	
	function filterBeanList($list) {
		$impl = SimpleTeams::getImplementationType();
		if ($impl == "sugar") {
			//already filtered
			return $list;
		} else if ($impl == "simple") {
			global $current_user;
			
			$list_new = array();
			foreach ($list as $bean) {
				if (SimpleTeams::userHasAccess($current_user->id, $bean)) {
					$list_new[] = $bean;
				}
			}
			return $list_new;
		} else {
			return $list;
		}
	}
	
	function checkAccess($bean) {
		$impl = SimpleTeams::getImplementationType();
		if ($impl == "sugar") {
			return true;
		} else if ($impl == "simple") {
			global $current_user;
			
			if (SimpleTeams::userHasAccess($current_user->id, $bean)) {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}
	}

	
	function userHasAccess($user_id, $bean) {	
		global $zuckerreports_config;
		
		if (empty($bean) || empty($bean->team_id) || $bean->team_id == "none") return true;

		$team = $zuckerreports_config["teams"][$bean->team_id];
		$user = new User();
		$user->retrieve($user_id);
		
		if (empty($team) || empty($user)) return true;
		
		if (in_array($user->user_name, $team["users"])) return true;
		
		return false;
	}

	function getTeamOptions() {
		global $zuckerreports_config;
	
		$result = array();
		$result["none"] = "--none--";
		foreach ($zuckerreports_config["teams"] as $teamid=>$values) {
			$result[$teamid] = $values["name"];
		}
		return $result;
	}
	
}

?>

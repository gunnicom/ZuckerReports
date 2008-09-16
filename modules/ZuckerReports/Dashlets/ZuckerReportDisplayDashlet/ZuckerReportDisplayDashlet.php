<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('XTemplate/xtpl.php');
require_once('include/Dashlets/Dashlet.php');
require_once('include/Sugar_Smarty.php');
require_once('modules/ZuckerRunnableReport/RunnableReport.php');

class ZuckerReportDisplayDashlet extends Dashlet {
	
	var $runnable_id;
	
    function ZuckerReportDisplayDashlet($id, $def) {
        $this->loadLanguage('ZuckerReportDisplayDashlet', 'modules/ZuckerReports/Dashlets/');
        parent::Dashlet($id);

		global $theme;
		$theme_path="themes/".$theme."/";
		require_once($theme_path.'layout_utils.php');
		
        $this->isConfigurable = true; 
        $this->hasScript = false; 
 		
		$this->runnable_id = $def['runnable_id'];
		$this->title = $this->dashletStrings['LBL_NOTITLE'];
    }

    function display() {
		global $current_language;

		if (!empty($this->runnable_id)) {
			$seed = new RunnableReport();
			$bean = $seed->retrieve($this->runnable_id);
			$str = $bean->run_inline();
			$this->title = $bean->name;
		} else {
			$this->title = $this->dashletStrings['LBL_NOTITLE'];
		}
		
		return parent::display().$str;
    }
         
    function displayOptions() {
        global $app_strings;
		
 		$seed = new RunnableReport();
		
		$list = $seed->get_full_list("name", "report_result_type='INLINE'");
		
		$select = array();
		if (!empty($list)) {
			foreach ($list as $bean) {
				$select[$bean->id] = $bean->get_summary_text();
			}
		}
		asort($select);
	
		$ss = new Sugar_Smarty();
		$ss->assign('runnableLbl', $this->dashletStrings['LBL_CONFIGURE_RUNNABLE']);
		$ss->assign('runnableSelect', get_select_options_with_id($select, $this->runnable_id));
		$ss->assign('id', $this->id);


        return parent::displayOptions() . $ss->fetch('modules/ZuckerReports/Dashlets/ZuckerReportDisplayDashlet/ZuckerReportDisplayDashletOptions.tpl');
    }  

    function saveOptions($req) {
        global $sugar_config, $timedate, $current_user, $theme;
        $options = array();
		$options['runnable_id'] = $_REQUEST['runnable_id'];
		 
        return $options;
    }
}

?>

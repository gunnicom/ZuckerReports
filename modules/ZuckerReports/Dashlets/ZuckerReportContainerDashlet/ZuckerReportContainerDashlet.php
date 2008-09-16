<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('XTemplate/xtpl.php');
require_once('include/Dashlets/Dashlet.php');
require_once('include/Sugar_Smarty.php');
require_once('modules/ZuckerReportContainer/ReportContainer.php');

class ZuckerReportContainerDashlet extends Dashlet {
	
	var $count = 10;
	var $container_id;

    function ZuckerReportContainerDashlet($id, $def) {
        $this->loadLanguage('ZuckerReportContainerDashlet', 'modules/ZuckerReports/Dashlets/');
        parent::Dashlet($id);

		global $theme;
		$theme_path="themes/".$theme."/";
		require_once($theme_path.'layout_utils.php');
		
        $this->isConfigurable = true; 
        $this->hasScript = false; 
                
        if(empty($def['title'])) $this->title = $this->dashletStrings['LBL_TITLE'];
        else $this->title = $def['title'];      


        if(!empty($def['container_id'])) $this->container_id = $def['container_id'];
        if(!empty($def['count'])) $this->count = $def['count'];
		
    }

    function display() {
		global $current_language;
		
		if (empty($this->container_id)) {
			$child_reports = ReportContainer::get_root_reports();
		} else {
			$container = new ReportContainer();
			$container->retrieve($this->container_id);
			$child_reports = $container->get_linked_beans("reports", "ZuckerReport");
		}

		$mod_strings = return_module_language($current_language, "ZuckerReports");
		
		require_once('include/ListView/ListView.php');
		$lv = new ListView();
		$lv->initNewXTemplate('modules/ZuckerReportContainer/DetailView.html', $mod_strings);
		$lv->xTemplateAssign("DELETE_INLINE_PNG",  get_image($image_path.'delete_inline.png','align="absmiddle" alt="'.$app_strings['LNK_DELETE'].'" border="0"'));
		$lv->xTemplateAssign("EDIT_INLINE_PNG",  get_image($image_path.'edit_inline.png','align="absmiddle" alt="'.$app_strings['LNK_EDIT'].'" border="0"'));
		$lv->xTemplateAssign("RETURN_URL", "&return_module=ZuckerReportContainer&return_action=DetailView&return_id=".$container->id);

		$lv->setHeaderTitle("");
		$lv->setHeaderText("");
		ob_start();
		$lv->processListViewTwo($child_reports, "reports", "REPORT");
		$str = ob_get_clean();
		ob_end_flush();
		
		return parent::display().$str;
    }
         
    function displayOptions() {
        global $app_strings;
        
        $ss = new Sugar_Smarty();
        $ss->assign('titleLbl', $this->dashletStrings['LBL_CONFIGURE_TITLE']);
        $ss->assign('countLbl', $this->dashletStrings['LBL_CONFIGURE_COUNT']);
        $ss->assign('containerLbl', $this->dashletStrings['LBL_CONFIGURE_CONTAINER']);
        $ss->assign('saveLbl', $app_strings['LBL_SAVE_BUTTON_LABEL']);
        $ss->assign('title', $this->title);
		$container = ReportContainer::get_category_select_options();
		asort($container);
		$ss->assign('containerSelect', get_select_options_with_id($container, $this->container_id));
        $ss->assign('count', $this->count);
        $ss->assign('id', $this->id);
		
        return parent::displayOptions() . $ss->fetch('modules/ZuckerReports/Dashlets/ZuckerReportContainerDashlet/ZuckerReportContainerDashletOptions.tpl');
    }  

    function saveOptions($req) {
        global $sugar_config, $timedate, $current_user, $theme;
        $options = array();
        $options['title'] = $_REQUEST['title'];
		$options['container_id'] = $_REQUEST['container_id'];
		$options['count'] = $_REQUEST['count'];
         
        return $options;
    }
}

?>

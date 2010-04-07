<?php
require_once('data/SugarBean.php');
require_once('modules/ZuckerReports/ReportProviderBase.php');

require_once('modules/ZuckerListingTemplateFilter/ListingTemplateFilter.php');
require_once('modules/ZuckerListingTemplateOrder/ListingTemplateOrder.php');

class ListingRow extends SugarBean {

	var $list_view_data;
	
	function ListingRow($list_view_data) {
		$this->list_view_data = $list_view_data;
		$this->field_defs = array();
	}
	function get_list_view_data() {
		return $this->list_view_data;
	}
}




class ListingTemplate extends ReportProviderBase {

	var $name;
	var $mainmodule;
	var $filtertype;
	var $description;
	var $customwhere1;
	var $customwhere2;

	var $table_name = "zucker_listingtemplates";
	var $object_name = "ListingTemplate";
	var $module_dir = "ZuckerListingTemplate";

	function ListingTemplate() {		
		parent::ReportProviderBase();		
		$this->new_schema = true;
	}	
	
	function get_summary_text() {
		return $this->name;	
	}
	
	function fill_in_additional_detail_fields() {		
		global $current_language, $theme;
		global $png_support;

		$mod_strings = return_module_language($current_language, "ZuckerListingTemplate");
		
		$this->action_module = $this->module_dir;
		$this->type_desc = $mod_strings["LBL_LISTING"];
		$this->image_html = get_image("themes/".$theme."/images/".$this->mainmodule, $this->mainmodule);
		$this->image_module = $this->mainmodule;

		$this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
		$this->team_name = SimpleTeams::get_assigned_team_name($this);
	}			

	function get_by_name($name) {
		$seed = new ListingTemplate();
		$results = $seed->get_full_list("", "name='".$name."'");
		if (!empty($results)) {
			$result = $seed->retrieve($results[0]->id);
			return $result;
		} else {
			return NULL;
		}
	}	
	
	
	function get_filters() {
		$seed = new ListingTemplateFilter();
		$query = "SELECT id from ".$seed->table_name." where listing_template_id='".$this->id."' AND deleted=0";
		return $this->build_related_list($query, $seed);
	}	
	function get_orders() {
		$seed = new ListingTemplateOrder();
		$query = "SELECT id from ".$seed->table_name." where listing_template_id='".$this->id."' AND deleted=0";
		return $this->build_related_list($query, $seed);
	}	

	function mark_listingrelations_deleted($id) {
		$t = new ListingTemplate();
		$t->retrieve($id);
		
		$filters = $t->get_filters();
		$orders = $t->get_orders();
		foreach ($filters as $f) {
			$f->mark_deleted($f->id);
		}
		foreach ($orders as $o) {
			$o->mark_deleted($o->id);
		}
	}
	
	function mark_relationships_deleted($id) {
		parent::mark_relationships_deleted($id);
		
		ListingTemplate::mark_listingrelations_deleted($id);
	}
	
	function get_full_beans_list() {
		global $beanList, $beanFiles;
		global $app_list_strings;
		
		$result = array();
		
		foreach ($beanList as $beanName) {
			$beanFile = $beanFiles[$beanName];
			if (empty($beanFile)) continue;
			require_once($beanFile);
			$seed = new $beanName;
			if (!empty($app_list_strings["moduleList"][$seed->module_dir])) {
				$result[$seed->module_dir] = $app_list_strings["moduleList"][$seed->module_dir];
			}
		}
		return $result;
	}
	function get_full_fields_list() {
		global $current_language, $app_strings;
		global $beanList, $beanFiles;
		
		$field_select = array();
		$field_strings = return_module_language($current_language, $this->mainmodule);
		
		$beanName = $beanList[$this->mainmodule];
		$beanFile = $beanFiles[$beanName];
		if (!empty($beanName) && !empty($beanFile)) {
			require_once($beanFile);
			$seed = new $beanName;
			
			foreach (array_keys($seed->field_defs) as $field_def_key) {
				$field_def = $seed->field_defs[$field_def_key];
				if ($field_def["source"] != "non-db" || ($field_def["type"] == "relate" && !empty($field_def["table"]))) {
				
					$field_select[$field_def_key] = $this->get_field_display_name($this->mainmodule, $field_def_key);
				}
			}
		}
		return $field_select;
	}
	function get_full_comparator_list($field_name) {
		global $current_language, $app_strings;
		global $beanList, $beanFiles;
		
		$mod_list_strings = return_mod_list_strings_language($current_language, $this->module_dir);
		$comparator_select = $mod_list_strings["LISTING_FILTER_COMPARATORS_TEXT"];
		
		$beanName = $beanList[$this->mainmodule];
		$beanFile = $beanFiles[$beanName];
		if (!empty($beanName) && !empty($beanFile)) {
			require_once($beanFile);
			$seed = new $beanName;
			
			$field_def = $seed->field_defs[$field_name];
			
			if ($field_def["type"] == "datetime" || $field_def["type"] == "date") {
				$comparator_select = $mod_list_strings["LISTING_FILTER_COMPARATORS_DATE"];
			} else if ($field_def["type"] == "float" || $field_def["type"] == "double" || $field_def["type"] == "int" || $field_def["type"] == "numeric" || $field_def["type"] == "currency") {
				$comparator_select = $mod_list_strings["LISTING_FILTER_COMPARATORS_NUMERIC"];
			}			
		}
		return $comparator_select;
	}
	function get_field_options_list($field_name) {
		global $current_language, $app_strings, $app_list_strings;
		global $beanList, $beanFiles;
		
		$options_select = array();
		
		$beanName = $beanList[$this->mainmodule];
		$beanFile = $beanFiles[$beanName];
		if (!empty($beanName) && !empty($beanFile)) {
			require_once($beanFile);
			$seed = new $beanName;
			
			$field_def = $seed->field_defs[$field_name];
			
			if ($field_def["type"] == "enum" && !empty($field_def["options"])) {
				$options_select = array_merge(array("" => ""), $app_list_strings[$field_def["options"]]);
			}			
		}
		return $options_select;
	}
	
	function get_field_display_name($module_name, $field_name) {
		global $current_language, $app_strings, $app_list_strings;
		global $beanList, $beanFiles;

		$field_strings = return_module_language($current_language, $module_name);
		
		$beanName = $beanList[$module_name];
		$beanFile = $beanFiles[$beanName];
		if (!empty($beanName) && !empty($beanFile)) {
			require_once($beanFile);
			$seed = new $beanName;
			
			$field_def = $seed->field_defs[$field_name];
			if (empty($field_def["vname"])) {
				$vname = $field_def["name"];
			} else if (!empty($field_strings[$field_def["vname"]])) {
				$vname = $field_strings[$field_def["vname"]];
			} else if (!empty($app_strings[$field_def["vname"]])) {
				$vname = $app_strings[$field_def["vname"]];
			} else {
				$vname = $field_def["name"];
			}
			if ($vname[strlen($vname) - 1] == ":") $vname = substr($vname, 0, strlen($vname) - 1);
			
			
			return $vname;
		} else {
			return $module_name.".".$field_name;
		}
	}
	
	
	
	var $list_template;
	var $archive_dir;
	var $include_header;
	var $col_delim;
	var $row_delim;
	
	function execute_request($parameter_values = array()) {
	
		$this->list_template = $_REQUEST["list_template"];
		$this->archive_dir = $this->get_archive_dir();
		
		if ($_REQUEST["format"] == "CSV") {
			$this->col_delim = $this->get_delim($_REQUEST["col_delim"]);
			$this->row_delim = $this->get_delim($_REQUEST["row_delim"]);
		}
		$this->include_header = isset($_REQUEST["include_header"]);
		
		return $this->execute($_REQUEST["format"], $parameter_values);
	}

	function execute($format = 'TABLE', $parameter_values = array()) {
		global $sugar_config, $current_user, $current_language;
		global $beanList, $beanFiles;

		$beanName = $beanList[$this->mainmodule];
		$beanFile = $beanFiles[$beanName];
		if (!empty($beanName) && !empty($beanFile)) {
			require_once($beanFile);
			$seed = new $beanName;
			
			$filters = $this->get_filters();
			$sql_where = array();
			foreach ($filters as $filter) {
				$sql_where[] = $filter->create_where_clause($parameter_values);
			}

			$orders = $this->get_orders();
			$sql_order = array();
			foreach ($orders as $order) {
				$sql_order[] = $order->create_order_clause($parameter_values);
			}

			
			if ($this->filtertype == "AND") {
				$sql_join = " and ";
			} else if ($this->filtertype == "OR") {
				$sql_join = " or ";
			} else {
				$sql_join = " and ";
			}
			if (!empty($sql_join) && !empty($sql_where)) {
				$where_clause = "(".join($sql_join, $sql_where).")";
			}
			if (!empty($sql_order)) {
				$order_clause = join(", ", $sql_order);
			}
			
			if (!empty($this->customwhere1)) {
				$where_clause = $this->customwhere1." ".$where_clause;
			}
			if (!empty($this->customwhere2)) {
				$where_clause = $where_clause." ".$this->customwhere1;
			}
			
			$rows = $seed->get_full_list($order_clause, $where_clause);
			if (empty($rows)) $rows = array();
			
			$this->report_output .= "Found ".count($rows)." rows<br/>";

			if ($format == "TABLE" || $format == "HTML" || $format == "SIMPLEHTML" || $format == "CSV") {
			
				$list_data = array();
				$list_fields = array();
				foreach ($rows as $row) {
	
					$row_data = $row->get_list_view_data();
					$row_data_mapped = array();
					foreach (array_keys($row_data) as $key) {
						$row_data_mapped[strtoupper($this->mainmodule)."_".$key] = $row_data[$key];
					}
					$list_data[] = new ListingRow($row_data_mapped);
					if (empty($list_fields)) {
						foreach (array_keys($row_data) as $key) {
							$list_fields[] = $key;
						}
					}
				}
				
				if ($format == "HTML" || $format == "TABLE") {
				
					if ($this->list_template == "default") {
						require_once('include/ListView/ListViewSmarty.php');
						if(file_exists('custom/modules/'.$this->mainmodule.'/metadata/listviewdefs.php')){
							require_once('custom/modules/'.$this->mainmodule.'/metadata/listviewdefs.php');	
						}else{
							require_once('modules/'.$this->mainmodule.'/metadata/listviewdefs.php');
						}
	
						$lv = new ListViewSmarty();
						$displayColumns = array();					
						foreach($listViewDefs[$this->mainmodule] as $col => $params) {
							if(!empty($params['default']) && $params['default'])
								$displayColumns[$col] = $params;
						}
						$lv->displayColumns = $displayColumns;
						$lv->setup($seed, 'include/ListView/ListViewGeneric.tpl', $where_clause, $params);
						ob_start();
						echo $lv->display();
					
					} else {
						require_once('include/ListView/ListView.php');
						$lv = new ListView();
						if ($_REQUEST["is_scheduler"] = "true")
							$lv->setDisplayHeaderAndFooter(false);
						$lv->initNewXTemplate('modules/ZuckerListingTemplate/lists/'.$this->list_template, return_module_language($current_language, $this->mainmodule));
						$lv->xTemplateAssign("SITE_URL", $sugar_config["site_url"]);
						
						ob_start();
						$lv->processListViewTwo($list_data, "rows", "ROW");
					}
					
					if ($format == "HTML") {
					
						$date = date("ymd_His");
						$this->report_result_type = "FILE";
						$this->report_result_name = $date."_".$this->name.".html";
						$this->report_result_name = strtolower(join("_", explode(" ", $this->report_result_name)));
						$this->report_result = $this->archive_dir."/".$this->report_result_name;
	
						$f = fopen($this->report_result, "w");
						$c = file_get_contents("modules/ZuckerListingTemplate/lists/header.html");
						$c = str_replace("{SITE_URL}", $sugar_config["site_url"], $c);
						$c = str_replace("{THEME_URL}", $sugar_config["site_url"]."/themes/".$theme, $c);
						fwrite($f, $c);
						
						fwrite($f, ob_get_clean());
	
						fwrite($f, file_get_contents("modules/ZuckerListingTemplate/lists/footer.html"));
						fclose($f);
						
					} else {
						$this->report_result_type = "INLINE";
						$this->report_result = ob_get_clean();
					}

				} else if ($format == "SIMPLEHTML") {

					$date = date("ymd_His");
					$this->report_result_type = "FILE";
					$this->report_result_name = $date."_".$this->name.".html";
					$this->report_result_name = strtolower(join("_", explode(" ", $this->report_result_name)));
					$this->report_result = $this->archive_dir."/".$this->report_result_name;

					$f = fopen($this->report_result, "w");
					
					fwrite($f, "<!DOCTYPE html PUBLIC \"-//W3C//DTD html 4.01 Transitional//EN\">\n");
					fwrite($f, "<html><body><table border=\"1\">");
					if ($this->include_header && !empty($list_fields)) {
						fwrite($f, "\n<tr>");
						foreach ($list_fields as $col_name) {
							fwrite($f, "<th>".$col_name."</th>");
						}
						fwrite($f, "</tr>");
					}
					foreach ($list_data as $list_row)	{
						fwrite($f, "\n<tr>");
						foreach (array_keys($list_row->list_view_data) as $col_name) {
							$field = $list_row->list_view_data[$col_name];
							if (empty($field)) {
								fwrite($f, "<td>&nbsp;</td>");
							} else {
								fwrite($f, "<td>".$this->format_value_for_html($field)."</td>");
							}
						}
						fwrite($f, "</tr>");
					}
					fwrite($f, "\n</table></body></html>");
					fclose($f);
					
				} else if ($format == "CSV") {
					
					$date = date("ymd_His");
					$this->report_result_type = "FILE";
					$this->report_result_name = $date."_".$this->name.".csv";
					$this->report_result_name = strtolower(join("_", explode(" ", $this->report_result_name)));
					$this->report_result = $this->archive_dir."/".$this->report_result_name;
	
					$f = fopen($this->report_result, "w");

					if ($this->include_header && count($list_data) > 0) {
						$row = $list_data[0];
						foreach (array_keys($row->list_view_data) as $col_name) {
							fwrite($f, $col_name);
							fwrite($f, $this->col_delim);
						}
						fwrite($f, $this->row_delim);
					}
					foreach ($list_data as $list_row)	{
						foreach (array_keys($list_row->list_view_data) as $col_name) {
							$field = $list_row->list_view_data[$col_name];
							$pieces = explode("\n", $field);
							$cleaned_pieces = array();
							foreach ($pieces as $piece) {
								$cleaned_pieces[] = trim($piece);
							}
							fwrite($f, join(" ", $cleaned_pieces));
							if ($i != count($list_row->list_view_data) - 1) {
								fwrite($f, $this->col_delim);
							}
						}
						fwrite($f, $this->row_delim);
					}
					fclose($f);
						
				}
					
				
			} else if ($format == "PROSPECTLIST") {
			
				require_once("modules/ProspectLists/ProspectList.php");
				$pl = new ProspectList();
				$pl->name = (empty($_REQUEST["prospect_list_name"]) ? $this->name : $_REQUEST["prospect_list_name"]);
				$pl->save();

				foreach ($rows as $row) {
					if ($row->object_name == "Contact") {
						$pl->set_relationship('prospect_lists_prospects', array( "related_type" => "Contacts", "related_id" => $row->id, 'prospect_list_id' => $pl->id));
					} else if ($row->object_name == "Lead") {
						$pl->set_relationship('prospect_lists_prospects', array( "related_type" => "Leads", "related_id" => $row->id, 'prospect_list_id' => $pl->id));
					} else if ($row->object_name == "Prospect") {
						$pl->set_relationship('prospect_lists_prospects', array( "related_type" => "Prospects", "related_id" => $row->id, 'prospect_list_id' => $pl->id));
					}
				}
				$this->report_result = "index.php?module=ProspectLists&action=DetailView&record=".$pl->id;
				$this->report_result_type = "FORWARD";
			}
			
			$result = true;

		}
		return $result;
	}

	function get_delim($in) {
		if ($in == "tab") {
			return "\t";
		} else if ($in == "newline") {
			return "\n";
		} else {
			return $in;
		}
	}
	
	function get_format_selection() {
		global $current_language, $app_strings;
	
		$mod_strings = return_module_language($current_language, $this->module_dir);
		$mod_list_strings = return_mod_list_strings_language($current_language, $this->module_dir);
	
		$strings = $mod_list_strings["LISTING_EXPORT_TYPES"];
		if ($this->mainmodule == "Contacts" || $this->mainmodule == "Leads" || $this->mainmodule == "Prospects") {
			$strings = $mod_list_strings["LISTING_EXPORT_TYPES_TARGET_LISTS"];
		}
		
		if (isset($_REQUEST["format"])) {
			if (!array_key_exists($_REQUEST["format"], $strings)) {
				$_REQUEST["format"] = null;
			}
		}
		if (!isset($_REQUEST["format"])) {
			$_REQUEST["format"] = "TABLE";
		}
		
		if ($_REQUEST["format"] == "TABLE") {
			$this->report_result_type = "INLINE";
		} else if ($_REQUEST["format"] == "PROSPECTLIST") {
			$this->report_result_type = "FORWARD";
		} else if ($_REQUEST["format"] == "CSV") {
			$this->report_result_type = "FILE";
		} else if ($_REQUEST["format"] == "HTML" || $_REQUEST["format"] == "SIMPLEHTML") {
			$this->report_result_type = "FILE";
		}
		asort($strings);
		return get_select_options_with_id($strings, $_REQUEST["format"]);
	}	
	
	function get_format_parameters() {
		global $current_language, $app_strings;
	
		$mod_strings = return_module_language($current_language, $this->module_dir);
		$mod_list_strings = return_mod_list_strings_language($current_language, $this->module_dir);
		
		$xtpl = new XTemplate('modules/ZuckerListingTemplate/OnDemand.html');
		$xtpl->assign("MOD", $mod_strings);
		$xtpl->assign("APP", $app_strings);		
		
		if ($_REQUEST["format"] == "TABLE" || $_REQUEST["format"] == "HTML") {
			require_once("modules/ZuckerListingTemplate/lists/config.php");

			$templates = $zuckerreports_lists[$this->mainmodule];
			$templates["default"] = $mod_strings['LBL_LISTING_ONDEMAND_TEMPLATE_LV'].$this->mainmodule;
			
			if (empty($templates)) {
				$xtpl->parse("listTableEmpty");
				return $xtpl->text("listTableEmpty");
			} else {
				asort($templates);
				$xtpl->assign("LIST_TEMPLATE_SELECTION", get_select_options_with_id($templates, $_REQUEST["list_template"]));
				$xtpl->parse("listTable");
				return $xtpl->text("listTable");
			}
			
		} else if ($_REQUEST["format"] == "SIMPLEHTML") {
		
			if (isset($_REQUEST["include_header"])) {
				$xtpl->assign("INCLUDE_HEADER_CHECKED", "checked");
			}
			$xtpl->parse("listSIMPLEHTML");
			return $xtpl->text("listSIMPLEHTML");

		} else if ($_REQUEST["format"] == "CSV") {
		
			$csv_strings = return_mod_list_strings_language($current_language, "ZuckerQueryTemplate");
			asort($csv_strings["COL_DELIMS"]);
			asort($csv_strings["ROW_DELIMS"]);
			
			$xtpl->assign("COL_DELIM_SELECTION", get_select_options_with_id($csv_strings["COL_DELIMS"], $_REQUEST["col_delim"]));
			$xtpl->assign("ROW_DELIM_SELECTION", get_select_options_with_id($csv_strings["ROW_DELIMS"], $_REQUEST["row_delim"]));
			if (isset($_REQUEST["include_header"])) {
				$xtpl->assign("INCLUDE_HEADER_CHECKED", "checked");
			}
			$xtpl->parse("listCSV");
			return $xtpl->text("listCSV");
			
		} else if ($_REQUEST["format"] == "PROSPECTLIST") {
			$xtpl->assign("PROSPECTLISTNAME", $_REQUEST["prospect_list_name"]);
			$xtpl->parse("listProspectlist");
			return $xtpl->text("listProspectlist");
		}
	}
	
	function get_format_scheduler_parameters(&$params) {
		$params["format"] = $_REQUEST["format"];
		if ($_REQUEST["format"] == "TABLE" || $_REQUEST["format"] == "HTML") {
			$params["list_template"] = $_REQUEST["list_template"];
		} else if ($_REQUEST["format"] == "SIMPLEHTML") {
			if (isset($_REQUEST["include_header"])) {
				$params["include_header"] = $_REQUEST["include_header"];
			}
		} else if ($_REQUEST["format"] == "CSV") {
			$params["col_delim"] = $_REQUEST["col_delim"];
			$params["col_delim"] = $_REQUEST["row_delim"];
			if (isset($_REQUEST["include_header"])) {
				$params["include_header"] = $_REQUEST["include_header"];
			}
		} else if ($_REQUEST["format"] == "PROSPECTLIST") {
			$params["prospect_list_name"] = $_REQUEST["prospect_list_name"];
		}
	}		
}

?>

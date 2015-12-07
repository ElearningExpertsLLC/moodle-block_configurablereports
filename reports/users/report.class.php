<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/** Configurable Reports
  * A Moodle block for creating customizable reports
  * @package blocks
  * @author: Juan leyva <http://www.twitter.com/jleyvadelgado>
  * @date: 2009
  */

class report_users extends report_base{
	
	function init(){
		$this->components = array('columns','conditions','ordering','filters','template','permissions','calcs','plot');
	}	

	function get_all_elements(){
		global $DB, $remotedb;
		
		$elements = array();
		$rs = $remotedb->get_recordset('user', null, '', 'id');
        foreach ($rs as $result) {
			$elements[] = $result->id;
		}
		$rs->close();
		return $elements;
	}
	
	function get_rows($elements, $sqlorder = ''){
		global $DB, $CFG, $remotedb;
	
		if(!empty($elements)){
			list($usql, $params) = $remotedb->get_in_or_equal($elements);	
			return $remotedb->get_records_select('user',"id $usql", $params, $sqlorder);
		}	
		else{
			return array();
		}
	}
	
}


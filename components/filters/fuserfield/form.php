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

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->dirroot.'/blocks/configurable_reports/components/plugin_form.class.php');

class fuserfield_form extends plugin_form {
    function definition() {
        global $DB;

        $mform =& $this->_form;

        $mform->addElement('header', '', get_string('fuserfield','block_configurable_reports'), '');

		$columns = $DB->get_columns('user');
		
		$usercolumns = array();
		foreach($columns as $c)
			$usercolumns[$c->name] = $c->name;
			
		if($profile = $DB->get_records('user_info_field'))
			foreach($profile as $p)
				$usercolumns['profile_'.$p->shortname] = $p->name;	
			
		unset($usercolumns['password']);
		unset($usercolumns['sesskey']);
			
        $mform->addElement('select', 'field', get_string('field','block_configurable_reports'), $usercolumns);

        $this->add_action_buttons();
    }
}

?>
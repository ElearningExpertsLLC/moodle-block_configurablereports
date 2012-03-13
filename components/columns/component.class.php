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

class component_columns extends component_base{
	
	function plugin_classes(){
	    return array(
	            'categoryfield'         => 'plugin_categoryfield',
	            'coursefield'           => 'plugin_coursefield',
	            'coursestats'           => 'plugin_coursestats',
	            'currentuserfinalgrade' => 'plugin_currentuserfinalgrade',
        	    'date'                  => 'plugin_date',
        	    'reportcolumn'          => 'plugin_reportcolumn',
        	    'roleusersn'            => 'plugin_roleusersn',
        	    'userfield'             => 'plugin_userfield',
        	    'usermodactions'        => 'plugin_usermodactions',
        	    'usermodoutline'        => 'plugin_usermodoutline',
        	    'userstats'             => 'plugin_userstats',
	    );
	}
	
	function has_ordering(){
	    return true;
	}
	
	function has_form(){
	    return true;
	}
}

?>
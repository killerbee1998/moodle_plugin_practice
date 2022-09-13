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

/**
 * @package   local_message
 * @copyright 2020, Riasat Mahbub <riasat.mahbub@brainstation-23.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


function local_message_before_footer() {
    global $DB;
    $messages = $DB->get_records('local_message');
    $types = [
        '0' => \core\output\notification::NOTIFY_WARNING,
        '1' => \core\output\notification::NOTIFY_SUCCESS,
        '2' => \core\output\notification::NOTIFY_ERROR,
        '3' => \core\output\notification::NOTIFY_INFO
    ];

    
    foreach($messages as $message){
        var_dump($types[$message->messagetype]); 
        \core\notification::add($message->messagetext, $types[$message->messagetype]);
    }

}

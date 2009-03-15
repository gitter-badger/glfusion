<?php
// +--------------------------------------------------------------------------+
// | Polls Plugin - glFusion CMS                                              |
// +--------------------------------------------------------------------------+
// | autoinstall.php                                                          |
// |                                                                          |
// | glFusion Auto Installer module                                           |
// +--------------------------------------------------------------------------+
// | $Id::                                                                   $|
// +--------------------------------------------------------------------------+
// | Copyright (C) 2009 by the following authors:                             |
// |                                                                          |
// | Mark R. Evans          mark AT glfusion DOT org                          |
// |                                                                          |
// | Based on the Geeklog CMS                                                 |
// | Copyright (C) 2000-2008 by the following authors:                        |
// |                                                                          |
// | Authors: Tony Bibbs       - tony AT tonybibbs DOT com                    |
// |          Tom Willett      - twillett AT users DOT sourceforge DOT net    |
// |          Blaine Lang      - langmail AT sympatico DOT ca                 |
// |          Dirk Haun        - dirk AT haun-online DOT de                   |
// +--------------------------------------------------------------------------+
// |                                                                          |
// | This program is free software; you can redistribute it and/or            |
// | modify it under the terms of the GNU General Public License              |
// | as published by the Free Software Foundation; either version 2           |
// | of the License, or (at your option) any later version.                   |
// |                                                                          |
// | This program is distributed in the hope that it will be useful,          |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
// | GNU General Public License for more details.                             |
// |                                                                          |
// | You should have received a copy of the GNU General Public License        |
// | along with this program; if not, write to the Free Software Foundation,  |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.          |
// |                                                                          |
// +--------------------------------------------------------------------------+

if (!defined ('GVERSION')) {
    die ('This file can not be used on its own.');
}

global $_DB_dbms;

require_once $_CONF['path'].'plugins/polls/functions.inc';
require_once $_CONF['path'].'plugins/polls/polls.php';
require_once $_CONF['path'].'plugins/polls/sql/'.$_DB_dbms.'_install.php';

// +--------------------------------------------------------------------------+
// | Plugin installation options                                              |
// +--------------------------------------------------------------------------+

$INSTALL_plugin['polls'] = array(
  'installer' => array('type' => 'installer', 'version' => '1', 'mode' => 'install'),

  'plugin' => array('type' => 'plugin', 'name' => $_PO_CONF['pi_name'],
        'ver' => $_PO_CONF['pi_version'], 'gl_ver' => $_PO_CONF['gl_version'],
        'url' => $_PO_CONF['pi_url'], 'display' => $_PO_CONF['pi_display_name']),

  array('type' => 'table', 'table' => $_TABLES['pollanswers'], 'sql' => $_SQL['pollanswers']),

  array('type' => 'table', 'table' => $_TABLES['pollquestions'], 'sql' => $_SQL['pollquestions']),

  array('type' => 'table', 'table' => $_TABLES['polltopics'], 'sql' => $_SQL['polltopics']),
  array('type' => 'table', 'table' => $_TABLES['pollvoters'], 'sql' => $_SQL['pollvoters']),

  array('type' => 'group', 'group' => 'polls Admin', 'desc' => 'Users in this group can administer the Polls plugin',
        'variable' => 'admin_group_id', 'addroot' => true),

  array('type' => 'feature', 'feature' => 'polls.edit', 'desc' => 'Ability to edit Polls',
        'variable' => 'edit_feature_id'),

  array('type' => 'mapping', 'group' => 'admin_group_id', 'feature' => 'edit_feature_id',
        'log' => 'Adding feature to the admin group'),

  array('type' => 'sql', 'sql' => $_SQL['d1']),
  array('type' => 'sql', 'sql' => $_SQL['d2']),
  array('type' => 'sql', 'sql' => $_SQL['d3']),
  array('type' => 'sql', 'sql' => $_SQL['d4']),
  array('type' => 'sql', 'sql' => $_SQL['d5']),
  array('type' => 'sql', 'sql' => $_SQL['d6']),
  array('type' => 'sql', 'sql' => $_SQL['d7']),
  array('type' => 'sql', 'sql' => $_SQL['d8']),
  array('type' => 'sql', 'sql' => $_SQL['d9']),
  array('type' => 'sql', 'sql' => $_SQL['d10']),
  array('type' => 'sql', 'sql' => $_SQL['d11']),
  array('type' => 'sql', 'sql' => $_SQL['d12']),

  array('type' => 'block', 'name' => 'polls_block', 'title' => 'Poll',
          'phpblockfn' => 'phpblock_polls', 'block_type' => 'phpblock',
          'group_id' => 'admin_group_id'),

);


/**
* Puts the datastructures for this plugin into the glFusion database
*
* Note: Corresponding uninstall routine is in functions.inc
*
* @return   boolean True if successful False otherwise
*
*/
function plugin_install_polls()
{
    global $INSTALL_plugin, $_PO_CONF;

    $pi_name            = $_PO_CONF['pi_name'];
    $pi_display_name    = $_PO_CONF['pi_display_name'];
    $pi_version         = $_PO_CONF['pi_version'];

    COM_errorLog("Attempting to install the $pi_display_name plugin", 1);

    $ret = INSTALLER_install($INSTALL_plugin[$pi_name]);
    if ($ret > 0) {
        return false;
    }

    return true;
}


/**
* Loads the configuration records for the Online Config Manager
*
* @return   boolean     true = proceed with install, false = an error occured
*
*/
function plugin_load_configuration_polls()
{
    global $_CONF;

    require_once $_CONF['path'].'plugins/polls/install_defaults.php';

    return plugin_initconfig_polls();
}



/**
* Automatic uninstall function for plugins
*
* @return   array
*
* This code is automatically uninstalling the plugin.
* It passes an array to the core code function that removes
* tables, groups, features and php blocks from the tables.
* Additionally, this code can perform special actions that cannot be
* foreseen by the core code (interactions with other plugins for example)
*
*/
function plugin_autouninstall_polls ()
{
    $out = array (
        /* give the name of the tables, without $_TABLES[] */
        'tables' => array('pollanswers','polltopics','pollvoters','pollquestions'),
        /* give the full name of the group, as in the db */
        'groups' => array('Polls Admin'),
        /* give the full name of the feature, as in the db */
        'features' => array('polls.edit'),
        /* give the full name of the block, including 'phpblock_', etc */
        'php_blocks' => array('phpblock_polls'),
        /* give all vars with their name */
        'vars'=> array()
    );
    return $out;
}
?>
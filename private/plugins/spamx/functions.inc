<?php
// +--------------------------------------------------------------------------+
// | Spam-X Plugin - glFusion CMS                                             |
// +--------------------------------------------------------------------------+
// | functions.inc                                                            |
// |                                                                          |
// | This is the functions.inc for the glFusion Spam-X plugin                 |
// +--------------------------------------------------------------------------+
// | Copyright (C) 2009-2015 by the following authors:                        |
// |                                                                          |
// | Mark R. Evans          mark AT glfusion DOT org                          |
// |                                                                          |
// | Copyright (C) 2004-2010 by the following authors:                        |
// |                                                                          |
// | Authors      Tom Willett     tomw AT pigstye DOT net                     |
// |              Dirk Haun       dirk AT haun-online DOT de                  |
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
/*
* load the language file(s), including custom strings if any
*/
$langfile = $_CONF['path'] . 'plugins/spamx/language/' . $_CONF['language'] . '.php';
$custfile = $_CONF['path'] . 'plugins/spamx/language/custom/' . $_CONF['language'] . '.php';

if (file_exists($langfile)) {
    include_once $langfile;
    if (file_exists($custfile)) {
        include_once $custfile;
    }
} else {
    $langfile = $_CONF['path'].'plugins/spamx/language/english.php';
    $custfile = $_CONF['path'].'plugins/spamx/language/custom/english.php';
    include_once $langfile;
    if (file_exists($custfile)) {
        include_once $custfile;
    }
}
/**
* Check and see if we need to load the plugin configuration
*/
if (!isset($_SPX_CONF['timeout'])) {
    require_once $_CONF['path_system'] . 'classes/config.class.php';

    $spx_config = config::get_instance();
    $_SPX_CONF = $spx_config->get_config('spamx');
}

require_once $_CONF['path'].'plugins/spamx/spamx.php';

// +---------------------------------------------------------------------------+
// | glFusion Plugin API Implementations                                       |
// +---------------------------------------------------------------------------+

/**
* Shows the statistics for the plugin on stats.php.  If $showsitestats is 1
* then we are to only print the overall stats in the 'site statistics' box
* otherwise we show the detailed stats for the plugin
*
* @param    int     $showsitestats  Flag to let us know which stats to get
* @return   string  returns formatted HTML to insert in stats page
* @see      plugin_statssummary_spamx
*
*/
function plugin_showstats_spamx($showsitestats)
{
    global $_CONF, $_TABLES, $LANG_SX00;

    $retval = '';

    if (SEC_hasRights('spamx.admin')) {
        // detailed stats are only visible to Spam-X admins
        require_once( $_CONF['path_system'] . 'lib-admin.php' );
        $header_arr = array(
            array('text' => $LANG_SX00['stats_page_title'], 'field' => 'label', 'header_class' => 'stats-header-title'),
            array('text' => $LANG_SX00['stats_entries'], 'field' => 'stats', 'header_class' => 'stats-header-count', 'field_class' => 'stats-list-count'),
        );
        $data_arr = array();
        $text_arr = array('has_menu'     => false,
                          'title'        => $LANG_SX00['stats_headline'],
        );
        $data_arr = array(
            array('label' => $LANG_SX00['stats_pblacklist'],
                'stats' => COM_numberFormat (DB_count ($_TABLES['spamx'], 'name', 'Personal'))),
            array('label' => $LANG_SX00['stats_ip'],
                'stats' => COM_numberFormat (DB_count ($_TABLES['spamx'], 'name', 'IP'))),
            array('label' => $LANG_SX00['stats_ipofurl'],
                'stats' => COM_numberFormat (DB_count ($_TABLES['spamx'], 'name', 'IPofUrl'))),
            array('label' => $LANG_SX00['stats_header'],
                'stats' => COM_numberFormat (DB_count ($_TABLES['spamx'], 'name', 'HTTPHeader'))),
        );
        $retval .= ADMIN_simpleList("", $header_arr, $text_arr, $data_arr);
    }

    return $retval;
}

/**
* New stats plugin API function for proper integration with the site stats
*
* @return   array(item text, item count);
* @see      plugin_showstats_spamx
*
*/
function plugin_statssummary_spamx ()
{
    global $_TABLES, $LANG_SX00;

    $counter = DB_getItem ($_TABLES['vars'], 'value', "name = 'spamx.counter'");

    return array ($LANG_SX00['stats_deleted'], COM_numberFormat ($counter));
}

/**
 * This will put an option for the plugin in the command and control block on moderation.php
 *
 * Add the plugin name, icon and link to the command and control block in moderation.php
 *
 * @return array Array containing (plugin name, admin url, url of plugin icon)
 */
function plugin_cclabel_spamx()
{
    global $_CONF, $LANG_SX00;

    $retval = array();
    if (SEC_hasRights('spamx.admin')) {
        $retval = array($LANG_SX00['plugin_name'],
            $_CONF['site_admin_url'] . '/plugins/spamx/index.php',
            plugin_geticon_spamx ());
    }

    return $retval;
}

/**
 * Returns the administrative option for this plugin
 *
 * Adds the plugin to the Admin menu
 *
 * @return array Array containing (plugin name, plugin admin url, # of items in plugin or '')
 */
function plugin_getadminoption_spamx()
{
    global $_CONF, $LANG_SX00;

    if (SEC_hasRights('spamx.admin')) {
        return array($LANG_SX00['plugin_name'],
            $_CONF['site_admin_url'] . '/plugins/spamx/index.php', 0);
    }
}

/**
 * Returns the current plugin code version
 *
 * @return string    plugin version
 */
function plugin_chkVersion_spamx ()
{
    global $_SPX_CONF;

    return $_SPX_CONF['pi_version'];
}

/**
* Update the Spam-X plugin
*
* @return   int     Number of message to display
*
*/
function plugin_upgrade_spamx()
{
    global $_CONF, $_SPX_CONF, $_TABLES;

    if ( @file_exists($_CONF['path'].'plugins/spamx/upgrade.php') ) {
        require_once $_CONF['path'].'plugins/spamx/upgrade.php';
        return spamx_upgrade();
    } else {
        // upgrades are done by the install script - return a generic error
        COM_errorLog("Spamx plugin upgrade function not implemented");
        return 3001;
    }
}


/**
 * Actual Plugin Functions here.
 */

/**
 * Check a post for spam
 *
 * @param   string  $comment    comment text
 * @param   int     $action     (former spam action - not used any more)
 * @return  int                 > 0: spam detected, == 0: no spam
 *
 */
function plugin_checkforSpam_spamx ($comment, $action = -1)
{
    global $_CONF, $_SPX_CONF;

    // skip spam check for members of the 'spamx Admin' group, if enabled
    if (isset ($_SPX_CONF['admin_override']) && $_SPX_CONF['admin_override']) {
        if (SEC_inGroup ('spamx Admin')) {
            return 0;
        }
    }

    $spamx_path = $_CONF['path'] . 'plugins/spamx/modules/';

    // Set up Spamx_Examine array
    $Spamx_Examine = array ();
    if ($dir = @opendir ($spamx_path)) {
        while (($file = readdir ($dir)) !== false) {
            if (is_file ($spamx_path . $file)) {
                if (substr ($file, -18) == '.Examine.class.php') {
                    $sfile = str_replace ('.Examine.class.php', '', $file);
                    $Spamx_Examine[] = $sfile;
                }
            }
        }
        closedir ($dir);
    }

    $res = 0;
    foreach ($Spamx_Examine as $Examine) {
        $filename = $Examine . '.Examine.class.php';
        require_once ($spamx_path . $filename);
        $EX = new $Examine;
        $res = $EX->execute ($comment);
        if ($res == 1) {
            break;
        }
    }

    return $res;
}

/**
 * Perform action after spam has been detected
 *
 * @param   string  $comment    comment text
 * @param   int     $action     which action modules to call (sum of module numbers)
 * @return  int                 number of message to display to the spammer
 *
 */
function plugin_spamaction_spamx ($comment, $action)
{
    global $_CONF, $_SPX_CONF;

    $res = 0;

    $spamx_path = $_CONF['path'] . 'plugins/spamx/modules/';

    if (($action == -1) || ($action == '')) {
        $action = $_SPX_CONF['action'];
    }

    // Set up Spamx_Action array
    $Spamx_Action = array ();
    if ($dir = @opendir ($spamx_path)) {
        while (($file = readdir ($dir)) !== false) {
            if (is_file ($spamx_path . $file)) {
                if (substr ($file, -17) == '.Action.class.php') {
                    $sfile = str_replace ('.Action.class.php', '', $file);
                    require_once ($spamx_path . $file);
                    $CM = new $sfile;
                    $Spamx_Action[$sfile] = $CM->number ();
                }
            }
        }
        closedir ($dir);
    }

    foreach ($Spamx_Action as $Act => $Num) {
        if (($action & $Num) == $Num) {
            $AC = new $Act;
            $AC->execute ($comment);

            $res = max ($res, $AC->result ());
        }
    }

    return $res;
}

/**
 * Logs message to spamx.log
 *
 * This will print a message to the spamx log
 *
 * @param   string  $logentry   Message to write to log
 */
function SPAMX_log ($logentry)
{
    global $_CONF, $LANG01, $_SPX_CONF;

    if ((!isset ($_SPX_CONF['logging']) || ($_SPX_CONF['logging'] === true)) &&
            !empty ($logentry)) {
        $logentry = str_replace( array( '<?', '?>' ), array( '(@', '@)' ),
                                 $logentry );

        $timestamp = strftime ('%c');
        $logfile = $_CONF['path_log'] . 'spamx.log';

        if (!$file = fopen ($logfile, 'a')) {
            COM_errorLog ($LANG01[33] . $logfile . ' (' . $timestamp . ')', 1);
        }

        fputs ($file, "$timestamp - $logentry \n");
    }
}

/**
* Returns the URL of the plugin's icon
*
* @return   string      URL of the icon
*
*/
function plugin_geticon_spamx ()
{
    global $_CONF;

    return $_CONF['site_admin_url'] . '/plugins/spamx/images/spamx.png';
}

function plugin_itemPreSave_spamx($type, $data)
{
    global $_CONF, $REMOTE_ADDR, $_SPX_CONF, $LANG_SX00;

    if ( !isset($_SPX_CONF['sfs_username_check']) ) $_SPX_CONF['sfs_username_check'] = false;
    if ( !isset($_SPX_CONF['sfs_email_check']) ) $_SPX_CONF['sfs_email_check'] = true;
    if ( !isset($_SPX_CONF['sfs_ip_check']) ) $_SPX_CONF['sfs_ip_check'] = true;

    $username = '';
    $email    = '';
    $ip       = '';

    if (isset($data['username']) && $_SPX_CONF['sfs_username_check'] == true ) {
        $username = $data['username'];
    }
    if ( isset($data['email']) && $_SPX_CONF['sfs_email_check'] == true ) {
        $email = $data['email'];
    }
    if ( isset($data['ip']) && $_SPX_CONF['sfs_ip_check'] == true) {
        $ip = $data['ip'];
    }

    if ( $username == '' && $email =='' && $ip == '' ) return '';

    if ( @file_exists($_CONF['path'].'/plugins/spamx/modules/SFS.Misc.class.php') ) {
        require_once $_CONF['path'].'/plugins/spamx/modules/SFS.Misc.class.php';
        $EX = new SFSreg;
        $res = $EX->execute($type, $email, $REMOTE_ADDR, $username);
        if ($res > 0) {
            return $LANG_SX00['invalid_email_or_ip'];
        }
    }
    return '';
}
?>
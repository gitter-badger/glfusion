<?php
// +--------------------------------------------------------------------------+
// | glFusion CMS                                                             |
// +--------------------------------------------------------------------------+
// | lib-mbyte.php                                                            |
// |                                                                          |
// | function collection to handle mutli-byte related issues                  |
// +--------------------------------------------------------------------------+
// |                                                                          |
// | Copyright (C) 2000-2008 by the following authors:                        |
// |                                                                          |
// | Authors: Oliver Spiesshofer - oliver AT spiesshofer DOT com              |
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
    die('This file can not be used on its own!');
}

// This function is supposed to display only language files in selection drop-
// downs that are utf-8
function MBYTE_languageList ($charset = 'utf-8')
{
    global $_CONF;

    if ($charset != 'utf-8') {
        $charset = '';
    }

    $language = array ();
    $fd = opendir ($_CONF['path_language']);

    while (($file = @readdir ($fd)) !== false) {
        if ((substr ($file, 0, 1) != '.') && preg_match ('/\.php$/i', $file)
                && is_file ($_CONF['path_language'] . $file)
                && ((empty ($charset) && (strstr ($file, '_utf-8') === false))
                    || (($charset == 'utf-8') && strstr ($file, '_utf-8')))) {
            clearstatcache ();
            $file = str_replace ('.php', '', $file);
            $langfile = str_replace ('_utf-8', '', $file);
            $uscore = strpos ($langfile, '_');
            if ($uscore === false) {
                $lngname = ucfirst ($langfile);
            } else {
                $lngname = ucfirst (substr ($langfile, 0, $uscore));
                $lngadd = substr ($langfile, $uscore + 1);
                $lngadd = str_replace ('utf-8', '', $lngadd);
                $lngadd = str_replace ('_', ', ', $lngadd);
                $word = explode (' ', $lngadd);
                $lngadd = '';
                foreach ($word as $w) {
                    if (preg_match ('/[0-9]+/', $w)) {
                        $lngadd .= strtoupper ($w) . ' ';
                    } else {
                        $lngadd .= ucfirst ($w) . ' ';
                    }
                }
                $lngname .= ' (' . trim ($lngadd) . ')';
            }
            $language[$file] = $lngname;
        }
    }
    asort ($language);

    return $language;
}

// replacement functions for UTF-8 functions
function MBYTE_checkEnabled($test = '', $enabled = true)
{
    global $LANG_CHARSET;

    static $mb_enabled;

    if (!isset($mb_enabled)) {
        $mb_enabled = false;
        if (strcasecmp($LANG_CHARSET, 'utf-8') == 0) {
			if($test == '') {
			// Normal situation in live environment
            	if (function_exists('mb_eregi_replace')) {
                	$mb_enabled = mb_internal_encoding('UTF-8');
				}

            } elseif($test == 'test') {
				// Just for tests, true if we want function to exist
				if($enabled) {
					$mb_enabled = mb_internal_encoding('UTF-8');
				}
			}
        }
    }

    return $mb_enabled;
}


function MBYTE_strlen($str)
{
    return utf8_strlen($str);
}

function MBYTE_substr($str, $start, $length = NULL)
{
    return utf8_substr($str,$start,$length);
}

function MBYTE_strpos($haystack, $needle, $offset = NULL)
{
    return utf8_strpos($haystack,$needle,$offset);
}


function MBYTE_strtolower($str)
{
    return utf8_strtolower($str);
}

function MBYTE_eregi($pattern, $str, $regs = NULL)
{
    static $mb_enabled;

    if (!isset($mb_enabled)) {
        $mb_enabled = MBYTE_checkEnabled();
    }
    if ($mb_enabled) {
        $result = mb_eregi($pattern, $str, $regs);
    } else {
        $result = eregi($pattern, $str, $regs);
    }

    return $result;
}

function MBYTE_eregi_replace($pattern, $replace, $str)
{
    static $mb_enabled;

    if (!isset($mb_enabled)) {
        $mb_enabled = MBYTE_checkEnabled();
    }
    if ($mb_enabled) {
        $result = mb_eregi_replace($pattern, $replace, $str);
    } else {
        $result = eregi_replace($pattern, $replace, $str);
    }

    return $result;
}

/**
 * Returns true if $string is valid UTF-8 and false otherwise.
 *
 * @param [mixed] $string     string to be tested
 */
function MBYTE_is_utf8($string) {

    return preg_match('%^(?:
          [\x09\x0A\x0D\x20-\x7E]            # ASCII
        | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
        |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
        | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
        |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
        |  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3
        | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
        |  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16
    )*$%xs', $string);

}


function MBYTE_substr_count($hay, $needle)
{
    static $mb_enabled;

    if (!isset($mb_enabled)) {
        $mb_enabled = MBYTE_checkEnabled();
    }
    if ($mb_enabled) {
        $result = mb_substr_count($hay, $needle, 'utf-8');
    } else {
        $result = substr_count($hay, $needle);
    }

    return $result;
}

function MBYTE_strtoupper($str)
{
    return utf8_strtoupper($str);
}

function MBYTE_strrpos($haystack, $needle, $offset = FALSE)
{
    return utf8_strrpos($haystack,$needle,$offset);
}

function MBYTE_mail($to, $subj, $mess, $header = NULL, $param = NULL)
{
    static $mb_enabled;

    if (!isset($mb_enabled)) {
        $mb_enabled = MBYTE_checkEnabled();
    }
    if ($mb_enabled) {
          if (mb_language('uni')) {
            $result = mb_send_mail($to, $subj, $mess, $header, $param);
        } else {
            $result = false;
        }
    } else {
        $result = mail($to, $subj, $mess, $header, $param);
    }
    return $result;
}


/**
mb_decode_mimeheader -- Decode string in MIME header field
mb_decode_numericentity --  Decode HTML numeric string reference to character
mb_encode_mimeheader -- Encode string for MIME header
mb_encode_numericentity --  Encode character to HTML numeric string reference
mb_ereg_match --  Regular expression match for multibyte string
mb_ereg_search_getpos --  Returns start point for next regular expression match
mb_ereg_search_getregs --  Retrieve the result from the last multibyte regular expression match
mb_ereg_search_init --  Setup string and regular expression for multibyte regular expression match
mb_ereg_search_pos --  Return position and length of matched part of multibyte regular expression for predefined multibyte string
mb_ereg_search_regs --  Returns the matched part of multibyte regular expression
mb_ereg_search_setpos --  Set start point of next regular expression match
mb_ereg_search --  Multibyte regular expression match for predefined multibyte string
mb_parse_str --  Parse GET/POST/COOKIE data and set global variable
mb_split -- Split multibyte string using regular expression
mb_strcut -- Get part of string
mb_strimwidth -- Get truncated string with specified width
mb_strrpos --  Find position of last occurrence of a string in a string
mb_strwidth -- Return width of string
mb_substitute_character -- Set/Get substitution character
mb_substr_count -- Count the number of substring occurrences
*/

?>
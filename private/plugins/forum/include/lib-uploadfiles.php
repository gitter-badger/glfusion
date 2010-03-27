<?php
// +--------------------------------------------------------------------------+
// | Forum Plugin for glFusion CMS                                            |
// +--------------------------------------------------------------------------+
// | lib-uploadfiles.php                                                      |
// |                                                                          |
// | library of functions for uploading files                                 |
// +--------------------------------------------------------------------------+
// | $Id::                                                                   $|
// +--------------------------------------------------------------------------+
// | Copyright (C) 2008-2010 by the following authors:                        |
// |                                                                          |
// | Mark R. Evans          mark AT glfusion DOT org                          |
// |                                                                          |
// | Based on the Forum Plugin for Geeklog CMS                                |
// | Copyright (C) 2000-2008 by the following authors:                        |
// |                                                                          |
// | Authors: Blaine Lang       - blaine AT portalparts DOT com               |
// |                              www.portalparts.com                         |
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

// this file can't be used on its own
if (!defined ('GVERSION')) {
    die ('This file can not be used on its own.');
}

function gf_check4files($id,$tempfile=false) {
    global $_FILES,$_CONF,$_TABLES,$_USER,$CONF_FORUM,$LANG_GF00,
           $_FM_TABLES,$CONF_FORUM,$filemgmt_FileStore;

    $retval = '';

    for ( $z = 1; $z <= $CONF_FORUM['maxattachments']; $z++ ) {
        $filelinks = '';
        $varName = 'file_forum'.$z;
        $chk_usefilemgmt = 'chk_usefilemgmt'.$z;
        $filemgmtcat  = 'filemgmtcat' . $z;
        $filemgmt_desc = 'filemgmt_desc' . $z;
        if ( isset($_FILES[$varName]) && is_array($_FILES[$varName]) ) {
            $uploadfile = $_FILES[$varName];
        } else {
            $uploadfile['name'] = '';
        }
        if ($uploadfile['name'] != '' ) {
            if (isset($_POST[$chk_usefilemgmt]) && $_POST[$chk_usefilemgmt] == 1) {
                $filename = $uploadfile['name'];
                $pos = strrpos($uploadfile['name'],'.') + 1;
                $ext = strtolower(substr($uploadfile['name'], $pos));
            } else {
                $uploadfilename =  glfRandomFilename();
                $pos = strrpos($uploadfile['name'],'.') + 1;
                $ext = strtolower(substr($uploadfile['name'], $pos));
                $filename = "{$uploadfilename}.{$ext}";
            }
            $set_chk_usefilemgmt = (isset($_POST[$chk_usefilemgmt]) ? (int) $_POST[$chk_usefilemgmt] : 0);
            if ( gf_uploadfile($filename,$uploadfile,$CONF_FORUM['allowablefiletypes'],$set_chk_usefilemgmt) ) {
                if (array_key_exists($uploadfile['type'],$CONF_FORUM['inlineimageypes'])) {
                    if ($_POST[$chk_usefilemgmt] == 1) {
                        $srcImage = "{$filemgmt_FileStore}{$filename}";
                        $destImage = "{$CONF_FORUM['uploadpath']}/tn/{$filename}";
                    } else {
                        $srcImage = "{$CONF_FORUM['uploadpath']}/{$filename}";
                        $destImage = "{$CONF_FORUM['uploadpath']}/tn/{$uploadfilename}.{$ext}";
                    }
                    $ret = IMG_resizeImage($srcImage,$destImage,$CONF_FORUM['inlineimage_height'],$CONF_FORUM['inlineimage_width']);
                }
                // Store both the created filename and the real file source filename
                $realfilename = $filename;
                $filename = "$filename:{$uploadfile['name']}";
                if ($tempfile) {
                    $temp = 1;
                } else {
                    $temp = 0;
                }
                if (isset($_POST[$chk_usefilemgmt]) && $_POST[$chk_usefilemgmt] == 1) {
                    $cid = COM_applyFilter($_POST[$filemgmtcat],true);
                    $sql = "INSERT INTO {$_FM_TABLES['filemgmt_filedetail']} (cid, title, url, size, submitter, status,date ) ";
                    $sql .= "VALUES ('".DB_escapeString($cid)."', '".DB_escapeString($realfilename)."', '".DB_escapeString($realfilename)."', '".DB_escapeString($uploadfile['size'])."', '{$_USER['uid']}', 1, UNIX_TIMESTAMP())";
                    DB_query($sql);
                    $newid = DB_insertID();
                    DB_query("INSERT INTO {$_TABLES['gf_attachments']} (topic_id,repository_id,filename,tempfile)
                        VALUES ('".DB_escapeString($id)."',$newid,'".DB_escapeString($filename)."',$temp)");
                    $description = glfPrepareForDB($_POST[$filemgmt_desc]);
                    DB_query("INSERT INTO {$_FM_TABLES['filemgmt_filedesc']} (lid, description) VALUES ($newid, '$description')");
                } else {
                    DB_query("INSERT INTO {$_TABLES['gf_attachments']} (topic_id,filename,tempfile)
                        VALUES ('".DB_escapeString($id)."','".DB_escapeString($filename)."',$temp)");
                }

            } else {
                COM_errorlog("upload error:" . $GLOBALS['gf_errmsg']);
                $retval .= $GLOBALS['gf_errmsg'];
                $filelinks = -1;
            }
        }
    }

    if (!$tempfile AND isset($_POST['uniqueid']) AND $_POST['uniqueid'] > 0 AND DB_COUNT($_TABLES['gf_topic'],'id',intval($id))) {
        DB_query("UPDATE {$_TABLES['gf_attachments']} SET topic_id=$id, tempfile=0 WHERE topic_id=".intval($_POST['uniqueid']));
    }

    return $retval;
}


function gf_uploadfile($filename,&$upload_file,$allowablefiletypes,$use_filemgmt=0) {
    global $_FILES,$_CONF,$_TABLES,$CONF_FORUM,$LANG_GF00,$filemgmt_FileStore;

    include_once $_CONF['path_system'] . 'classes/upload.class.php';

    $upload = new upload();
    if ($use_filemgmt == 1) {
        $upload->setPath($filemgmt_FileStore);
    } else {
        $upload->setPath($CONF_FORUM['uploadpath']);
    }
    $upload->setLogging(true);
    $upload->setAllowedMimeTypes($allowablefiletypes);
    // Set max dimensions as well in case user is uploading a full size image
    $upload->setMaxDimensions ($CONF_FORUM['max_uploadimage_width'], $CONF_FORUM['max_uploadimage_height']);
    if ( $CONF_FORUM['max_uploadimage_size'] == 0 ) {
        $upload->setMaxFileSize(100000000);
    } else {
        $upload->setMaxFileSize($CONF_FORUM['max_uploadimage_size']);
    }
    $upload->setAutomaticResize(true);

    if (strlen($upload_file['name']) > 0) {
        $upload->setFileNames($filename);
        $upload->setPerms( $CONF_FORUM['fileperms'] );
        $upload->_currentFile = $upload_file;

        // Verify file meets size limitations
        if (!$upload->_fileSizeOk()) {
            $upload->_addError('File, ' . $upload->_currentFile['name'] . ', is bigger than the ' . $upload->_maxFileSize . ' byte limit');
        }
        // If all systems check, do the upload
        if ($upload->checkMimeType() AND $upload->_imageSizeOK() AND !$upload->areErrors()) {
            if ($upload->_copyFile()) {
                $upload->_uploadedFiles[] = $upload->_fileUploadDirectory . '/' . $upload->_getDestinationName();
            }
        }

        $upload->_currentFile = array();

        if ($upload->areErrors() AND !$upload->_continueOnError) {
            $errmsg = "Forum Upload Attachment Error:" . $upload->printErrors(false);
            COM_errorlog($errmsg);
            $GLOBALS['gf_errmsg'] = $LANG_GF00['uploaderr'] .':<br' . XHTML . '>' . $upload->printErrors(false);
            return false;
        }
        return true;

    } else {
        return false;
    }
    return false;
}

function gf_FileCleanup($uniqueid)
{
    global $_TABLES,$CONF_FORUM,$filemgmt_FileStore;

    $sql = "SELECT * FROM {$_TABLES['gf_attachments']} WHERE tempfile=1 AND topic_id=".(int)$uniqueid;
    $result = DB_query($sql);
    while ($F = DB_fetchArray($result) ) {
        $filedata = explode(':', $F['filename']);
        $filename = $filedata[0];
        $realname = $filedata[1];
        $filepath = "{$CONF_FORUM['uploadpath']}/$filename";
        $tnpath   = $CONF_FORUM['uploadpath'].'/tn/'.$filename;
        @unlink($filepath);
        @unlink($tnpath);
        DB_delete($_TABLES['gf_attachments'],'id',$F['id']);
    }
}
?>
<?php
###############################################################################
# ukrainian.php
# This is the ukrainian language page for the glFusion Static Page Plug-in!
#
# Copyright (C) 2006 Vitaliy Biliyenko
# v.lokki@gmail.com
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#
###############################################################################

if (!defined ('GVERSION')) {
    die ('This file can not be used on its own.');
}

global $LANG32;

###############################################################################
# Array Format:
# $LANGXX[YY]:  $LANG - variable name
#               XX    - file id number
#               YY    - phrase id number
###############################################################################

$LANG_STATIC = array(
    'newpage' => '���� ���Ҧ���',
    'adminhome' => '��ͦΦ���������',
    'staticpages' => '������Φ ���Ҧ���',
    'staticpageeditor' => '�������� ��������� ���Ҧ���',
    'writtenby' => '�����',
    'date' => '������Τ ��������',
    'title' => '���������',
    'content' => '�ͦ��',
    'hits' => '���',
    'staticpagelist' => '������ ��������� ���Ҧ���',
    'url' => 'URL',
    'edit' => '����������',
    'lastupdated' => '������Τ ��������',
    'pageformat' => '������ ���Ҧ���',
    'leftrightblocks' => '���� �� ������ �����',
    'blankpage' => '������� ���Ҧ���',
    'noblocks' => '��� ���˦�',
    'leftblocks' => '�צ �����',
    'rightblocks' => 'Right Blocks',
    'addtomenu' => '������ �� ����',
    'label' => '�����',
    'nopages' => '� �����ͦ �� ����� ��������� ���Ҧ���',
    'save' => '��������',
    'preview' => '��������',
    'delete' => '��������',
    'cancel' => 'צ�ͦ����',
    'access_denied' => '������ ����������',
    'access_denied_msg' => '�� ����������� ���������� �������� ������ �� ������ � ���Ħ̦� ��ͦΦ��������� ��������� ���Ҧ���.  ���� �����, ������, �� �Ӧ ������ ������������ ������� �� æ�� ���Ҧ��� ������� �� ���������',
    'all_html_allowed' => '���� HTML ���������',
    'results' => '���������� ����� ��������� ���Ҧ���',
    'author' => '�����',
    'no_title_or_content' => '��� ����Ȧ��� �������Φ ��������� ���� <b>���������</b> �� <b>�ͦ��</b>.',
    'no_such_page_anon' => '���� �����, �צ�Ħ�� ..',
    'no_page_access_msg' => "�������, �� ��������� ����, �� �� �� �צ����, ��� �� � ������ {$_CONF['site_name']}. ���� �����, <a href=\"{$_CONF['site_url']}/users.php?mode=new\"> ���Ť��������� </a>�� {$_CONF['site_name']} ��� ��������� ������� �������",
    'php_msg' => 'PHP: ',
    'php_warn' => '������������: PHP ��� ���ϧ ���Ҧ��� ���� �������� ���� �� �����դ�� �� ��æ�. ������ ������Φ!!',
    'exit_msg' => '��� ������: ',
    'exit_info' => '������������� ��צ��������� ��� �����.  ������� ��צ�ͦ����� ��� ���������� �������� ������� �� ��צ�������.',
    'deny_msg' => '������ �� æ�� ���Ҧ��� ����������. ���Ҧ��� ��� ���� ����ͦ����/��������, ��� � ��� ����� צ���צ����� �������.',
    'stats_headline' => '10 ����������Φ��� ��������� ���Ҧ���',
    'stats_page_title' => '��������� ���Ҧ���',
    'stats_hits' => '���',
    'stats_no_hits' => '�� ����� ���Ԧ ����� ��������� ���Ҧ��� ��� Φ��� �� �� צ�צ�����.',
    'id' => 'ID',
    'duplicate_id' => '������� ���� ID ��� æ�� ���Ҧ��� ��� ����������դ����. ���� �����, ����Ҧ�� ����� ID.',
    'instructions' => '��� �ͦ���� �� �������� �������� ���Ҧ���, �����Φ�� �� �� ������ ����������� �����. ��� ����������� ���Ҧ���, �����Φ�� �� �� ���������. ��� �������� ���� �������� ���Ҧ���, ���Ҧ�� �������� ���� ���Ҧ. �����Φ�� ������ ��Ц�, ��� ���Ц����� ������� ���Ҧ���.',
    'centerblock' => '����������� ����: ',
    'centerblock_msg' => '���� �� צ�ͦ����, �� �������� ���Ҧ��� ���� ���������� �� ����������� ���� �� �����Φ� ���Ҧ�æ.',
    'topic' => '����: ',
    'position' => '���ͦ�����: ',
    'all_topics' => '�Ӧ',
    'no_topic' => '���� ������� ���Ҧ���',
    'position_top' => '���Ҧ ���Ҧ���',
    'position_feat' => '���� �������ϧ ����Ԧ',
    'position_bottom' => '����� ���Ҧ���',
    'position_entire' => '�� ��� ���Ҧ���',
    'position_nonews' => 'Only if No Other News',
    'head_centerblock' => '����������� ����',
    'centerblock_no' => '�',
    'centerblock_top' => '����',
    'centerblock_feat' => '����. ������',
    'centerblock_bottom' => '���',
    'centerblock_entire' => '��� ���Ҧ���',
    'centerblock_nonews' => 'If No News',
    'inblock_msg' => '� ���æ: ',
    'inblock_info' => '��ͦ����� �������� ���Ҧ��� � ����.',
    'title_edit' => '���������� ���Ҧ���',
    'title_copy' => '��Ц����� ���Ҧ���',
    'title_display' => '����������� ���Ҧ���',
    'select_php_none' => '�� ���������� PHP',
    'select_php_return' => '���������� PHP (return)',
    'select_php_free' => '���������� PHP',
    'php_not_activated' => "������������ PHP � ��������� ���Ҧ���� �� ����������. ���� �����, ����צ���� � <a href=\"{$_CONF['site_url']}/docs/staticpages.html#php\">���������æ�</a> ���� �������.",
    'printable_format' => '������ ��� �����',
    'copy' => '��Ц�����',
    'limit_results' => '�������� ����������',
    'search' => '�����',
    'submit' => '��Ħ�����',
    'delete_confirm' => 'Are you sure you want to delete this page?',
    'allnhp_topics' => 'All Topics (No Homepage)',
    'page_list' => 'Page List',
    'instructions_edit' => 'This screen allows you to create / edit a new static page. Pages can contain PHP code and HTML code.',
    'attributes' => 'Attributes',
    'preview_help' => 'Select the <b>Preview</b> button to refresh the preview display'
);
###############################################################################
# autotag descriptions

$LANG_SP_AUTOTAG = array(
    'desc_staticpage' => 'Link: to a staticpage on this site; link_text defaults to staticpage title. usage: [staticpage:<i>page_id</i> {link_text}]',
    'desc_staticpage_content' => 'HTML: renders the content of a staticpage.  usage: [staticpage_content:<i>page_id</i>]'
);


$PLG_staticpages_MESSAGE19 = '';
$PLG_staticpages_MESSAGE20 = '';

// Messages for the plugin upgrade
$PLG_staticpages_MESSAGE3001 = 'Plugin upgrade not supported.';
$PLG_staticpages_MESSAGE3002 = $LANG32[9];

// Localization of the Admin Configuration UI
$LANG_configsections['staticpages'] = array(
    'label' => 'Static Pages',
    'title' => 'Static Pages Configuration'
);

$LANG_confignames['staticpages'] = array(
    'allow_php' => 'Allow PHP?',
    'sort_by' => 'Sort Centerblocks by',
    'sort_menu_by' => 'Sort Menu Entries by',
    'delete_pages' => 'Delete Pages with Owner?',
    'in_block' => 'Wrap Pages in Block?',
    'show_hits' => 'Show Hits?',
    'show_date' => 'Show Date?',
    'filter_html' => 'Filter HTML?',
    'censor' => 'Censor Content?',
    'default_permissions' => 'Page Default Permissions',
    'aftersave' => 'After Saving Page',
    'atom_max_items' => 'Max. Pages in Webservices Feed',
    'comment_code' => 'Comment Default',
    'include_search' => 'Site Search Default',
    'status_flag' => 'Default Page Mode'
);

$LANG_configsubgroups['staticpages'] = array(
    'sg_main' => 'Main Settings'
);

$LANG_fs['staticpages'] = array(
    'fs_main' => 'Static Pages Main Settings',
    'fs_permissions' => 'Default Permissions'
);

// Note: entries 0, 1, 9, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['staticpages'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => true, 'False' => false),
    2 => array('Date' => 'date', 'Page ID' => 'id', 'Title' => 'title'),
    3 => array('Date' => 'date', 'Page ID' => 'id', 'Title' => 'title', 'Label' => 'label'),
    9 => array('Forward to page' => 'item', 'Display List' => 'list', 'Display Home' => 'home', 'Display Admin' => 'admin'),
    12 => array('No access' => 0, 'Read-Only' => 2, 'Read-Write' => 3),
    13 => array('Enabled' => 1, 'Disabled' => 0),
    17 => array('Comments Enabled' => 0, 'Comments Disabled' => -1)
);

?>
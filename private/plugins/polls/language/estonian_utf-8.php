<?php
###############################################################################
# estonian_utf-8.php
# This is the estonian language page for the glFusion Polls Plug-in
#
# Copyright (C) 2001 Tony Bibbs
# tony@tonybibbs.com
# Copyright (C) 2005 Trinity Bays
# trinity93@gmail.com
#
# Estonian translation by Artur Räpp <rtr AT planet DOT ee>
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

$LANG_POLLS = array(
    'polls' => 'Küsitlused',
    'results' => 'Tulemused',
    'pollresults' => 'Hääletuste tulemused',
    'votes' => 'Hääletust',
    'vote' => 'Hääleta',
    'pastpolls' => 'Viimased küsitlused',
    'savedvotetitle' => 'Hääl salvestatud',
    'savedvotemsg' => 'Sinu hääl on salvestatud. Hääletasid küsitluses:',
    'pollstitle' => 'Olemas olevad küsitlused',
    'polltopics' => 'Other polls',
    'stats_top10' => 'Top 10 küsitlust',
    'stats_topics' => 'Poll Topic',
    'stats_votes' => 'hääli',
    'stats_none' => 'Näib et sellel lehel pole ühtegi küsitlust või mitte keegi ei ole veel hääletanud.',
    'stats_summary' => 'Küsitlusi (vastuseid)',
    'open_poll' => 'Avatud hääletamiseks',
    'answer_all' => 'Palun vasta kõigile ülejäänud küsimustele',
    'not_saved' => 'Tulemus pole salvestatud',
    'upgrade1' => 'Installeerisid küsitluste plugina uue versiooni. Palun ',
    'upgrade2' => 'uuenda',
    'editinstructions' => 'Palun sisesta küsitluse ID, vähemalt üks küsitluse küsimus ning sellele küsimusele vähemalt kaks vastusevarianti',
    'pollclosed' => 'This poll is closed for voting.',
    'pollhidden' => 'You have already voted. This poll results will only be shown when voting is closed.',
    'start_poll' => 'Start Poll',
    'deny_msg' => 'Access to this poll is denied.  Either the poll has been moved/removed or you do not have sufficient permissions.'
);

###############################################################################
# admin/plugins/polls/index.php

$LANG25 = array(
    1 => 'Reþiim',
    2 => 'Palun sisesta rubriik, vähemalt üks küsimus ja sellele küsimusele vähemalt üks vastusevariant',
    3 => 'Küsitlus on loodud',
    4 => 'Küsitlus %s salvestatud',
    5 => 'Toimeta küsitlust',
    6 => 'Küsitluse ID',
    7 => '(ära kasuta tühikuid)',
    8 => 'Nähtav küsitluseblokis',
    9 => 'Rubriik',
    10 => 'Vastused / hääletused / märkus',
    11 => 'Küsitluse  %s vastusteinfo laadimisel tekkis viga ',
    12 => 'Küsitluse  %s küsimusteinfo laadimisel tekkis viga',
    13 => 'Loo küsitlus',
    14 => 'Salvesta',
    15 => 'Tühista',
    16 => 'Kustuta',
    17 => 'Palun sisesta küsitluse ID',
    18 => 'Küsitluste loetelu',
    19 => 'Küsitluse toimetamiseks või kustutamiseks klõpsa küsitluse toimetamisikooni. Uue küsitluse loomiseks klõpsa "Uus küsitlus" ülal.',
    20 => 'Hääletajad',
    21 => 'Ligipääs tõkestatud',
    22 => "Sa üritasid ligi pääseda küsitlusele, milleks pole sul õigust. See katse on logitud. Palun <a href=\"{$_CONF['site_admin_url']}/poll.php\">mine tagasi küsitluste haldamislehele</a>.",
    23 => 'Uus küsitlus',
    24 => 'Admin avaleht',
    25 => 'Jah',
    26 => 'Ei',
    27 => 'Toimeta',
    28 => 'Sisesta',
    29 => 'Otsi',
    30 => 'Piira tulemusi',
    31 => 'Küsimus',
    32 => 'Selle küsimuse küsitlusest eemaldamiseks, kustuta küsimuse tekst',
    33 => 'Avatud hääletamiseks',
    34 => 'Küsitluse rubriik:',
    35 => 'Selles küsitluses on veel',
    36 => 'küsimust',
    37 => 'Peida tulemused kuni küsitlus on avatud',
    38 => 'Kuni küsitlus on avatud, näevad  &tulemusi ainult omanik amp; root ',
    39 => 'Rubriiki näidatakse vaid siis, kui selles on üle ühe küsimuse.',
    40 => 'Vaata kõiki sellele küsitlusele antud vastuseid',
    41 => 'Are you sure you want to delete this Poll?',
    42 => 'Are you absolutely sure you want to delete this Poll?  All questions, answers and comments that are associated with this Poll will also be permanently deleted from the database.'
);

###############################################################################
# autotag descriptions

$LANG_PO_AUTOTAG = array(
    'desc_poll' => 'Link: to a Poll on this site.  link_text defaults to the Poll topic.  usage: [poll:<i>poll_id</i> {link_text}]',
    'desc_poll_result' => 'HTML: renders the results of a Poll on this site.  usage: [poll_result:<i>poll_id</i>]',
    'desc_poll_vote' => 'HTML: renders a voting block for a Poll on this site.  usage: [poll_vote:<i>poll_id</i>]'
);

$PLG_polls_MESSAGE19 = 'Sinu küsitlus on edukalt salvestatud.';
$PLG_polls_MESSAGE20 = 'Sinu küsitlus on edukalt kustutatud.';

// Messages for the plugin upgrade
$PLG_polls_MESSAGE3001 = 'Plugina uuendamine pole toetatud.';
$PLG_polls_MESSAGE3002 = $LANG32[9];

// Localization of the Admin Configuration UI
$LANG_configsections['polls'] = array(
    'label' => 'Küsitlused',
    'title' => 'Küsitluste haldur'
);

$LANG_confignames['polls'] = array(
    'pollsloginrequired' => 'Küsitlused vajavad sisselogimist?',
    'hidepollsmenu' => 'Peida küsitluste menüüpunkt?',
    'maxquestions' => 'Maks. küsimusi küsitluses',
    'maxanswers' => 'Maks. vastusevariante',
    'answerorder' => 'Sorteeri tulemusi ...',
    'pollcookietime' => 'Hääletusküpsise kehtivusaeg',
    'polladdresstime' => 'Hääletaja IP Aadress kehtib kuni',
    'delete_polls' => 'Kustuta küsitlused, omanikuks?',
    'aftersave' => 'Pärast küsitluse salvestamist',
    'default_permissions' => 'Küsitluse vaikimisi õigused',
    'displayblocks' => 'Display glFusion Blocks'
);

$LANG_configsubgroups['polls'] = array(
    'sg_main' => 'Peahäälestused'
);

$LANG_fs['polls'] = array(
    'fs_main' => 'Küsitluste üldised häälestused',
    'fs_permissions' => 'Vaikimisi õigused'
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['polls'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => true, 'False' => false),
    2 => array('As Submitted' => 'submitorder', 'By Votes' => 'voteorder'),
    9 => array('Forward to Poll' => 'item', 'Display Admin List' => 'list', 'Display Public List' => 'plugin', 'Display Home' => 'home', 'Display Admin' => 'admin'),
    12 => array('No access' => 0, 'Read-Only' => 2, 'Read-Write' => 3),
    13 => array('Left Blocks' => 0, 'Right Blocks' => 1, 'Left & Right Blocks' => 2, 'None' => 3)
);

?>
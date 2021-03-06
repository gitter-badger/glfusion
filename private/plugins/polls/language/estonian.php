<?php
###############################################################################
# estonian.php
# This is the estonian language page for the glFusion Polls Plug-in
#
# Copyright (C) 2001 Tony Bibbs
# tony@tonybibbs.com
# Copyright (C) 2005 Trinity Bays
# trinity93@gmail.com
#
# Estonian translation by Artur R�pp <rtr AT planet DOT ee>
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
    'polls' => 'K�sitlused',
    'results' => 'Tulemused',
    'pollresults' => 'H��letuste tulemused',
    'votes' => 'H��letust',
    'vote' => 'H��leta',
    'pastpolls' => 'Viimased k�sitlused',
    'savedvotetitle' => 'H��l salvestatud',
    'savedvotemsg' => 'Sinu h��l on salvestatud. H��letasid k�sitluses:',
    'pollstitle' => 'Olemas olevad k�sitlused',
    'polltopics' => 'Other polls',
    'stats_top10' => 'Top 10 k�sitlust',
    'stats_topics' => 'Poll Topic',
    'stats_votes' => 'h��li',
    'stats_none' => 'N�ib et sellel lehel pole �htegi k�sitlust v�i mitte keegi ei ole veel h��letanud.',
    'stats_summary' => 'K�sitlusi (vastuseid)',
    'open_poll' => 'Avatud h��letamiseks',
    'answer_all' => 'Palun vasta k�igile �lej��nud k�simustele',
    'not_saved' => 'Tulemus pole salvestatud',
    'upgrade1' => 'Installeerisid k�sitluste plugina uue versiooni. Palun ',
    'upgrade2' => 'uuenda',
    'editinstructions' => 'Palun sisesta k�sitluse ID, v�hemalt �ks k�sitluse k�simus ning sellele k�simusele v�hemalt kaks vastusevarianti',
    'pollclosed' => 'This poll is closed for voting.',
    'pollhidden' => 'You have already voted. This poll results will only be shown when voting is closed.',
    'start_poll' => 'Start Poll',
    'deny_msg' => 'Access to this poll is denied.  Either the poll has been moved/removed or you do not have sufficient permissions.'
);

###############################################################################
# admin/plugins/polls/index.php

$LANG25 = array(
    1 => 'Re�iim',
    2 => 'Palun sisesta rubriik, v�hemalt �ks k�simus ja sellele k�simusele v�hemalt �ks vastusevariant',
    3 => 'K�sitlus on loodud',
    4 => 'K�sitlus %s salvestatud',
    5 => 'Toimeta k�sitlust',
    6 => 'K�sitluse ID',
    7 => '(�ra kasuta t�hikuid)',
    8 => 'N�htav k�sitluseblokis',
    9 => 'Rubriik',
    10 => 'Vastused / h��letused / m�rkus',
    11 => 'K�sitluse  %s vastusteinfo laadimisel tekkis viga ',
    12 => 'K�sitluse  %s k�simusteinfo laadimisel tekkis viga',
    13 => 'Loo k�sitlus',
    14 => 'Salvesta',
    15 => 'T�hista',
    16 => 'Kustuta',
    17 => 'Palun sisesta k�sitluse ID',
    18 => 'K�sitluste loetelu',
    19 => 'K�sitluse toimetamiseks v�i kustutamiseks kl�psa k�sitluse toimetamisikooni. Uue k�sitluse loomiseks kl�psa "Uus k�sitlus" �lal.',
    20 => 'H��letajad',
    21 => 'Ligip��s t�kestatud',
    22 => "Sa �ritasid ligi p��seda k�sitlusele, milleks pole sul �igust. See katse on logitud. Palun <a href=\"{$_CONF['site_admin_url']}/poll.php\">mine tagasi k�sitluste haldamislehele</a>.",
    23 => 'Uus k�sitlus',
    24 => 'Admin avaleht',
    25 => 'Jah',
    26 => 'Ei',
    27 => 'Toimeta',
    28 => 'Sisesta',
    29 => 'Otsi',
    30 => 'Piira tulemusi',
    31 => 'K�simus',
    32 => 'Selle k�simuse k�sitlusest eemaldamiseks, kustuta k�simuse tekst',
    33 => 'Avatud h��letamiseks',
    34 => 'K�sitluse rubriik:',
    35 => 'Selles k�sitluses on veel',
    36 => 'k�simust',
    37 => 'Peida tulemused kuni k�sitlus on avatud',
    38 => 'Kuni k�sitlus on avatud, n�evad  &tulemusi ainult omanik amp; root ',
    39 => 'Rubriiki n�idatakse vaid siis, kui selles on �le �he k�simuse.',
    40 => 'Vaata k�iki sellele k�sitlusele antud vastuseid',
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

$PLG_polls_MESSAGE19 = 'Sinu k�sitlus on edukalt salvestatud.';
$PLG_polls_MESSAGE20 = 'Sinu k�sitlus on edukalt kustutatud.';

// Messages for the plugin upgrade
$PLG_polls_MESSAGE3001 = 'Plugina uuendamine pole toetatud.';
$PLG_polls_MESSAGE3002 = $LANG32[9];

// Localization of the Admin Configuration UI
$LANG_configsections['polls'] = array(
    'label' => 'K�sitlused',
    'title' => 'K�sitluste haldur'
);

$LANG_confignames['polls'] = array(
    'pollsloginrequired' => 'K�sitlused vajavad sisselogimist?',
    'hidepollsmenu' => 'Peida k�sitluste men��punkt?',
    'maxquestions' => 'Maks. k�simusi k�sitluses',
    'maxanswers' => 'Maks. vastusevariante',
    'answerorder' => 'Sorteeri tulemusi ...',
    'pollcookietime' => 'H��letusk�psise kehtivusaeg',
    'polladdresstime' => 'H��letaja IP Aadress kehtib kuni',
    'delete_polls' => 'Kustuta k�sitlused, omanikuks?',
    'aftersave' => 'P�rast k�sitluse salvestamist',
    'default_permissions' => 'K�sitluse vaikimisi �igused',
    'displayblocks' => 'Display glFusion Blocks'
);

$LANG_configsubgroups['polls'] = array(
    'sg_main' => 'Peah��lestused'
);

$LANG_fs['polls'] = array(
    'fs_main' => 'K�sitluste �ldised h��lestused',
    'fs_permissions' => 'Vaikimisi �igused'
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
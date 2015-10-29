<?php
// +--------------------------------------------------------------------------+
// | glFusion CMS                                                             |
// +--------------------------------------------------------------------------+
// |lib-widgets.php                                                           |
// |                                                                          |
// | A place for widget functions, mootools based or otherwise                |
// +--------------------------------------------------------------------------+
// | Copyright (C) 2008-2015 by the following authors:                        |
// |                                                                          |
// | Joe Mucchiello         jmucchiello AT yahoo DOT com                      |
// | Mark R. Evans          mark AT glfusion DOT org                          |
// | Eric Warren            eakwarren AT gmail DOT com                        |
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
    die ('This file can not be used on its own!');
}

/*
 * provides a generic interface to the widget library
 * to allow plugins to specify their own functions.
 */

function WIDGET_interface($function_name, $args='')
{
    $retval = '';

    $function = 'WIDGET_' . $function_name;
    if (function_exists($function)) {
        switch (count($args)) {
        case 0:
        case 1:
            $retval .= $function();
            break;
        case 2:
            $retval .= $function($args[1]);
            break;
        case 3:
            $retval .= $function($args[1], $args[2]);
            break;
        case 4:
            $retval .= $function($args[1], $args[2], $args[3]);
            break;
        case 5:
            $retval .= $function($args[1], $args[2], $args[3], $args[4]);
            break;
        case 6:
            $retval .= $function($args[1], $args[2], $args[3], $args[4], $args[5]);
            break;
        case 7:
            $retval .= $function($args[1], $args[2], $args[3], $args[4], $args[5], $args[6]);
            break;
        case 8:
            $retval .= $function($args[1], $args[2], $args[3], $args[4], $args[5], $args[6], $args[7]);
            break;
        case 9:
            $retval .= $function($args[1], $args[2], $args[3], $args[4], $args[5], $args[6], $args[7], $args[8]);
            break;
        default:
            $retval .= $function($args);
            break;
        }
    }
    return $retval;
}


function WIDGET_autotranslations($header=0) {
    global $_CONF, $LANG_WIDGETS;

    $isoLang = array(
                 'ar' => 'Arabic',
                 'bg' => 'Bulgarian',
                 'ca' => 'Catalan',
                 'cs' => 'Czech',
                 'da' => 'Danish',
                 'de' => 'German',
                 'el' => 'Greek',
                 'en' => 'English',
                 'es' => 'Spanish',
                 'fi' => 'Finnish',
                 'fr' => 'French',
                 'hi' => 'Hindi',
                 'hr' => 'Croatian',
                 'id' => 'Indonesian',
                 'it' => 'Italian',
                 'iw' => 'Hebrew',
                 'ja' => 'Japanese',
                 'ko' => 'Korean',
                 'lt' => 'Lithuanian',
                 'lv' => 'Latvian',
                 'nl' => 'Dutch',
                 'no' => 'Norwegian',
                 'pl' => 'Polish',
                 'pt' => 'Portugese',
                 'ro' => 'Romanian',
                 'ru' => 'Russian',
                 'sk' => 'Slovak',
                 'sl' => 'Slovenian',
                 'sr' => 'Serbian',
                 'sv' => 'Swedish',
                 'tl' => 'Filipino',
                 'uk' => 'Ukrainian',
                 'vi' => 'Vietnamese',
                 'zh-CN' => 'Chinese Simplified',
                 'zh-TW' => 'Chinese Traditional',
            );
    asort($isoLang); //comment out this line to sort results by 2 digit language code instead of language names above
    $retval = '';
    if ($header) {
        $retval = '<h2>' . $LANG_WIDGETS['translate'] . '</h2>';
    }
    $retval .= '<ul class="autotranslations">';

    foreach ($isoLang AS $key => $language ) {
        $randID = rand();
        if ($key != $_CONF['iso_lang']) {
            $retval .= '<li class="sprite-' . $key . '"><a href="http://translate.google.com/translate?';
            $retval .= 'hl=' . $key; // 2 character language code of google header bar (usually the same as tl below)
            $retval .= '&amp;sl=' . $_CONF['rdf_language']; // default language of your site
            $retval .= '&amp;tl=' . $key; // 2 character language code to translate site into (usually should be the same as hl above)
            $retval .= '&amp;u=' . urlencode($_CONF['http_host'] . '?r=' . $randID); // address of your site appends a random string so Google won't cache the translated page
            $retval .= '"><img src="' . $_CONF['site_url'] . '/images/speck.gif" alt="'.$language.'" title="'.$language.'" /></a></li>';
        }
    }
    $retval .= '</ul><div style="clear:left;"></div>';
    return $retval;
}


function WIDGET_slider( $dataArray )
{
    global $_CONF;

    $optionTypeArray = array(
      'mode' => 's',
      'slideWidth' => 'n',
      'speed' => 'n',
      'slideMargin' => 'n',
      'startSlide' => 'n',
      'randomStart' => 'b',
      'infiniteLoop' => 'b',
      'hideControlOnEnd' => 'b',
      'captions' => 'b',
      'responsive' => 'b',
      'touchEnabled' => 'b',
      'pager' => 'b',
      'pagerType' => 's',
      'auto' => 'b'
    );

    $last = 0;
    $first = 0;
    $rand = rand(1,1000);
    $slideCounter = 1;
    $captionDiv = '';
    $retval = '';

    // define the JS we need for this theme..
    $outputHandle = outputHandler::getInstance();
    // core js
    $outputHandle->addLinkScript($_CONF['site_url'].'/javascript/addons/bxslider/jquery.bxslider.min.js');
    $outputHandle->addLinkStyle($_CONF['site_url'].'/javascript/addons/bxslider/jquery.bxslider.css');

    $retval .= '<script type="text/javascript">$(document).ready(function(){';
    $retval .= '   $(\'.slide_'.$rand.'\').bxSlider({';

    foreach ($dataArray['options'] as $option => $value ) {
        if ( isset($optionTypeArray[$option]) ) {
            if ( $last > 0 ) $retval .= ',';
            $retval .= $option . ": ";
            switch ($optionTypeArray[$option]) {
                case 's' :
                    $retval .= "'" . $value . "'";
                    break;
                case 'b' :
                    $retval .= $value == 0 ? 'false' : 'true';
                    break;
                case 'n' :
                    $retval .= $value;
                    break;
            }
            $last++;
        }
    }
    $retval .= ' }); });</script>';

    $retval .= '<div class="slide-wrapper" style="margin:0 auto;">';
    $retval .= '<ul class="slide_'.$rand.'" style="margin:0;">';

    foreach ($dataArray['images'] as $images ) {
        $retval .= '<li>';

        if ( isset($images['link']) && $images['link'] != '' ) {
            $retval .= '<a href="'.$images['link'].'">';
        }
        $retval .= '<img src="'.$images['image'].'" alt="" ' ;

        if (isset($images['caption']) && $images['caption'] != '' ) {
            $retval .= ' title="'.$images['caption'].'" ';
        }

        $first++;

        $retval .= '>';

        if ( isset($images['link']) && $images['link'] != '' ) {
            $retval .= '</a>';
        }
        $retval .= '</li>';
        $slideCounter++;
    }
    $retval .= '</ul>';
    $retval .= '</div>';

    return $retval;
}

function WIDGET_springMenu($dataArray)
{
    global $_CONF;

    $rand = rand(1,1000);
    $slideCounter = 1;
    $retval = '';

    // define the JS we need for this theme..
    $outputHandle = outputHandler::getInstance();
    // core js
    $outputHandle->addLinkScript($_CONF['site_url'].'/javascript/addons/accordion-image-menu/jquery.accordionImageMenu.min.js');
    $outputHandle->addLinkStyle( $_CONF['site_url'].'/javascript/addons/accordion-image-menu/accordionImageMenu.css');

    $retval .= '<div class="spring-menu">';
    $retval .= '<div id="springmenu_'.$rand.'" class="aim">';

    foreach ($dataArray['images'] as $images ) {
        if ( isset($images['link']) && $images['link'] != '' ) {
            $retval .= '<a href="'.$images['link'].'">';
        }
        $retval .= '<img src="'.$images['image'].'" alt="" />' ;
        if ( isset($images['link']) && $images['link'] != '' ) {
            $retval .= '</a>';
        }
        $slideCounter++;
    }
    $retval .= '</div>';
    $retval .= '</div>';

    $retval .= '<script type="text/javascript">$(document).ready(function(){';
    $retval .= '   $(\'#springmenu_'.$rand.'\').AccordionImageMenu({';
    foreach ($dataArray['options'] as $option => $value ) {
        $retval .= "'".$option."'" . ": " . "'".$value . "',";
    }
    $retval .= '}); });</script>';

    return $retval;
}

/*
 * replaces mooslide()
 */

function WIDGET_tabslide( $dataArray )
{
    global $_CONF,$_TABLES;

    $retval = '';

    $id = rand(1,1000);

    // define the JS we need for this theme..
    $outputHandle = outputHandler::getInstance();
    // core js
    $outputHandle->addLinkScript($_CONF['site_url'].'/javascript/addons/slider-tabs/jquery.sliderTabs.min.js');
    $outputHandle->addLinkStyle($_CONF['site_url'].'/javascript/addons/slider-tabs/styles/jquery.sliderTabs.min.css');

    $page_ids = $dataArray['panels'];

	if (!is_array($page_ids[0])) {
	//we are in Static Pages Mode
	    $sql = "SELECT sp_id, sp_content, sp_php, sp_title FROM {$_TABLES['staticpage']} WHERE sp_id in ("
	         . implode(', ', array_map(create_function('$a','return "\'" . htmlspecialchars($a) . "\'";'), $page_ids))
	         . ')' . COM_getPermSQL('AND');

	    $res = DB_query($sql);
	    $pages = array();
	    for ($i = 0; $A = DB_fetchArray($res); ++$i) {
	        $content = SP_render_content($A['sp_content'], $A['sp_php']);
	        $title = htmlspecialchars($A['sp_title']);
	        $order = array_search($A['sp_id'],$page_ids); // find proper order
	        $pages[$order] = array('sp_id' => $A['sp_id'],'content' => $content, 'title' => $title, 'index' => $order+1);
	    }
	} else {
	//we have been passed pre-formatted pages
	    $pages = array();
	    for ($i = 0; $i < sizeof($page_ids); ++$i) {
	        $content = $page_ids[$i]['content'];
	        $title = htmlspecialchars($page_ids[$i]['title']);
	        $order = $i;
	        $pages[$order] = array('sp_id' => $title, 'content' => $content, 'title' => $title, 'index' => $order+1);
	    }
	}
    if (count($pages) == 0) {
        return '';
    }
    ksort($pages);
    $retval .= '<div id="slidertabs_'.$id.'" class="tab-slider">';
    $retval .= '<ul>';
    foreach ( $pages as $page ) {
        extract($page);
        $retval .= '<li><a href="#'.$sp_id.'">'.stripslashes($title).'</a></li>';
    }
    $retval .= '</ul>';
    foreach ($pages as $page) {
        extract($page);
        $retval .= '<div id="'.$sp_id.'">';
        $retval .= $content;
        $retval .= '</div>';
    }
    $retval .= '</div><div style="clear:both;"></div>';

    $retval .= '<script type="text/javascript">$(document).ready(function(){';
    $retval .= '$("div#slidertabs_'.$id.'").sliderTabs({';

    foreach ($dataArray['options'] as $option => $value ) {
        if ( is_numeric($value) ) {
            $retval .= $option . ": " . $value . ",";
        } else {
            $retval .= $option . ": " . "'".$value . "',";
        }
    }

    $retval .= '}); ';
    $retval .= ' });</script>';
    return $retval;
}


// OLD MooTools Widgets - depreciated
function WIDGET_mooslide($page_ids, $width = 550, $height = 160, $id = 'gl_', $slide_interval = 0)
/*  Sample standalone staticpage:

USES_lib_widgets();
// add you own static pages here.
$slides = Array('staticpage_id_1', 'staticpage_id_2');
$display = COM_siteHeader();
// test the parameters, or not
$display .= WIDGET_mooslide($slides);
$display .= WIDGET_mooslide($slides, 560, 160, 'gl_', 5000);
$display .= COM_siteFooter();
echo $display;
*/
{
    global $_TABLES, $_CONF;

    if (count($page_ids) == 0) {
        return '';
    }

	// Backwards Compatibility - if $id is still the old default 'gl_slide', change it.
	if ($id == 'gl_slide') {$id = 'gl_';}

    $display = <<<EOJ
<script type="text/javascript" src="{$_CONF['site_url']}/javascript/mootools/gl_mooslide.js"></script>
<script type="text/javascript">
    window.addEvent('load', function() {
        var myFilm = new gl_Slide(\$('$id'), {
            fx: {
                wait: true,
                duration: 1000
                },
            scrollFX: {
                transition: Fx.Transitions.Cubic.easeIn
                },
            dimensions: {
                width: $width,
                height: $height
                },
			cssvars: {
				customID: '$id'
				},
			autoScroll: {
				interval: $slide_interval    // in ms, thus 1000 is 1 second, set to 0 to turn off.
				}
        });
    });
</script>
<div id="$id" class="{$id}slide">
EOJ;

	if (!is_array($page_ids[0])) {
	//we are in Static Pages Mode
	    $sql = "SELECT sp_id, sp_content, sp_php, sp_title FROM {$_TABLES['staticpage']} WHERE sp_id in ("
	         . implode(', ', array_map(create_function('$a','return "\'" . htmlspecialchars($a) . "\'";'), $page_ids))
	         . ')' . COM_getPermSQL('AND');

	    $res = DB_query($sql);
	    $pages = array();
	    for ($i = 0; $A = DB_fetchArray($res); ++$i) {
	        $content = SP_render_content(stripslashes($A['sp_content']), $A['sp_php']);
	        $title = htmlspecialchars(stripslashes($A['sp_title']));
	        $order = array_search($A['sp_id'],$page_ids); // find proper order
	        $pages[$order] = Array('content' => $content, 'title' => $title, 'index' => $order+1);
	    }
	} else {
	//we have been passed pre-formatted pages
	    $pages = array();
	    for ($i = 0; $i < sizeof($page_ids); ++$i) {
	        $content = stripslashes($page_ids[$i]['content']);
	        $title = htmlspecialchars(stripslashes($page_ids[$i]['title']));
	        $order = $i;
	        $pages[$order] = Array('content' => $content, 'title' => $title, 'index' => $order+1);
	    }
	}
/* 	COM_errorLog(print_r($pages,true),1); */
    if (count($pages) == 0) {
        return '';
    }
    ksort($pages);
    foreach ($pages as $page) {
        extract($page);
        $display .= <<<EOS
<div class="{$id}tab-pane" id="{$id}tab-$index-pane">
    <h1 class="{$id}tab-title">$title</h1>
    <div>$content</div>
</div>
EOS;
    }

    $display .= '</div><div style="clear:both;"></div>';

    return $display;
}

// A portal staticpage (that bases itself on a user created proper portal block called gl_mootickerRSS)
//modified from LWC's forum post http://www.geeklog.net/forum/viewtopic.php?showtopic=67396 by Mark R. Evans and Joe Mucchiello
function WIDGET_mootickerRSS($block = 'gl_mootickerRSS', $id = 'gl_mooticker') {
    global $_CONF, $_TABLES, $LANG_WIDGETS;

    $query = "SELECT bid, rdfurl, rdflimit, UNIX_TIMESTAMP(rdfupdated) AS date FROM {$_TABLES['blocks']} WHERE type = 'portal' AND is_enabled = 0";

    // Update feeds from blocks where 'is_enabled' -tag is set to 0
    $blocksql['mysql'] = $query;
    $blocksql['mssql'] .= $query;
    $result = DB_query( $blocksql );
    $nrows = DB_numRows( $result );

    $blocks = array();
    for( $i = 0; $i < $nrows; $i++ )
    {
        $blocks[] = DB_fetchArray( $result );
    }

    // Loop though resulting sorted array and pass associative arrays
    // to COM_rdfCheck
    foreach( $blocks as $A )
    {
        COM_rdfCheck( $A['bid'], $A['rdfurl'], $A['date'], $A['rdflimit'] );
    };

    $retval = '';
    $result = DB_query("SELECT *, rdfupdated as date FROM {$_TABLES['blocks']} WHERE name='" . DB_escapeString($block) . "'");
    $numRows = DB_numRows($result);
    if ( $numRows < 1 || $result == NULL ) {
        return $retval;
    }
    $B = DB_fetchArray($result);
    if ( $B['is_enabled'] == 0 ) {
        COM_formatBlock($B, true);
        $retval = <<<EOT
<script type="text/javascript">
var MooTicker=new Class({options:{controls:true,delay:2000,duration:800,blankimage:'{site_url}/images/speck.gif'},initialize:function(b,c){this.setOptions(c);this.element=$(b)||null;this.element.addEvents({'mouseenter':this.stop.bind(this),'mouseleave':this.play.bind(this)});this.news=this.element.getElements('ul li');this.current=0;this.fx=[];this.news.getParent().setStyle('position','relative');var d=this;this.news.each(function(a,i){a.setStyle('position','absolute');this.fx[i]=new Fx.Style(a,'opacity',{duration:this.options.duration,onStart:function(){d.transitioning=true},onComplete:function(){d.transitioning=false}}).set(1);if(!i)return;a.setStyle('opacity',0)},this);if(this.options.controls)this.addControls();this.status='stop';window.addEvent('load',this.play.bind(this));return this},addControls:function(){var a=new Element('span',{'class':'controls'}).injectTop(this.element);this.arrowPrev=new Element('img',{'class':'control-prev','title':'{prev}','alt':'{prev}','src':this.options.blankimage}).inject(a);this.arrowNext=new Element('img',{'class':'control-next','title':'{next}','alt':'{next}','src':this.options.blankimage}).inject(a);this.arrowPrev.addEvent('click',this.previous.bind(this));this.arrowNext.addEvent('click',this.next.bind(this));return this},previous:function(){if(this.transitioning)return this;var a=(!this.current)?this.news.length-1:this.current-1;this.fx[this.current].start(0);this.fx[a].start(1);this.current=a;return this},next:function(){if(this.transitioning)return this;var a=(this.current==this.news.length-1)?0:this.current+1;this.fx[this.current].start(0);this.fx[a].start(1);this.current=a;return this},play:function(){if(this.status=='play')return this;this.status='play';this.timer=this.next.periodical(this.options.delay+this.options.duration,this);return this},stop:function(){this.status='stop';\$clear(this.timer);return this}});MooTicker.implement(new Options,new Events);
</script>
<script type="text/javascript">
         window.addEvent('domready', function() {
                 var x = new MooTicker('$id', {
                         controls: true,
                         delay: 2500,
                         duration: 600 });
         });
</script>
<div id="$id">
EOT;
        $retval = str_replace('{site_url}',$_CONF['site_url'] , $retval);
        $retval = str_replace('{prev}',$LANG_WIDGETS['prev'] , $retval);
        $retval = str_replace('{next}',$LANG_WIDGETS['next'] , $retval);
        $retval .= '<span class="tickertitle">' . $LANG_WIDGETS['latest_news'] . ':</span>';
        $retval .= $B['content'] . '</div>';
    }
    return $retval;
}

// inserts the call to the javascript file, referencing the full path to gl_moospring.js
function WIDGET_moospring() {
    global $_CONF;

    $retval = '<script type="text/javascript" src="' . $_CONF['site_url'] . '/javascript/mootools/gl_moospring.js"></script>';
    return $retval;
}

//Powers the gl_moorotator. It is here so that the blankimage reference can be built with the full site url
function WIDGET_moorotator() {
    global $_CONF, $LANG_WIDGETS;

    $retval = '';
    $retval = <<<EOR
<script type="text/javascript">
var gl_mooRotator=new Class({options:{controls:true,duration:1000,delay:5000,autoplay:false,blankimage:'{site_url}/images/speck.gif'},initialize:function(a,b){this.container=$(a);this.setOptions(b);this.images=this.container.getElements('.gl_moorotatorimage > img');this.content=this.container.getElements('.gl_moorotatortext');this.current=0;this.build();this.attachEvents();this.status='pause';if(this.options.autoplay)window.addEvent('domready',this.play.bind(this));return this},build:function(){var b=this;$$(this.content,this.images).setStyle('position','absolute');var c=this.images.slice(1);var d=this.content.slice(1);c.each(function(a){a.injectAfter(this.images[0]).setStyle('opacity',0)},this);d.each(function(a){a.injectAfter(this.content[0]).setStyle('opacity',0)},this);var e=$$('.gl_moorotator').slice(1);e.each(function(a){a.empty().remove()});if(this.options.controls == 1){var f=new Element('div',{'class':'controls'}).inject(this.container);} else {var f=new Element('div',{'class':''}).inject(this.container);}this.arrowPrev=new Element('img',{'class':'control-prev','title':'{prev}','alt':'{prev}','src':this.options.blankimage}).inject(f);this.arrowPlay=new Element('img',{'id':'play-pause','class':'control-pause','title':'{playpause}','alt':'{playpause}','src':this.options.blankimage}).inject(f);this.arrowNext=new Element('img',{'class':'control-next','title':'{next}','alt':'{next}','src':this.options.blankimage}).inject(f);if(this.options.corners){(this.images.length).times(function(i){(2).times(function(j){new Element('div',{'class':'i'+(j+1)}).inject(this.images[i])}.bind(this))}.bind(this))}(4).times(function(i){new Element('div',{'class':'corner c'+(i+1)}).inject(this.content[0].getParent())}.bind(this));this.fx=[];(this.content.length).times(function(i){this.fx[i]=[new Fx.Style(this.images[i],'opacity',{duration:this.options.duration,onStart:function(){b.transitioning=true},onComplete:function(){b.transitioning=false}}),new Fx.Style(this.content[i],'opacity',{duration:this.options.duration})]}.bind(this));return this},attachEvents:function(){var a=this,playstop=$('play-pause');this.arrowPrev.addEvent('click',this.previous.bind(this));this.arrowNext.addEvent('click',this.next.bind(this));this.arrowPlay.addEvent('click',function(){if(a.status=='play'){a.stop();playstop.className='control-play'}else{a.play();playstop.className='control-pause'}});return this},previous:function(){if(this.transitioning)return this;var b=(!this.current)?this.content.length-1:this.current-1;this.fx[this.current].each(function(a){a.start(0)});this.fx[b].each(function(a){a.start(1)});this.current=b;return this},next:function(){if(this.transitioning)return this;var b=(this.current==this.content.length-1)?0:this.current+1;this.fx[this.current].each(function(a){a.start(0)});this.fx[b].each(function(a){a.start(1)});this.current=b;return this},play:function(){if(this.status=='play')return this;this.status='play';this.timer=this.next.periodical(this.options.delay+this.options.duration,this);return this},stop:function(){this.status='pause';\$clear(this.timer);return this}});gl_mooRotator.implement(new Events,new Options);</script>
EOR;
    $retval = str_replace('{site_url}',$_CONF['site_url'] , $retval);
    $retval = str_replace('{prev}',$LANG_WIDGETS['prev'] , $retval);
    $retval = str_replace('{next}',$LANG_WIDGETS['next'] , $retval);
    $retval = str_replace('{playpause}',$LANG_WIDGETS['playpause'] , $retval);
    return $retval;
}

//wrapper widget: wraps a page outside of glFusion (but on the same server)
//and auto adjusts the height of the iframe to whatever page is loaded
//also, load links to parent site in parent window (see public_html/javascript/common.js)
//this script borks in Opera
function WIDGET_wrapper() {
//add the javascript to take care of dynamic iframe
    global $LANG_WIDGETS;

    $display = <<<EOW
    <script type="text/javascript">

/***********************************************
* IFrame SSI script II - Dynamic Drive DHTML code library (http://www.dynamicdrive.com)
* Visit DynamicDrive.com for hundreds of original DHTML scripts
* This notice must stay intact for legal use
***********************************************/

//Input the IDs of the IFRAMES you wish to dynamically resize to match its content height:
//Separate each ID with a comma. Examples: ["myframe1", "myframe2"] or ["myframe"] or [] for none:
var iframeids=["myframe"]

//Should script hide iframe from browsers that don't support this script (non IE5+/NS6+ browsers)
//This script is tested to work in FF, IE, Safari, Chrome, but borks in Opera
var iframehide="no"

var getFFVersion=navigator.userAgent.substring(navigator.userAgent.indexOf("Firefox")).split("/")[1]
var FFextraHeight=parseFloat(getFFVersion)>=0.1? 16 : 0 //extra height in px to add to iframe in FireFox 1.0+ browsers

function resizeCaller() {
var dyniframe=new Array()
for (i=0; i<iframeids.length; i++){
if (document.getElementById)
resizeIframe(iframeids[i])
//reveal iframe for lower end browsers? (see var above):
if ((document.all || document.getElementById) && iframehide=="no"){
var tempobj=document.all? document.all[iframeids[i]] : document.getElementById(iframeids[i])
tempobj.style.display="block"
}
}
}

function resizeIframe(frameid){
var currentfr=document.getElementById(frameid)
if (currentfr && !window.opera){
currentfr.style.display="block"
if (currentfr.contentDocument && currentfr.contentDocument.body.offsetHeight) //ns6 syntax
currentfr.height = currentfr.contentDocument.body.offsetHeight+FFextraHeight;
else if (currentfr.Document && currentfr.Document.body.scrollHeight) //ie5+ syntax
currentfr.height = currentfr.Document.body.scrollHeight;
if (currentfr.addEventListener)
currentfr.addEventListener("load", readjustIframe, false)
else if (currentfr.attachEvent){
currentfr.detachEvent("onload", readjustIframe) // Bug fix line
currentfr.attachEvent("onload", readjustIframe)
}
}
}

function readjustIframe(loadevt) {
var crossevt=(window.event)? event : loadevt
var iframeroot=(crossevt.currentTarget)? crossevt.currentTarget : crossevt.srcElement
if (iframeroot)
resizeIframe(iframeroot.id);
}

function loadintoIframe(iframeid, url){
if (document.getElementById)
document.getElementById(iframeid).src=url
}

if (window.addEventListener)
window.addEventListener("load", resizeCaller, false)
else if (window.attachEvent)
window.attachEvent("onload", resizeCaller)
else
window.onload=resizeCaller

if (Browser.Engine.presto) { //mootools 1.2 code to display Opera only message
window.addEvent('domready', function(){
$('noOpera').appendText('{noOpera}');
});
};

</script>
EOW;

    $display = str_replace('{noOpera}',$LANG_WIDGETS['noOpera'] , $display);
    return $display;
}











?>

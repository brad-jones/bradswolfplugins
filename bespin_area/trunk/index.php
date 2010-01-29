<?php
////////////////////////////////////////////////////////////////////////////////
//  __________                       __           _____                        
//  \______   \ ____   ____________ |__| ____    /  _  \_______   ____ _____   
//   |    |  _// __ \ /  ___/\____ \|  |/    \  /  /_\  \_  __ \_/ __ \\__  \  
//   |    |   \  ___/ \___ \ |  |_> >  |   |  \/    |    \  | \/\  ___/ / __ \_
//   |______  /\___  >____  >|   __/|__|___|  /\____|__  /__|    \___  >____  /
//          \/     \/     \/ |__|           \/         \/            \/     \/ 
// =============================================================================
//         Designed and Developed by Brad Jones  <brad @="bjc.id.au" />        
// =============================================================================
// 
// >>> $Id$
// 
////////////////////////////////////////////////////////////////////////////////

Plugin::setInfos(array
(
	'id'			=> 'bespin_area',
	'title'			=> 'The Mozilla Bespin Editor', 
	'description'	=> 'Canvas based Syntax Highlighter', 
	'version'		=> '0.0.3',
	'last_update'	=> '29/01/2010',
	'licence'		=> 'MIT',
	'author'		=> 'Brad Jones',
	'website'		=> 'http://code.google.com/p/bradswolfplugins/',
	'update_url'	=> 'http://bradswolfplugins.googlecode.com/svn/bespin_area/trunk/version.xml'
));

/*
 * Add this as a filter even though it's not really.
 * This works in a similar way to the TinyMCE Plugin.
 */
Filter::add('bespin_area', 'bespin_area/filter_bespin.php');

/*
 * Include the actual Bespin Editor Component.
 * Can be found at https://bespin.mozilla.com/embed.js
 * Thus you could dynamicly include it if you wanted through Javascript.
 * Maybe it's just me but I couldn't get this addJavascript function
 * to add any external javascript.
 */
Plugin::addJavascript('bespin_area', 'embed.js');
Plugin::addJavascript('bespin_area', 'jQuery-Plugins/IsEmpty.js');
Plugin::addJavascript('bespin_area', 'jQuery-Plugins/jquery.hotkeys-0.7.9.min.js');
Plugin::addJavascript('bespin_area', 'jQuery-Plugins/jquery.htmlClean-min.js');
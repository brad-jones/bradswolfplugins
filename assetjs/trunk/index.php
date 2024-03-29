<?php
////////////////////////////////////////////////////////////////////////////////
//              _____                        __     ____
//             /  _  \   ______ ______ _____/  |_  |    | ______
//            /  /_\  \ /  ___//  ___// __ \   __\ |    |/  ___/
//           /    |    \\___ \ \___ \\  ___/|  /\__|    |\___ \
//           \____|__  /____  >____  >\___  >__\________/____  >
//                   \/     \/     \/     \/                 \/
// =============================================================================
//         Designed and Developed by Brad Jones  <brad @="bjc.id.au" />
// =============================================================================
//
// >>> $Id$
//
////////////////////////////////////////////////////////////////////////////////

// Some basic info about this plugin
Plugin::setInfos(array
(
	'id'			=> 'assetjs',
	'title'			=> 'Javascript Asset Manager', 
	'description'	=> 'Provides an Interface to Manage your Js', 
	'version'		=> '0.0.2',
	'last_update'	=> '29/01/2010',
	'licence'		=> 'MIT',
	'author'		=> 'Brad Jones',
	'website'		=> 'http://code.google.com/p/bradswolfplugins/',
	'update_url'	=> 'http://bradswolfplugins.googlecode.com/svn/assetjs/trunk/version.xml',
	'type'			=> 'both'
));

// Add our controller
Plugin::addController('assetjs', 'Javascript');

// Setup some frontend routes
Dispatcher::addRoute(array('/js/:any' => '/plugin/assetjs/output/$1'));

// Include our model
require_once('models/Assetjs.php');

// Include JsMin
require_once('jsmin.php');
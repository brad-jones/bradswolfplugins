<?php
////////////////////////////////////////////////////////////////////////////////
//           _____                        __   _________
//          /  _  \   ______ ______ _____/  |_ \_   ___ \  ______ ______
//         /  /_\  \ /  ___//  ___// __ \   __\/    \  \/ /  ___//  ___/
//        /    |    \\___ \ \___ \\  ___/|  |  \     \____\___ \ \___ \
//        \____|__  /____  >____  >\___  >__|   \______  /____  >____  >
//               \/     \/     \/     \/              \/     \/     \/
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
	'id'			=> 'assetcss',
	'title'			=> 'Stylesheet Asset Manager',
	'description'	=> 'Provides an Interface to Manage your Css',
	'version'		=> '0.0.3',
	'last_update'	=> '29/01/2010',
	'licence'		=> 'MIT',
	'author'		=> 'Brad Jones',
	'website'		=> 'http://code.google.com/p/bradswolfplugins/',
	'update_url'	=> 'http://bradswolfplugins.googlecode.com/svn/assetcss/trunk/version.xml',
	'type'			=> 'both'
));

// Add our controller
Plugin::addController('assetcss', 'Stylesheets');

// Setup some frontend routes
Dispatcher::addRoute(array('/css/:any' => '/plugin/assetcss/output/$1'));

// Include our model
require_once('models/Assetcss.php');

// Include JsMin
require_once('cssmin.php');
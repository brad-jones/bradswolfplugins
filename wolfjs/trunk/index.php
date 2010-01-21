<?php
////////////////////////////////////////////////////////////////////////////////
//                    __      __       __   _____  ____        
//                   /  \    /  \____ |  |_/ ____\|    | ______
//                   \   \/\/   /  _ \|  |\   __\ |    |/  ___/
//                    \        (  <_> )  |_|  /\__|    |\___ \ 
//                     \__/\  / \____/|____/__\________/____  >
//                          \/                              \/ 
// =============================================================================
//         Designed and Developed by Brad Jones  <brad @="bjc.id.au" />        
// =============================================================================
// 
// >>> $Id$
// 
////////////////////////////////////////////////////////////////////////////////

Plugin::setInfos(array
(
	'id'			=> 'wolfjs',
	'title'			=> 'Javascript Page Type', 
	'description'	=> 'Provides a Page Type for Javascript', 
	'version'		=> '0.0.1',
	'licence'		=> 'MIT',
	'author'		=> 'Brad Jones',
	'website'		=> 'http://code.google.com/p/bradswolfplugins/',
	'update_url'	=> 'http://bradswolfplugins.googlecode.com/svn/wolfjs/trunk/version.xml'
));

// Add in our Behavior / Page Type.
Behavior::add('Javascript', 'wolfjs/Javascript.php');
<?php
////////////////////////////////////////////////////////////////////////////////
//               __      __       __   ______________                
//              /  \    /  \____ |  |_/ ____\_   ___ \  ______ ______
//              \   \/\/   /  _ \|  |\   __\/    \  \/ /  ___//  ___/
//               \        (  <_> )  |_|  |  \     \____\___ \ \___ \ 
//                \__/\  / \____/|____/__|   \______  /____  >____  >
//                     \/                           \/     \/     \/ 
// =============================================================================
//         Designed and Developed by Brad Jones  <brad @="bjc.id.au" />        
// =============================================================================
// 
// >>> $Id$
// 
////////////////////////////////////////////////////////////////////////////////

Plugin::setInfos(array
(
	'id'			=> 'wolfcss',
	'title'			=> 'Css Page Type', 
	'description'	=> 'Provides a Page Type for Css', 
	'version'		=> '0.0.1',
	'licence'		=> 'MIT',
	'author'		=> 'Brad Jones',
	'website'		=> 'http://code.google.com/p/bradswolfplugins/',
	'update_url'	=> 'http://bradswolfplugins.googlecode.com/svn/wolfcss/trunk/version.xml'
));

// Add in our Behavior / Page Type.
Behavior::add('Css', 'wolfcss/Css.php');
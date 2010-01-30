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

// Grab ourselves a db connection
$db = Record::getConnection();

// Check if the wolfjs table exists
if (($db->prepare('SELECT 1 FROM '.TABLE_PREFIX.'assetcss')) == true)
{
	// It does so lets drop it
	$db->exec('DROP TABLE '.TABLE_PREFIX.'assetcss');
	Flash::set('info', 'All Css Assets have been Deleted!');
}

Flash::set('success', 'AssetCss UnInstalled');
exit;

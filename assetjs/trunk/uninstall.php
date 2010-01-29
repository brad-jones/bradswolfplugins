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

// Grab ourselves a db connection
$db = Record::getConnection();

// Check if the wolfjs table exists
if (($db->prepare('SELECT 1 FROM '.TABLE_PREFIX.'assetjs')) == true)
{
    // It does so lets drop it
	$db->exec('DROP TABLE '.TABLE_PREFIX.'assetjs');
    Flash::set('info', 'All Javascript Assets have been Deleted!');
}

Flash::set('success', 'AssetJs UnInstalled');
exit;

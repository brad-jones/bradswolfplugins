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
if (($db->prepare('SELECT 1 FROM '.TABLE_PREFIX.'assetjs')) == false)
{
    // What db are we using
	if (strpos(DB_DSN, 'sqlite') !== false)
	{
		// We are using Sqlite
		$db->exec
		('
			CREATE TABLE '.TABLE_PREFIX.'assetjs
			(
				id INTEGER NOT NULL PRIMARY KEY,
				name varchar(100) NOT NULL default "",
				content text,
                content_compressed text,
				created_on datetime default NULL,
				updated_on datetime default NULL,
				created_by_id int(11) default NULL,
				updated_by_id int(11) default NULL,
				position mediumint(6) default NULL
			)
		');
		$db->exec('CREATE UNIQUE INDEX assetjs_name ON assetjs (name)');
        Flash::set('info', 'Created the `assetjs` table in SqLite.');
	}
	else
	{
		// We assume mysql
		$db->exec
		('
			CREATE TABLE '.TABLE_PREFIX.'assetjs
			(
				id int(11) unsigned NOT NULL auto_increment,
				name varchar(100) NOT NULL default "",
				content text,
                content_compressed text,
				created_on datetime default NULL,
				updated_on datetime default NULL,
				created_by_id int(11) default NULL,
				updated_by_id int(11) default NULL,
				position mediumint(6) unsigned default NULL,
				PRIMARY KEY  (id),
				UNIQUE KEY name (name)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8
		');
        Flash::set('info', 'Created the `assetjs` table in MySQL.');
	}
}
else
{
	/*
	 * This is where we could place any upgrade code.
	 * Do nothing for now...
	 */
    Flash::set('info', 'The `assetjs` table already exists - nothing to do.');
}

Flash::set('success', 'AssetJs Installed');
exit;
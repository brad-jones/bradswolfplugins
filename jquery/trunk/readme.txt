////////////////////////////////////////////////////////////////////////////////
//                      __________                              
//                     |__\_____  \  __ __   ___________ ___ __ 
//                     |  |/  / \  \|  |  \_/ __ \_  __ <   |  |
//                     |  /   \_/.  \  |  /\  ___/|  | \/\___  |
//                 /\__|  \_____\ \_/____/  \___  >__|   / ____|
//                 \______|      \__>           \/       \/     
// =============================================================================
//         Designed and Developed by Brad Jones  <brad @="bjc.id.au" />        
// =============================================================================
// 
// >>> $Id$
// 
////////////////////////////////////////////////////////////////////////////////

>>> INTRODUCTION
--------------------------------------------------------------------------------
This is simply a direct copy of "Tuupola's" jQuery Plugin, so full credit goes
to him, all I did was updated it to jQuery 1.4 - I couldn't be bothered waiting.

A plugin to add jQuery to "Frog CMS":http://www.madebyfrog.com/ admin interface.
By using this plugin instead of manually including jQuery plugin developers can
be sure jQuery library does not get accidentally included several times.
Also there is no need to instruct users to manually edit Frog CMS layout files.

>>> INSTALL
--------------------------------------------------------------------------------
Simply unzip this into your wolf plugin folder.

>>> USAGE
--------------------------------------------------------------------------------
Plugin forces jQuery to be in noconflict mode.
You can use $ shortcut normally like this:

jQuery(function($) { $('#someid').show(); });
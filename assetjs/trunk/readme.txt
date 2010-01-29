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

>>> INTRODUCTION
================================================================================
AssetJs is a plugin which allows you to manage your Javascript files just like
you would a Page / Snippet / Layout with-in WolfCms. The main advantage is
that we can compress the scripts automatically, instead of a manual
process, having to re-upload files into the public directory.

The plugin it's self was based off the main Snippet code, hence you may
reconginise a fair portion of the code. It has been built so I can attempt to
get my head around the Wolf Core and how everything works.

>>> DEPENDENCIES
================================================================================
This plugin does not rely upon any other plugin.

Although if you want some cool Syntax Highlighting please see the plugin
BespinArea (The Mozilla Bespin Editor for WolfCMS).

Also there is a companion plugin that does the same thing for Css.

>>> INSTALL
================================================================================
To install, simply unzip into your plugins folder making sure the folder name
is "assetjs" and then login to wolf and enable it - too easy...

If you want to be able to refrence the javascript assets with a .js extension.
You will need to add the following into your re-write rules (.htaccess).

>>> ADD THIS
##################################################
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-l
# For Js Files
RewriteRule ^(.*).js$ index.php?PAGE=$1 [L,QSA]
##################################################

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-l
# Administration URL rewriting.
RewriteRule ^admin(.*)$ admin/index.php?$1 [L,QSA]

>>> HERE

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-l
# Main URL rewriting.
RewriteRule ^(.*)$ index.php?PAGE=$1 [L,QSA]

>>> KNOWN ISSUES / TODO
================================================================================
I mainly work with Sqlite these days, hence have not yet tested this with MySQL.
Although at this stage have no reason to belive that it won't work,
being built on PDO.

Add in support for the new Google Closure Compiler as an alternative to JsMin.
I am yet to test out the compiler but from what I have read it sounds pretty
good.

>>> SUPPORT
================================================================================
Any issues with this plugin please see the google code project.
http://code.google.com/p/bradswolfplugins/

OR

Just email me (brad@bjc.id.au), I am probably more likly to respond.
Knowing me I won't monitor the repository that often.
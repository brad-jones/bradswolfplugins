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

When wolf is in Debug mode your Javascript will be untouched,
ie: Not Compressed.

When wolf in not in Debug mode the the Javascript will be minified using
the php version of JsMin, we will also Gzip it.

To make it so you can use a ".js" extension you need to add the following
rule to your .htaccess in between the Admin and Main Rules:

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-l
# Administration URL rewriting.
RewriteRule ^admin(.*)$ admin/index.php?$1 [L,QSA]

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-l
# For Js Files
RewriteRule ^(.*).js$ index.php?PAGE=$1 [L,QSA]

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-l
# Main URL rewriting.
RewriteRule ^(.*)$ index.php?PAGE=$1 [L,QSA]
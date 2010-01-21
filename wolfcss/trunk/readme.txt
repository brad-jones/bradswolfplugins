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

When wolf is in Debug mode your Css will be untouched,
ie: Not Compressed.

When wolf in not in Debug mode the the Css will be minified using
CssMin, a similar idea to JsMin but for Css, we will also Gzip it.

To make it so you can use a ".css" extension you need to add the following
rule to your .htaccess in between the Admin and Main Rules:

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-l
# Administration URL rewriting.
RewriteRule ^admin(.*)$ admin/index.php?$1 [L,QSA]

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-l
# For Css Files
RewriteRule ^(.*).css$ index.php?PAGE=$1 [L,QSA]

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-l
# Main URL rewriting.
RewriteRule ^(.*)$ index.php?PAGE=$1 [L,QSA]
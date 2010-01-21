////////////////////////////////////////////////////////////////////////////////
//  __________                       __           _____                        
//  \______   \ ____   ____________ |__| ____    /  _  \_______   ____ _____   
//   |    |  _// __ \ /  ___/\____ \|  |/    \  /  /_\  \_  __ \_/ __ \\__  \  
//   |    |   \  ___/ \___ \ |  |_> >  |   |  \/    |    \  | \/\  ___/ / __ \_
//   |______  /\___  >____  >|   __/|__|___|  /\____|__  /__|    \___  >____  /
//          \/     \/     \/ |__|           \/         \/            \/     \/ 
// =============================================================================
//         Designed and Developed by Brad Jones  <brad @="bjc.id.au" />        
// =============================================================================
// 
// >>> $Id$
// 
////////////////////////////////////////////////////////////////////////////////

>>> TO INSTALL
--------------------------------------------------------------------------------
Simply place the "bespin_area" folder into the plugins folder.
Then login and enable the plugin in the Wolf Interface.

NOTE: You will also need to have this plugin installed.
http://bradswolfplugins.googlecode.com/svn/jquery/

>>> INTRODUCTION
--------------------------------------------------------------------------------
Bespin Area is fairly basic currently but I don't intend on doing too much more
with it untill Mozilla get the Editor Component sorted.

see: http://mozillalabs.com/bespin/2009/11/13/bespin-embedded-first-preview-release/

Untill they get that to some sort of Beta / Rc stage this can stay as it is.

>>> HOW IT WORKS
--------------------------------------------------------------------------------
Currently they way Bespin works is that for all layouts it use HTML Syntax
Highlighting, for Snippets it uses PHP Highlighting and for pages it will use
HTML unless you are using the WolfJs and WolfCss plugins in which it will
pickup on the Page Type and either highlight the js or the css.

Keep in mind though that currently I have not added in any events for the page
type drop down. So if you change it from Css to Js Bespin will not change
highlighting modes untill you save and re-open the page.
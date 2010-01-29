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

>>> INTRODUCTION
================================================================================
Bespin Area is fairly basic currently but I don't intend on doing too much more
with it untill Mozilla get the Editor Component sorted.

see: http://mozillalabs.com/bespin/2009/11/13/bespin-embedded-first-preview-release/

Untill they get that to some sort of Beta / Rc stage this can stay as it is.
Anyway for the most part it does a pretty darn good job.

Currently the way Bespin works is that for all layouts it use HTML Syntax
Highlighting, for Snippets it uses PHP Highlighting and for pages it will use
HTML as well.

It has also got support for my AssetJs and AssetCss plugins and will use the
appropriate highlighting for either a Js or Css Asset.

>>> DEPENDENCIES
================================================================================
This plugin uses jQuery thus you either need to go and install the following
plugin: http://github.com/tuupola/frog_jquery

Or

1. Download the lastest jquery from http://jquery.com/.
2. Add "jQuery.noConflict();" to the very end of the file - without the quotes.
3. Place that in admin/javascripts folder.
4. Add a new script tag into wolf/app/layouts/backend.php

>>> INSTALL
================================================================================
Simply place the "bespin_area" folder into the plugins folder.
Then login and enable the plugin in the Wolf Interface.

>>> KNOWN ISSUES / TODO
================================================================================
Currently as described above I have hardcoded the Syntax Highlighting mode
based on what your editing. It would be nice to have some sort of drop down box
to select the mode.

I would also like to add a few button for FullScreen Mode and the Code
Formatting, thus I guess this means I will eventually create a toolbar
for it.

>>> SUPPORT
================================================================================
Any issues with this plugin please see the google code project.
http://code.google.com/p/bradswolfplugins/

OR

Just email me (brad@bjc.id.au), I am probably more likly to respond.
Knowing me I won't monitor the repository that often.
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

class Css
{
	/**
	 * Method: __construct
	 * =========================================================================
	 * This class will be called everytime a page is requested that has a page
	 * type of Css. At this point we then have complete control of the
	 * request and can do what we like with the data.
	 * 
	 * Paramaters:
	 * -------------------------------------------------------------------------
	 * $page - The page object, same as $this in a layout.
	 * $params - Not really sure what they are yet, I don't use it anyway
	 * 
	 * Returns:
	 * -------------------------------------------------------------------------
	 * void
	 */
	public function __construct($page, $params)
	{
		// Are we in Debug Mode
		if (DEBUG)
		{
			// Lets just output the css as is - no compression
			header('Content-type: text/css');
			foreach ($page->part as $name => $value)
			{
				echo $page->content($name)."\n\n";
			}
		}
		else
		{
			// Lets compress the css
			require('CssMin.php');
			ob_start("ob_gzhandler");
			header('Content-type: text/css');
			foreach ($page->part as $name => $value)
			{
				echo trim(cssmin::minify($page->content($name)));
			}
		}
		
		// We don't want to go any further
		exit;
	}
}
<?php
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

class Javascript
{
	/**
	 * Method: __construct
	 * =========================================================================
	 * This class will be called everytime a page is requested that has a page
	 * type of JavaScript. At this point we then have complete control of the
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
			// Lets just output the js as is - no compression
			header('Content-type: text/javascript');
			foreach ($page->part as $part)
			{
				echo $part->content_html."\n\n";
			}
		}
		else
		{
			// Lets compress the js
			require('JsMin.php');
			ob_start("ob_gzhandler");
			header('Content-type: text/javascript');
			foreach ($page->part as $part)
			{
				echo trim(JSMin::minify($part->content_html));
			}
		}
		
		// We don't want to go any further
		exit;
	}
}
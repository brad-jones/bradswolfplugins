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

// Create us a namespace
var BespinArea = {};

/**
 * Method: Layouts
 * =============================================================================
 * This will add the Bespin Editor for the layouts.
 *
 * Parameters:
 * -----------------------------------------------------------------------------
 * none
 *
 * Returns:
 * -----------------------------------------------------------------------------
 * void
 */
BespinArea.Layouts = function()
{
	// Hide the orginal Text Area
	jQuery('#layout_content').hide();

	// All right lets lets add a div for the editor
	jQuery('#layout_content').after('<div id="bespin_editor"></div>');

	// Set some styles on the div
	jQuery('#bespin_editor').css
	({
		'margin-top':'5px',
		'margin-bottom':'5px',
		'height':'300px'
	});

	// Now lets add the editor
	BespinArea.Editor = new bespin.editor.Component('bespin_editor',
	{
		language: "html",
		loadfromdiv: true,
		set: { strictlines: 'on' }
	});

	// Lets copy the text out of the text area into the bespin editor
	BespinArea.Editor.setContent(jQuery('#layout_content').val());

	// Now we need to attach ourselves to the submit event
	jQuery('#content form').submit(function()
	{
		// Copy the contents of the editor back to the text area
		jQuery('#layout_content').val(BespinArea.Editor.getContent());
	});

	// Add Fullscreen Support
	jQuery(window).bind('keydown', 'Alt+return', function()
	{
		BespinArea.FullScreen(jQuery('#bespin_editor'));
	});

	// Add Formatting Support
	jQuery(window).bind('keydown', 'Alt+c', function()
	{
		BespinArea.Editor.setContent
		(
			jQuery.htmlClean
			(
				BespinArea.Editor.getContent(),
				{ format:true, bodyOnly:false }
			)
		);
	});
};

/**
 * Method: Assets
 * =============================================================================
 * This will add the Bespin Editor for the Js and Css Assets.
 *
 * Parameters:
 * -----------------------------------------------------------------------------
 * none
 *
 * Returns:
 * -----------------------------------------------------------------------------
 * void
 */
BespinArea.Assets = function()
{
	// Hide the orginal Text Area
	jQuery('#asset_content').hide();

	// All right lets lets add a div for the editor
	jQuery('#asset_content').after('<div id="bespin_editor"></div>');

	// Set some styles on the div
	jQuery('#bespin_editor').css
	({
		'margin-top':'5px',
		'margin-bottom':'5px',
		'height':'300px'
	});

	if (jQuery('#assetjs').size() > 0) var lang = 'js';
	if (jQuery('#assetcss').size() > 0) var lang = 'css';

	// Now lets add the editor
	BespinArea.Editor = new bespin.editor.Component('bespin_editor',
	{
		language: lang,
		loadfromdiv: true,
		set: { strictlines: 'on' }
	});

	// Lets copy the text out of the text area into the bespin editor
	BespinArea.Editor.setContent(jQuery('#asset_content').val());

	// Now we need to attach ourselves to the submit event
	jQuery('#content form').submit(function()
	{
		// Copy the contents of the editor back to the text area
		jQuery('#asset_content').val(BespinArea.Editor.getContent());
	});

	// Add Fullscreen Support
	jQuery(window).bind('keydown', 'Alt+return', function()
	{
		BespinArea.FullScreen(jQuery('#bespin_editor'));
	});

	// Add Formatting Support
	jQuery(window).bind('keydown', 'Alt+c', function()
	{
		BespinArea.Editor.setContent
		(
			jQuery.htmlClean
			(
				BespinArea.Editor.getContent(),
				{ format:true, bodyOnly:false }
			)
		);
	});
};

/**
 * Method: Snippet
 * =============================================================================
 * This will add the Bespin Editor for the snippets.
 *
 * Parameters:
 * -----------------------------------------------------------------------------
 * none
 *
 * Returns:
 * -----------------------------------------------------------------------------
 * void
 */
BespinArea.Snippet = function()
{
	// Run this function if the select box changes
	jQuery('#snippet_filter_id').change(BespinArea.Snippet);

	if (jQuery('#snippet_filter_id').val() == 'bespin_area')
	{
		// Hide the orginal Text Area
		jQuery('#snippet_content').hide();

		// All right lets lets add a div for the editor
		jQuery('#snippet_content').after('<div id="bespin_editor"></div>');

		// Set some styles on the div
		jQuery('#bespin_editor').css
		({
			'margin-top':'5px',
			'margin-bottom':'5px',
			'height':'300px'
		});

		// Now lets add the editor
		BespinArea.Editor = new bespin.editor.Component('bespin_editor',
		{
			language: "php",
			loadfromdiv: true,
			set: { strictlines: 'on' }
		});

		// Lets copy the text out of the text area into the bespin editor
		BespinArea.Editor.setContent(jQuery('#snippet_content').val());

		// Now we need to attach ourselves to the submit event
		jQuery('#content form').submit(function()
		{
			// Copy the contents of the editor back to the text area
			jQuery('#snippet_content').val(BespinArea.Editor.getContent());
		});

		// Add Fullscreen Support
		jQuery(window).bind('keydown', 'Alt+return', function()
		{
			BespinArea.FullScreen(jQuery('#bespin_editor'));
		});

		// Add Formatting Support
		jQuery(window).bind('keydown', 'Alt+c', function()
		{
			BespinArea.Editor.setContent
			(
				jQuery.htmlClean
				(
					BespinArea.Editor.getContent(),
					{ format:true, bodyOnly:false }
				)
			);
		});
	}
	else
	{
		if (jQuery('#bespin_editor').size() > 0)
		{
			// Copy the contents of the editor back to the text area
			jQuery('#snippet_content').val(BespinArea.Editor.getContent());

			// UnHide The TextArea
			if (jQuery('#snippet_filter_id').val() != 'tinymce')
			{
				jQuery('#snippet_content').show();
			}

			// Remove the Bespin Editor
			jQuery('#bespin_editor').remove();
		}
	}
};

/**
 * Method: Pages
 * =============================================================================
 * This will add the Bespin Editor for the pages.
 *
 * Parameters:
 * -----------------------------------------------------------------------------
 * none
 *
 * Returns:
 * -----------------------------------------------------------------------------
 * void
 */
BespinArea.Pages = function()
{
	// Run this function when any of the filters change on any of the tabs.
	jQuery("select[id$='filter_id']").change(BespinArea.Pages);

	// When ever the tabs are changed we need to run this function as well
	jQuery('#tabs a.tab').click(BespinArea.Pages);

	// Find out which tab is active
	var active_tab = jQuery('div.page:visible').attr('id');

	// Work out if Bespin is Selected
	if (jQuery('#' + active_tab + ' select').val() == 'bespin_area')
	{
		// Work out if Bespin has already been activated on this tab
		if (jQuery('#bespin_editor_' + active_tab).size() == 0)
		{
			// Hide the orginal Text Area
			jQuery('#' + active_tab + ' textarea').hide();

			// All right lets lets add a div for the editor
			jQuery('#' + active_tab + ' textarea').after('<div id="bespin_editor_' + active_tab + '"></div>');

			// Set some styles on the div
			jQuery('#bespin_editor_' + active_tab).css
			({
				'margin-top':'5px',
				'margin-bottom':'5px',
				'height':'300px'
			});

			// Work out what sort of language to use
			var language;
			jQuery("select[id$='page_behavior_id'] option:selected").each(function()
			{
				switch (jQuery(this).attr('value'))
				{
					case 'Css': language = 'css'; break;
					case 'Javascript': language = 'js'; break;
					default: language = 'html';
				}
			});

			// Now lets add the editor
			BespinArea.Editor[active_tab] = new bespin.editor.Component('bespin_editor_' + active_tab,
			{
				language: language,
				loadfromdiv: true,
				set: { strictlines: 'on' }
			});

			// Lets copy the text out of the text area into the bespin editor
			BespinArea.Editor[active_tab].setContent(jQuery('#' + active_tab + ' textarea').val());

			// Now we need to attach ourselves to the submit event
			jQuery('#content form').submit(function()
			{
				// Copy the contents of the editor back to the text area
				jQuery('#' + active_tab + ' textarea').val(BespinArea.Editor[active_tab].getContent());
			});
		}
	}
	else
	{
		if (jQuery('#bespin_editor_' + active_tab).size() > 0)
		{
			// Copy the contents of the editor back to the text area
			jQuery('#' + active_tab + ' textarea').val(BespinArea.Editor[active_tab].getContent());

			// UnHide The TextArea
			if (jQuery('#' + active_tab + ' select').val() != 'tinymce')
			{
				jQuery('#' + active_tab + ' textarea').show();
			}

			// Remove the Bespin Editor
			jQuery('#bespin_editor_' + active_tab).remove();
		}
	}

	// Add Fullscreen Support - we only want to do it once.
	if (BespinArea.FullScreenBound == false)
	{
		BespinArea.FullScreenBound = true;
		jQuery(window).bind('keydown', 'Alt+return', function()
		{
			BespinArea.FullScreen
			(
				jQuery('#bespin_editor_' + jQuery('div.page:visible').attr('id'))
			);
		});

		// Add Formatting Support
		jQuery(window).bind('keydown', 'Alt+c', function()
		{
			BespinArea.Editor[jQuery('div.page:visible').attr('id')].setContent
			(
				jQuery.htmlClean
				(
					BespinArea.Editor[jQuery('div.page:visible').attr('id')].getContent(),
					{ format:true, bodyOnly:false }
				)
			);
		});
	}
};

/**
 * Method: FullScreen
 * =============================================================================
 * This will make the editor go full screen
 *
 * Parameters:
 * -----------------------------------------------------------------------------
 * element - The Element to Increase in Size and make appear over everthing else.
 *
 * Returns:
 * -----------------------------------------------------------------------------
 * void
 */
BespinArea.FullScreen = function(element)
{
	// Are we in FullScreen or Not
	if (BespinArea.FullScreenMode == false)
	{
		// Make sure there are no scrollbars
		jQuery('body').css('overflow', 'hidden');

		// Make the editor full size
		element.css
		({
			'height':jQuery(window).height(),
			'width':jQuery(window).width(),
			'position':'absolute',
			'top':'0px',
			'left':'0px',
			'margin':'0px',
			'z-index':'9999'
		});

		// We are now in full screen mode
		BespinArea.FullScreenMode = true;
	}
	else
	{
		// Remove Previous Styles
		element.removeAttr('style');

		// Add the default styles
		element.css
		({
			'margin-top':'5px',
			'margin-bottom':'5px',
			'height':'300px'
		});

		// Add our scrollbars back
		jQuery('body').css('overflow', 'auto');

		// We are now not in full screen mode
		BespinArea.FullScreenMode = false;
	}
};

// Used by the Pages Functions
BespinArea.FullScreenBound = false;

// Are we in FullScreen or Not
BespinArea.FullScreenMode = false;

// Boot our Editor Up
jQuery(document).ready(function()
{
	// Take care of the Layouts
	if (jQuery('#layout_content').size() > 0) BespinArea.Layouts();

	// Take care of our Js and Css Assets
	if (jQuery('#asset_content').size() > 0) BespinArea.Assets();

	// Take care of the Snippets
	if (jQuery('#snippet_content').size() > 0) BespinArea.Snippet();

	// Take care of the Pages
	if (jQuery('#part_0_content').size() > 0)
	{
		// We could end up with multiple editors
		BespinArea.Editor = {};
		BespinArea.Pages();
	}
});
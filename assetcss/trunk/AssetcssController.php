<?php
////////////////////////////////////////////////////////////////////////////////
//           _____                        __   _________
//          /  _  \   ______ ______ _____/  |_ \_   ___ \  ______ ______
//         /  /_\  \ /  ___//  ___// __ \   __\/    \  \/ /  ___//  ___/
//        /    |    \\___ \ \___ \\  ___/|  |  \     \____\___ \ \___ \
//        \____|__  /____  >____  >\___  >__|   \______  /____  >____  >
//               \/     \/     \/     \/              \/     \/     \/
// =============================================================================
//         Designed and Developed by Brad Jones  <brad @="bjc.id.au" />
// =============================================================================
//
// >>> $Id$
//
////////////////////////////////////////////////////////////////////////////////

class AssetcssController extends PluginController
{
	/**
	 * Method: __construct
	 * =========================================================================
	 * This will make sure the user is logged in, has the right permissions,
	 * etc. If however this is being called by the frontend we don't bother
	 * with all that...
	 * 
	 * Parameters:
	 * -------------------------------------------------------------------------
	 * none
	 * 
	 * Returns:
	 * -------------------------------------------------------------------------
	 * void
	 */
	public function __construct()
	{
		if (defined('CMS_BACKEND'))
		{
			// Make sure the user is logged in
			AuthUser::load(); if (!AuthUser::isLoggedIn()) redirect(get_url('login'));
			
			// Make sure the user has the correct permissions
			if (!AuthUser::hasPermission('administrator') && !AuthUser::hasPermission('developer'))
			{
				Flash::set('error', __('You do not have permission to access the requested page!'));
				redirect(get_url());
			}
			
			// Add this plugin to the backend interface
			$this->setLayout('backend');
			$this->assignToLayout('sidebar', new View('../../plugins/assetcss/views/sidebar'));
		}
    }

	/**
	 * Method: index
	 * =========================================================================
	 * This will list the current javascript assets in the database.
	 *
	 * Parameters:
	 * -------------------------------------------------------------------------
	 * none
	 *
	 * Returns:
	 * -------------------------------------------------------------------------
	 * void
	 */
    public function index()
	{
		$this->display('assetcss/views/list', array(
            'assets' => Record::findAllFrom('Assetcss', '1=1 ORDER BY position')
        ));
    }

	/**
	 * Method: add
	 * =========================================================================
	 * This will add a new javascript asset to the db.
	 *
	 * Parameters:
	 * -------------------------------------------------------------------------
	 * none
	 *
	 * Returns:
	 * -------------------------------------------------------------------------
	 * void
	 */
    public function add()
	{
        // Check if trying to save
        if (get_request_method() == 'POST')
        {
			// Grab the POST Data
			$data = $_POST['asset'];
			Flash::set('post_data', (object) $data);

			// Create a new asset object
			$asset = new Assetcss($data);

			// Save the asset
			if (!$asset->save())
			{
				Flash::set('error', __('Asset has not been added. Name must be unique!'));
				redirect(get_url('plugin/assetcss', 'add'));
			}
			else
			{
				Flash::set('success', __('Asset has been added!'));
				Observer::notify('assetcss_after_add', $asset);
			}

			// Save and quit or save and continue editing?
			if (isset($_POST['commit'])) redirect(get_url('plugin/assetcss'));
			else redirect(get_url('plugin/assetcss/edit/'.$asset->id));
        }
        else
        {
			// Check if user have already enter something
			$asset = Flash::get('post_data');

			// Otherwise create a new asset
			if (empty($asset)) $asset = new Assetcss();

			// Output the edit page
			$this->display('assetcss/views/edit', array
			(
				'action'  => 'add',
				'asset' => $asset
			));
        }
    }

	/**
	 * Method: edit
	 * =========================================================================
	 * This will edit a javascript asset already in the db.
	 *
	 * Parameters:
	 * -------------------------------------------------------------------------
	 * $id - The row id of the asset
	 *
	 * Returns:
	 * -------------------------------------------------------------------------
	 * void
	 */
	public function edit($id)
	{
		// Grab the asset
		if (!$asset = Assetjs::findById($id))
		{
			Flash::set('error', __('Asset not found!'));
			redirect(get_url('plugin/assetcss'));
		}

		// Check if trying to save
		if (get_request_method() == 'POST')
		{
			// Get the new asset data
			$data = $_POST['asset']; $data['id'] = $id;
			$asset = new Assetcss($data);

			// Save the asset
			if ( ! $asset->save())
			{
				Flash::set('error', __('Asset :name has not been saved. Name must be unique!', array(':name'=>$asset->name)));
				redirect(get_url('plugin/assetcss/edit/'.$id));
			}
			else
			{
				Flash::set('success', __('Asset :name has been saved!', array(':name'=>$asset->name)));
				Observer::notify('assetcss_after_edit', $asset);
			}

			// Save and quit or Save and continue editing?
			if (isset($_POST['commit'])) redirect(get_url('plugin/assetcss'));
			else redirect(get_url('plugin/assetscs/edit/'.$id));
		}
		else
		{
			$this->display('assetcss/views/edit', array
			(
				'action'  => 'edit',
				'asset' => $asset
			));
		}
    }

	/**
	 * Method: delete
	 * =========================================================================
	 * This will delete a javascript asset from the db.
	 *
	 * Parameters:
	 * -------------------------------------------------------------------------
	 * $id - The row id of the asset
	 *
	 * Returns:
	 * -------------------------------------------------------------------------
	 * void
	 */
    public function delete($id)
	{
		// Find the asset to delete
		if ($asset = Record::findByIdFrom('Assetcss', $id))
		{
			// Delete it
			if ($asset->delete())
			{
				Flash::set('success', __('Asset :name has been deleted!', array(':name'=>$asset->name)));
				Observer::notify('assetcss_after_delete', $asset);
			}
			else
			{
				Flash::set('error', __('Asset :name has not been deleted!', array(':name'=>$asset->name)));
			}
		}
		else
		{
			Flash::set('error', __('Asset not found!'));
		}

		// Refresh the List
		redirect(get_url('plugin/assetcss'));
    }
	
	/**
	 * Method: reorder
	 * =========================================================================
	 * This will re-order the assets in the list
	 *
	 * Parameters:
	 * -------------------------------------------------------------------------
	 * none
	 *
	 * Returns:
	 * -------------------------------------------------------------------------
	 * void
	 */
	public function reorder()
	{
        parse_str($_POST['data']);

        foreach ($assets as $position => $asset_id)
		{
            $asset = Record::findByIdFrom('Assetcss', $asset_id);
            $asset->position = (int) $position + 1;
            $asset->save();
        }
    }

	/**
	 * Method: output
	 * =========================================================================
	 * This is called by the frontend and will output a javascript asset.
	 * You may also provide a csv list of asset names and we will joing them
	 * altogether and output it as one big asset.
	 *
	 * When Wolf is in DEBUG mode we will not output the compressed versions.
	 * But when DEBUG is set to false we output the pre - compressed versions
	 * as well as gzipping them.
	 *
	 * Parameters:
	 * -------------------------------------------------------------------------
	 * $name - The name of the asset to output or a csv list of assets
	 *
	 * Returns:
	 * -------------------------------------------------------------------------
	 * void
	 */
	public function output($name)
	{
		// This is what we will output
		$output = '';

		// Do we have a list
		if (strpos($name, ',')) $assets = explode(',', $name);
		else $assets = array($name);

		// Loop through the assets
		foreach ($assets as $asset_name)
		{
			// Find the asset
			$asset = Assetjs::find(array
			(
				'where' => 'assetcss.name = "'.$asset_name.'"',
				'limit' => 1
			));

			// Make sure we got an asset
			if ($asset)
			{
				// Compressed our Standard?
				if (DEBUG)
				{
					$output .=
						"\n\n/* ##### START: ".$asset_name." ##### */\n\n".
						$asset->content.
						"\n\n/* ##### END: ".$asset_name." ##### */\n\n"
					;
				}
				else
				{
					$output .= trim($asset->content_compressed);
				}
			}
		}

		// Gzipped?
		if (!DEBUG) ob_start("ob_gzhandler");
		
		// Output it
		header('Content-type: text/css;'); echo $output;

		// We don't need to go any further
		exit;
	}
}
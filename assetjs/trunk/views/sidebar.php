<?php
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

/*
 * This outputs the side menu for this plugin.
 * Nothing too special really...
 */
?>

<?php /* Add Javascript */ ?>
<p class="button">
	<a href="<?php echo URI_PUBLIC; ?>admin/plugin/assetjs/add">
		<img src="<?php echo URI_PUBLIC; ?>wolf/plugins/assetjs/images/page.png" align="middle" alt="" />
		Add Javascript
	</a>
</p>

<?php /* About Info */ ?>
<div class="box">
	<h2>Designed and Developed by <a href="mailto:brad@bjc.id.au">Brad Jones</a></h2>
    <p>
		v<?php echo Plugin::$plugins_infos['assetjs']->version; ?>,
		Last Updated: <?php echo Plugin::$plugins_infos['assetjs']->last_update; ?>
	</p>
	<p>
		<a href="<?php echo Plugin::$plugins_infos['assetjs']->website; ?>"><?php echo Plugin::$plugins_infos['assetjs']->website; ?></a>
	</p>
</div>
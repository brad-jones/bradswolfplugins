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

/*
 * This outputs the side menu for this plugin.
 * Nothing too special really...
 */
?>

<?php /* Add Css */ ?>
<p class="button">
	<a href="<?php echo URI_PUBLIC; ?>admin/plugin/assetcss/add">
		<img src="<?php echo URI_PUBLIC; ?>wolf/plugins/assetcss/images/page.png" align="middle" alt="" />
		Add Stylesheet
	</a>
</p>

<?php /* About Info */ ?>
<div class="box">
	<h2>Designed and Developed by <a href="mailto:brad@bjc.id.au">Brad Jones</a></h2>
	<p>
		v<?php echo Plugin::$plugins_infos['assetcss']->version; ?>,
		Last Updated: <?php echo Plugin::$plugins_infos['assetcss']->last_update; ?>
	</p>
	<p>
		<a href="<?php echo Plugin::$plugins_infos['assetcss']->website; ?>"><?php echo Plugin::$plugins_infos['assetcss']->website; ?></a>
	</p>
</div>
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
?>

<h1>Javascript Assets</h1>

<div id="site-map-def" class="index-def">
    <div>Javascript (<a href="#" onclick="$$('.handle').each(function(e) { e.style.display = e.style.display != 'inline' ? 'inline': 'none'; }); return false;"><?php echo __('reorder'); ?></a>)</div>
    <div class="modify"><?php echo __('Modify'); ?></div>
</div>

<ul id="assets" class="index">
    <?php foreach($assets as $asset): ?>
    <li id="asset_<?php echo $asset->id; ?>" class="node <?php echo odd_even(); ?>">
        <img align="middle" alt="asset-icon" src="<?php echo URI_PUBLIC; ?>wolf/plugins/assetjs/images/page.png" />
        <a href="<?php echo get_url('plugin/assetjs/edit/'.$asset->id); ?>"><?php echo $asset->name; ?></a>
        <img class="handle" src="../images/drag.gif" alt="<?php echo __('Drag and Drop'); ?>" align="middle" />
        <div class="remove"><a class="remove" href="<?php echo get_url('plugin/assetjs/delete/'.$asset->id); ?>" onclick="return confirm('<?php echo __('Are you sure you wish to delete'); ?> <?php echo $asset->name; ?>?');"><img src="../images/icon-remove.gif" alt="remove icon" /></a></div>
    </li>
    <?php endforeach; ?>
</ul>

<script type="text/javascript" language="javascript" charset="utf-8">
Sortable.create('assets', {
    constraint: 'vertical',
    scroll: window,
    handle: 'handle',
    onUpdate: function() {
        new Ajax.Request('<?php echo get_url('plugin/assetjs/reorder'); ?>', {method: 'post', parameters: {data: Sortable.serialize('assets')}});
    }
});
</script>
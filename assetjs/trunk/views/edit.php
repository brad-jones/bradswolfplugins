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
<h1><?php echo __(ucfirst($action).' javascript asset'); ?></h1>
<form action="<?php echo $action=='edit' ? get_url('plugin/assetjs/edit/'.$asset->id): get_url('plugin/assetjs/add'); ; ?>" method="post">
	<div class="form-area">
		<h3><?php echo __('Name'); ?></h3><br />
		<div id="meta-pages" class="pages">
			<p class="title" style="padding:0px;">
				<input
					class="textbox"
					id="asset_name"
					maxlength="100"
					name="asset[name]"
					size="255"
					type="text"
					value="<?php echo $asset->name; ?>"
				/>
			</p>
		</div><br />
		<h3><?php echo __('Body'); ?></h3><br />
		<div id="pages" class="pages">
			<div id="assetjs" class="page" style="">
				<textarea
					class="textarea"
					cols="40"
					id="asset_content"
					name="asset[content]"
					rows="20"
					style="width: 100%"
					onkeydown="return allowTab(event, this);"
					onkeyup="return allowTab(event,this);"
					onkeypress="return allowTab(event,this);"
				><?php echo htmlentities($asset->content, ENT_COMPAT, 'UTF-8'); ?></textarea>
				<?php if (isset($asset->updated_on)): ?>
				<p style="clear: left"><small><?php echo __('Last updated by'); ?> <?php echo $asset->updated_by_name; ?> <?php echo __('on'); ?> <?php echo date('D, j M Y', strtotime($asset->updated_on)); ?></small></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<p class="buttons">
		<input class="button" name="commit" type="submit" accesskey="s" value="<?php echo __('Save'); ?>" />
		<input class="button" name="continue" type="submit" accesskey="e" value="<?php echo __('Save and Continue Editing'); ?>" />
		<?php echo __('or'); ?> <a href="<?php echo get_url('plugin/assetjs'); ?>"><?php echo __('Cancel'); ?></a>
	</p>
</form>
<script type="text/javascript">
// <![CDATA[
	document.getElementById('asset_name').focus();
// ]]>
</script>
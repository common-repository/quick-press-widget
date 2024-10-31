<?php
$user			= get_userdata( $current_user->ID );
?>

<li>
<h2>Quick Press</h2>
<div id="postbox" style="background-color:#EEE; padding: 15px; margin: 5px 0px; -moz-border-radius: 10px; -khtml-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px;" >
	<form id="new_post" name="new_post" method="post" action="<?php bloginfo( 'url' ); ?>/">
		<input type="hidden" name="action" value="post" />
		<?php wp_nonce_field( 'new-post' ); ?>
		<label for="title">Post Title:</label>
		<br />
		<input type="text" name="title" id="title" style="width:95%; height: 25px; border: 1px solid #99afbc; margin: 5px 0 10px 0;" />
		<br />
		<label for="posttext">Hi! Whatcha up to?</label>
		<br />
		<textarea name="posttext" id="posttext" rows="3" style="width:95%; height: 80px; border: 1px solid #99afbc; margin: 5px 0 10px 0;" ></textarea>
	  <br />
		<label for="tags">Tag it?</label>
		<br />
		<input type="text" name="tags" id="tags" style="width:95%; height: 25px; border: 1px solid #99afbc; margin: 5px 0 10px 0;" />
		<br />
		<input id="submit" type="submit" value="Post it" style="background-color: #DDD; border: 1px solid #333; color: #333; font-weight: bold; padding: 5px 8px;" />
	</form>
</div> <!-- // postbox -->

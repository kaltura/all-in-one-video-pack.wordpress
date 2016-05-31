<?php KalturaHelpers::protectView( $this ); ?>
<?php if (isset($this->redirectUrl)): ?>
	<script type="text/javascript">
		window.location.href = <?php echo wp_json_encode( $this->redirectUrl ); ?>;
	</script>
<?php else: ?>
	<div class="form-wrap kaltura-form kaltura-edit-entry-form">
		<form method="post" action="<?php echo esc_url_raw($this->formUrl); ?>" class="validate">
			<div class="form-field form-required entry-title-wrap">
				<label for="entry-title">Title</label>
				<input name="entry-title" id="entry-title" value="<?php echo esc_attr($this->entry->name); ?>" size="40" aria-required="true" type="text">
			</div>
			<div class="form-field entry-description-wrap">
				<label for="entry-description">Description</label>
				<textarea name="entry-description" id="entry-description" rows="5" cols="40"><?php echo esc_textarea($this->entry->description); ?></textarea>
			</div>
			<p class="submit">
				<input name="submit" id="submit" class="button button-primary" value="Save" type="submit">
			</p>
		</form>
	</div>
<?php endif; ?>
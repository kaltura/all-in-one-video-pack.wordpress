<?php KalturaHelpers::protectView($this); ?>
<div class="error">
	<p>
		<strong>Your connection has failed to reach the Kaltura servers. Please check if your web host blocks outgoing connections and then retry.</strong>
		<?php if (isset($this->errorDesc)): ?>
			<?php echo $this->errorDesc; ?>
		<?php endif; ?>
	</p>
</div>
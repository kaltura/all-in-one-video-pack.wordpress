<?php
$kaction = isset($_GET['kaction']) ? $_GET['kaction'] : 'library';

$menu = array(
	"Entries" => array('kaction' => 'entries', 'screen' => null, 'paged' => null),
	"Mixes" => array('kaction' => 'mixes', 'screen' => null, 'paged' => null),
	"Video Posts" => array('kaction' => 'videoposts', 'paged' => null),
)
?>
<ul class="subsubsub">
	<?php $count = count($menu); $i = 1; ?>
	<?php foreach($menu as $name => $params): ?>
		<?php 
			$last = ($i++ >= $count);
			if ($params['kaction'] == $kaction)
				$current = 'class="current" ';
			else
				$current = ''; 
		?>
		<li>
			<a <?php echo $current; ?>href="<?php echo add_query_arg($params); ?>"><?php echo $name; ?></a>
			<?php if (!$last): ?>
			|
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
</ul>
<table id="kalturaCmsLogin">
	<tr class="kalturaFirstRow">
		<th align="left"><?php _e('Partner ID'); ?>:</th>
		<td style="padding-right: 90px;"><strong><?php echo get_option("kaltura_partner_id"); ?></strong></td>
	</tr>
	<tr>
		<th align="left"><?php _e('KMC username'); ?>:</th>
		<td style="padding-right: 90px;"><strong><?php echo get_option("kaltura_cms_user"); ?></strong></td>
	</tr>
	<tr class="kalturaLastRow">
		<td colspan="2" align="left" style="padding-top: 10px;padding-left:10px">
			<a href="http://www.kaltura.com/index.php/kmc" target="_blank">Login</a> to the Kaltura Management Console (KMC) for advanced <br />media management<br />
			Learn More about <a href="http://wordpress.kaltura.org/" target="_blank">new plugin features</a>
		</td>
	</tr>
</table>
<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

?>
<div class="span8">
	<h2><?php echo $profile['organization']?></h2>
	<hr />
	<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ut tincidunt sem. Nulla facilisis eros at nisl semper pellentesque. Vivamus sed nisl at nibh dapibus tincidunt at eget nibh. Aliquam commodo arcu vel risus suscipit venenatis. Ut at nibh leo. Nullam at felis ut eros elementum porttitor. Maecenas sit amet congue libero. Quisque sollicitudin tempus rhoncus. Vivamus quis felis justo, non rhoncus tellus.
	</p>
	<?php if(!empty($profile['website'])):?>
		<a href="<?php $profile['website']?>" class="btn btn-success btn-small btn-info">Website</a>
	<?php endif?>
	<?php if(!empty($profile['blog'])):?>
	<a href="<?php $profile['blog']?>" class="btn btn-success btn-info btn-small">Blog</a>
	<?php endif?>
	<?php if(!empty($profile['facebook'])):?>
	<a href="<?php $profile['facebook']?>" class="btn btn-success btn-info btn-small">Facebook</a>
	<?php endif?>
	<?php if(!empty($profile['twitter'])):?>
	<a href="<?php $profile['website']?>" class="btn btn-success btn-info btn-small">Twitter</a>
	<?php endif?>
</div>
<div class="span4">
	<div class="well">
		<h5>Profile Information</h5>
		
		<table class="table">
			<tr>
				<td colspan="2" style="text-align:center">
					<img src="images/Profile-Placeholder.png" width="200" />
				</td>
			</tr>
			<tr>
				<td><strong>Organization Name</strong></td>
				<td><?php echo $profile['organization']?></td>
			</tr>
			<tr>
				<td><strong>Province</strong></td>
				<td><?php echo $profile['province']?></td>
			</tr>
			<tr>
				<td><strong>Street Address</strong></td>
				<td><?php echo $profile['street_address']?></td>
			</tr>
			<tr>
				<td><strong>Focus Area</strong></td>
				<td>
					<ul class="unstyled">
						<?php 
		  				$focus = unserialize($profile['focus_area']);
		  				foreach($focus as $row){
		  					echo '<li>'.$row.'</li>';
		  				}
		  			?>
					</ul>
				</td>
			</tr>
			<tr>
				<td><strong>View</strong></td>
				<td><?php echo $counter['counter']?></td>
			</tr>
		</table>
	</div>
</div>
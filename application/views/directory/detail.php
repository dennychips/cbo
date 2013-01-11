<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

?>
<div class="grid_8">
	<h2 class="short_headline"><span><?php echo $profile['organization']?></span></h2>
	<hr />
	<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ut tincidunt sem. Nulla facilisis eros at nisl semper pellentesque. Vivamus sed nisl at nibh dapibus tincidunt at eget nibh. Aliquam commodo arcu vel risus suscipit venenatis. Ut at nibh leo. Nullam at felis ut eros elementum porttitor. Maecenas sit amet congue libero. Quisque sollicitudin tempus rhoncus. Vivamus quis felis justo, non rhoncus tellus.
	</p>
	<?php if(!empty($profile['website'])):?>
		<a href="<?php echo $profile['website']?>" class="btn btn-success btn-small btn-info">Website</a>
	<?php endif?>
	<?php if(!empty($profile['blog'])):?>
	<a href="<?php echo $profile['blog']?>" class="btn btn-success btn-info btn-small">Blog</a>
	<?php endif?>
	<?php if(!empty($profile['facebook'])):?>
	<a href="<?php echo $profile['facebook']?>" class="btn btn-success btn-info btn-small">Facebook</a>
	<?php endif?>
	<?php if(!empty($profile['twitter'])):?>
	<a href="<?php echo $profile['twitter']?>" class="btn btn-success btn-info btn-small">Twitter</a>
	<?php endif?>
	<br /><br />
	<?php if(!empty($documents)):  ?>
	<h4 class="short_headline">
		<span>Documents</span>
	</h4>
	<?php 
		
	?>
	<table class="table">
		<thead>
			<th>Title</th>
			<th width="20%">Document</th>
		</thead>
		<tbody>
			<?php foreach($documents as $row ): ?>
			<tr>
				<td><?php echo $row->file_name ?></td>
				<td><?php echo anchor('cbodirectory/download/'.$row->id, '<i class="icon-download-alt icon-white"></i> Download', 'class="btn btn-primary btn-small"')?></td>
			</tr>
			<?php endforeach;?>
		</tbody>	
	</table>
	<?php endif?>
	<h4 class="short_headline">
		<span>Recents Uploads</span>
	</h4>
		<table id="recent-upload-table" class="table table-hover">
		  <thead>
		    <tr>
		      <th style="width:35%">Title</th>
		      <th style="width:15%">Author</th>
		      <th style="width:10%">Date</th>
		      <th style="width:10%">Format</th>
		      <th style="width:15%">Document Type</th>
		      <th style="width:20%">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  </tbody>
		</table>
	<input type="hidden" id="profile-recent-uploads-url" name="profile-recent-uploads-url" value="<?php echo site_url('cbodirectory/profile_recent_uploads/'. $profile_id) ?>">
</div>

<aside class="grid_4 right-sidebar">
	<div class="well">
		<h5 class="short_headline"><span>Profile Information</span></h5>
		<table class="table">
			<tr>
				<td colspan="2" style="text-align:center">
					<?php if($profile['profile_image'] !== NULL) :?>
						<img style="display:inline" src="<?php echo $profile['profile_image']?>" width="200" align="center" />
					<?php else : ?>
						<img style="display:inline" src="images/Profile-Placeholder.png" width="200" align="center" />
					<?php endif;?>
				</td>
			</tr>
			<tr>
				<td><strong>Organization Name</strong></td>
				<td><?php echo $profile['organization']?></td>
			</tr>
			<?php if(!empty($profile['organization_email'])) :?>
			<tr>
				<td><strong>Email</strong></td>
				<td><?php echo $profile['organization_email']?></td>
			</tr>
			<?php endif;?>
			<tr>
				<td><strong>Country</strong></td>
				<td><?php echo $profile['country']?></td>
			</tr>
			<tr>
				<td><strong>Province</strong></td>
				<td><?php echo $profile['province']?></td>
			</tr>
			<tr>
				<td><strong>City</strong></td>
				<td><?php echo $profile['city']?></td>
			</tr>
			<!-- <tr>
				<td><strong>Street Address</strong></td>
				<td><?php echo $profile['street_address']?></td>
			</tr> -->
			<?php if(!empty($profile['phone_number'])) :?>
			<tr>
				<td><strong>Phone Number</strong></td>
				<td><?php echo $profile['phone_number']?></td>
			</tr>
			<?php endif;?>
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
</aside>
<div class="row-fluid">
<div class="span8">

</div>
<div class="span4">
	
</div>
</div>
<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
?>

<div class="well">
	<h4>Manage Document</h4>
	<hr />
	<table id="manage_doc" class="manage_doc table table-bordered table-hover">
		<thead>
			<th>Title</th>
			<th>Format</th>
			<th>Type</th>
			<th>Modified</th>
			<th>Created</th>
			<th>Action</th>
		</thead>
		<tbody></tbody>
	</table>
	<input type="hidden" id="getdocument" value="<?php echo site_url('elibrary/getdocument')?>">
	<input type="hidden" name="user-index-recent" id="user-index-recent" value="<?php echo secure_site_url('user/recent_document/')?>" />
</div>
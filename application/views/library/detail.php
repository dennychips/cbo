<div class="grid_8">
<h2 class="border-b"><?php echo $document->title?></h2>
<hr />
	
	<!-- <div class="entry-tags"> Tags:<br class="clear" />
		<a href="#">people</a> <a href="#">open source</a> <a href="#">indie thought</a> <a href="#">goodness</a>
	</div> -->
	<!-- <div class="clearfix"></div> -->
	<!-- <br /> -->
	<?php echo $document->description?>
	<div class="clearfix"></div>
	<!--close entry-tags-->
	<?php if($document->link !== '') :?>
	<a href="<?php echo $document->link?>" target="_blank" class="btn btn-info btn-small">Visit <i class="icon-share icon-white"></i></a>
	<?php endif?>
	<?php if($document->doctype !== NULL) :?>
	<!-- <a href="<?php echo $document->file_path ?>" class="btn btn-success btn-info btn-small">Download</a> -->
	<?php echo anchor('elibrary/download/'. $document->lib_id, 'Download <i class="icon-download-alt icon-white"></i>', 'class="btn btn-small btn-info"' )?>
	<?php endif?>
	<a href="<?php echo site_url('elibrary/publisher/'. $document->user_id)?>" class="btn btn-info btn-small"><i class="icon-chevron-right icon-white"></i> View All Shared Document</a>
	<br /><br />

	<?php /*<h4 class="short_headline"><span>Related Documents</span></h4>
	<ul class="navigation">
		<?php if(!empty($related)): ?>
			<?php foreach ($related as $row) {
				echo '<li>'.anchor('elibrary/view/'.$row->id, $row->title).'</li>';
			}?>
		<?php else :?>
		<li> <a href="#"> Lorem ipsum dolor sit amet </a> </li>
		<?php endif; ?>
	</ul>
	*/?>
</div>

<aside class="grid_4 right-sidebar">
	<div class="well">
		<h5 class="short_headline"><span>Information</span></h5>
		<table class="table infotable">
			<tr>
				<td><strong>Author</strong></td>
				<td><?php echo $document->author ?></td>
			</tr>
			<tr>
				<td><strong>Uploader</strong></td>
				<td><a href="<?php echo site_url('cbodirectory/view/'.$document->user_id)?>"><?php echo $document->organization ?></a></td>
			</tr>
			<?php if($document->doctype !== NULL) :?>
			<tr>
				<td><strong>File Size</strong></td>
				<td><?php echo format_size($document->file_size)?></td>
			</tr>
			<?php endif?>
			<tr>
				<td><strong>Date</strong></td>
				<td><?php echo date('F j, Y, g:i a', $document->modified)?></td>
			</tr>
			<tr>
				<td><strong>Type</strong></td>
				<td><?php echo $document->category_name?></td>
			</tr>
			<?php if($document->doctype !== NULL) :?>
			<tr>
				<td><strong>Downloads</strong></td>
				<td><?php echo $document->counter?></td>
			</tr>
			<?php endif?>
			<tr>
				<td><strong>View</strong></td>
				<td><?php echo $document->view_counter?></td>
			</tr>
		</table>
	</div>
</aside>
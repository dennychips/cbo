<div class="row-fluid">
<div class="span8">
	<h2 class="border-b"><?php echo $document->title?></h2>
	
	<!-- <div class="entry-tags"> Tags:<br class="clear" />
		<a href="#">people</a> <a href="#">open source</a> <a href="#">indie thought</a> <a href="#">goodness</a>
	</div> -->
	<!-- <div class="clearfix"></div> -->
	<!-- <br /> -->
	<?php echo $document->description?>
	<div class="clearfix"></div>
	<!--close entry-tags-->
	<?php if($document->link !== '') :?>
	<a href="<?php echo $document->link?>" class="btn btn-success btn-small">Visit</a>
	<?php endif?>
	<?php if($document->doctype !== NULL) :?>
	<!-- <a href="<?php echo $document->file_path ?>" class="btn btn-success btn-info btn-small">Download</a> -->
	<?php echo anchor('elibrary/download/'. $document->lib_id, 'Download', 'class="btn btn-small btn-info"' )?>
	<?php endif?>
	<br /><br />
	<h4 class="short_headline"><span>Related Documents</span></h4>
	<ul class="navigation">
		<li> <a href="#"> Lorem ipsum dolor sit amet </a> </li>
		<li> <a href="#"> Nam sed orci massa quis placerat libero </a> </li>
		<li> <a href="#"> Final Test Maybe </a> </li>
		<li> <a href="#"> Sed venenatis laoreet ligula </a> </li>
	</ul>
</div>
<div class="span4">
	<div class="well">
		<h5 class="short_headline"><span>Information</span></h5>
		
		<table class="table infotable">
			<tr>
				<td><strong>Author</strong></td>
				<td><?php echo $document->author ?></td>
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
</div>
</div>
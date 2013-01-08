<div class="grid_12">
<a class="btn btn-info pull-right btn-small" id="filter" href="javascript:void(0);"><i class="icon-filter icon-white"></i> Filter</a>
<div class="filter" style="display:none">
<h4 class="short_headline" style="margin-top:0px"><span>Filter</span></h4>
<hr />
<div class="row">
	
	<div class="span2">
		<label for="title">Organization Name</label>
		<input type="text" name="title" id="title" class="span3">
	</div>
	<div class="span2">
		<label for="author">Author</label>
		<select data-style="span2" id="author" class="span2">
			<option value="">-- Select --</option>
			<?php foreach($author as $row) :?>
			<option value="<?php echo $row['author'] ?>"><?php echo $row['author'] ?></option>
			<?php endforeach?>
		</select>
	</div>
	<div class="span2">
		<label for="format">Author</label>
		<select data-style="span2" id="format" class="span2">
			<option value="">-- Select --</option>
			<?php foreach($format as $row) :?>
			<option value="<?php echo $row['format'] ?>"><?php echo $row['format'] ?></option>
			<?php endforeach?>
		</select>
	</div>
	<div class="span2">
		<label for="doctype">Type</label>
		<select data-style="span2" id="doctype" class="span2">
			<option value="">-- Select --</option>
			<?php foreach($doctype as $row) :?>
			<option value="<?php echo $row['category_name'] ?>"><?php echo $row['category_name'] ?></option>
			<?php endforeach?>
		</select>
	</div>
	</div>
	<hr />
</div>
	<h4 class="short_headline" style="margin-top:0px"><span>eLibrary Document</span></h4>
		<hr />
	<table id="library-table" class="table table-hover  table-condensed">
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
</div>

 
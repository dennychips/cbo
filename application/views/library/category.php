<div class="row-fluid  sidebar-right">
	<div class="span9 primary-column">
		<h4 class="short_headline" style="margin-top:0px"><span>Filter</span></h4>

		<table class="filterTableElibrary">
		<tr>
			<td width="25%">
				Title
				
			</td>
			<td><input type="text" name="title" id="title" ></td>
		</tr>
		<tr>
			<td>Author</td>
			<td>
				<select id="author">
					<option value="">-- Select --</option>
					<?php foreach($author as $row) :?>
					<option value="<?php echo $row['author'] ?>"><?php echo $row['author'] ?></option>
					<?php endforeach?>
				</select>
			</td>
		<tr>
			<td>Format</td>
			<td>
				<select id="format">
					<option value="">-- Select --</option>
					<?php foreach($format as $row) :?>
					<option value="<?php echo $row['format'] ?>"><?php echo $row['format'] ?></option>
					<?php endforeach?>
				</select>
			</td>
	</table>
	<input type="hidden" value="<?php echo site_url('elibrary/library_by_category/'.$slug) ?>" id="category-name"/>
	<h4 class="short_headline" style="margin-top:0px"><span>eLibrary Document</span></h4>
		<table id="library-table" class="table table-hover">
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
	<section class="span3 sidebar secondary-column" id="secondary-nav">
		<aside class="widget">
			<h5 class="short_headline"><span>Document Type</span></h5>
			<ul class="navigation">
				<li><a href="#">Report</a></li>
				<li><a href="#">Research</a></li>
				<li><a href="#">Journal</a></li>
				<li><a href="#">Guideline</a></li>
			</ul>
		</aside>
		<!--close aside widget-->
		
	</section>
	<!--close section sidebar span3--> 
</div>
<!-- <div class="row-fluid">
	<div class="span3">
		<form class="">
			<label>Subject</label>
			<input type="text" placeholder="subject"   />
		</form>
	</div>
	<div class="span3">
		<label>Author</label>
		<input type="text" placeholder="Author" />	
	</div>
	<div class="span3">
		<label>Document Type</label>
			<select >
				<option>Report</option>
				<option>Research</option>
				<option>Guideline</option>
				<option>Best Practice</option>
				<option>Journal</option>
			</select>
	</div>

</div>
 -->
 <div class="row-fluid">
 	<div class="span3">
	
 	</div>
	<div class="span9">
		
	</div>
</div>	


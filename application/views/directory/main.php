<div class="row-fluid">
<h3 class="short_headline"><span>CBO Directory</span></h3>
	<p>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec lorem libero. Nunc pharetra auctor purus sit amet elementum. Sed imperdiet nunc et tellus ultrices lacinia. Proin id turpis quis lectus interdum rutrum. Mauris sit amet urna felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras accumsan nunc eget lorem vehicula tincidunt. Nunc tellus libero, scelerisque eu sollicitudin id, elementum ac justo.
	</p>
</div>
<div class="row-fluid">
	<div class="span6">
		<h5 class="short_headline"><span>List CBO</span></h5>
		
		<table class="table table-hover" >
		  <thead>
		    <tr>
		      <th style="width:20%">Name Of CBO</th>
		      <th  style="width:15%">Province</th>
		      <th style="width:25%">Focus Area</th>
		      <th style="width:20%">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach($profiles as $profile) :?>
		  	<tr>
		  		<td><?php echo anchor('cbodirectory/view/'. $profile->user_id, $profile->organization); ?></td>
		  		<td><?php echo $profile->province; ?></td>
		  		<td>
		  			<?php 
		  			
		  				$focus = unserialize($profile->focus_area);
		  				$last = end($focus);
		  				foreach($focus as $row){
		  					echo $row;	
		  					if($row !== $last) {
		  						echo  ', ';
		  					}
		  				}
		  			?>
		  		</td>
		  		<td><?php echo anchor('cbodirectory/view/'. $profile->user_id, 'View Profile', 'class="btn btn-mini btn-info"') ?></a></td>
		  		
		  	</tr> 
		  <?php endforeach?>
		  </tbody>
		</table>
	</div>
	<div class="span6">
		<h5 class="short_headline"><span>Recent Uploads</span></h5>
		<table class="table table-hover" >
		  <thead>
		    <tr>
		      <th style="width:30%">Title</th>
		      <th  style="width:15%">Author</th>
		      <th style="width:5%">Date</th>
		      <th style="width:10%">Format</th>
		      <th style="width:30%">Document Type</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<tr>
		  		<td><?php echo anchor('library/view/1', 'lorem Ipsum')?></td>
		  		<td>Jonathan Doe</td>
		  		<td>2011</td>
		  		<td>PDF</td>
		  		<td>Journal</td>
		  	</tr> 
		  	<tr>
		  		<td><?php echo anchor('library/view/1', '#QLDFLOODS AND @QPSMEDIA: CRISIS COMMUNICATION ON TWITTER IN THE 2011 SOUTH EAST QUEENSLAND FLOODS')?></td>
		  		<td>Jonathan Doe</td>
		  		<td>2010</td>
		  		<td>PDF</a></td>
		  		<td>Reports</td>
		  	</tr>
		  	<tr>
		  		<td><?php echo anchor('library/view/1', '#QLDFLOODS AND @QPSMEDIA: CRISIS COMMUNICATION ON TWITTER IN THE 2011 SOUTH EAST QUEENSLAND FLOODS')?></td>
		  		<td>Jonathan Doe</td>
		  		<td>2010</td>
		  		<td>PDF</a></td>
		  		<td>Reports</td>
		  	</tr>
		  </tbody>
		</table>
	</div>
</div>	


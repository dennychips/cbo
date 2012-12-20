<div class="row-fluid  sidebar-right">
	<div class="span9 primary-column">
		<h3 class="short_headline"><span>CBO Profile Directory</span></h3>
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec lorem libero. Nunc pharetra auctor purus sit amet elementum. Sed imperdiet nunc et tellus ultrices lacinia. Proin id turpis quis lectus interdum rutrum. Mauris sit amet urna felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras accumsan nunc eget lorem vehicula tincidunt. Nunc tellus libero, scelerisque eu sollicitudin id, elementum ac justo.
		</p>


		<h5 class="short_headline"><span>List CBO</span></h5>
		<div class="">
			<table>
				<tr>
					<td width="20%">Province</td>
					<td class="select"></td>
				</tr>
				<tr>
					<td width="20%">Focus Area</td>
					<td class="select"></td>
				</tr>
				<tr>
					<td width="20%">Name</td>
					<td class="select"></td>
				</tr>
			</table>
		</div>
		<table id="directory-table" class="table table-hovered" >
		  <thead>
		    <tr>
		      <th style="width:20%">Name Of CBO</th>
		      <th  style="width:15%">Province</th>
		      <th style="width:25%">Focus Area</th>
		      <th style="width:20%">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php //foreach($profiles as $profile) :?>
		  	<!-- <tr> -->
		  		<!-- <td><?php echo anchor('cbodirectory/view/'. $profile->user_id, $profile->organization); ?></td>
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
		  		<td><?php echo anchor('cbodirectory/view/'. $profile->user_id, 'View Profile', 'class="btn btn-mini btn-info"') ?></a></td> -->
		  		
		  	<!-- </tr>  -->
		  <?php //endforeach?>
		  </tbody>
		</table>
	</div>
	<section class="span3 sidebar secondary-column" id="secondary-nav">
		<aside class="widget">
			<h5 class="short_headline"><span>Recent Uploads</span></h5>
			<ul class="navigation">
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
			</ul>
		</aside>
		<!--close aside widget-->
		
	</section>
	<!--close section sidebar span3--> 

</div>


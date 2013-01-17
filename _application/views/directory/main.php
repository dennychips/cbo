<div class="grid_12">
<a class="btn btn-info pull-right btn-small" id="filter" href="javascript:void(0);"><i class="icon-filter icon-white"></i> Filter</a>
<div class="filter" style="display:none">
	<h3 class="short_headline"><span>CBO Profile Directory</span></h3>
		<!-- <p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec lorem libero. Nunc pharetra auctor purus sit amet elementum. Sed imperdiet nunc et tellus ultrices lacinia. Proin id turpis quis lectus interdum rutrum. Mauris sit amet urna felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras accumsan nunc eget lorem vehicula tincidunt. Nunc tellus libero, scelerisque eu sollicitudin id, elementum ac justo.
		</p> -->
		<h5 class="short_headline"><span>Filter</span></h5>
		<hr />
		<div class="row">
			<div class="span2">
				<label for="title">Organization Name</label>
				<input type="text" id="organization" autocomplete="off" value="" class="span2" />
			</div>
			<div class="span2">
				<label for="country">Country</label>
				<?php 
	    			$countries[''] = '-- Select Country --';
	    			foreach ($country as $row) {
	    				$countries[$row->country] = $row->country;	
	    			}
					echo form_dropdown('country', $countries, '', 'id ="country" class="span2"');
				?>
			</div>
			<div class="span2">
				<label for="province">Province</label>
				<?php 		
	    			if( isset( $provinces ) ){
						// Default option
						$country_province[''] = '-- Select --';
						// Options from query
						foreach( $provinces as $row ){
							$country_province[$row['province']] = $row['province'];
						}
					} else {
						// Default option if not POST request
						$country_province[''] = '-- Select Country First --';
					}
					echo form_dropdown('province', $country_province, '', 'id="province" class="span2"');
				?>
				<input type="hidden" id="ajax_url" value="<?php echo if_secure_site_url('autopopulate_country/process_request/country'); ?>" />
			</div>
			<div class="span2">
				<label for="focus_area">Focus Area</label>
				<?php
					$options = array(
						'' => '-- Select Area --',
						'MSM' => 'MSM',
						'Transgender' => 'Transgender',
						'HIV/AIDS' => 'HIV/AIDS',
						'General Population' => 'General Population',
						'IDU' => 'IDU',
						'Sex Worker' => 'Sex Worker',
						'Youth' => 'Youth',
						'Other' => 'Other'
						);
						echo form_dropdown('focus_area', $options, '', 'id="focus_area" class="span2"');
					?>
			</div>
		</div>


		
		<hr />
	</div>
		<h5 class="short_headline"><span>CBO Profile Directory List</span></h5>
		<hr />
		<table id="directory-table" class="table table-hovered table-striped" >
		  <thead>
		    <tr>
		      <th style="width:20%">Name Of CBO</th>
		      <th style="width:20%">Country</th>
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


<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Manage Users View
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.2
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
?>
<div class="well">
<h1>Manage Users</h1>
<div id="table-controls">
	<form id="search-controls">
		<div id="search-controls-upper">
			<div class="form-row">
				<div class="search-form-element">
					<label for="search_in">Search</label>
					<select id="search_in">
						<?php
							foreach( config_item('manage_users_search_options') as $k => $v )
							{
								echo '<option value="' . $k . '">' . $v . '</option>';
							}
						?>
					</select>
				</div>
				<div class="search-form-element">
					<label for="search_for">Search For</label>
					<input type="text" id="search_for" value=""/>
				</div>
			</div>
			<div id="network-activity-indicator">
				<?php
					echo img( array( 'src' => 'img/network_activity.gif', 'id' => 'network-activity', 'width' => 200, 'height' => 13, 'style'=> 'display:none' ) );
				?>
			</div>
			<div id="delete-confirmation">
				<p style="display:none" class="alert alert-success" >MARKED ROWS HAVE BEEN DELETED&nbsp;</p>
			</div>
		</div>
		<div id="search-controls-lower">
			<div class="form-row half-width">
				<button id="search-button">Search</button>
				<button id="reset-button">Reset</button>
			</div>
			<?php if($pagination_links):?>
			<div id="pagination" class="pagination">
				<ul>
					<?php echo $pagination_links; ?>
				</ul>
			</div>
			<?php endif;?>
		</div>
	</form>
</div>
<div id="table-wrapper">
	<table id="myTable" class="tablesorter table table-bordered">
		<thead>
			<tr>
				<th>Action</th>
				<th>username</th>
				<th>email address</th>
				<th>role</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
				echo $table_content;
			?>
		</tbody>
	</table>
</div>
<?php echo form_open(); ?>
	<input type="hidden" id="ci_csrf_token_name" value="<?php echo config_item('csrf_token_name'); ?>" />
	<input type="hidden" id="buttons_url" value="<?php echo secure_site_url('administration/manage_users'); ?>" />
</form>
</div>
<?php
/* End of file manage_users.php */
/* Location: /application/views/administration/manage_users.php */
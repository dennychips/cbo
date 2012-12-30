<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - User Index View
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
<div class="row-fluid">
	<div class="span8">tes</div>
	<div class="span4">tes</div>
</div>
<h4 class="short_headline">
	<span>Recent Document</span>
</h4>
<table id="user-index-library-table" class="table table-hover">
  <thead>
    <tr>
      <th style="width:30%">Title</th>
      <th style="width:10%">Author</th>
      <th style="width:10%">Format</th>
      <th style="width:10%">Type</th>
      <th style="width:10%">Modified</th>
      <th style="width:10%">Created</th>
      <th style="width:20%">Action</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>

<input type="hidden" name="user-index-recent" id="user-index-recent" value="<?php echo secure_site_url('user/recent_document/'.$id)?>" />

<?php
/* End of file user_index.php */
/* Location: /application/views/user/user_index.php */
<script type="text/javascript">
$(document).ready(function(){
	$('#category_table').dataTable( {
		"bProcessing": true,
        "bServerSide": true,
        "aaSorting": [[ 2, "desc" ]],
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"sAjaxSource": '',
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		},
		'fnServerData': function(sSource, aoData, fnCallback){
	        $.ajax
	        ({
	          'dataType': 'json',
	          'type'    : 'POST',
	          'url'     : sSource,
	          'data'    : aoData,
	          'success' : fnCallback
	        });
		}
	});
	
});
</script>
<div class="well">
<a href="#" class="btn btn-primary pull-right">Add Category</a>
<h3>Manage Library Category</h3>
<hr />
<table id="category_table" class="table">
	<thead>
		<th>Category Name</th>
		<th>Slug</th>
	</thead>
</table>
</div>
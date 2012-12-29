$(document).ready(function(){
	$('#recent-upload-table').dataTable({
		"bProcessing": true,
        "bServerSide": true,
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"sAjaxSource": $('#profile_id').val(),
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		},
	});
});
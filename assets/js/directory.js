/* Table initialisation */
$(document).ready(function() {
	$('#directory-table').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
        "sAjaxSource": "cbodirectory/process_request",
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	} );
} );
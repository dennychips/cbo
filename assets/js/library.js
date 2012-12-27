/* Table initialisation */
$(document).ready(function() {
	$('#library-table').dataTable( {
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"sAjaxSource": "elibrary/process_request",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		},
		"aoColumnDefs": [ 
			{ "bSortable": false, "aTargets": [ 5 ] }
		] 
	} );
} );
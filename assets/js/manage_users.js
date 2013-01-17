/* Table initialisation */
$(document).ready(function() {
	var oTable = $('#manage_users').dataTable( {
		"bProcessing": true,
        "bServerSide": true,
        "aaSorting": [[ 2, "desc" ]],
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"sAjaxSource": "administration/manage_users_request",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		},
		"aoColumnDefs": [ 
			{ "bSortable": false, "aTargets": [ 3 ] }
		],
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
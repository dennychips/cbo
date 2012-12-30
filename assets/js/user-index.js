$(document).ready(function(){
	$('#user-index-library-table').dataTable( {
		"bProcessing": true,
        "bServerSide": true,
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"sAjaxSource": $('#user-index-recent').val(),
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		},
		"aoColumnDefs": [ 
			{ "bSortable": false, "aTargets": [ 6 ] }
		],
		'fnServerData': function(sSource, aoData, fnCallback){
      	 	aoData.push( 
	      	 		{ "name": "title", "value": $( "#title" ).val() },
	      	 		{ "name": "author", "value": $( "#author" ).val() },
	      	 		{ "name": "format", "value": $( "#format" ).val() },
	      	 		{ "name": "doctype", "value": $( "#doctype" ).val() }
				);
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
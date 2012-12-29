$(document).ready(function(){
	$('#recent-upload-table').dataTable( {
		"bProcessing": true,
        "bServerSide": true,
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"sAjaxSource": $('#profile-recent-uploads-url').val(),
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		},
		"aoColumnDefs": [ 
			{ "bSortable": false, "aTargets": [ 5 ] }
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
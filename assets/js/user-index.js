$(document).ready(function(){
	$('#user-index-library-table').dataTable( {
		"bProcessing": true,
        "bServerSide": true,
        "aaSorting": [[ 5, "desc" ]],
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

function confirm(id){
	$('#myModal').modal();
	$('#confirmation').click(function(){
		
		var delete_data = {
			'id' : id
		}
		$.ajax({
			url: $('#library_delete_url').val(),
			type: 'POST',
			data: delete_data,
			dataType: 'json',
			success: function( response ){
				if(response.status === 'success'){
					location.reload();
				}
			}
		})

	});
}

/* Table initialisation */
$(document).ready(function() {
	var oTable = $('#library-table').dataTable( {
		"bProcessing": true,
        "bServerSide": true,
        "aaSorting": [[ 2, "desc" ]],
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"sAjaxSource": "elibrary/process_request",
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
	      	 		{ "name": "doctype", "value": $( "#doctype" ).val() },
	      	 		{ "name": "country", "value": $( "#country" ).val() },
	      	 		{ "name": "publisher", "value": $( "#publisher" ).val() }
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
	$("#author").change( function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, $("#author"));
    });
	$("#format").change( function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, $("#format"));
    });
    $("#doctype").change( function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, $("#doctype"));
    });
    $("#title").keyup( function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, $("#title"));
    });
    $("#country").change( function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, $("#country"));
    });
    $("#publisher").change( function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, $("#publisher"));
    });
});
/* Table initialisation */
$(document).ready(function() {
	var oTable = $('#directory-table').dataTable( {
		"bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $('#country-name').val(),
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"aoColumnDefs": [ 
			{ "bSortable": false, "aTargets": [ 4 ] }
		],
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		},

		'fnServerData': function(sSource, aoData, fnCallback)
		      {
	      	 	aoData.push( 
		      	 		{ "name": "organization", "value": $( "#organization" ).val() },
		      	 		{ "name": "province", "value": $( "#province" ).val() },
		      	 		{ "name": "country", "value": $( "#country" ).val() },
		      	 		{ "name": "focus_area", "value": $( "#focus_area" ).val() }
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
	} );
	$("#province").change( function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, $("#province"));
    });
    $("#country").change( function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, $("#country"));
    });

	$("#focus_area").change( function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, $("#focus_area"));
    });

    $("#organization").keyup( function () {
      /* Filter on the column (the index) of this element */
      oTable.fnFilter( this.value, $("#organization"));
    });
    $('#focus_area').change(function(){
    	oTable.fnFilter( this.value, $("#focus_area"));
    });

} );
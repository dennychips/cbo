/*
 * Community Auth - uploader-controls.js
 * @ requires jQuery
 *
 * Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 *
 * Licensed under the BSD licence:
 * http://http://www.opensource.org/licenses/BSD-3-Clause
 */

 // Declare our functions in our own namespace

$(document).ready(function(){
	// Immediately execute when DOM is ready.
	new AjaxUpload('upload-button', {
		type : 'POST',
		action: $('#upload_library_url').val(),
		responseType: 'json',
		onSubmit : function(file , ext){
			// Get CI CSRF token name
			var ci_csrf_token_name = $('#ci_csrf_token_name').val();
			
			// set dynamic data (post vars) with setData
			this.setData({
				'dir_name':'library_doc',
				'user_id': $('#user_id').val(),
				'no_success_callback': 'true',
				'token': $('input[name="token"]').val(),
				'ci_csrf_token_name': $('input[name="' + ci_csrf_token_name + '"]').val()
			});
			// Allows only images set in config.
			var allowed_types = $('#allowed_types').val();
			
			var regex = new RegExp('^(' + allowed_types + ')', 'i');
			if (ext && ext.search(regex) != '-1') {
				// this.disable();
				
				$('.progress').show();
			} else {
				// Show error: extension is not allowed
				$('#status-bar').css('display', 'block');
				$('#status-bar').html('<p>Error: Only images are allowed ( ' + $('#file_types').val() + ' )</p>').delay(2500).fadeOut('slow');
				// cancel upload
				
				return false;
			}
		},
		onComplete: function(file, response){

			// Get CI CSRF token name
			var ci_csrf_token_name = $('#ci_csrf_token_name').val();

			// Renew tokens
			$('input[name="token"]').val(response.token);
			$('input[name="' + ci_csrf_token_name + '"]').val( response.ci_csrf_token );

			// check if upload was successful
			if (response && /^(success)/i.test(response.status)) {

				//var json_text = JSON.stringify(response);
				
				var post_data = {
				'doc_data': response,
				'token': $('input[name="token"]').val(),
				'ci_csrf_token_name': $('input[name="' + ci_csrf_token_name + '"]').val()
				};

				$.ajax({
					url: 'elibrary/insert_lib_data',
					type: 'POST',
					data: post_data,
					dataType: 'json',
					success: function( response ){
					
					// Renew tokens
					$('input[name="token"]').val( response.token );
					$('input[name="' + ci_csrf_token_name + '"]').val( response.ci_csrf_token );
					$('<input>').attr({
					    type: 'hidden',
					    id: 'libid',
					    name: 'libid',
					    value : response.id
					}).appendTo('form');
					$('<input>').attr({
					    type: 'hidden',
					    id: 'format',
					    name: 'format',
					    value : response.doctype
					}).appendTo('form');
					$('.progress').hide();
					// $('#hidden_form').append('<input type="hidden" name="lib_id" value="' + response.id + '"');
					$("ul.doc-placeholder").append('<li>'+response.file_name+'<span class="pull-right"><a href="javascript:void(0)" onclick="confirmDel()" id="delete-btn-temp" class="btn btn-danger btn-small"><i class="icon-trash icon-white"></i></a></span></li>');
				}
				});

				
				

				// replace text of upload link after first upload
				// $('#upload-button').attr('value', 'Upload Another Image');

				// Show status message
				$('#status-bar').css('display', 'block');
				$('#status-bar').html('<p>Upload Successful</p>').delay(2500).fadeOut('slow');
			} else {
				// Show error message
				alert('Error uploading file ('+file+')! \n'+ response.issue);

				this.enable();
				$('.progress').hide();
				$('#status-bar').css('display', 'block');
				$('#status-bar').html('<p>Upload Failed</p>').delay(2500).fadeOut('slow');
			}
		}
	});

	// Show network activity image while ajax request is being performed
 	$('#uploader-activity').bind({
 		ajaxStart: function(){ $(this).show(); },
 		ajaxStop: function(){ $(this).hide(); }
 	});
 	$('#delete-btn').click(function(){
 		confirm('Are you sure?');
 		var post_data = {
 			'libid' : $('#library_id').val(),
 			'token': $('input[name="token"]').val(),
			'ci_csrf_token_name': $('#ci_csrf_token_name').val()
 		}

 		$.ajax({
 			url: $('#delete_doc_url').val(),
 			data: post_data,
 			type: 'POST',
 			dataType: 'json',
 			success: function(response){
 				$('.progress').show();
 				
 				$('input[name="token"]').val( response.token );
				$('#ci_csrf_token_name').val( response.ci_csrf_token );

 				if(response.success === 'success'){
 					$('.progress').hide();
 					$(' ul.doc-placeholder li').remove();
 				}
 			}
 		});
 	});
});
function confirmDel(){
	var post_data = {
 			'libid' : $('#libid').val(),
 			'token': $('input[name="token"]').val(),
 			'temp' : true,
			'ci_csrf_token_name': $('#ci_csrf_token_name').val()
 		}

 		$.ajax({
 			url: $('#delete_doc_url').val(),
 			data: post_data,
 			type: 'POST',
 			dataType: 'json',
 			success: function(response){
 				
 				$('input[name="token"]').val( response.token );
				$('#ci_csrf_token_name').val( response.ci_csrf_token );

 				if(response.success === 'success'){

 					$('ul.doc-placeholder li').remove();
 					$('#libid').remove();
 					$('#format').remove();

 					$('#upload-button').removeClass('disabled');
 				}
 			}
 		});

 	
 	}
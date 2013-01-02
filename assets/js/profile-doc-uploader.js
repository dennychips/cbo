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
// var l = $("table#doc_table tbody tr").length;
// 				alert(l);
	new AjaxUpload('upload-doc-button', {
		type : 'POST',
		action: $('#upload_doc_profile_url').val(),
		responseType: 'json',
		onSubmit : function(file , ext){
			// Get CI CSRF token name
			var ci_csrf_token_name = $('#ci_csrf_token_name').val();

			// set dynamic data (post vars) with setData
			this.setData({
				'dir_name':'profile_doc',
				'user_id': $('#user_id').val(),
				'no_success_callback': 'true',
				'token': $('input[name="token"]').val(),
				'ci_csrf_token_name': $('input[name="' + ci_csrf_token_name + '"]').val()
			});
			
			
			// Allows only images set in config.
			var allowed_types_doc = $('#allowed_types_doc_profile').val();
			
			var regex = new RegExp('^(' + allowed_types_doc + ')', 'i');
			if (ext && ext.search(regex) != '-1') {
				this.disable();
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
			$('.progress').hide();
			// Get CI CSRF token name
			var ci_csrf_token_name = $('#ci_csrf_token_name').val();

			// Renew tokens
			$('input[name="token"]').val(response.token);
			// $('input[name="' + ci_csrf_token_name + '"]').val( response.ci_csrf_token );

			// check if upload was successful
			if (response && /^(success)/i.test(response.status)) {
				var post_data = {
					'doc_data': response,
					'user_id' : $('#user_id').val(),
					'token': $('input[name="token"]').val(),
					'ci_csrf_token_name': $('input[name="' + ci_csrf_token_name + '"]').val()
				};
				
				$.ajax({
						url: 'user/insert_doc_data',
						type: 'POST',
						data: post_data,
						dataType: 'json',
						success: function( response ){
						// Renew tokens
						// console.log(response);
						$('input[name="token"]').val( response.token );
						$('input[name="' + ci_csrf_token_name + '"]').val( response.ci_csrf_token );
						// check if image list already exists
						if($("table#doc_table tbody tr").length > 0){
							$("table#doc_table tbody").append('<tr><td>'+ response.file_name +'</td><td><a href="user/delete_profile_doc/'+ response.id +'">delete</a></td>/tr>');
						// if image list doesn't exist, create it
						}else{
							$('table#doc_table tbody').replaceWith(
									'<tbody><tr><td>'+ response.file_name +'</td><td><a href="user/delete_profile_doc/'+ response.id +'">delete</a></td></tr></tbody>');
						}
						
					}
				});



				// replace text of upload link after first upload
				$('#upload-button').attr('value', 'Upload Another Image');

				// Show status message
				$('#status-bar').css('display', 'block');
				$('#status-bar').html('<p>Upload Successful</p>').delay(2500).fadeOut('slow');
				this.enable();
			} else {
				// Show error message
				alert('Error uploading file ('+file+')! \n'+ response.issue);
				this.enable();
				$('#status-bar').css('display', 'block');
				$('#status-bar').html('<p>Upload Failed</p>').delay(2500).fadeOut('slow');
			}
		}
	});

	// Show network activity image while ajax request is being performed
 	$('.progress').bind({
 		ajaxStart: function(){ $(this).show(); },
 		ajaxStop: function(){ $(this).hide(); }
 	});
});
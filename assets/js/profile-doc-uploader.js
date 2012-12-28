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
			var allowed_types = $('#allowed_types_file').val();
			
			var regex = new RegExp('^(' + allowed_types + ')', 'i');
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

			console.log(response);
			// Get CI CSRF token name
			var ci_csrf_token_name = $('#ci_csrf_token_name').val();

			// Renew tokens
			$('input[name="token"]').val(response.token);
			$('input[name="' + ci_csrf_token_name + '"]').val( response.ci_csrf_token );

			// check if upload was successful
			if (response && /^(success)/i.test(response.status)) {

				//var json_text = JSON.stringify(response);
				
				console.log(response);
				// replace text of upload link after first upload
				
				$('#upload-button').attr('value', 'Upload Another Image');

				// Show status message
				$('#status-bar').css('display', 'block');
				$('#status-bar').html('<p>Upload Successful</p>').delay(2500).fadeOut('slow');
			} else {
				// Show error message
				alert('Error uploading file ('+file+')! \n'+ response.issue);
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
});
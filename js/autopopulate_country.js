/*
 * Community Auth - auto-populate.js
 * @ requires jQuery
 *
 * Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 *
 * Licensed under the BSD licence:
 * http://http://www.opensource.org/licenses/BSD-3-Clause
 */
$(document).ready(function(){

	// Whenever one of the form dropdowns is changed
	$('#country').change(function(){
		// When type is changed, reset make
		if( $(this).attr('id') == 'country' ){
			$('#province option').attr('selected', false);
		}
		// Get the CI CSRF token name
		ci_csrf_token_name = $('#ci_csrf_token_name').val();
		// Set post vars
		var post_vars = {
			'country':  $('#country option:selected').val(),
			'token': $('input[name="token"]').val()
		};
		post_vars[ci_csrf_token_name] = $('input[name="' + ci_csrf_token_name + '"]').val();
		// POST
		$.ajax({
			type: 'post',
			url: $('#ajax_url').val(),
			data: post_vars,
			dataType: 'json',
			success: function(response){
				if(response.status == 'success'){
					// Update the dropdowns and tokens
					$('#province').html(response.province);
					$('input[name="token"]').val(response.token);
					$('input[name="' + ci_csrf_token_name + '"]').val( response.ci_csrf_token );
				}else{
					alert(response.message);
				}
			}
		});
	});

});
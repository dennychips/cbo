<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Login Form View
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.2
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */?>

 <div class="row-fluid">
			<div class="span12"> 
				
				<!--begin hidden by js forgot pw form -->
				<div class="forgot-password" style="display: none;">
					<p class="statement">Forgot Password? Please enter your email and we’ll send it you.</p>
					<form action="yourscript.php" method="post">
						<div class="input-append">
							<input type="email" class="span6" placeholder="Email Address" name="email">
							<button class="btn btn-primary">Send Password</button>
						</div>
						<!--close input-append-->
					</form>
				</div>
				<!--*******end forgot-password********--> 
				
				<!--begin login-box-->
				<div class="login-box clearfix">
					<header>
						<h2 class="short_headline"><span>Login to your account...</span></h2>
					</header>
					<div class="login-wrapper clearfix">
						<div class="float-right">
							<form id="login-form" action="yourloginscript.php" method="post" novalidate="novalidate">
								<label for="LoginFormUsername" class="required">Username <span class="required">*</span></label>
								<div class="input-prepend"> <span class="add-on">@</span>
									<input name="LoginFormUsername" id="LoginFormUsername" type="email">
								</div>
								<label for="LoginFormPassword" class="required">Password <span class="required">*</span></label>
								<div class="input-prepend"> <span class="add-on">#</span>
									<input name="LoginFormPassword" id="LoginFormPassword" type="password">
								</div>
								<label class="checkbox inline" for="LoginRemember">Remember Me
									<input type="checkbox" id="LoginRemember" value="LoginRemember">
								</label>
								<div class="form-controls">
									<input class="btn btn-primary btn-large" type="submit" name="login" value="Login">
								</div>
							</form>
							<footer class="clearfix"> <a href="#" class="forgotpw">Forgot Password?</a> </footer>
						</div>
						<!--close .float-right-->
						
						<div class="float-left">
							<ul>
								<li><a href="#"><img src="assets/images/sign-in-twitter.png" alt="sign in with twitter"></a></li>
								<li><a href="#"><img src="assets/images/sign-in-facebook.png" alt="sign in with facebook"></a></li>
								<li><a href="#"><img src="assets/images/sign-in-google.png" alt="sign in with google"></a></li>
								<li><a href="#"><img src="assets/images/sign-in-openid.png" alt="sign in with openid"></a></li>
								<li><a href="#"><img src="assets/images/sign-in-yahoo.png" alt="sign in with yahoo"></a></li>
								<li><a href="#"><img src="assets/images/sign-in-linkedin.png" alt="sign in with linkedin"></a></li>
							</ul>
							<p><a href="register.html" class="center">Not a member? Join today!</a></p>
						</div>
						<!--close .float-left--> 
					</div>
					<!--end .login-wrapper clearfix--> 
				</div>
				<!--end .login-box--> 
				
			</div>
			<!--close .span12--> 
		</div>
 <?php 
/*
if( ! isset( $optional_login ) )
{
	echo '<h1 class="short_headline"><span>Login</span></h1>';
}

if( ! isset( $on_hold_message ) )
{
	if( isset( $login_error_mesg ) )
	{
		echo '
			<div class="feedback error_message">
				<p class="feedback_header">
					Login Error: Invalid Username, Email Address, or Password.
				</p>
				<p style="margin:.4em 0 0 0;">
					Username, email address and password are all case sensitive.
				</p>
			</div>
		';
	}

	if( $this->input->get('logout') )
	{
		echo '
			<div class="feedback confirmation">
				<p class="feedback_header">
					You have successfully logged out.
				</p>
			</div>
		';
	}

	echo form_open( '', array( 'class' => 'std-form', 'style' => 'margin-top:20px;' ) ); 
?>

	<div class="form-column-left">
		
			<label for="login_string" class="form_label">Username or Email</label>
			<input type="text" name="login_string" id="login_string" class="form_input" autocomplete="off" maxlength="255" />
		
		
			<label for="login_pass" class="form_label">Password</label>
			<input type="password" name="login_pass" id="login_pass" class="form_input password" autocomplete="off" maxlength="<?php echo MAX_CHARS_4_PASSWORD; ?>" />
		
			<label class="checkbox"><input type="checkbox" id="show-password"> Show Password</label>

		<?php
			if( config_item('allow_remember_me') )
			{
		?>
			<label for="remember_me" class="checkbox"><input type="checkbox" id="remember_me" name="remember_me" value="yes" /> Remember Me</label>
		

		<?php
			}
		?>

		<div class="form-row">
			<p>
				<a href="<?php echo secure_site_url('user/recover'); ?>">
					Can't access your account?
				</a>
			</p>
		</div>
		<div class="form-row">
			<div id="submit_box">
				<input type="submit" name="submit" value="Login" class="btn btn-primary btn-small" id="submit_button"  />
			</div>
		</div>
	</div>
</form>

<?php

	}
	else
	{
		// EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
		echo '
			<div class="feedback error_message">
				<p class="feedback_header">
					Excessive Login Attempts
				</p>
				<p style="margin:.4em 0 0 0;">
					You have exceeded the maximum number of failed login<br />
					attempts that the ' . WEBSITE_NAME . ' website will allow.
				<p>
				<p style="margin:.4em 0 0 0;">
					Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
				</p>
				<p style="margin:.4em 0 0 0;">
					Please use the ' . secure_anchor('user/recover','Account Recovery') . ' after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,<br />
					or ' . secure_anchor('contact','Contact') . ' ' . WEBSITE_NAME . '  if you require assistance gaining access to your account.
				</p>
			</div>
		';
	}
*/
/* End of file login_form.php */
/* Location: /application/views/auth/login_form.php */ 
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
				
				
				
				<!--begin login-box-->
				<div class="login-box clearfix">
					<header>
						<h2 class="short_headline"><span>Login to your account...</span></h2>
					</header>
					<div class="login-wrapper clearfix">
						<div class="float-left">
						<?php
							if( ! isset( $optional_login ) )
							{
								// echo '<h1 class="short_headline"><span>Login</span></h1>';
							}

							if( ! isset( $on_hold_message ) )
							{
								if( isset( $login_error_mesg ) )
								{
									echo '
										<div class="alert alert-error">
											<small>
												<b>Invalid Username, Email Address, or Password.</b>
											</small><br />
											<small>
												Username, email address and password are all case sensitive.
											</small>
										</div>
									';
								}

								if( $this->input->get('logout') )
								{
									echo '
										<div class="alert alert-success">
											<p class="feedback_header">
												You have successfully logged out.
											</p>
										</div>
									';
								}

								echo form_open( '', array( 'class' => 'std-form', 'style' => 'margin-top:20px;' ) ); 
							?>
								<label for="login_string" class="form_label">Username or Email</label>
								<div class="input-prepend"> <span class="add-on">@</span>
									<input type="text" name="login_string" id="login_string" class="form_input" autocomplete="off" maxlength="255" />
								</div>
								<label for="login_pass" class="form_label">Password</label>
								<div class="input-prepend"> <span class="add-on">#</span>
									<input type="password" name="login_pass" id="login_pass" class="form_input password" autocomplete="off" maxlength="<?php echo MAX_CHARS_4_PASSWORD; ?>" />
								</div>
								<?php if( config_item('allow_remember_me') ){?>
									<label for="remember_me" class="checkbox"><input type="checkbox" id="remember_me" name="remember_me" value="yes" /> Remember Me</label>
								<?php } ?>
								<br />
								<div class="form-controls">
									<input type="submit" name="submit" value="Login" class="btn btn-primary" id="submit_button"  />
									<small><a href="<?php echo secure_site_url('user/recover'); ?>" class="forgotpw">Forgot Password?</a> </small>
								</div>
							</form>
							
							<?php } else{
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
							?>
						</div>
						<!--close .float-right-->
						
						<div class="float-right center" style="padding-top:80px;">
							<?php echo secure_anchor('register', 'Register Now', 'class="btn btn-block btn-warning btn-large"')?>
							<small><?php echo secure_anchor('register', 'Not a member ?', 'class="center"')?></small>
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
/* End of file login_form.php */
/* Location: /application/views/auth/login_form.php */ 
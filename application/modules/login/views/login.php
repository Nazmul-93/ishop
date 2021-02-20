
<div class="page-content mb-50">
	<div class="container">
		<div class="row">
			
<div class="col-sm-12 col-md-12 col-xs-12 col-lg-5 mx-auto mb-10 ">
	<div class="panel panel-login login_content_div">
		<div class="panel-heading">
			<div class="row ">
				<div class="container">
					<div class="row">
						<div class="col-6 col-lg-6 text-center border_ryt">
							<a href="login" class="active" id="login-form-link"> 
								<i class=" fa fa-user-o"></i> Login
							</a>
						</div>
						<div class="col-6 col-lg-6 text-center">
							<a href="regs" id="register-form-link"> 
								<i class=" fa fa-user-circle"></i> Register
							</a>
						</div>
					</div>
				</div>		
			</div>
		</div><br><br>
		<div class="col-lg-12">
			<form id="login-form" action="login/login_check" method="post"  style="display: block;"  autocomplete="off">
			<?php if($this->session->flashdata('msg')){ ?>
				<div id="alarmmsg" class=" alert alert-<?=$this->session->flashdata('type');?> alert-dismissible" role="alert">
					<button style="background:none!important;font-size:15px;" type="button" class="close" data-dismiss="alert">&times;</button>
					<div class="alert-message">
						<span><?=$this->session->flashdata('msg');?></span>
					</div>
				</div>
			<?php } ?>
				<div class="form-group frm_grp">
					<input type="text" name="email"   tabindex="1" class="form-control form_input" placeholder="Email address" value="">
				</div>
				<div class="form-group frm_grp">
					<input type="password" name="password"  tabindex="2" class="form-control form_input" placeholder="Password">
				</div>
				<div class="form-group"> 
					<div class="row">
						<div class="col-sm-12 col-sm-offset-3">
							<input type="submit" name="login-submit"  tabindex="4" class="form-control btn btn-login" value="Log In">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-12">
							<div class="text-left">
								<a href="forget" tabindex="5" class="forgot-password">Forgot Password?</a>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group text-center mt-20 mb-30">
					<p class="quick_access">Quick access with</p>
				</div>
				<div class="col-lg-12">
					<div class="social_login_links ">
						<ul class="d-flex">
							<li>
								<a class="facebook" href="javascript:void(0);" data-tooltip="Facebook"><i class="fa fa-facebook">&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
							</li>
							<li>
								<a class="google" href="javascript:void(0);" data-tooltip="Google"><i class="fa fa-google">&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
							</li>
							<li>
								<a class="twitter" href="javascript:void(0);" data-tooltip="twitter"><i class="fa fa-twitter">&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
							</li>
							<li>
								<a class="instagram" href="javascript:void(0);" data-tooltip="Facebook"><i class="fa fa-instagram">&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
							</li>
						</ul>
					</div>
				</div>
			</form>
			<form id="register-form" action="regs/registration_form" method="post"  style="display: none;"  autocomplete="off">
				<div class="form-group frm_grp">
					<input type="text" name="email"  tabindex="1" class="form-control form_input" placeholder="Email Address" value="" required>
				</div>
				<div class="form-group frm_grp">
					<input type="password" name="password"  tabindex="2" class="form-control form_input" placeholder="Password" required>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-12 col-sm-offset-3">
							<input type="submit" name="login-submit"  tabindex="4" class="form-control btn btn-register" value="Create Account">
						</div>
					</div>
					<p class="p_class">By creating an account, you agree to the Cmart.bd.com Free Membership Agreement and Privacy Policy</p>
				</div>
				<div class="form-group text-center  ">
					<p class="quick_access">Quick access with</p>
				</div>
				<div class="col-lg-12">
					<div class="social_login_links ">
						<ul class="d-flex">
							<li>
								<a class="facebook" href="javascript:void(0);" data-tooltip="Facebook"><i class="fa fa-facebook">&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
							</li>
							<li>
								<a class="google" href="javascript:void(0);" data-tooltip="Google"><i class="fa fa-google">&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
							</li>
							<li>
								<a class="twitter" href="javascript:void(0);" data-tooltip="twitter"><i class="fa fa-twitter">&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
							</li>
							<li>
								<a class="instagram" href="javascript:void(0);" data-tooltip="Facebook"><i class="fa fa-instagram">&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
							</li>
						</ul>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>	
		</div>
	</div>
</div>
	
	
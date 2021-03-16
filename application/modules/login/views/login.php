
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


	 
<!-- <style>
body {
    margin: 0;
    color: #6a6f8c;
    background: #fff;
    font: 600 16px/18px 'Open Sans', sans-serif
}

.login-box {
    width: 100%;
	height: 850px;
    margin: auto;
    max-width: 525px;
    min-height: 670px;
    position: relative;
    /* background: url(https://images.unsplash.com/photo-1507208773393-40d9fc670acf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1268&q=80) no-repeat center; */
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19)
}

.login-snip {
    width: 100%;
    height: 870px;
    position: absolute;
    padding: 90px 70px 50px 70px;
    /* background: rgba(0, 77, 77, .9) */
	/* background: #f7941d; */
	/* background: #333; */
}

.login-snip .login,
.login-snip .sign-up-form {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    transform: rotateY(180deg);
    backface-visibility: hidden;
    transition: all .4s linear
}

.login-snip .sign-in,
.login-snip .sign-up,
.login-space .group .check {
    display: none
}

.login-snip .tab,
.login-space .group .label,
.login-space .group .button {
    text-transform: uppercase
}

.login-snip .tab {
    font-size: 22px;
    margin-right: 15px;
    padding-bottom: 5px;
    margin: 0 15px 10px 0;
    display: inline-block;
    border-bottom: 2px solid transparent
}

.login-snip .sign-in:checked+.tab,
.login-snip .sign-up:checked+.tab {
    color: #fff;
    border-color: #1161ee
}

.login-space {
    min-height: 345px;
    position: relative;
    perspective: 1000px;
    transform-style: preserve-3d
}

.login-space .group {
    margin-bottom: 15px
}

.login-space .group .label,
.login-space .group .input,
.login-space .group .button {
    width: 100%;
    color: #fff;
    display: block
}

.login-space .group .input,
.login-space .group .button {
    border: none;
    padding: 15px 20px;
    border-radius: 25px;
    background: rgba(255, 255, 255, .1)
}

.login-space .group input[data-type="password"] {
    text-security: circle;
    -webkit-text-security: circle;
}

.login-space .group .label {
    color: #aaa;
    font-size: 12px;
}

.login-space .group .button {
    background: #1161ee
}

.login-space .group label .icon {
    width: 15px;
    height: 15px;
    border-radius: 2px;
    position: relative;
    display: inline-block;
    background: rgba(255, 255, 255, .1)
}

.login-space .group label .icon:before,
.login-space .group label .icon:after {
    content: '';
    width: 10px;
    height: 2px;
    background: #fff;
    position: absolute;
    transition: all .2s ease-in-out 0s
}

.login-space .group label .icon:before {
    left: 3px;
    width: 5px;
    bottom: 6px;
    transform: scale(0) rotate(0)
}

.login-space .group label .icon:after {
    top: 6px;
    right: 0;
    transform: scale(0) rotate(0)
}

.login-space .group .check:checked+label {
    color: #fff
}

.login-space .group .check:checked+label .icon {
    background: #1161ee
}

.login-space .group .check:checked+label .icon:before {
    transform: scale(1) rotate(45deg)
}

.login-space .group .check:checked+label .icon:after {
    transform: scale(1) rotate(-45deg)
}

.login-snip .sign-in:checked+.tab+.sign-up+.tab+.login-space .login {
    transform: rotate(0)
}

.login-snip .sign-up:checked+.tab+.login-space .sign-up-form {
    transform: rotate(0)
}

*,
:after,
:before {
    box-sizing: border-box
}

.clearfix:after,
.clearfix:before {
    content: '';
    display: table
}

.clearfix:after {
    clear: both;
    display: block
}

a {
    color: inherit;
    text-decoration: none
}

.hr {
    height: 2px;
    margin: 30px 0 30px 0;
    background: rgba(255, 255, 255, .2)
}

.foot {
    text-align: center
}

.card {
    width: 500px;
    left: 100px
}

::placeholder {
    color: #b3b3b3
}
</style>

<div class="row">
    <div class="col-md-6 col-12 mx-auto p-0">
        <div class="card">
            <div class="login-box">
			<?php if($this->session->flashdata('msg')){ ?>
				<div id="alarmmsg" class=" alert alert-<?=$this->session->flashdata('type');?> alert-dismissible" role="alert">
					<button style="background:#333!important;font-size:15px;" type="button" class="close" data-dismiss="alert">&times;</button>
					<div class="alert-message">
						<span><?=$this->session->flashdata('msg');?></span>
					</div>
				</div>
			<?php } ?>
                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                    <div class="login-space">
					<form id="login-form" action="login/login_check" method="post"  style="display: block;"  autocomplete="off">
                        <div class="login">
                            <div class="group"> <label for="user" class="label">Email</label> <input id="user" name="email" type="text" class="input" placeholder="Enter your email"> </div>
                            <div class="group"> <label for="pass" class="label">Password</label> <input id="pass" name="password" type="password" class="input" data-type="password" placeholder="Enter your password"> </div>
                            <div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span> Keep me Signed in</label> </div>
                            <div class="group"> <input type="submit" class="button" value="Sign In"> </div>
                            <div class="hr"></div>
                            <div class="foot"> <a href="forget">Forgot Password?</a> </div>
                        </div>
					</form>
					<form id="login-form" action="regs/registration_form" method="post" role="form" style="display: block;"  autocomplete="off">
                        <div class="sign-up-form">
                            <div class="group"> <label for="user" class="label">First Name</label> <input id="user" name="f_name" type="text" class="input" placeholder="First Name"> </div>
							
							<div class="group"> <label for="user" class="label">Last Name</label> <input id="user" name="l_name" type="text" class="input" placeholder="Last Name"> </div>
							
							<div class="group"> <label for="pass" class="label">Email Address</label> <input id="pass" name="email" type="text" class="input" placeholder="Enter your email address"> </div>
							
							<div class="group"> <label for="pass" class="label">Phone Number</label> <input id="pass" name="phone_number" type="text" class="input" placeholder="Enter your Phone Number"> </div>
							
                            <div class="group"> <label for="pass" class="label">Password</label> <input id="pass" name="password" type="password" class="input" data-type="password" placeholder="Create your password"> </div>
							<?=$this->session->flashdata('msg');?>
                            <div class="group"> <label for="pass" class="label">Confirm Password</label> <input id="pass" name="con_password" type="password" class="input" data-type="password" placeholder="Confirm Password"> </div>
                            
                            <div class="group"> <input type="submit" class="button" value="Sign Up"> </div>
							
                            <div class="hr"></div>
                            <div class="foot"> <label for="tab-1"> <a href="login">Already Member?</a></label> </div>
                        </div>
					</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
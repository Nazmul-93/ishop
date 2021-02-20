<!DOCTYPE html>
<html class="no-js" lang="zxx">
<title> Grocery-Shop || Login</title>
<?php $this->load->view('front/header_link')?> 

<body>
	<!--=============================================
	=            Header         =
	=============================================-->
    <?php $this->load->view('front/header')?> 

	<!--=====  End of Header  ======-->

    <!--=============================================
    =            breadcrumb area         =
    =============================================-->
    
    <div class="breadcrumb-area " >
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="home"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Admin Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	<!--=====  End of breadcrumb area  ======-->

	<!--=============================================
	=            Login register page content         =
	=============================================-->
	<!-- -->
	<div class="page-content " style="background: #e9ecef;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-8 offset-2 mb-10 ">
					<!-- Login Forms-->
					<form action="login/login_check" method="post" autocomplete="off" >
						<div class="login-form" style="margin-top: 23px; margin-bottom: 23px;">
   <?php if($this->session->flashdata('msg')){ ?>
                        <div id="alarmmsg" class=" alert alert-<?=$this->session->flashdata('type');?> alert-dismissible" role="alert">
                            <button style="background:none!important;font-size:15px;" type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-message">
                                <span><?=$this->session->flashdata('msg');?></span>
                            </div>
                        </div>
                    <?php } ?>         
                            <h4 class="login-title"><i class="fa fa-user-circle"></i>&ensp;
                            Login Form </h4>
							<div class="row">
								<div class="col-md-12 col-12 mb-20">
									<label><i class="fa fa-envelope"></i>&ensp;Email Address*</label>
									<input class="mb-0" name="email" type="email" placeholder="Email Your Address">
								</div>
								<div class="col-12 mb-20">
									<label><i class="fa fa-key"></i>&ensp;Password*</label>
									<input class="mb-0" name="password" type="password" placeholder="Email Your Password">
								</div>
								<div class="col-md-8">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                                </div>
								<div class="col-md-4 mt-10 mb-20 text-left text-md-right">
								<a style="color: #fdcf09;" href="regs"><i class="fa fa-users"></i> Sign-UP</a>
								</div>
								<div class="col-md-12">
									<button class="register-button mt-0"><i class="fa fa-check-square"></i>&ensp;Login</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

    
    
	<!--=============================================
	=            Footer         =
	=============================================-->
	
    <?php $this->load->view('front/footer')?> 
	
	<!--=====  End of Footer  ======-->


	<!-- scroll to top  -->
	<a href="#" class="scroll-top"></a>
	<!-- end of scroll to top -->
	
	<!-- JS
	============================================ -->
    <?php $this->load->view('front/footerlink')?> 

</body>

</html>
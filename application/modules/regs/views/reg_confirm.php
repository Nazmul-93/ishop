<!DOCTYPE html>
<html class="no-js" lang="zxx">
<title>C-MART || Registration</title>
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
    
    <div class="breadcrumb-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Sign Up for Free</li>
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
		<div class="page-content mb-50">
		<div class="container">
			<div class="row">

			<div class="col-sm-12 col-md-12 col-xs-12 col-lg-8 offset-2 mb-10 ">
	<form action="regs/registration_form_confirm" enctype="multipart/form-data"  method="post" autocomplete="off">
 <input class="mb-0" name="sec_code" value="<?php echo $sec_code?>" type="hidden">
 <input class="mb-0" name="email_address" value="<?php echo $email?>" type="hidden">
 <input class="mb-0" name="mobile_no" value="<?php echo $phone_number?>" type="hidden">
 <input class="mb-0" name="last_inert_id" value="<?php echo $last_inert_id?>" type="hidden">
    
						<div class="login-form">
				   <?php if($this->session->flashdata('msg')){ ?>
                        <div id="alarmmsg" class=" alert alert-<?=$this->session->flashdata('type');?> alert-dismissible" role="alert">
                            <button style="background:none!important;font-size:15px;" type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-message">
                                <span><?=$this->session->flashdata('msg');?></span>
                            </div>
                        </div>
                    <?php } ?> 			<h4 class="login-title">Please Give the OTP Sended to your Mobile Number</h4>

							<div class="row">
			
									<div class="col-md-12 mb-20">
				<label>OTP ( Send to Mobile or Email )</label>
				<input class="mb-0" name="otp" type="text" placeholder="Type OTP Code Sended to Mobile" autocomplete="off">
								</div>

								<div class="col-12">
									<button class="register-button mt-0">Submit</button>
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

    
    
    

	
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
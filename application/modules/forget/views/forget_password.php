<div class="page-content mb-50">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-xs-12 col-lg-5 mx-auto mb-10 ">
				<div class="panel panel-login login_content_div" style="height:73vh;">
					<div class="col-lg-12 col-12">
<form id="login-form" method="POST"  onsubmit="return check_info()" action="forget/create_new_password" class="" autocomplete="off">
	<h3 class="text-center font-weight-bold">Retreive your password</h3><br>
	<?php if($this->session->flashdata('msg')){ ?>
		<div id="alarmmsg" class=" alert alert-<?=$this->session->flashdata('type');?> alert-dismissible" role="alert">
			<button style="background:none!important;font-size:15px;" type="button" class="close" data-dismiss="alert">&times;</button>
			<div class="alert-message">
				<span><?=$this->session->flashdata('msg');?></span>
			</div>
		</div>
	<?php } ?>

	<div class="form-group frm_grp">
		<input type="text" name="email" class="form_input form-control rounded-2 mb-2" placeholder="Enter Email address or Mobile-Number">
	</div>
	<div class="form-group"> 
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<button type="submit"  id="submit" tabindex="4" class="form-control btn-info" >
					<i class="fa fa-share-square-o"></i>  Send
				</button>
			</div>
			<span class="float-right">
				<a href="login" class="back_to_login_css"> <i class="fa fa-reply"></i>back to Login
				</a>
			</span>
		</div>
	</div>
</form>
					</div>
				</div>
        	</div>
		</div>
	</div>
</div>
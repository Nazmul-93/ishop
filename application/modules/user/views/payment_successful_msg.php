<!DOCTYPE html>
<html class="no-js" lang="zxx">
<title>C-MART || Successful-Message</title>
<?php $this->load->view('front/header_link')?>
<style>
.card_css{
	
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-clip: border-box;

}
.btn_success_payemnt{
	background: #008459 !important;
	/* width: 900%; */
}
.payment_success_head{
	font-weight:600!important;
}
.p_css{
	color:#222;
	font-weight:600;
	text-transform: capitalize;
}
.payment_success_head{
	font-weight:500;
	color:#008459!important;
	text-transform: capitalize;
}
.card_body{
	flex: 1 1 auto;
    padding: 1.25rem;
}

</style>
<body>
		<center style="margin-top: -145px;">
			<div class="card_css" style="width: 27rem;">
				<img class="card-img-top" src="frontassets/images/green_sign.png" alt="Card image cap">
				<div class="card_body">
					<h2 class="card-title  payment_success_head">Payment-Success</h2>
					<p class="card-text  p_css">Your Payment of $321.50 was successfully completed !!</p>
					<a href="home" class=" col-lg-8 btn btn-success btn_success_payemnt"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Continue-Shopping</a>
				</div>
				</div>
			</center>
</body>

</html>
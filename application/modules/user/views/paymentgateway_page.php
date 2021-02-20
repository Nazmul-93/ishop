<!DOCTYPE html>
<html class="no-js" lang="zxx">
<title>C-MART || Payment-Gateway</title>
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
<body style="background-color:#f7f7f7;">
		<center style="margin-top: -145px;">
			<div class="card_css" >
				<img class="card-img-top" style="width: 200vh;" src="frontassets/images/foo.png" alt="cash image cap">
				<div class="card_body">
					<h2 class="card-title  payment_success_head mb-50">Payment GetwaY</h2>
					
					  <form  onsubmit="return btn_disabled()" id="payment_gw" name="payment_gw" action="<?=$api['action_url']?>" method="post" >
					      
					      <?php if($api['com_title']=='aamarpay'){ ?>
					      
					      <input type="hidden" name="signature_key" value="<?=$api['signature_key']?>">
					      <input type="hidden" name="amount" value ='<?=$customer_info['grand_total']?>'>
					       <input type="hidden" id="order_id" name="opt_a" value="<?=$order_id?>">
					      <?php }else{  ?>
					       <input type="hidden" id="order_id" name="order_id" value="<?=$order_id?>">
					      <input type="hidden" name="store_passwd" value="<?=$api['signature_key']?>">
					      <input type="hidden" name="total_amount" value ='<?=$customer_info['grand_total']?>'>
					      <?php }?>
					      <input type="hidden" id="store_id" name="store_id" value="<?=$api['store_id']?>">
					      <input type="hidden" id="currency" name="currency" value="BDT">
					      <input type="hidden" name="desc" value="payment for ecommerse proudct">
					      <input type="hidden" name="cus_name" value="<?=$customer_info['sh_name']?>">
					      <input type="hidden" name="cus_email" value="<?=$customer_info['sh_email']?>">
					      <input type="hidden" name="cus_phone" value="<?=$customer_info['sh_phone']?>">
					      
					     
					      <input type="hidden" name="success_url" value='<?=$api['success_url']?>'>
                          <input type="hidden" name="fail_url" value='<?=$api['failed_url']?>'>
                        <input type="hidden" name="cancel_url" value='<?=$api['cancel_url']?>'>
                        <input type="hidden" name ="tran_id" value="<?=date('YmdHi').rand(1,9999999);?>">
					      
			
                  
                
                <!--<input type="hidden" id="order_id" name="order_id" value="<?=$order_id?>">-->

                <!--<input type="hidden" name ="currency" value='BDT'>-->

                <!--<input type="hidden" id="store_id" name="store_id" value="cmartcombdlive">-->
                <!--<input type="hidden" id="store_passwd" name="store_passwd" value="5EC3BDD81C2F582676">-->
                

                <!---->

          
                

                  <!--<input type="submit" class="btn btn-info pull-right mt-1"  name="save" value="Payment">-->
                  <button type="submmit" class=" col-lg-8 btn btn-success btn_success_payemnt"><i class="fa fa-check" aria-hidden="true"></i> Click Here To Pay</button>
          </form>
				
					
				</div>
				</div>
			</center>
</body>

</html>
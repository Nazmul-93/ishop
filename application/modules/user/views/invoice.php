<!DOCTYPE html>
<html class="no-js" lang="zxx">
<title> Cmart | Invoice</title>

<?php $this->load->view('front/header_link') ?>
<style>
  
* {
margin: 0;
box-sizing: border-box;
}

::selection {
background: #f31544;
color: #FFF;
}

::moz-selection {
background: #f31544;
color: #FFF;
}

.h1_css {
font-size: 1em;
color: #222;
}

.h2_css {
font-size: .9em;
line-height: 20px;
text-transform: capitalize;
}

.h3_css {
font-size: 1.2em;
font-weight: 300;
line-height: 2em;
}

.p_css {
font-size: .7em;
color: #666;
line-height: 1.2em;
}

#invoiceholder {
width: 100%;
height: 100%;
padding-top: 50px;
}

#headerimage {
z-index: -1;
position: relative;
top: -50px;
height: 350px;
-webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, .15), inset 0 -2px 4px rgba(0, 0, 0, .15);
-moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, .15), inset 0 -2px 4px rgba(0, 0, 0, .15);
box-shadow: inset 0 2px 4px rgba(0, 0, 0, .15), inset 0 -2px 4px rgba(0, 0, 0, .15);
overflow: hidden;
background-attachment: fixed;
background-size: 1920px 80%;
background-position: 50% -90%;
}

#invoice {
position: relative;
top: -50px;
margin: 0 auto;
width: 800px;
background: #FFF;
border: 2px solid #eee;
}

[id*='invoice-'] {
/* Targets all id with 'col-' */
border-bottom: 1px solid #EEE;
padding: 12px;
}

#invoice-top {
min-height: 140px;
  }

#invoice-mid {
min-height: 100px;
line-height: 20px;
}

#invoice-bot {
min-height: 250px;
}

.logo_invoice {
float: left;
height: 60px;
width: 60px;
background: url(uploads/logo.png) no-repeat;
background-size: 60px 60px;
}

.clientlogo {
float: left;
height: 60px;
width: 60px;
background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
background-size: 60px 60px;
border-radius: 50px;
}

.info {
display: block;
float: left;
margin-left: -55px;
}

.info_mid {
display: block;
float: left;
margin-left: 12px;
}

.info_mid,
h6 {
line-height: 7px;
text-transform: capitalize;
}

.title {
float: right;
}

.title p {
text-align: right;
}

#project {
margin-left: 85%;
}

table {
width: 100%;
border-collapse: collapse;
}

td {
padding: 5px 0 5px 15px;
border: 1px solid #EEE
}

.tabletitle {
padding: 5px;
background: #EEE;
}

.service {
border: 1px solid #EEE;
}

.item {
width: 50%;
}

.itemtext {
font-size: .9em;
}

#legalcopy {
margin-top: 30px;
}



.effect2 {
position: relative;
}

.effect2:before,
.effect2:after {
z-index: -1;
position: absolute;
content: "";
bottom: 15px;
left: 10px;
width: 50%;
top: 80%;
max-width: 300px;
background: #777;
-webkit-box-shadow: 0 15px 10px #777;
-moz-box-shadow: 0 15px 10px #777;
box-shadow: 0 15px 10px #777;
-webkit-transform: rotate(-3deg);
-moz-transform: rotate(-3deg);
-o-transform: rotate(-3deg);
-ms-transform: rotate(-3deg);
transform: rotate(-3deg);
}

.effect2:after {
-webkit-transform: rotate(3deg);
-moz-transform: rotate(3deg);
-o-transform: rotate(3deg);
-ms-transform: rotate(3deg);
transform: rotate(3deg);
right: 10px;
left: auto;
}

p.legal{
width: 90%;
font-size:12px!important;
}


p .payment_fnt_size {
  font-size:14px!important;
  color:#f31544;
  margin-right: -3px;
}
</style>
<body>

	<!--=============================================
	=            Header         =
	=============================================-->

    <?php $this->load->view('front/header') ?>
	<!--=====  End of Header  ======-->

    <!--=============================================
    =            breadcrumb area         =
    =============================================-->
    
    <div class="breadcrumb-area mb-30 breadcrumb_margin_top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="home"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active"> <a href="user">  Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	<!--=====  End of breadcrumb area  ======-->

	<!--=============================================
	=            My account page section         =
	=============================================-->
	
	<div class="my-account-section section position-relative mb-50 fix">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<div class="row">

	
						<!-- My Account Tab Menu End -->

						<!-- My Account Tab Content Start -->
						<div class="col-lg-8 col-12 mx-auto">
					                <!--Reply And Comment Start-->
                          <div class="reply-comment-area">
                            <div class="comments-wrapper">
                                <h3 class="comments-title">
                                  <i class="fa fa-list-alt" aria-hidden="true"></i>&ensp;Your-Invoice
                                </h3>

                                <?php if($this->session->flashdata('msg')){ ?>
                              <div id="alarmmsg" class="alert_div   alert alert-<?=$this->session->flashdata('type');?> alert-dismissible" role="alert">
                                  <button style="background:none!important;font-size:22px;position:absolute;top:1px;" type="button" class="close" data-dismiss="alert">&times;</button>
                                  <div class="alert-message">
                                      <span><?=$this->session->flashdata('msg');?></span>
                                  </div>
                              </div>
                              <?php } ?>
                      <div id="invoiceholder">
                        <div id="invoice" class="effect2">

                        <div id="invoice-top">
                        <div class="logo_invoice"></div>
                        <div class="info">
                          <!-- <img src="frontassets/img/logo/ecom_logo_blue.png" alt="logo-image"> -->
                          <h3><?=$company_info[0]['name']?></h3>
                          <h2 class="h2_css" style="font-weight:bold;"><?=$company_info[0]['phone']?> </h2>
                          <h2 class="h2_css"><?=$company_info[0]['email']?> </h2>
                          <p class="p_css">
                          <?=$company_info[0]['ctg_address']?> 
                          </p>
                        </div>
                        <!--End Info-->
                        <div class="title">
                          <h1 class="h1_css">INV#

                            <?=$order_details[0]['order_number'] ?></h1>
                          <!--<p class="p_css">Issued:<?=date('d/m/Y', strtotime($order_details[0]['date'])) ?></br>-->
                          <!--</p>-->
                            <p class="p_css">Issued: <?=$order_details[0]['date'] ?></br>
                          </p>
                        </div>
                        </div>
                        <div id="invoice-mid">
                        <div class="clientlogo"></div>
                        <div class="info_mid">
                          <h2 class="h2_css">Invoice To</h2>
                          <h6><?=$login[0]['user_name'] ?></h6></br>
                          <h6><?=$login[0]['email'] ?></h6></br>
                        </div>
                              <div id="project">
                                <h2 class="h2_css">Payment Status</h2>
                                <?php if($order_details[0]['payment_status']==0){?>
                                <p class=" payment_fnt_size"><b>Pending</b></p>
                                <?php } ?>
                                <?php if($order_details[0]['payment_status']==1){ ?>
                                <p class="  payment_fnt_size"><b>Paid</b></p>

                                <?php } ?>
                              </div>
                        </div>
                        <!--End Invoice Mid-->
                        <div id="invoice-bot">
                        <div id="table">
                          <table>
                            <tr class="tabletitle">
                              <td style="width:65%;" class="item">
                                <h2 class="h2_css">Product Name</h2>
                              </td>
                              <td  class="Rate">
                                <h2 class="h2_css">Qty</h2>
                              </td>
                              <td class="subtotal">
                                <h2 class="h2_css">Price</h2>
                              </td>
                              <td class="subtotal">
                                <h2 class="h2_css">Total Price</h2>
                              </td>
                            </tr>
                            <tr class="service">
                        <?php $total=0; foreach ($order_details as $details) { ?>
                        <td class="tableitem"><p class="itemtext"><?=$details['pro_name'] ?></p></td>
                        <td class="tableitem"><p class="itemtext"><?= $details['product_qty'] ?></p></td>
                        <td class="tableitem"><p class="itemtext"><?= $details['price'] ?></p></td>
                        <td class="tableitem"><p class="itemtext"><?= $details['product_qty']*$details['price'] ?></p></td>
                        </tr>
                        <?php 
                        // $total += ($details['product_qty']*$details['price']);
                          $total = $total+($details['product_qty']*$details['price']);
                        } 
                        ?>
                            <tr class="tabletitle">
                              <td class="Rate text-right" colspan="3">
                                <h2 class="h2_css">Sub Total</h2>
                              </td>
                              <td class="payment"><h2 class="h2_css">TK-<?=$total?></h2></td>
                            </tr>
                             <tr class="tabletitle">
                              <td class="Rate text-right" colspan="3">
                                <h2 class="h2_css">Shipping Cost</h2>
                              </td>
                              <td class="payment"><h2 class="h2_css">TK-<?=$details['shipping_cost']?></h2></td>
                            </tr>
                             <tr class="tabletitle">
                              <td class="Rate text-right" colspan="3">
                                <h2 class="h2_css">Grand Total</h2>
                              </td>
                              <td class="payment"><h2 class="h2_css">TK-<?=$details['shipping_cost']+$total?></h2></td>
                            </tr>
                          </table>
                          <?php if($order_details[0]['payment_status']==0){?>

          	  <form  onsubmit="return btn_disabled()" id="payment_gw" name="payment_gw" action="<?=$api['action_url']?>" method="post" >
					      
					      <?php if($api['com_title']=='aamarpay'){ ?>
					      
					      <input type="hidden" name="signature_key" value="707052fcbf66ed5431d626e9a38d2821">
					      <input type="hidden" name="amount" value ='1'>
					       <input type="hidden" id="order_id" name="opt_a" value="<?=$order_id?>">
					      <?php }else{  ?>
					       <input type="hidden" id="order_id" name="order_id" value="<?=$order_id?>">
					      <input type="hidden" name="store_passwd" value="<?=$api['signature_key']?>">
					      <input type="hidden" name="total_amount" value ='10'>
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
					      
			
                <input type="submit" class="btn btn-info pull-right mt-1"  name="save" value="Payment">
          </form>
				
                            

          <?php } else{?>
        <span><h5  style="color:red;"> You Have Been Paid Successfully !!</h3></span>
          <?php }?>
       
                    
                        </div>
                        <!--End Table-->
                        <div id="legalcopy">
                          <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.
                          </p>
                        </div>

                        </div>
                        <!--End InvoiceBot-->
                        </div>
                        <!--End Invoice-->
                        </div>
                            </div>
                        </div>
                        <!--Reply And Comment End-->
						</div>
						<!-- My Account Tab Content End -->
					</div>

				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of My account page section  ======-->
	

	<!--=============================================
	=            Footer         =
	=============================================-->
	
    <?php $this->load->view('front/footer') ?>
	
	<!--=====  End of Footer  ======-->


	<!-- scroll to top  -->
	<a href="javascript:void(0);" class="scroll-top"></a>
	<!-- end of scroll to top -->
	
	<!-- JS
	============================================ -->
    <?php $this->load->view('front/footerlink') ?>

</body>

</html>
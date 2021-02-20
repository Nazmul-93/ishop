<!DOCTYPE html>
<html class="no-js" lang="zxx">
<title> Cmart | User-Dashboard</title>

<?php $this->load->view('front/header_link') ?>
<style>
    a.disabled {
  pointer-events: none;
  cursor: default;
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
                            <li class="active">Dashboard</li>
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

						<!-- My Account Tab Menu Start -->
						<div class="col-lg-3 col-12">
							<div class="myaccount-tab-menu nav" role="tablist">
								<a href="#dashboard" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
									Dashboard</a>
								<a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
								
							<a href="#address-edit" data-toggle="tab" class=""><i class="fa fa-address-book" aria-hidden="true"></i> Billing-address</a>
								
								<a href="#account-info" data-toggle="tab"><i class="fa fa-wrench"></i> Account-Settings </a>

								<a href="logout"><i class="fa fa-sign-out"></i> Logout</a>
							</div>
						</div>
						<!-- My Account Tab Menu End -->

						<!-- My Account Tab Content Start -->
						<div class="col-lg-9 col-12">
							<div class="tab-content" id="myaccountContent">
								<!-- Single Tab Content Start -->
								<div class="tab-pane fade show active" id="dashboard" role="tabpanel">
									<div class="myaccount-content">
										<h3><i class="fa fa-dashboard"></i> Dashboard</h3>
										<div class="myaccount-table table-responsive text-center">
											<table class="table ">
											<tbody class="">
												<tr>
													<th> <i class="fa fa-hashtag"></i> Total-Order : </th>
													<th> <?php echo $order_status['total_order']?></th>
													<th> <i class="fa fa-hashtag"></i> Total-Order Paid : </th>
													<th> <?php echo $order_status['payment_status']?></th>
											
												</tr>
												<tr>
													<th> <i class="fa fa-hashtag"></i> Total-Pending Order : </th>
													<th> <?php  echo $order_status['pending']?></th>
													<th> <i class="fa fa-hashtag"></i> Total-Delivery Order : </th>
													<th> <?php  echo $order_status['delivered']?></th>				
												</tr>
												</tbody>
											
											</table>
										</div>
									</div>
								</div>
								<!-- Single Tab Content End -->

								<!-- Single Tab Content Start -->
								<div class="tab-pane fade" id="orders" role="tabpanel">
									<div class="myaccount-content">
										<h3><i class="fa fa-cart-arrow-down"></i> Orders</h3>
										<div class="myaccount-table table-responsive text-center">
											<table class="table table-bordered">
												<thead class="thead-light">
												<tr>
													<th>Order-Id</th>
													<th>Order-Date</th>
													<th>Customer-Name</th>
													<th>Total Amount</th>
													<th>Payment-Method</th>
													<th>Order-Status</th>
													<th>Payment-Status</th>
													<th>Details</th>
													<th>Cancel</th>
												</tr>
												</thead>
												<tbody>
                                                <?php foreach ($order_details as $key => $value) {?>
												<tr>
													<td><?=($key+1);?></td>
													<td><?=$value['date']?></td>
													<td><?=$value['sh_name']?></td>
													<td> <?=$value['grand_total']; ?></td>
													<td>
													    <?php if($value['payment_type']==1): ?>
													    Cash On Delivery
													    <?php elseif($value['payment_type']==2):?>
													    Credit/Debit Card/Bkash/M-Kash/Mobile-Banking/Emi
													    <?php endif?>
													    
													</td>
													<td>
													     <?php if($value['order_status']==0): ?>
													    Pending
													    <?php elseif($value['order_status']==1):?>
													    Delivered
													    <?php elseif($value['order_status']==2):?>
													    Cancel
												
													    <?php endif?>
													</td>
													<td>
													    <?php if($value['payment_status']==0): ?>
													    Pending
													    <?php elseif($value['payment_status']==1):?>
													    Paid
													  
													    <?php endif?>
													</td>
												
													<td><a href="user/invoice/<?=$value['id'];?>" class="btn btn-info">Details</a></td>
													<td><a href="user/order_cancel/<?=$value['id'];?>" class="btn btn-info <?php if($value['order_status']==2) echo 'disabled'; ?>" >Cancel</a></td>
													<!--<td><a href="user/invoice/<?=$value['id'];?>" class="btn btn-info">Paynow</a></td>-->
												</tr>
                                                <?php }?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- Single Tab Content End -->


								<!-- Single Tab Content Start -->
								<div class="tab-pane fade" id="address-edit" role="tabpanel">
									<div class="myaccount-content">
										<h3><i class="fa fa-address-book" aria-hidden="true"></i> Billing Address</h3>
										<?php if(count($billing_address)>0){?>
											
										<address>
											<p> <span class="span_css"> *User-Name </span>: <strong><i class="fa fa-user-circle"></i> <?=$billing_address[0]['cus_name'] ?></strong></p>
											<p>	<span class="span_css"> *State </span> :<i class="fa fa-location-arrow"></i> <?=$billing_address[0]['state'];?></p>
											
											<p> <span class="span_css"> *City </span> : <i class="fa fa-map-marker"></i> <?=$billing_address[0]['city'];?></p>
											<p> <span class="span_css">*Address</span> : <i class="fa fa-road"></i> <?=$billing_address[0]['address'];?>
										</p>
										<p> <span class="span_css"> *Mobile </span> : <i class="fa fa-phone"></i> <?=$billing_address[0]['mobile'];?>
										</p>
										
										<p> <span class="span_css"> *Zip-Code </span> : <i class="fa fa-bullseye"></i> <?=$billing_address[0]['zip_code'];?>
										</p>
										</address>

										<a style="width:170px;" href="user/edit_address/<?=$billing_address[0]['login_id']?>" class="btn d-inline-block edit-address-btn "><i class="fa fa-edit"></i>Edit </a>
										
										<?php }else{?>
										<span><h3> Data Not Available</h3></span>
										<?php }?>
									</div>
								</div>
								<!-- Single Tab Content End -->

				<!-- Single Tab Content Start -->
				<div class="tab-pane fade" id="account-info" role="tabpanel">
					<div class="myaccount-content">
						<h3><i class="fa fa-wrench"></i>Account-Settings</h3>
						<div class="account-details-form">
							<form id="form"  method="post" autocomplete="off">
								<div class="row">
									<div class="col-12 mb-30">
										<input id="email_id" value="<?php if(!empty($login[0]['email'])) echo $login[0]['email']?>"  placeholder="Email Address" name="email" type="email" readonly/>
										<span id="email"><span>
									</div>

									<div class="col-12 mb-30"><h4>Password change</h4></div>

									<div class="col-12 mb-30">
										<input  name="current_password" id="c_pwd" placeholder="Current Password" type="password">
										<span id="current_password"><span>
									</div>

									<div class="col-lg-6 col-12 mb-30">
										<input  placeholder="New Password" id="new_password" name="password" type="password">
										<span id="password"><span>
									</div>

									<div class="col-lg-6 col-12 mb-30">
										<input  name="confirm_password" id="c_password"  placeholder="Confirm Password" type="password">
										<span id="confirm_password"><span>
									</div>

									<div class="col-12">
										<button id="submit" class="save-change-btn">Save Changes</button>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Single Tab Content End -->
							</div>
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
    
   <script>
        $(document).on('click','#submit',function(e){
            console.log($("#form").serialize());
            e.preventDefault();

                             $.ajax({
                              type: "POST",
                              url: "<?=base_url('user/accountUpdate')?>",
                              data:$("#form").serialize(),
                              success: function (data) {
                                  
                                  
                                let allData = JSON.parse(data);
                                let errors = allData.messages;

                                Object.keys(errors).forEach((key,index)=>{
                                  $("#"+key).html(errors[key]);

                                  });
                                  
                                   
                                  
                                  if(allData.success==true)
                                  {
                                     $("#email").empty();
                                      $("#current_password").empty();
                                      $("#password").empty();
                                      $("#confirm_password").empty();
                                      $("#new_password").val('');
                                      $("#c_pwd").val('');
                                      $("#c_password").val('');
                                      $("#email_id").val('');
                                      
                                      
                                      
                                    alert("account Updated successfully");
                                    
                                  }
                                  else if(allData.current_password==false)
                                  {
                                      $("#email").empty();
                                      $("#current_password").empty();
                                      $("#password").empty();
                                      $("#confirm_password").empty();
                                      alert("Your current password does not match");
                                  }

                              },
                              error: function (res) {
                                  //console.log(res);
                              }
                         });

           });
   </script>

</body>

</html>
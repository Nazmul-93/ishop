<!DOCTYPE html>
<html class="no-js" lang="zxx">
<title> Cmart | Update-Address</title>

<?php $this->load->view('front/header_link') ?>

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
                            <li class="active"><a href="user">Dashboard</a></li>
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

						<!-- My Account Tab Content Start -->
				<div class="col-lg-9  col-12 offset-2">
					<div class="tab-pane fade active show" id="account-info" role="tabpanel">
					<div class="myaccount-content">
						<h3> <i class="fa fa-edit"></i>  Update-Billing Address</h3>

						<div class="account-details-form">
							<form action="user/update_billing_address/<?=$address_data[0]['id']; ?>" method="post" autocomplete="off">
								<div class="row">
									
								<div class="col-12 col-lg-12 mb-30">
									<label for="username"><i class="fa fa-user-o"></i> User-Name</label>
										<input  name="bl_name" type="text" value="<?=$address_data[0]['cus_name']; ?>">
									</div>
									<div class="col-lg-6 col-12 mb-30">
									<label for="state-name"><i class="fa fa-location-arrow"></i> State-Name</label>
										<input id="first-name" name="bl_state"  type="text"  value="<?=$address_data[0]['state']; ?>">
									</div>
									<div class="col-lg-6 col-12 mb-30">
										<label for="city-name"><i class="fa fa-map-marker"></i> City-Name</label>
										<input id="last-name" name="bl_city" type="text"  value="<?=$address_data[0]['city']; ?>">
									</div>
									<div class="col-lg-6 col-12 mb-30">
									<label for="mobile"><i class="fa fa-phone"></i> Mobile-Number</label>
										<input  name="mobile"  type="text" value=" <?=$address_data[0]['mobile']; ?>">
									</div>
									<div class="col-lg-6 col-12 mb-30">
										<label for="country"><i class="fa fa-bullseye"></i> Zip-Code</label>
										<input id="last-name" name="zip_code" type="text" value="<?=$address_data[0]['zip_code']; ?>">
									</div>
									<div class="col-12 mb-30">
									<label for="address"><i class="fa fa-road"></i> Address</label>
										<input id="display-name" name="address" type="text" value="<?=$address_data[0]['address'];?>">
									</div>
									<div class="col-12 col-lg-12">
										<button class="save-change-btn"> 
											<i class="fa fa-check"></i> 
											Submit
										</button>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
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
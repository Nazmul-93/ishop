
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<title> Cmart || Wishlist </title>
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
    
    <div class="breadcrumb-area mb-30 breadcrumb_margin_top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="home"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	<!--=====  End of breadcrumb area  ======-->
	
    <!--=============================================
    =            Wishlist page content         =
    =============================================-->
    

    <div class="page-section section mb-50">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<form action="#">				
							<!--=======  cart table  =======-->
							<?php if(!empty($whishlist_data)){?>
							<div class="cart-table table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th class="pro-remove">Remove</th>
											<th class="pro-thumbnail">Image</th>
											<th class="pro-title">Product</th>
											<th class="pro-price">Price</th>
											<th class="pro-quantity">Quantity</th>
											<th class="pro-subtotal">Add To Cart</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($whishlist_data as $key=>$value){?>
										<tr>
										
											<td class="pro-remove">
											<a href="whishlist/delete_whishlist/<?=$value['id'];?>"><i class="fa fa-trash-o"></i>
											</a>
											</td>
											<td class="pro-thumbnail"><a href="#">
											<img style="height:100px;padding:10px;" src="uploads/product/thumbnail/<?=$value['product_img'];?>" class="img-fluid" alt=" Whishlist-Product">
											</a>
											</td>
											
											<td class="pro-title" data-productid="echo $id">
												<a href="javascript:void(0);" >
												<?=$value['product_name'];?>
												</a>
												<input  name="pro_id[]" type="hidden" value="<?=$value['pro_id'];?>">
											</td>
											<td class="pro-price">
											<span> <?=$value['pro_price'];?></span>
											</td>
											<td class="pro-quantity">
											<div class="pro-qty">
											<input id="cart_qty" type="text" value="1">
											</div>
											</td> 
											<td class="pro-addtocart">
											
											<a  id="add_to_cart_btn" onclick="add_to_cart(<?=$value['pro_id']; ?>)" data-tooltip="Add to Cart"  href="javascript:void(0);" class=" btn btn-success add-to-cart" tabindex="0"><i class="fa fa-shopping-cart"></i>
											 <span style="font-size:12px;">ADD TO CART</span>
											 </a>
											 </td>
									
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
							<?php }else{?>
								<span><h2 class="text-center text-info">Your Whishlist Is Empty !!!</h2></span>
							<?php }?>	
							<!--=======  End of cart table  =======-->
							
						</form>	
					</div>
				</div>
			</div>
		</div>
		
		<!--=====  End of Cart page content  ======-->

	<!--=============================================
	=            Footer         =
	=============================================-->
	
  <?php $this->load->view('front/footer')?>
	
	<!--=====  End of Footer  ======-->


		<!-- scroll to top  -->
		<a href="javascript:void(0);" class="scroll-top"></a>
		<!-- end of scroll to top -->
	
	<!-- JS
	============================================ -->
  <?php $this->load->view('front/footerlink')?>
  
  

  
  
  
  <script>
    function remove_whishlist(pro_id) {
		
		
       $.ajax({
		   
		 
		alert("hi");   
        
       });
   }
   </script>

</body>

</html>
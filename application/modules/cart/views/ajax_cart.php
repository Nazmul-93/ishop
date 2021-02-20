				<!-- shopping cart -->
                <div class="shopping-cart" id="shopping-cart">
								<a href="#">
									<div class="cart-icon d-inline-block">
										<span class="icon_bag_alt"></span>
									</div>
									<div class="cart-info d-inline-block">
										<p>Shopping Cart &ensp;<i class="fa fa-angle-down" aria-hidden="true"></i> 
											<span>
								<?=$this->cart->total_items();?> items-<?=number_format($this->cart->total(),2);?>$
											</span>
										</p>
									</div>
								</a>
							<!-- end of shopping cart -->
							<!-- cart floating box -->
							<?php $cart = $this->cart->contents();?>
							<div class="cart-floating-box" id="cart-floating-box">
								<div class="cart-items">
								<?php  foreach ($cart as $key => $value) { ?>	
									<div class="cart-float-single-item d-flex">
										<span class="remove-item">
											<a onclick="remove_cart('<?=$value['rowid']; ?>')"  href="javascript:void(0)">
											<i class="fa fa-times"></i></a>
										</span>
										<div class="cart-float-single-item-image">
											<a href="product/single_product/<?=$value['profile_name'];?>">
												<img  style="height:65px;" src="uploads/product/thumbnail/<?=$value['image'];?>" class="img-fluid" alt="cart-image">
												</a>
										</div>
										<div class="cart-float-single-item-desc">
											<p class="product-title">
											<a href="product/single_product/<?=$value['profile_name'];?>">
												<?=$value['name'];?>
											</a>
												</p>
											<p class="price"><span class="count">
												<?=$value['qty']; ?>x</span> ৳ <?= number_format($value['price'],2);?></p>
										</div>
									</div>
								<?php }?>
								</div>
								<div class="cart-calculation">
									<div class="calculation-details">
										<p class="total">Subtotal <span>৳ <?=number_format($this->cart->total(),2);?></span></p>
									</div>
									<div class="floating-cart-btn text-center">
										<a href="checkout">Checkout</a>
										<a href="cart">View Cart</a>
									</div>
								</div>
							</div>
							<!-- end of cart floating box -->
							</div>
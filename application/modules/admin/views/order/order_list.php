<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title> Cmart | Admin</title>
<?php $this->load->view('backend/headlink')?>


  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?php $this->load->view('backend/nav_head')?>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <!-- ===== left-Sidebar start======= -->
    <?php $this->load->view('backend/left_sidebar')?>
    
    <!-- ============ left-Sidebar end======= -->
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
   
         
        </div>
        <div class="content-body">

<!-- Default ordering table -->
<section id="ordering">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg_color" >
                    <h4 class="card-title" >Manage Order</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                                              <?php if($this->session->flashdata('msg')){ ?>
                        <div id="alarmmsg" class=" alert alert-<?=$this->session->flashdata('type');?> alert-dismissible" role="alert">
                            <button style="background:none!important;font-size:15px;" type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-message">
                                <span><?=$this->session->flashdata('msg');?></span>
                            </div>
                        </div>
                    <?php } ?>  

                  <table class="table table-striped table-bordered default-ordering table-responsive">
                   <thead class="thead-light">
                        <tr>
                                                
                                                	<th>Order Id</th>
													<th>Order-Date</th>
													<th>Total Amount</th>
													<th>Payment-Method</th>
													<th>Order-Status</th>
													<th>Payment-Status</th>
													<th>Details</th>
													<th>Cancel</th>
													<th>Delivered</th>
													<th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                    
                                                
                                                 <?php foreach ($order_details as $key => $value) {?>
												<tr>
											
													<td>#<?=$value['order_number']?></td>
													<td><?=$value['date']?></td>
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
												
													<td><a href="admin/order_details/<?=$value['id'];?>" class="btn btn_details">Details</a></td>
													<td><a href="admin/order_cancel/<?=$value['id'];?>" class="btn btn_delete">Cancel</a></td>
													<td><a href="admin/order_delivered/<?=$value['id'];?>" class="btn btn_delivery">Delivered</a></td>
													<td><a href="admin/delete_order_list/<?=$value['id'];?>" class="btn btn_delete">Delete</a></td>
												</tr>
                                                <?php }?>
                                                
                                                
                                                
                        </tbody>
                      
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Default ordering table -->


        </div>
      </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php $this->load->view('backend/footer')?>
    <!-- END: Footer-->


<?php $this->load->view('backend/footerlink')?>

  </body>

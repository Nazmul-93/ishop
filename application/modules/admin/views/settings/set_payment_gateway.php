<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title> CMART | Admin</title>
<?php $this->load->view('backend/headlink') ?>


<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<?php $this->load->view('backend/nav_head') ?>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<!-- ===== left-Sidebar start======= -->
<?php $this->load->view('backend/left_sidebar') ?>

<!-- ============ left-Sidebar end======= -->
<!-- END: Main Menu-->
<!-- BEGIN: Content-->
<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">


</div>
<div class="content-body">

<!-- Default ordering table -->
<section id="ordering ">
<div class="row">
<div class="col-12 col-lg-12">
<div class="card">
<div class="card-header bg_color">
<h4 class="card-title">Set Payment Gateway</h4>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
</div>
<div class="row justify-content-md-center">
<div class="col-md-12">
<div class="card">

<div class="card-content collpase show">
<div class="card-body">
                               <?php if($this->session->flashdata('msg')){ ?>
                        <div id="alarmmsg" class=" alert alert-<?=$this->session->flashdata('type');?> alert-dismissible" role="alert">
                            <button style="background:none!important;font-size:15px;" type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-message">
                                <span><?=$this->session->flashdata('msg');?></span>
                            </div>
                        </div>
                    <?php } ?>  
                    <a href="admin/add_payment_gateway">
                 <button type="button" title="ADD Payment-Gateway FORM" class="btn btn-success btn_css mr-1 mb-1 "><i class="ft-plus-square"></i> Add Payment Gateway  </button>
                 </a>
                        <table class="table table-striped table-bordered default-ordering table-responsive">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Company</th>
                                    <th>Signature Key</th>
                                    <th >Store ID</th>
                                    <th>Merchant ID</th>
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                foreach ($payment_gateway as $key => $value) 
                {
                    $sl=$key+1;
                    $ssl_id=$value['payid'];
                    $company_name=$value['com_title'];
                    $signature_key=$value['signature_key'];
                    $merchant_id=$value['merchant_id'];
                    $store_id=$value['store_id'];
                    $ac_st=$value['act_st'];
                    if($ac_st==1)
                    {
                        $at="Active";
                        $cl="Make In-active";
                        $clt="btn btn_inactive_userlist";
                    }
                    else
                    {
                        $at="In-active"; 
                        $cl="Make Active";
                        $clt="btn btn_makeactive_userlist";
                    }
                    echo "<tr>
                              <td>$sl</td>
                              <td>$company_name</td>
                              <td>$signature_key</td>
                              <td  >$store_id</td>
                              <td>$merchant_id</td>
                              <td class='d-flex'> <a href='admin/delete_gateway/$ssl_id' class='type-error   btn btn-icon btn-danger btn_delete mr-1 mb-1 mt-1'>
                                  <i class='fa fa-trash'>
                                 Delete
                                 </i>
                                  </a>
                                  <a href='admin/edit_gateway/$ssl_id' class='btn btn-icon btn-secondary icon mr-1 mb-1 mt-1 btn_edit'>
                                  
                                 Edit
                                 
                                  </a>
                            <a href='admin/update_gateway/$ssl_id/$ac_st' class='type-error   btn btn-icon  btn_inactive_userlist  mr-1 mb-1 mt-1'>
                                  
                                 $at
                                 
                                  </a>
                                  </td>
                         </tr>";
                }
                                ?>

                            </tbody>
                      
                        </table>
</div>
</div>
</div>
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
<?php $this->load->view('backend/footer') ?>
<!-- END: Footer-->


<?php $this->load->view('backend/footerlink') ?>

</body>
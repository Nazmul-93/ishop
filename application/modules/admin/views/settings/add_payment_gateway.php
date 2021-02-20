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
<div class="col-12">
<div class="card">
<div class="card-header bg_color">
<h4 class="card-title">Add Set Payment Gateway</h4>
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
<form action="admin/add_payment_gateway_post" enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
<div class="form-body">
    <div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Company Title</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Company Title" name="com_title">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Signature Key</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Signature Key" name="signature_key">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Merchant ID</label>
    <div class="col-md-8">
   <input type="text" id="eventRegInput1" class="form-control" placeholder="Merchant ID " name="merchant_id">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Store ID</label>
    <div class="col-md-8">
   <input type="text" id="eventRegInput1" class="form-control" placeholder="Store ID" name="store_id">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Action URL</label>
    <div class="col-md-8">
   <input type="text" id="eventRegInput1" class="form-control" placeholder="Action URL" name="action_url">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Success URL</label>
    <div class="col-md-8">
   <input type="text" id="eventRegInput1" class="form-control" placeholder="Success URL" name="success_url">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Failed URL</label>
    <div class="col-md-8">
   <input type="text" id="eventRegInput1" class="form-control" placeholder="Failed URL" name="failed_url">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Cancel URL</label>
    <div class="col-md-8">
   <input type="text" id="eventRegInput1" class="form-control" placeholder="Cancel URL" name="cancel_url">
    </div>
</div>

</div>


<div class="form-actions center ">
<button id="type-success" type="submit" class="btn btn-primary col-sm-4 offset-3">
    <i class="fa fa-check-square-o"></i> Submit
</button>
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
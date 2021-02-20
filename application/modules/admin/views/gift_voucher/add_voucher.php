<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title>Cmart | Admin</title>
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
<h4 class="card-title">Add Gift-Voucher Form</h4>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
</div>
<div class="row justify-content-md-center">
<div class="col-md-12">
<div class="card">

<div class="card-content collpase show">
<div class="card-body">
<form action="admin/add_voucher_post" enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
<div class="form-body">
    
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Gift-Voucher Name</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Enter Gift-Voucher Name" name="gift_name">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Gift-Voucher Price</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Enter Gift-Voucher Price" name="gift_price">
    </div>
</div>
<div class="form-group row">
        <label class="col-md-3 label-control" for="eventRegInput2"> Short-Descriptions</label>
        <div class="col-md-8">
          <textarea class="form-control" id="placeTextarea" rows="3" cols="50" placeholder="Textarea with placeholder" name="short_descrp">       
           </textarea>
        </div>
      </div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput2">Upload-Image</label>
    <div class="col-md-9">

        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width:150px;height:120px;">
                <img class="multi_img_file" src="backassets\app-assets\images\add_sign.jpg" alt="sa Image" />
            </div>
            <div>
                <span class="btn btn_select_img btn-file mt-1">
                    <span class="fileinput-new">Select image</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="files" id="files">
                </span>
                <a href="#" class="btn btn_delete_img fileinput-exists mt-1" data-dismiss="fileinput">Remove</a>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-9">
<input type="file" name="files" id="files" class="default">
</div> -->

</div>


<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput2">View-Status</label>
    <div class="col-md-8">
        <select class="select2 form-control" id="id_h5_single" name="show_status">
            <option value="">Select</option>
            <option value="1">Show</option>
            <option value="2">Hide</option>
        </select>
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
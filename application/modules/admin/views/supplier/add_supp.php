<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title> Cmart | Admin</title>
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
<section id="ordering">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header bg_color">
<h4 class="card-title">Add Supplier Form</h4>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
</div>
<div class="row justify-content-md-center">
<div class="col-md-10">
<div class="card">

<div class="card-content collpase show">
<div class="card-body">
  <form action="admin/add_supplier_post" enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows" autocomplete="off">
    <div class="form-body">
      <div class="form-group row">
        <label class="col-md-4 label-control" for="eventRegInput1">Supplier Name</label>
        <div class="col-md-8">
          <input type="text" id="eventRegInput1" class="form-control" placeholder="supplier name" name="supplier_name">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-4 label-control" for="eventRegInput1">Supplier Phone</label>
        <div class="col-md-8">
          <input type="phone" id="eventRegInput1" class="form-control" placeholder="supplier name" name="supplier_phone_no">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-4 label-control" for="eventRegInput2"> Supplier-Address </label>
        <div class="col-md-8">
          <textarea class="form-control" id="placeTextarea" rows="3" placeholder="Textarea with placeholder" name="supplier_address">
              </textarea>
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
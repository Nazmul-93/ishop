<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title>CMART | Admin</title>
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
<h4 class="card-title">EDIT EMAIL TEMPLATE</h4>
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
                    <?php
foreach ($email_template as $key => $value)
 {

  $email_id=$value['stemp_id'];
  $email_from=$value['email_from'];
  $email_subject=$value['email_subject'];
  $email_body=$value['email_body'];


                    ?>
<form action="admin/email_edit_post" enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
<input type="hidden" value="<?php echo $email_id?>" name="email_id">
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">From Email</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" value="<?php echo $email_from?>"  class="form-control" placeholder="From Email" name="from_email">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Subject Title</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1"   value="<?php echo $email_subject?>"class="form-control" placeholder="Email Subject" name="email_subject">
    </div>
</div>
<div class="form-body">
    <div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">SMS</label>
    <div class="col-md-8">
                <textarea name="sms" class="span3 " id="editor"  required>
                            <?php echo $email_body?>         
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
<?php

}
?>
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
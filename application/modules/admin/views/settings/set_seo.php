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
<h4 class="card-title">Set SEO</h4>
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
<form action="admin/set_seo_post" enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
    <input type="hidden" name="total_seo" value="<?php echo $total_seo?>">
<div class="form-body">
    <div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">SEO TITLE</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="SEO TITLE" name="seo_title" value="<?php echo $seo_title?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">SEO KEWORDS</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="SEO KEWORDS" name="seo_keyword" value="<?php echo $seo_keyword?>" >
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">SEO META TAG</label>
    <div class="col-md-8">
<input type="text" class="form-control" data-role="tagsinput" value="Amsterdam,Washington,Sydney,Beijing,Cairo" name="tag"  />
  
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">SEO KEYWORD TAG</label>
    <div class="col-md-8">
<input type="text" class="form-control" data-role="tagsinput" value="Amsterdam,Washington,Sydney,Beijing,Cairo" name="seo_keyword_tag" />
  
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">SEO META DESCRIPTION</label>
    <div class="col-md-8">
<textarea rows="4" class="form-control" name="seo_meta_description" id="basic-textarea"></textarea>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Facebook Link</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Facebook Link" name="fb_link" value="<?php echo $fb_link?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Youtube Link</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Youube Link" name="yo_link" value="<?php echo $yo_link?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Instagram Link</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Instagram Link" name="ins_link" value="<?php echo $ins_link?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Twitter Link</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Twitter Link" name="tw_link" value="<?php echo $tw_link?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">RSS Link</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="RSS Link" name="rss_link" value="<?php echo $rss_link?>">
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
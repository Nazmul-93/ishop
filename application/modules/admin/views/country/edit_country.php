<?php $this->load->view('backend/headlink')?>

<style>
    .img-thumbnail img{
        width: 100%;
        height: 132px;
    }
    
    
</style>
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
<section id="ordering ">
<div class="row">
    <div class="col-12 ">
        <div class="card">
        <div class="card-header bg_color" >
            <h4 class="card-title" >Update  Country Form</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
       </div>
    <div class="row justify-content-md-center">
        <div class="col-md-12"> 
            <div class="card">
                <div class="card-content collpase show">
                    <div class="card-body">
                    <form  action="admin/update_country/<?=$edit_country['id'];?>"  enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="eventRegInput1">Country Name</label>
                            <div class="col-md-8">
                                <input type="text" id="eventRegInput1" class="form-control" placeholder="i.e UNITED KINGDOM" name="country_name" value="<?=$edit_country['country_name'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="eventRegInput1">Country Nick Name</label>
                            <div class="col-md-8">
                                <input type="text" id="eventRegInput1" class="form-control" placeholder="i.e United Kingdom" name="country_nicename" value="<?=$edit_country['country_nicename'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="eventRegInput1">Alpha iso2 Code</label>
                            <div class="col-md-8">
                                <input type="text" id="eventRegInput1" class="form-control" placeholder="i.e GB" name="alpha_iso2" value="<?=$edit_country['alpha_iso2'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="eventRegInput1">Alpha iso3 Code</label>
                            <div class="col-md-8">
                                <input type="text" id="eventRegInput1" class="form-control" placeholder="i.e GBR" name="alpha_iso3" value="<?=$edit_country['alpha_iso3'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="eventRegInput1">Numeric Code</label>
                            <div class="col-md-8">
                                <input type="numbeer" id="eventRegInput1" class="form-control" placeholder="i.e 826" name="num_code" value="<?=$edit_country['num_code'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="eventRegInput1">Phone Code</label>
                            <div class="col-md-8">
                                <input type="number" id="eventRegInput1" class="form-control" placeholder="i.e 44 " name="phonecode" value="<?=$edit_country['phonecode'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                        <input type="hidden" name="pre_img"  value="<?=$edit_country['flag'];?>">
                            <label class="col-md-3 label-control" for="eventRegInput2">Country Flag</label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width:170px;height:140px;">
                                        <img class="multi_img_file"  src="backassets\app-assets\images\add_sign.jpg" alt="sa Image"/>
                                    </div>
                                <div>
                                    <input type="file" name="files" id="files">
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="eventRegInput2">Status</label>
                        <div class="col-md-9">
                        <input type="radio" class="span1" name="status" value="2" <?php if($edit_country['status']==2) echo 'checked';?>>Hide<br>
                        <input type="radio"  class="span1"  name="status" value="1" <?php if($edit_country['status']==1) echo 'checked';?>>Show
                        </div>
                    </div>
                </div>
                <div class="form-actions center ">
                    <button id="type-info" type="submit" class="btn btn-primary col-sm-4 offset-3">
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
    <?php $this->load->view('backend/footer')?>
    <!-- END: Footer-->


<?php $this->load->view('backend/footerlink')?>
<script>
    var msg = "<?php echo $this->session->flashdata('msg'); ?>";
    console.log(msg);
    if(msg=="save")
    {
        swal("Congratulations !", "You have Saved Data Successfully!", "success");
    }else if(msg=='err'){
        swal("Sorry !", "Data Not Save Successfully!! ", "warning");
    }else if(msg=='form_validation_err'){
        swal("Sorry !", "Please Fill Out TItle and Description!! ", "warning");
    }
</script>

   <script> 
    var show_status = "<?=$edit_country[0]['show_status']?>";
    $("#show_status").val(show_status);
    
    </script>
    
    <!-- --- advertise selected ---- -->
   <script> 
    var ads_position = "<?=$edit_country[0]['ads_position']?>";
    $("#ads_position").val(ads_position);
    
    </script>

  </body>

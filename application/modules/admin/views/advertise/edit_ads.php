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
<section id="ordering ">
<div class="row">
    <div class="col-12 ">
        <div class="card">
        <div class="card-header bg_color" >
            <h4 class="card-title" >Update  Ads Form</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
       </div>
  <div class="row justify-content-md-center">
     <div class="col-md-12">
          <div class="card">
             <div class="card-content collpase show">
                 <div class="card-body">
                   <form  action="admin/update_ads_post/<?=$ads_list[0]['id'];?>"  enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
                <div class="form-body">
                
                <div class="form-group row">
                 <label class="col-md-3 label-control" for="eventRegInput2">Advertise-Pos</label>
                    <div class="col-md-9">
                        <select class="select2 form-control" id="ads_position" name="ads_position">
                        <option value="">Select-Positions</option>
                        <option value="1">Top-Side Sections</option>
                        <option value="2">Multi-Ads Sections</option>
                       </select>
                   </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="eventRegInput1">Advertse-Name</label>
                <div class="col-md-8">
                    <input type="text" id="eventRegInput1" class="form-control" placeholder="Ads Name" name="ads_name" value="<?=$ads_list[0]['ads_name'];?>">
                </div>
            </div>
                
            <div class="form-group row">
            <input type="hidden" name="pre_img" value="<?=$ads_list[0]['advertise_imgs'];?>">
                <label class="col-md-3 label-control" for="eventRegInput2">Advertise-Image</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width:150px;height:120px;">
                            <img class="multi_img_file"  src="backassets\app-assets\images\add_sign.jpg" alt="sa Image"/>
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
        </div>
             <div class="form-group row">
                 <label class="col-md-3 label-control" for="eventRegInput2">View-Status</label>
                    <div class="col-md-9">
                        <select class="select2 form-control" id="show_status" name="show_status">
                          <option value="">Select</option>
                          <option value="1">Show</option>
                         <option value="2">Hide</option>
                       </select>
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
    var show_status = "<?=$ads_list[0]['show_status']?>";
    $("#show_status").val(show_status);
    
    </script>
    
    <!-- --- advertise selected ---- -->
   <script> 
    var ads_position = "<?=$ads_list[0]['ads_position']?>";
    $("#ads_position").val(ads_position);
    
    </script>

  </body>

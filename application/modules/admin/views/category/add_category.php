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
    <div class="col-12">
        <div class="card">
            <div class="card-header bg_color">
                <h4 class="card-title">Add Category Form</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    </div>
     <div class="row justify-content-md-center">
         <div class="col-md-10">
             <div class="card">
                <div class="card-content collpase show">
                    <div class="card-body">
                        <form action="admin/add_category_post" enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows" autocomplete="off">
                            <div class="form-body">

            <div class="form-group row">
                <label class="col-md-4 label-control" for="eventRegInput1">Category-Name</label>
                <div class="col-md-8">
                    <input type="text" id="eventRegInput1" class="form-control" placeholder="Category Name" name="category_name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 label-control" for="eventRegInput2">Parent-Category</label>
                <div class="col-md-8">
                    <select class="select2 form-control" id="parent_id" name="parent_cat">
                        <option value="">Select</option>
                        <?php foreach($category_list as $value){ ?>
                            <option value="<?=$value['category_id']?>">
                            <?=$value['category_name']?>
                        </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 label-control" for="eventRegInput2">Specification</label>
                <div class="col-md-8">
                    <div class="form-group">
                        <select class="select2-tags form-control" multiple="" id="select2-tags"  name="specification_name[]">
                    <?php foreach($specification_list as $value){ ?>
                        <option value="<?=$value['id']?>">
                            <?=$value['name'];?>
                        </option>
                        <?php }?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-4 label-control" for="eventRegInput2">Category-Image</label>
                <div class="col-md-8">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width:150px;height:120px;">
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
                <label class="col-md-4 label-control" for="eventRegInput2">Feature-Image</label>
                <div class="col-md-8">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width:150px;height:120px;">
                </div>
                <div>
                <span class="btn btn_select_img btn-file mt-1">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="files_image" id="files">
                </span>
                <a href="#" class="btn btn_delete_img fileinput-exists mt-1" data-dismiss="fileinput">Remove</a>
                </div>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label style="margin-top:-10px;" class="col-md-4 label-control " for="eventRegInput2">Menu-Options</label>
                <div class="input-group col-md-5">
                    <div class="d-inline-block  custom-checkbox">
                        <fieldset>
                            <input type="checkbox" id="input-5" name="menu_option">
                            <label for="input-5">Show To Menu</label>
                        </fieldset>
                    </div>
                </div>
            </div>
          <div class="form-group row">
            <label style="margin-top:-10px;" class="col-md-4 label-control " for="eventRegInput2">Top-Catgories</label>
            <div class="input-group col-md-5">
                <div class="d-inline-block  custom-checkbox">
                    <fieldset>
                        <input type="checkbox" id="input-5" name="top_categories">
                        <label for="input-5">Show To Top-Catgories</label>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="form-actions center ">
        <button id="type-success" type="submit" class="btn btn-primary col-sm-4 offset-3">
        <i class="fa fa-check-square-o"></i> Submit
        </button>
        </div>
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
                            $(".select2-tags").select2({

                            });
                        </script>
                     </body>
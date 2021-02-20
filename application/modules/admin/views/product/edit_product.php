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
        <section id="ordering ">
          <div class="row">
            <div class="col-12 col-lg-12">
              <div class="card">
                <div class="card-header bg_color">
                  <h4 class="card-title">Update Product Form
                  </h4>
                  <a class="heading-elements-toggle">
                    <i class="fa fa-ellipsis-v font-medium-3">
                    </i>
                  </a>
                </div>
                <div class="row justify-content-md-center">
                  <div class="col-md-10">
                    <div class="card">
                      <div class="card-content collpase show">
                        <div class="card-body">
                          <form action="admin/update_product_post/<?= $products_data[0]['pro_id']; ?>" enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
                            <div class="form-body">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="eventRegInput1">Product-Name
                                </label>
                                <div class="col-md-9">
                                  <input type="text" id="eventRegInput1" class="form-control" placeholder="Product Name" name="pro_name" value="<?= $products_data[0]['product_name']; ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="eventRegInput1">Product-Code
                                </label>
                                <div class="col-md-9">
                                  <input type="text" id="eventRegInput1" class="form-control" placeholder="Product Code" name="pro_code" value="<?= $products_data[0]['product_code']; ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="eventRegInput1">Product-Model
                                </label>
                                <div class="col-md-9">
                                  <input type="text" id="eventRegInput1" class="form-control" placeholder="Product Model" name="pro_model" value="<?= $products_data[0]['pro_model']; ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="eventRegInput2"> Product-Category
                                </label>
                                <div class="col-md-9">
                                  <select class="select2 form-control" id="id_h5_single" name="pro_category">
                                    <?php foreach ($all_cat_name as $key => $row) { ?>
                                      <option
                                       <?php
                                                if ($row['category_id'] == $cat_list[0]['category_id']) {
                                                  echo "selected";
                                                } ?> value="<?= $row['category_id']; ?>">
                                        <?=$row['category_name']; ?>
                                      </option>

                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div id="spec">

                                <?php foreach ($pro_spec as $key => $value) { ?>
                                  <div class="form-group row">
                                    <input type="hidden" name="spec_id[]" value="<?= $value['specification_id']; ?>">
                                    <label class="col-md-3 label-control" for="eventRegInput1"><?= ucwords($value['specification_name']); ?></label>
                                    <div class="col-md-9">
                                      <input type="text" id="eventRegInput1" class="form-control" value=<?= strtoupper($value['product_cat_data']) ?> name="spec_name[]">
                                    </div>
                                  </div>
                                <?php } ?>

                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="eventRegInput2">Brand-Name
                                </label>
                                <div class="col-md-9">
                                  <select class="select2 form-control" id="id_h5_single" name="brand_name">
                                    <?php foreach ($all_brand_name as $key => $row) { ?>
                                      <option <?php
                                                if ($row['brand_id'] == $brand_list[0]['brand_id']) {
                                                  echo "selected";
                                                } ?> value="<?= $row['brand_id']; ?>">
                                        <?= $row['brand_name'];?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              
                          <div class="form-group row">
                              <div class="input-group col-md-8 offset-3">
                              <div class="d-inline-block  custom-checkbox">
                              <fieldset>
                              <input  <?php if($products_data[0]['new_arrivals']==1){echo "checked";}?>   type="checkbox" id="input-5" name="new_arrivals">
                              <label for="input-5">&nbsp; New-Arrivals &nbsp;</label>

                              <input <?php if($products_data[0]['featured_products']==1){echo "checked";}?>       type="checkbox" id="input-5" name="featured_products">
                              <label for="input-5"> &nbsp;  Featured-Products &nbsp;</label>
                              <input <?php if($products_data[0]['best_selling']==1){echo "checked";}?>   type="checkbox" id="input-5" name="best_sellings_products">
                              <label for="input-5">&nbsp;  Best-Selling-Products</label>
                              </fieldset>  
                              <fieldset>
                                  
                              <!--<input  <?php if($products_data[0]['accesories']==1){echo "checked";}?>   type="checkbox" id="input-5" name="aces">-->
                              <!--<label for="input-5">&nbsp;Accessories&nbsp;</label>-->
                              
                              <input <?php if($products_data[0]['graps_games']==1){echo "checked";}?>    type="checkbox" id="input-5" name="graps_gams">
                              <label for="input-5"> &nbsp;Trending-Products&nbsp;</label>
                              
                              <input  <?php if($products_data[0]['mobile_tab']==1){echo "checked";}?>    type="checkbox" id="input-5" name="mbl_tbls">
                              <label for="input-5">&nbsp; Flash Deals</label>
                              
                              <!--<input  <?php if($products_data[0]['deal_of_the_day']==1){echo "checked";}?>    type="checkbox" id="input-5" name="deal_of_the_day">-->
                              <!--<label for="input-5">&nbsp;Deal Of The Day</label>-->
                              
                              </fieldset>  
                              </div>
                              </div>
                              </div> 

                              <br>
                              <div class="form-group-row">
                                <div class="row offset-3">
                                  <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                      <label for="basicInput">Product-Price
                                      </label>
                                      <input type="price" class="form-control" id="basicInput" name="pro_price" value="<?= $products_data[0]['pro_price']; ?>">
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                      <label for="basicInput">Previous-Price
                                      </label>
                                      <input type="number" class="form-control" id="basicInput" name="pre_price" value="<?= $products_data[0]['pro_previous_price']; ?>">
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                      <label for="basicInput">Discount-Price
                                      </label>
                                      <input type="number" class="form-control" id="basicInput" value="0.00" name="dscnt_price" value="<?= $products_data[0]['pro_dcount_price']; ?>">
                                    </fieldset>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="eventRegInput2">Short-Descriptions
                                </label>
                                <div class="col-md-8">
                                  <textarea class="form-control" id="placeTextarea" rows="3" placeholder="Textarea with placeholder" name="short_dscrb">
                                    <?= $products_data[0]['pro_short_descrp']; ?>
                                  </textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="eventRegInput2">Product-Details
                                </label>
                                <div class="col-md-8">
                             
                                  <textarea name="pro_details" class="span3 " id="editor"  required>
                                  <?= $products_data[0]['pro_descrp']; ?>
                               </textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <input type="hidden" name="pre_img" value="<?= $products_data[0]['product_img']; ?>">
                                <label class="col-md-3 label-control" for="eventRegInput2">Product-Image
                                </label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width:150px;height:120px;">
                                  </div>
                                  <div>
                                    <span class="btn btn_select_img btn-file mt-1">
                                      <span class="fileinput-new">Select image
                                      </span>
                                      <span class="fileinput-exists">Change
                                      </span>
                                      <input type="file" name="userfile[]" value="<?= $products_data[0]['product_img']; ?>">
                                    </span>
                                    <a href="#" class="btn btn_delete_img fileinput-exists mt-1" data-dismiss="fileinput">Remove
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="eventRegInput2">File-Gallery
                                </label>
                                <div class="col-md-3" id="add_image_div">
                                  <a href="javascript:;" onclick="add_image_div()">
                                    <div class="">
                                      <img class="multi_img_file" src="backassets\app-assets\images\add_sign.jpg" alt="sa Image" />
                                    </div>
                                  </a>
                                </div>
                              </div>
                              <div class="form-group-row mt-2">
                                <div class="row offset-3">
                                  <div class="col-xl-5 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                      <label for="basicInput">Start Warrenty Month
                                      </label>
                                      <input type="text" class="form-control" name="start_wrntydate" value="<?= $products_data[0]['warrenty_start_date']; ?>">
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-5 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                      <label for="basicInput">End Warrenty Month
                                      </label>
                                      <input type="text" class="form-control" name="end_wrntydate" value="<?= $products_data[0]['warrenty_end_date']; ?>">
                                    </fieldset>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group-row mt-2">
                                <div class="row offset-3">
                                  <div class="col-xl-5 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                      <label for="basicInput">Start Guarantee Month
                                      </label>
                                      <input type="text" class="form-control" name="start_gurntedate" value="<?= $products_data[0]['guarantee_start_date']; ?>">
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-5 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                      <label for="basicInput">End Guarantee Month
                                      </label>
                                      <input type="text" class="form-control" name="end_gurntedate" value="<?= $products_data[0]['guarantee_end_date']; ?>">
                                    </fieldset>
                                  </div>
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
  <div class="sidenav-overlay">
  </div>
  <div class="drag-target">
  </div>
  <!-- BEGIN: Footer-->
  <?php $this->load->view('backend/footer') ?>
  <!-- END: Footer-->
  <?php $this->load->view('backend/footerlink') ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>


  <script>
    //  $('.div_hide').hide();
    $(function() {
      $('#cat_id').change(function() {
        var cat_id = $("#cat_id").val();
        // alert(cat_id);
        $.ajax({
          url: "<?php echo site_url('admin/get_specifications'); ?>",
          type: "post",
          data: {
            cat_id: cat_id
          },
          success: function(msg) {
            // console.log(msg);\
            $("#spec").html(msg);
          }
        });
      });
    });
  </script>


  <script>
    var div_count = 1;
    //alert(div_count);
    function add_image_div() {
      //alert(div_count);
      if (div_count == 9) {
        $("#add_image_div").hide();
      }
      $("#add_image_div").before(
        '<div class="col-md-3">' +
        '<div class="fileinput fileinput-new" data-provides="fileinput">' +
        ' <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width:150px;height:120px;"></div>' +
        '<div>' +
        '<span class="btn btn_select_img btn-file mt-1">' +
        '<span class="fileinput-new">Select image</span>' +
        '<span class="fileinput-exists">Change</span>' +
        '<input type="file" name="userfile[]" id="files">' +
        '</span>' +
        '<a href="#" style="display:inline;position:absolute;right:-5px;width:85px;" class="btn btn_delete_img fileinput-exists mt-1" data-dismiss="fileinput">Remove</a>' +
        '</div>' +
        '</div>' +
        '</div>');
      if (div_count == 3 || div_count == 6) {
        $("#add_image_div").before('<label class="control-label col-md-12"></label>');
      }
      div_count++;
    }
  </script>

</body>
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
<div class="col-12 col-lg-12">
<div class="card">
<div class="card-header bg_color" >
    <h4 class="card-title" >Add Product Form</h4>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
</div>
<div class="row justify-content-md-center">
<div class="col-md-10">
<div class="card">
<div class="card-content collpase show">
<div class="card-body">
<form  action="admin/add_product_post"  enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows" autocomplete="off">
<div class="form-body">
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Product-Name</label>
    <div class="col-md-9">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Product Name" name="pro_name">
    </div>
    </div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Product-Code</label>
    <div class="col-md-9">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Product Code" name="pro_code">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Product-Model</label>
    <div class="col-md-9">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Product Model" name="pro_model">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput2">Product-Category</label>
    <div class="col-md-9">
    <select class="select2 form-control" id="cat_id" name="pro_category">
    <option value="">Select Category</option>
    <?php foreach($category_list as $value){ ?> 
        <option value="<?=$value['category_id']?>">
        <?=$value['category_name']?>
        </option>
        <?php }?> 
    </select>
    </div>
</div>
<div  id="spec"></div>
<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput2">Brand-Name</label>
    <div class="col-md-9">
        <select class="select2 form-control" id="id_h5_single" name="brand_name">
    <option value="">Select Brand</option>
    <?php foreach($brand_list as $value){ ?> 
        <option value="<?=$value['brand_id']?>">
        <?=$value['brand_name']?>
        </option>
        <?php }?>
    </select>
    </div>
    </div>




<div class="form-group row">
<div class="input-group col-md-8 offset-3">
<div class="d-inline-block  custom-checkbox">
<fieldset>
<input type="checkbox" id="input-5" name="new_arrivals">
<label for="input-5">&nbsp; New-Arrivals &nbsp;</label>

<input type="checkbox" id="input-5" name="featured_products">
<label for="input-5"> &nbsp;  Featured-Products &nbsp;</label>
<input type="checkbox" id="input-5" name="best_sellings_products">
<label for="input-5">&nbsp;  Best-Selling-Products</label>
</fieldset>  
<fieldset>
<!--<input type="checkbox" id="input-5" name="aces">-->
<!--<label for="input-5">&nbsp;Accessories&nbsp;</label>-->
<input type="checkbox" id="input-5" name="graps_gams">
<label for="input-5"> &nbsp;Trending-Products&nbsp;</label>
<input type="checkbox" id="input-5" name="mbl_tbls">
<label for="input-5">&nbsp; Flash Deals</label>

</fieldset> 
<fieldset>


<!--<input type="checkbox" id="input-5" name="deal_of_the_day">-->
<!--<label for="input-5">&nbsp; Deal of the Day</label>-->
</fieldset>   
</div>
</div>
</div><br>
<div class="form-group">
<div class="row offset-3">
<div class="col-xl-3 col-lg-6 col-md-12 mb-1">
<fieldset class="form-group">
    <label for="basicInput">Product-Price</label>
    <input type="price" value="0.00" class="form-control" id="basicInput" name="pro_price">
</fieldset>
</div>
<div class="col-xl-3 col-lg-6 col-md-12 mb-1">
<fieldset class="form-group">
    <label for="basicInput">Previous-Price</label>
    <input type="number" value="0.00" class="form-control" id="basicInput" name="pre_price">
</fieldset>
</div>
<div class="col-xl-3 col-lg-6 col-md-12 mb-1">
<fieldset class="form-group">
    <label for="basicInput">Discount-Price</label>
    <input type="number" class="form-control" id="basicInput" value="0.00" name="dscnt_price">
    
</fieldset>
</div>    
</div>
</div>
<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput2">Short-Descriptions</label>
<div class="col-md-8">
<textarea class="form-control" id="placeTextarea" rows="3"
placeholder="Textarea with placeholder" name="short_dscrb">
</textarea >
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput2">Product-Details</label>
<div class="col-md-8">


<textarea name="pro_details" class="span3 " id="editor"  required>
                                     
                                     </textarea>
</div>
</div>         
        <div class="form-group row">
        <label class="col-md-3 label-control" for="eventRegInput2">Product-Image</label>
        <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width:150px;height:120px;">
        </div>

        <div>
        <span class="btn btn_select_img btn-file mt-1">
        <span class="fileinput-new">Select image</span>
        <span class="fileinput-exists">Change</span>
        <input type="file" name="userfile[]" id="files">
        </span>
        <a href="#" class="btn btn_delete_img fileinput-exists mt-1" data-dismiss="fileinput">Remove</a>
        </div>

        </div>
        </div>

<div class="form-group row">
<label class="col-md-3 label-control" for="eventRegInput2">File-Gallery</label>
<div class="col-md-3" id="add_image_div">
<a href="javascript:;" onclick="add_image_div()">
<div class="">
<img class="multi_img_file"  src="backassets\app-assets\images\add_sign.jpg" alt="sa Image"/>
</div>
</a>
</div>
</div> 
<div class="form-group-row mt-2">
<div class="row offset-3">
<div class="col-xl-5 col-lg-6 col-md-12 mb-1">
<fieldset class="form-group">
<label for="basicInput">Start Warrenty Month</label>
<input type="text" class="form-control"  name="start_wrntydate">
</fieldset>
</div>
<div class="col-xl-5 col-lg-6 col-md-12 mb-1">
<fieldset class="form-group">
<label for="basicInput">End Warrenty Month</label>
<input type="text" class="form-control" name="end_wrntydate">
</fieldset>
</div>    
</div>
</div>
<div class="form-group-row mt-2">
<div class="row offset-3">

<div class="col-xl-5 col-lg-6 col-md-12 mb-1">
<fieldset class="form-group">
<label for="basicInput">Start Guarantee Month</label>
<input type="text" class="form-control"  name="start_gurntedate">
</fieldset>
</div>
<div class="col-xl-5 col-lg-6 col-md-12 mb-1">
<fieldset class="form-group">
<label for="basicInput">End Guarantee Month</label>
<input type="text" class="form-control" name="end_gurntedate">
</fieldset>
</div>    
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
                                <?php $this->load->view('backend/footer')?>
<!-- END: Footer-->


<?php $this->load->view('backend/footerlink')?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

        $(function() 
        {
        $('#cat_id').change(function(){
        var cat_id = $("#cat_id").val();
        // alert(cat_id);
        $.ajax({
        url: "<?php echo site_url('admin/get_specifications');?>",
        type: "post",
        data: {cat_id:cat_id},
        success: function(msg)
        {
        // console.log(msg);\

        $("#spec").html(msg);   
        }      
        });

        });
        });
</script>

<script>
var div_count=1;
//alert(div_count);
function add_image_div() 
{
//alert(div_count);
if(div_count==6)
{
$("#add_image_div").hide();
}

$("#add_image_div").before(
    '<div class="col-md-3">'
    +'<div class="fileinput fileinput-new" data-provides="fileinput">'
        +' <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width:150px;height:120px;"></div>'
            +'<div>'
                +'<span class="btn btn_select_img btn-file mt-1">'
                +'<span class="fileinput-new">Select image</span>'
                +'<span class="fileinput-exists">Change</span>'
                +'<input type="file" name="userfile[]" id="files">'
                +'</span>'
                +'<a href="#" style="display:inline;position:absolute;right:-5px;width:85px;" class="btn btn_delete_img fileinput-exists mt-1" data-dismiss="fileinput">Remove</a>'
            +'</div>'
            +'</div>'
        +'</div>');
    


if(div_count==3 || div_count==6)
{
$("#add_image_div").before('<label class="control-label col-md-3"></label>');
}
div_count++;

}
</script>
</body>

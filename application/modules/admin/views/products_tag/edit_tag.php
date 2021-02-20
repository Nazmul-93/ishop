<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title> Grocery-Shop | Admin</title>
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
<section id="ordering">
    <div class="row">
        <div class="col-7 offset-2">
            <div class="card">
                <div class="card-header bg_color" >
                    <h4 class="card-title" >Update Product Tag Form</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
             
                </div>
                <div class="row justify-content-md-center">
		<div class="col-md-10">
	        <div class="card">
	    
	            <div class="card-content collpase show">
	                <div class="card-body">
						<form  action="admin/update_tag_post/<?=$product_list[0]['id'];?>"  enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
							<div class="form-body">
	                			<div class="form-group row">
                                <label class="col-md-3 label-control" for="eventRegInput1">Tag-Name</label>
	                            	<div class="col-md-8">
	                            		<input type="text" id="eventRegInput1" class="form-control" placeholder="News Head" name="tag_name" value="<?=$product_list[0]['tag_name'];?>">
	                            	</div>
		                        </div>
                                <select class="select2 form-control" id="id_h5_single" name="product_tag">

                     <?php foreach ($all_product_list as $key => $row) { ?>
                            <option 
                            <?php 
                            if($row['pro_id']==$product_list[0] ['product_id']){echo "selected";}?> 

                            value="<?=$row['pro_id'];?>">
                            <?=$row['product_name'];?> 
                            </option>
                          <?php } ?>

							    </select> 
							        </div>
						<div class="form-actions center ">
                            <button type="submit" class="btn btn-primary col-sm-4 offset-3">
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
    var pro_id = "<?=$product_list[0]['pro_id']?>";
    $("#pro_id").val(pro_id);
    </script>

  </body>

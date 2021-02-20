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
<h4 class="card-title">Set Delivery Area</h4>
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
<form action="admin/edit_delivery_area_post" enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
 <input type="hidden" name="delivery_id" value="<?=$edit_delivery['delivery_id']?>">
<div class="form-body">
    <div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Division</label>
    <div class="col-md-8">
<select onchange="get_district()" id="division_id" name="division_id"  class="form-control select2" data-placeholder="<?=$this->lang->line('choose_msg').' '.$this->lang->line('division_label');?>">
<option>Select-Divisions</option>
  <?php foreach ($divisions as $key => $row) { ?>
    
      <option value="<?=$row['id'];?>" <?php if($edit_delivery['division_id']==$row['id']) echo 'selected'; ?>><?=$row['name'].' '.$row['bn_name'];?> </option>
     <?php } ?>
  </select>
        
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">District</label>
    <div class="col-md-8">
 <select onchange="get_area()" id="district_id" name="district_id" class="form-control select2" data-placeholder="<?=$this->lang->line('choose_msg').' '.$this->lang->line('district_label');?>">
         <option> Select-District</option>
         <?php foreach ($districts as $key => $row) { ?>
        <option value="<?=$row['id'];?>" <?php if($edit_delivery['district_id']==$row['id']) echo 'selected'; ?>><?=$row['name'].' '.$row['bn_name'];?> </option>
                                                                <?php } ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Delivery Area</label>
    <div class="col-md-8">
 <select id="area_id" name="area_id" class="form-control select2" data-placeholder="<?=$this->lang->line('choose_msg').' '.$this->lang->line('district_label');?>">
         <option disabled selected> Select-Area</option>
         <option value="1" <?php if($edit_delivery['area_id']==1) echo 'selected'; ?>>In-City</option>
        
     
        </select>
    </div>
</div>





<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Shipping Charge</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Delivery-Information" name="shipping_charge" value="<?=$edit_delivery['shipping_charge']?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Delivery-Information</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Delivery-Information" name="delivery_info" value="<?=$edit_delivery['delivery_info']?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Days Returns</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Delivery-Information" name="day_return" value="<?=$edit_delivery['day_return']?>">
    </div>
</div>



<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Status</label>
    <div class="col-md-8">
 <select id="area_id" name="status" class="form-control select2" data-placeholder="<?=$this->lang->line('choose_msg').' '.$this->lang->line('district_label');?>">
         <option disabled selected>Choose Stutus</option>
         <option value="1" <?php if($edit_delivery['status']==1) echo 'selected'; ?>>Show</option>
           <option value="0" <?php if($edit_delivery['status']==0) echo 'selected'; ?>>Hide</option>
     
        </select>
    </div>
</div>


</div>


<div class="form-actions center ">
    <!--<input type="hidden" name="update" value="update"/>-->
<button id="type-success" type="submit"  class="btn btn-primary col-sm-4 offset-3">
    <i class="fa fa-check-square-o"></i> Update
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
    <script type="text/javascript">



     
        function get_district() 
        {
            var division_id=$("#division_id").val();

            $.ajax({
                url: "<?php echo site_url('admin/get_district');?>",
                type: "post",
                data: {division_id:division_id},
                success: function(msg)
                {
                    // alert(msg);
                   $("#district_id").html(msg);
                }      
            });  
        }



        function get_area() 
        {
            var district_id=$("#district_id").val();

            $.ajax({
                url: "<?php echo site_url('admin/get_area');?>",
                type: "post",
                data: {district_id:district_id},
                success: function(msg)
                {
                    //alert(msg);
                   $("#area_id").html(msg);
                   
                }      
            });  
        }
    </script>
</body>
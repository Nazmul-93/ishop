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
<form action="admin/set_delivery_area_post" enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
 
<div class="form-body">
    <div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Division</label>
    <div class="col-md-8">
<select onchange="get_district()" id="division_id" name="division_id"  class="form-control select2" data-placeholder="<?=$this->lang->line('choose_msg').' '.$this->lang->line('division_label');?>">
<option>Select-Divisions</option>
  <?php foreach ($division_list as $key => $row) { ?>
    
      <option value="<?=$row['id'];?>"><?=$row['name'].' '.$row['bn_name'];?> </option>
     <?php } ?>
  </select>
        
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">District</label>
    <div class="col-md-8">
 <select onchange="get_area()" id="district_id" name="district_id" class="form-control select2" data-placeholder="<?=$this->lang->line('choose_msg').' '.$this->lang->line('district_label');?>">
         <option> Select-District</option>
         <?php foreach ($district_list as $key => $row) { ?>
        <option value="<?=$row['id'];?>"><?=$row['name'].' '.$row['bn_name'];?> </option>
                                                                <?php } ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Delivery Area</label>
    <div class="col-md-8">
 <select id="area_id" name="area_id" class="form-control select2" data-placeholder="<?=$this->lang->line('choose_msg').' '.$this->lang->line('district_label');?>">
         <option disabled selected> Select-Area</option>
         <option value="1">In-City</option>
        </select>
    </div>
</div>

<!--<div class="form-group row">-->
<!--    <label class="col-md-3 label-control" for="eventRegInput1">Area</label>-->
<!--    <div class="col-md-8">-->
<!--<select id="area_id" name="area_id" class="form-control select2" data-placeholder="<?=$this->lang->line('choose_msg').' '.$this->lang->line('area_label');?>">-->
<!--        <option>Select-Area</option>-->
<!--        <?php foreach ($area_list as $key => $row) { ?>-->
<!--            <option value="<?=$row['area_id'];?>"><?=$row['area_title'].' '.$row['area_title_bangla'];?> </option>-->
<!--        <?php } ?>-->
<!--    </select> -->
  
<!--    </div> -->
<!--</div>-->




<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Shipping Charge</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Shipping Charge" name="shipping_charge">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Delivery-Information</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Delivery-Information" name="delivery_info">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Days Returns</label>
    <div class="col-md-8">
        <input type="text" id="eventRegInput1" class="form-control" placeholder="Days Returns" name="day_return">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="eventRegInput1">Status</label>
    <div class="col-md-8">
 <select id="area_id" name="status" class="form-control select2" data-placeholder="<?=$this->lang->line('choose_msg').' '.$this->lang->line('district_label');?>">
         <option disabled selected>Choose Stutus</option>
         <option value="1">Show</option>
           <option value="0">Hide</option>
     
        </select>
    </div>
</div>




</div>


<div class="form-actions center ">
<button id="type-success" type="submit" class="btn btn-primary col-sm-4 offset-3">
    <i class="fa fa-check-square-o"></i> Submit
</button>
</div>

</form>
                        <table class="table table-striped table-bordered default-ordering ">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Divisions</th>
                                    <th>District</th>
                                    <th>Shipping Charge</th>
                        
                                   <th>Set Date</th>
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($delivery_location as $key => $value) 
                                {
                                    $delivery_id=$value['delivery_id'];
                                    $divison_id=$value['division_id'];
                                    $divison_title=$value['name'];
                                    $district_id=$value['district_id'];
                                    $district_name=$value['name'];
                                    $district_id=$value['district_id'];
                          
                                    $add_date=$value['add_date'];
                                    ?>
                                    <tr>
                               <td><?=($key+1);?></td>
                                 <td><?php echo $divison_title?></td>
                                 <td><?php echo $district_name?></td>
                                 <td><?=$value['shipping_charge']?></td>
                        
                                     <td><?php echo $add_date?></td>
                                  <td>
                    <a href="admin/edit_delivery_area/<?=$value['delivery_id'];?>" class=" btn btn-icon btn_edit mr-1 mb-1">
                    <i class="fa fa-edit">
                      
                        </i>
                    </a> 

                      <a href="admin/delete_delivery_area/<?=$value['delivery_id'];?>" class=" btn btn-icon btn_delete mr-1 mb-1">
                    <i class="fa fa-trash">
                     
                        </i>
                    </a>   
                                  </td>
                              </tr>
                               <?php
                                }
                              ?> 
                            </tbody>
                      
                        </table>
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



        // function get_area() 
        // {
        //     var district_id=$("#district_id").val();

        //     $.ajax({
        //         url: "<?php echo site_url('admin/get_area');?>",
        //         type: "post",
        //         data: {district_id:district_id},
        //         success: function(msg)
        //         {
        //             //alert(msg);
        //           $("#area_id").html(msg);
                   
        //         }      
        //     });  
        // }
    </script>
</body>
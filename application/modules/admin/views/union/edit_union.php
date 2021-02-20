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
    <div class="content-header row"></div>
        <div class="content-body">
<!-- Default ordering table -->
<section id="ordering ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg_color">
                    <h4 class="card-title">Edit Union Form</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content collpase show">
                                <div class="card-body">
<form action="admin/update_union/<?=$edit_union['id'];?>" enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
    <div class="form-body">
        <div class="form-group row">
            <label class="col-md-3 label-control" for="eventRegInput2">Select Country</label>
            <div class="col-md-8">
                <select onchange="getDivision()" class="select2 form-control" id="country_id" name="country_id">
                        <option>Select-Country</option>
                    <?php 
                    foreach($country_data as $value) { ?>
                        <option value="<?=$value['id']?>" <?php if($value['id']== $edit_union['country_id'] ) echo "Selected";?>><?php echo $value['country_name'] ?></option>
                    <?php } ?>
                </select> 
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="eventRegInput2">Select Dvision</label>
            <div class="col-md-8">
                <select class="select2 form-control" id="division_id" name="division_id">
                        <option>Select-Divisions</option>
                    
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="eventRegInput2">Select District</label>
            <div class="col-md-8">
                <select class="select2 form-control" id="district_id" name="district_id">
                        <option>Select-District</option>
                    
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="eventRegInput2">Select Upazila</label>
            <div class="col-md-8">
                <select class="select2 form-control" id="upazila_id" name="upazila_id">
                        <option>Select-Upazila</option>
                    
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="eventRegInput1">Union Name(EN)</label>
            <div class="col-md-8">
                <input type="text"  class="form-control" placeholder="In English..." name="name" value="<?=$edit_union['name'];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="eventRegInput1">Union Name(BN)</label>
            <div class="col-md-8">
                <input type="text"  class="form-control" placeholder="In Bengali..." name="bn_name" value="<?=$edit_union['bn_name'];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="eventRegInput1">Union URL</label>
            <div class="col-md-8">
                <input type="text" id="eventRegInput1" class="form-control" placeholder="i.e www.union.com(optional)" name="url" value="<?=$edit_union['url'];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="eventRegInput2">Status</label>
            <div class="col-md-9">
            <input type="radio" class="span1" name="status" value="2" <?php if($edit_union['status']==2) echo 'checked';?>>Hide<br>
            <input type="radio"  class="span1"  name="status" value="1" <?php if($edit_union['status']==1) echo 'checked';?>>Show
            </div>
        </div>
    </div>
    <div class="form-actions center ">
        <button id="type-success" type="submit" class="btn btn-primary col-sm-3 offset-3">
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
  
        function getDivision() 
        {
            var country_id=$("#country_id").val();
            console.log(country_id);
            $.ajax({
                url: "<?php echo site_url('admin/get_division');?>",
                type: "post",
                data: {country_id:country_id},
                success: function(msg)
                {     
                   $("#division_id").html(msg);
                }      
            });  
        }
        
        
         $(document).on('change', '#division_id', function(){
           
             var division_id=$("#division_id").val();
             console.log(division_id);
              $.ajax({
                url: "<?php echo site_url('admin/get_district');?>",
                type: "post",
                data: {division_id:division_id},
                success: function(msg)
                {
                  
                   $("#district_id").html(msg);
                }      
            }); 
          });
          
          $(document).on('change', '#district_id', function(){
           var district_id=$("#district_id").val();
           console.log(district_id);
            $.ajax({
              url: "<?php echo site_url('admin/get_upazila');?>",
              type: "post",
              data: {district_id:district_id},
              success: function(msg)
              {
                 $("#upazila_id").html(msg);
              }      
          }); 
        });
        
        
  </script>
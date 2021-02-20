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
<section id="ordering">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg_color" >
                    <h4 class="card-title" >Manage Page Settings</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
       <div class="card-content collapse show">
           <div class="card-body card-dashboard">
             <table class="table table-striped table-bordered default-ordering table-responsive">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th> Page-Name</th>
                            <th> Page-Title</th>
                            <th> Page-Positions</th>
                            <th> Advertise-Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                 <tbody>
                    <?php foreach ($ads_list as $key => $row) { ?>
                    <tr>
                    <td><?=($key+1);?></td>
                    <td><?=$row['product_id'];?></td>
                    <td><?=$row['ads_name'];?></td>
                    <td><?=$row['ads_position'];?></td>
                    <td>
                    <img style="width:100px!important;height:65px!important;" src="uploads/ads/<?=$row['advertise_imgs'];?>" alt=" advertise-image">
                    </td>
                    <td style="display:flex!important;">
                    <a id="" href="admin/cms_aboutus" class="btn btn-icon  btn_settings mr-1 mb-1">
                    <i class="fa ft-plus-square">
                     Settings
                    </i>
                    </a>
                    <a href="admin/edit_ads/<?=$row['id'];?>" class=" btn btn-icon btn_edit mr-1 mb-1">
                    <i class="fa fa-edit">
                        Edit
                        </i>
                    </a>
                </td>
            </tr>
            <?php }?>
                </tbody>
                     </table>
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

  </body>

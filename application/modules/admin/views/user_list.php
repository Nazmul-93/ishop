<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title>C-MART | Admin</title>
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
                    <h4 class="card-title" >User Record</h4>
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

                 <a href="admin/add_user">
                 <button type="button" title="ADD Admin" class="btn btn-success btn_css mr-1 mb-1 "><i class="ft-plus-square"></i> Add Admin</button>
                 </a>
                        <table class="table table-striped table-bordered default-ordering table-responsive">
                            <thead>
                                <tr>
                                    <th>Serial ID</th>
                                    <th>User-Name</th>
                                    <th>Email</th>
                                    <th>Phone-Number</th>
                                    <th>Status</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($user_list as $key => $row) { 

                            $edit_id=$row['id'];
                            $st=$row['verfiy_status'];
                            $type=$row['user_type'];
                            if($st==1)
                            {
                              $t="<span style='color:green;font-weight:bold;padding-left: 4px;'>Active</span>";
                              $tact="<a class='btn btn_inactive_userlist'  href='admin/status_update/$edit_id/0'><span>  <i class='fa fa-bandcamp' ></i> Make Inactive</span></a>";
                            }
                            else
                            {
                             $t="<span style='color:red;font-weight:bold'>In-Active</span>";
                              $tact="<a class='btn btn_makeactive_userlist'  href='admin/status_update/$edit_id/1'><span><i class='fa fa-check' ></i> Make Active</span></a>";    
                            } 
                              ?>
                                <tr>
                                <td><?=($key+1);?></td>
                                <td ><?=$row['user_name'];?></td>
                                <td><?=$row['email'];?></td>
                                <td><?=$row['phone_number'];?></td>
                                <td style="padding: 15px;"><?php echo $t;?></td>
                                <td class="d-flex">
                                    <a href="admin/delete_user/<?=$row['id'];?>" class="btn btn-icon btn-danger btn_delete mr-1 mb-1">
                                  <i class="fa fa-trash">
                                     Remove
                                 </i>
                                  </a>

                                                                      <?php
                                echo $tact;
                                    ?>

                                    <?php
if($type==1)
{
 ?>

  <a href="admin/user_profile/<?php echo $edit_id;?>" class=" btn btn-icon btn_edit   mr-1 mb-1">
                                  <i class="fa fa-edit">
                                         Edit
                                     </i>
                                  </a>
 <?php 
}
                                    ?>
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

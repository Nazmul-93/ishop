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
                    <h4 class="card-title" >Manage Message</h4>
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
                                    <th>Serial ID</th>
                                    <th>Customer-Name</th>
                                    <th>Customer-Subject</th>
                                    <th>Email</th>
                                    <th >Mobile</th>
                                    <th >Customer-Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>    
                            <tbody>
                            <?php foreach ($msg_list as $key => $row) { ?>
                                <tr>
                                <td><?=($key+1);?></td>
                                <td><?=$row['name'];?></td>
                                <td><?=$row['subject'];?></td>
                                <td><?=$row['email'];?></td>
                                <td ><?=$row['mobile_no'];?></td>
                                <td style="max-width:300px;overflow:hidden;line-height: 25px;"><?=$row['message'];?></td>
                                  <td style="display:flex!important;padding:30px;">
                                  <a href="admin/reply_message/<?=$row['id'];?>" class=" btn btn-icon btn_reply   mr-1 mb-1">
                                  <i class="fa fa-reply">
                                        Reply
                                     </i>
                                  </a>
                                  <a href="admin/delete_message/<?=$row['id'];?>" class=" type-error  btn btn-icon btn-danger btn_delete mr-1 mb-1">
                                  <i class="fa fa-trash">
                                     Delete
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

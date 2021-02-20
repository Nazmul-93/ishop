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
                    <h4 class="card-title" >Manage District</h4>
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
                    <?php if(isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <div class="alert-icon">
                            <i class="icon-check"></i>
                        </div>
                        <div class="alert-message">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    </div>
                    <?php } ?>
                 <a href="admin/add_district">
                 <button type="button" title="ADD Product FORM" class="btn btn-success btn_css mr-1 mb-1 "><i class="ft-plus-square"></i> Add District </button>
                 </a>
                    <div class="row table_oveflow">
                        <table id="pro_table" class="table table-striped table-bordered default-ordering  table-responsive">
                            <thead>
                                <tr>
                                    <th >Serial</th>
                                    <th width="30%"> Name(EN)</th>
                                    <th width="30%"> Name(BN)</th>
                                    <th width="30%"> URL</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($district_data as $key => $row) { ?>
                              <tr>
                              <td><?=($key+1);?></td>
                              <td><?=$row['name'];?></td>
                              <td><?=$row['bn_name'];?></td>
                              <td><?=$row['url'];?></td>
                              <!-- <td style="display:flex!important;">
                                  <a href="<?=base_url('admin/edit_district?id='.$row['id']);?>" class=" btn btn-icon btn_edit mr-1 mb-1">
                                  <i class="fa fa-edit">
                                      Edit
                                     </i>
                                  </a>
                                  <a href="<?=base_url('admin/delete_district?id='.$row['id']) ?>" class="  type-error btn btn-icon btn-danger btn_delete mr-1 mb-1">
                                  <i class="fa fa-trash">
                               Remove
                                 </i>
                                  </a>
                             </td> -->
                              
                              </tr>
                            <?php }?>
                            </tbody>
                       
                        </table>
                        
                        
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
//    $(document).ready(function() {
//     $('table').DataTable( {
//         "order": [[ 1, "asc" ]]
//     } );
// } );
</script>
  </body>
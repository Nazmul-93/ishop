<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title> Cmart | Admin</title>
<?php $this->load->view('backend/headlink') ?>
<style>
.dataTables_info{
  display: none!important;
}
.pagination{
  display: none!important;
}
</style>


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
        <section id="ordering">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg_color">
                  <h4 class="card-title">Reply Message Form</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="row justify-content-md-center">
                  <div class="col-md-10" style="margin-top:30px;">
                    <div class="card">
                      <table class="table table-striped table-bordered default-ordering table-responsive">
                        <thead>
                          <tr>
                            <th>Customer-Name</th>
                            <th>Customer-Subject</th>
                            <th>Customer-Email</th>
                            <th>Customer-Mobile</th>
                            <th>Customer-Message</th>
                          </tr>
                        </thead>
                        <tbody>
                          <input type="hidden"<?=$reply_list[0]['id'];?>>
                          <tr>
                            <td><?= $reply_list[0]['name']; ?></td>
                            <td><?= $reply_list[0]['subject']; ?></td>
                            <td><?= $reply_list[0]['email']; ?></td>
                            <td><?= $reply_list[0]['mobile_no']; ?></td>
                            <td style="max-width:300px;overflow:hidden;line-height: 25px;"><?= $reply_list[0]['message']; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <hr>
                    <!-- email form start -->
                    <br>  
                    <div class="card col-sm-12">
                      <div style="background-color:#191818;padding:10px;">
                        <h4 style="color:#fff;">Send Email</h4>
                      </div>
                      <br>
                      <form action="admin/send_email_function"  
                      class="chatbox__credentials" enctype="multipart/form-data" method="post" id="reused_form" autocomplete="off">

                        <div style="margin-bottom: 5px" class="form-group form-group-newww  ">
                          <label for="inputName">To:</label>
                          <input type="text" name="msg_to" class="form-control" id="name" placeholder="customer email id" required>
                        </div>
                        <div class="form-group form-group-newww">
                          <label for="inputMessage">Message:</label>
                          <textarea  name="msg" type="text" class="form-control" id="message" rows="6" required>
                         </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary col-sm-6 offset-3">
                          <i class="fa fa-check-square-o"></i> Submit
                        </button>

                      </form>

                    </div>
                    <!-- email form end -->



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

</body>
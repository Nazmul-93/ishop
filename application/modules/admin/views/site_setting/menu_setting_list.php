<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title> Cmart | Admin</title>
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
<section id="ordering">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header bg_color">
<h4 class="card-title">Manage Menu Settings </h4>
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
<a href="admin/menu_settigs">
    <button type="button" title="ADD Menu FORM" class="btn btn-success btn_css mr-1 mb-1 "><i class="ft-plus-square"></i> Menu-Settings </button>
</a>
<table class="table table-striped table-bordered default-ordering table-responsive">
    <thead>
        <tr>
            <th>Serial</th>
            <th> Menu-Name</th>
            <th> Menu-Link</th>
            <th> Menu-Positions</th>
            <th> Status</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($menu_pos_data as $key => $row) { ?>
            <tr>
                <td><?= ($key + 1); ?></td>
                <td><?= $row['menu_name']; ?></td>
                <td><?= $row['menu_link']; ?></td>
                <td>
                    <?= $row['position_name'] ?></td>
                <td><?= $row['show_status'] == 1 ? '<span class=" btn btn-success round btn_status_css mr-1 mb-1">Show</span>' : '<span class="btn btn-warning round btn_status_css mr-1 mb-1">Hide</span>' ?></td>

                <td style="display:flex!important;">
                    <a href="admin/edit_settings/<?= $row['menu_id']; ?>" class=" btn btn-icon btn_edit mr-1 mb-1">
                        <i class="fa fa-edit">
                            Edit
                        </i>
                    </a>
                    <a href="admin/delete_menu/<?= $row['menu_id'];?>" class=" type-error  btn btn-icon btn-danger btn_delete mr-1 mb-1">
                        <i class="fa fa-trash">
                            Remove
                        </i>
                    </a>
                </td>

            </tr>

        <?php } ?>
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
<?php $this->load->view('backend/footer') ?>
<!-- END: Footer-->


<?php $this->load->view('backend/footerlink') ?>

</body>
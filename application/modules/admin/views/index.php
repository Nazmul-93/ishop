<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title> Cmart || Admin</title>
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
            <!-- Stats -->
            
                     <!-- ==========  Welcome Dashboards Start ====== -->



    <div class="row mt-3" style="margin-bottom:25px;">
                <div class="col-xl-12 col-lg-12 col-12  ">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch" style="height:90px;">
                                <div class="p-2 text-center bg-secondary bg-darken-2">
                                    <i class="icon-flag font-large-2 white"></i>
                                </div>
                                <div class=" text-center  p-2 bg-dark white media-body">
                                    <h2>Welcome To Admin Dasboard !!!</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>

        <div class="row">
            <a href="admin/user_list">
        <div class="col-xl-3 col-lg-6 col-12">
        <div class="card" style="width:38vh;">
            <div class="card-content">
            <div class="media align-items-stretch">
                <div class="p-2 text-center bg-dark bg-darken-2">
                    <i class="icon-user font-large-2 white"></i>
                </div>
                <div class="p-2 bg-gradient-x-primary white media-body">
                    <h5>Total Users</h5>
                    <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i>
                    <?php echo $total_user?>
                </h5>
                </div>
            </div>
        </div>
        </div>
            </div>
        </a>
        <a href="admin/product">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card "style="width:40vh;">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-dark bg-darken-2">
                                
                                <i class="icon-basket-loaded font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-primary white media-body">
                                <h5>Total Products</h5>
                                <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i> <?php echo $total_prdct?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="admin/message">
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card" style="width:40vh;">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-dark bg-darken-2">
                                <i class="icon-bubbles font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-primary white media-body">
                                <h5>Total Message</h5>
                                <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i> <?php 
                                echo $total_msg;
                                ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
         <a href="admin/order_history">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card" style="width:35vh;">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-dark bg-darken-2">
                              <i class="fa fa-first-order font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-primary white media-body">
                                <h5>New Orders</h5>
                                <h5 class="text-bold-400 mb-0"><i class="ft-arrow-down"></i> <?php echo $total_order?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

                 <a href="admin/category">
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card" style="width: 38vh;">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-dark bg-darken-2">
                                <i class="fa fa-hourglass font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-primary white media-body">
                                <h5>Total Catagory</h5>
                                <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i> <?php 
                                echo $total_catagory;
                                ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="admin/brand">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card" style="width:35vh;">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-dark bg-darken-2">
                                <i class="fa fa-star             font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-primary white media-body">
                                <h5>Total Brand</h5>
                                <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i> <?php 
                                echo $total_brand;
                                ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
         <a href="admin/supplier">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card" style="width: 38vh;">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-dark bg-darken-2">
                                <i class="fa fa-truck font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-primary white media-body">
                                <h5>Total Supplier</h5>
                                <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i> <?php 
                            echo $total_supplier;
                                ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="admin/purchase_product">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card" style="width:41vh;">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-dark bg-darken-2">
                                <i class="fa fa-credit-card-alt font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-primary white media-body">
                                <h5>Total Purchase</h5>
                                <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i> <?php 
                                echo $total_purchases;
                                ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>

    <!--/ Starts -->





<!--Recent Orders & Monthly Salse -->
<div class="row match-height dsply_none ">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Orders</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <p>Total paid invoices 240, unpaid 150. <span class="float-right"><a href="project-summary.html" target="_blank">Invoice Summary <i class="ft-arrow-right"></i></a></span></p>
                </div>
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Invoice#</th>
                                <th>Customer Name</th>
                                <th>Status</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-truncate">PO-10521</td>
                                <td class="text-truncate"><a href="#">INV-001001</a></td>
                                <td class="text-truncate">Elizabeth W.</td>
                                <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                <td class="text-truncate">$ 1200.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate">PO-532521</td>
                                <td class="text-truncate"><a href="#">INV-01112</a></td>
                                <td class="text-truncate">Doris R.</td>
                                <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>
                                <td class="text-truncate">$ 5685.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate">PO-05521</td>
                                <td class="text-truncate"><a href="#">INV-001012</a></td>
                                <td class="text-truncate">Andrew D.</td>
                                <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                <td class="text-truncate">$ 152.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate">PO-15521</td>
                                <td class="text-truncate"><a href="#">INV-001401</a></td>
                                <td class="text-truncate">Megan S.</td>
                                <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                <td class="text-truncate">$ 1450.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate">PO-32521</td>
                                <td class="text-truncate"><a href="#">INV-008101</a></td>
                                <td class="text-truncate">Walter R.</td>
                                <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>
                                <td class="text-truncate">$ 685.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12 dsply_none">
        <div class="card">
            <div class="card-content">
                <div class="card-body sales-growth-chart">
                    <div id="monthly-sales" class="height-250"></div>
                </div>
            </div>
            <div class="card-footer">
                <div class="chart-title mb-1 text-center">
                    <h6>Total monthly Sales.</h6>
                </div>
                <div class="chart-stats text-center">
                    <a href="#" class="btn btn-sm btn-primary mr-1">Statistics <i class="ft-bar-chart"></i></a> <span class="text-muted">for the last year.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Recent Orders & Monthly Salse -->
<!-- Social & Weather -->
<div class="row match-height dsply_none">
    <div class="col-xl-4 col-lg-12">
        <div class="card bg-gradient-x-danger">
            <div class="card-content">
                <div class="card-body">
                    <div class="animated-weather-icons text-center float-left">
                        <svg version="1.1" id="cloudHailAlt2" class="climacon climacon_cloudHailAlt climacon-blue-grey climacon-darken-2 height-100" viewBox="15 15 70 70">
                            <g class="climacon_iconWrap climacon_iconWrap-cloudHailAlt">
                                <g class="climacon_wrapperComponent climacon_wrapperComponent-hailAlt">
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">
                                        <circle cx="42" cy="65.498" r="2"></circle>
                                    </g>
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">
                                        <circle cx="49.999" cy="65.498" r="2"></circle>
                                    </g>
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">
                                        <circle cx="57.998" cy="65.498" r="2"></circle>
                                    </g>
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">
                                        <circle cx="42" cy="65.498" r="2"></circle>
                                    </g>
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">
                                        <circle cx="49.999" cy="65.498" r="2"></circle>
                                    </g>
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">
                                        <circle cx="57.998" cy="65.498" r="2"></circle>
                                    </g>
                                </g>
                                <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud">
                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M63.999,64.941v-4.381c2.39-1.384,3.999-3.961,3.999-6.92c0-4.417-3.581-8-7.998-8c-1.602,0-3.084,0.48-4.334,1.291c-1.23-5.317-5.974-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.998c0,3.549,1.55,6.728,3.999,8.924v4.916c-4.776-2.768-7.998-7.922-7.998-13.84c0-8.835,7.162-15.997,15.997-15.997c6.004,0,11.229,3.311,13.966,8.203c0.663-0.113,1.336-0.205,2.033-0.205c6.626,0,11.998,5.372,11.998,12C71.998,58.863,68.656,63.293,63.999,64.941z"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="weather-details text-center">
                        <span class="block white darken-1">Snow</span>
                        <span class="font-large-2 block white darken-4">-5&deg;</span>
                        <span class="font-medium-4 text-bold-500 white darken-1">London, UK</span>
                    </div>
                </div>
                <div class="card-footer bg-gradient-x-danger border-0">
                    <div class="row">
                        <div class="col-4 text-center display-table-cell white">
                            <i class="me-wind font-large-1 lighten-3 align-middle"></i> <span class="align-middle">2MPH</span>
                        </div>
                        <div class="col-4 text-center display-table-cell white">
                            <i class="me-sun2 font-large-1 lighten-3 align-middle"></i> <span class="align-middle">2%</span>
                        </div>
                        <div class="col-4 text-center display-table-cell white">
                            <i class="me-thermometer font-large-1 lighten-3 align-middle"></i> <span class="align-middle">13.0&deg;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card bg-gradient-x-info white">
            <div class="card-content">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="fa fa-twitter font-large-2"></i>
                    </div>
                    <div class="tweet-slider">
                        <ul>
                            <li>Congratulations to Rob Jones in accounting for winning our <span class="yellow">#NFL</span> football pool!
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Contests are a great thing to partner on. Partnerships immediately <span class="yellow">#DOUBLE</span> the reach.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Puns, humor, and quotes are great content on <span class="yellow">#Twitter</span>. Find some related to your business.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Are there <span class="yellow">#common-sense</span> facts related to your business? Combine them with a great photo.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card bg-gradient-x-primary white">
            <div class="card-content">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="fa fa-facebook font-large-2"></i>
                    </div>
                    <div class="fb-post-slider">
                        <ul>
                            <li>Congratulations to Rob Jones in accounting for winning our #NFL football pool!
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Contests are a great thing to partner on. Partnerships immediately #DOUBLE the reach.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Puns, humor, and quotes are great content on #Twitter. Find some related to your business.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Are there #common-sense facts related to your business? Combine them with a great photo.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Social & Weather -->


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

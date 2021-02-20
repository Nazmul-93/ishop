<?php

$loginname=$this->session->userdata('name');
$login_id=$this->session->userdata('login_id');
$usertype=$this->session->userdata('type');

?>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="admin/index"><i class="ft-home"></i><span class="menu-title" data-i18n="">Home</span></a>
          </li>
    <!--        <li><a class="menu-item" href="admin/user_profile/<?php echo $login_id;?>">Edit Profile</a>
              </li>  --> 
              <!-- user srart -->
          <li class=" navigation-header"><span> Manage User </span>
            <i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
          </li>
          <li class=" nav-item">
            <a href="#"><i class="ft-users"></i>
              <span class="menu-title" data-i18n="">Manage User</span>
            </a>
           
          <ul class="menu-content">
            <li>
              <a class="menu-item" href="admin/add_user">  Add New User</a>
              <a class="menu-item" href="admin/user_list/user">  User List</a>
              <a class="menu-item" href="admin/user_list/agent">  Agent List</a>
              <a class="menu-item" href="admin/user_list/admin">  Admin List</a>
              <a class="menu-item" href="admin/user_list/shopkeeper">  Shopkeeper List</a>
              <a class="menu-item" href="admin/user_list/affiliate">  Affiliate List</a>
              <a class="menu-item" href="admin/user_list/area_manager">  Area Manager List</a>
              <!-- <ul class="menu-content">
                  <li><a class="menu-item" href="admin/company_info">Site-Settings</a></li>
              </ul> -->
            </li>
          </ul>
          <!-- user ended -->

     <li class=" nav-item"><a href="admin/user_list/1">
          <i class="ft-users"></i>
          <span class="menu-title" data-i18n="">
            Admin List
          </span>
        </a>
          </li>
          <li class=" nav-item"><a href="admin/user_list/3">
          <i class="ft-users"></i>
          <span class="menu-title" data-i18n="">
            Users List
          </span>
        </a>
          </li>
          <li class=" navigation-header"><span> Manage E-commerce</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-grid"></i><span class="menu-title" data-i18n="">Manage E-commerce</span>
        </a>
            <ul class="menu-content">
            <li>
            <a class="menu-item" href="#">  Manage-Sites</a>
              <ul class="menu-content">
                  <li><a class="menu-item" href="admin/company_info">Site-Settings</a>
                  </li>
                </ul>
              </li>
              
              
              <!-- added -->
              
              <!-- added -->

           <!-- ==========   manage pages start ===== -->
           
            <li>
            <a class="menu-item" href="#">
               Manage-Page</a>
                <ul class="menu-content">
                <li>
                    <a class="menu-item" href="admin/abouts_us">About-US</a>
                    </li>
                  <li>
                    <a class="menu-item" href="admin/terms_conditions">Terms & Conditions</a>
                    </li>
                    <li><a class="menu-item" href="admin/faq">Manage-Faq</a>
              </li>
                  <li>
                    <a class="menu-item" href="admin/career">Carrer</a>
                    </li> 
                    <li>
                    <a class="menu-item" href="admin/privacy_policy">Privacy & Policy</a>
                    </li>
                    <li>
                    <a class="menu-item" href="admin/return_refunds"> Return & Refunds</a>
                    </li> 
                                  <li>
                    <a class="menu-item" href="admin/gift_voucher"> Gift and Voucher</a>
                    </li>   
                                  <li>
                    <a class="menu-item" href="admin/affliate"> Affliate</a>
                    </li>   

                  </ul>
             </li>
            <!-- <li>
            <a class="menu-item" href="#">
               Manage-Settings</a>
                <ul class="menu-content">   
                  </ul>
             </li> -->
             <li>
            <a class="menu-item" href="#">
               Manage-Delivery Area</a>
                <ul class="menu-content">
                <li>
                    <a class="menu-item" href="admin/set_delivery_area">Set Delivery Area</a>
                    </li>
                  </ul>
             </li>
        <!-- ======  manage pages ends ===== -->

              <li><a class="menu-item" href="admin/category"> Manage-Category</a>
           
              <li><a class="menu-item" href="admin/branch">  Manage-Branch</a>
              <li><a class="menu-item" href="admin/contact">  Manage-Contact</a>
              </li>
             
              
             
            </ul>
          </li>
          <!-- added -->
          <!-- Area start -->
          <li class=" navigation-header"><span> Manage Area </span>
            <i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
          </li>
          <li class=" nav-item">
            <a href="#"><i class="fa fa-globe"></i>
              <span class="menu-title" data-i18n="">Manage Area</span>
            </a>
          
          <ul class="menu-content">
            <li>
              <a class="menu-item" href="#">  Manage-Country</a>
              <ul class="menu-content">
                  <li><a class="menu-item" href="admin/add_country"> Add Country</a></li>
                  <li><a class="menu-item" href="admin/country_list"> Country List</a></li>
              </ul>
            </li>
            <li>
              <a class="menu-item" href="#">  Manage-Division</a>
              <ul class="menu-content">
                  <li><a class="menu-item" href="admin/add_division"> Add Division</a></li>
                  <li><a class="menu-item" href="admin/division_list"> Division List</a></li>
              </ul>
            </li>
            <li>
              <a class="menu-item" href="#">  Manage-District</a>
              <ul class="menu-content">
                  <li><a class="menu-item" href="admin/add_district"> Add District</a></li>
                  <li><a class="menu-item" href="admin/district_list"> District List</a></li>
              </ul>
            </li>
            <li>
              <a class="menu-item" href="#">  Manage-Upazila</a>
              <ul class="menu-content">
                  <li><a class="menu-item" href="admin/add_upazila"> Add Upazila</a></li>
                  <li><a class="menu-item" href="admin/upazila_list"> Upazila List</a></li>
              </ul>
            </li>
            <li>
              <a class="menu-item" href="#">  Manage-Union</a>
              <ul class="menu-content">
                  <li><a class="menu-item" href="admin/add_union"> Add Union</a></li>
                  <li><a class="menu-item" href="admin/union_list"> Union List</a></li>
              </ul>
            </li>

          </ul>
           <!-- added -->
          
          
          
          <li class=" navigation-header"><span>Main Features</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-box"></i><span class="menu-title" data-i18n="">Manage-Product</span></a>
          <ul class="menu-content">
              <li><a class="menu-item" href="admin/product">Manage-Products</a>
              </li>
              <!-- <li><a class="menu-item" href="admin/menu_site">Manage-Photo-Gallery</a>
              </li> -->
              <!-- <li><a class="menu-item" href="admin/product_tag">Manage Products Tags</a> -->
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-shopping-cart"></i><span class="menu-title" data-i18n="">Manage Purchase</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="admin/purchase_product">Purchase-Product</a>
              </li> 
              <li class=" nav-item"><a href="admin/supplier"><span class="menu-title" data-i18n="">Manage Supplier</span></a>
          </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i><span class="menu-title" data-i18n="">Manage GateWay</span></a>
            <ul class="menu-content">
            <li>
                    <a class="menu-item" href="admin/set_payment_gateway">Set Payment Gateway</a>
                    </li>
                <li>
                    <a class="menu-item" href="admin/set_sms_gateway">Set SMS Gateway</a>
                    </li>
                <li>
                    <a class="menu-item" href="admin/set_sms_template">Set SMS Template</a>
                    </li>
                  <li>
                <li>
                    <a class="menu-item" href="admin/set_email_template">Set Email Template</a>
                    </li>
                  <li>
                  <a class="menu-item" href="admin/set_seo">SEO Settings</a>
                  </li> 
            </ul>
          </li>
            <li class=" nav-item"><a href="#"><i class="fa fa-first-order"></i><span class="menu-title" data-i18n="">Manage Orders</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="admin/order_history">Order History</a>
              </li> 
            </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="fa fa-cube"></i><span class="menu-title" data-i18n="">Manage Advertise</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="admin/advertise">Manage-Ads</a>
              </li> 
              <li><a class="menu-item" href="admin/slider">Manage-Sliders</a>
              </li> 
            </ul>
            </li>
          <li class=" nav-item"><a href="admin/news"><i class="ft-book"></i><span class="menu-title" data-i18n="">Manage News</span></a>
          </li>
          <li class=" nav-item"><a href="admin/brand"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Manage Brand</span></a>
          </li>
   
          <li class="navigation-header"><span>Others</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Others"></i>
          </li>
       
          <li class=" nav-item"><a href="admin/news_letter"><i class="ft-mail"></i><span class="menu-title" data-i18n="">Email</span>
        
        </a>
        </li>  
        <li class=" nav-item"><a href="admin/message"><i class="fa fa-comments"></i><span class="menu-title" data-i18n="">Message</span>
        </a>
        </li>
          <li class=" nav-item"><a href="logout"><i class="ft-power"></i><span class="menu-title" data-i18n="">Log Out</span>
          </a>
          </li>
        </ul>
      </div>
    </div>

 
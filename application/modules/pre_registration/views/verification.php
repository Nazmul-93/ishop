<?php
   $this->load->view('front/header_link');
   ?> 
<body class="form-bg scroll">
   <?php
      $this->load->view('front/header');
      ?> 
   <style>
   </style>
   <div class="">
      <div class="container">
         <div style="margin: 10px 162px 0px 160px">
            <?php if($this->session->userdata('message')!=''){?>
            <div  class="alert alert-success">
               <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
               <strong ><?=$this->session->userdata('message');?></strong> 
               <?php $this->session->unset_userdata('message');?>
            </div>
            <?php } ?>
         </div>
         <div class="col-md-8 mx-auto border m-5 bg-white">
            <form onsubmit="return afer_submit_otp()" method="POST" action="pre_registration/verification_code_match" class="login-form m-5 p-2">
               <h5 class="text-center pb-3 font-weight-bold">Account Confirmation</h5>
               <input type="text" disabled="" value="<?php echo $this->session->userdata('tmp_name')?>" class="form-control rounded-0 mb-2" id="name" name="name" placeholder="Name"> 
               <input type="email" disabled="" class="form-control rounded-0 mb-2" id="email" name="email" placeholder="Email" onkeyup="myFunction()" value="<?php echo $this->session->userdata('tmp_email')?>">
               <div>
                  <select style="float: left;width: 20%;" class="form-control rounded-0" name="country_code">
                     <option value="<?php echo $this->session->userdata('tmp_country_code')?>"><?php echo $this->session->userdata('tmp_country_code')?></option>
                  </select>
                  <input style="float: left;width: 80%;" type="text" maxlength="10" class="form-control rounded-0 mb-2" id="phone" name="phone" placeholder="Phone" disabled value="<?php echo $this->session->userdata('tmp_mobile_no')?>"> 
               </div>
               <div>
                  <input type="text"  id="verify_code" name="verify_code" class="form-control rounded-0 mb-2"  placeholder="Enter Verification Code" >
               </div>
               <div class="row">
                  <div class="col-md-4"><button id="submit" type="submit" class="btn btn-primary bg-orange border-0 rounded-0 ml-0">Submit</button></div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <?php
      $this->load->view('front/footer_link');
      ?> 
   <?php
      $this->load->view('front/footer');
      ?> 

      <script>
         function afer_submit_otp() 
         {
            $("#submit").attr("disabled", true);
            return true;
         }
      </script>
</body>
</html>
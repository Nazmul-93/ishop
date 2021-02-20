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
      <div class="col-md-7 mx-auto border m-5 bg-white">
         <div id="load" style="display:none;width:69px;height:89px; solid black;position:absolute;top:50%;left:48%;padding:2px;"><img src='uploads/loading.gif' width="64" height="64" /><br>Loading..</div>
         <form onsubmit="return check_data()" autocomplete="off" method="POST" action="pre_registration/registration_post" class="login-form m-3 p-2">
            <h5 class="text-center font-weight-bold">SIGN UP</h5>
            <div class="container">
               <div class="row">
                  <?php $this->load->view('front/login_sc');?>
               </div>
            </div>
            <div class="row  mt-4 mb-4">
               <div class="col-md-5">
                  <hr style="border-top: 1px solid #ccc">
               </div>
               <div class="col-md-2 text-center font-weight-bold" style="line-height: 2;"><span>OR</span></div>
               <div class="col-md-5">
                  <hr style="border-top: 1px solid #ccc">
               </div>
            </div>
            <div class="col-md-4 signup-avatar">
               <img src="front_assets/images/login-img-min.png" alt="">
            </div>
            <?php if($this->session->userdata('err_msg')!=''){?>
            <div  class="alert alert-danger">
               <strong ><?=$this->session->userdata('err_msg');?></strong> 
               <?php $this->session->unset_userdata('err_msg');?>
            </div>
            <?php } ?>
            <div id="div_msg" class="alert alert-success" style="display: none">

               <strong id="message"></strong> 
            </div>
            <input type="text" class="form-control rounded-2 mb-2" id="name" name="name" <?php if($this->session->userdata('tmp_name')!=''){?> value="<?php echo $this->session->userdata('tmp_name')?>" <?php $this->session->unset_userdata('tmp_name');} ?> placeholder="Name"> 
            <input type="email" class="form-control rounded-2 mb-2" id="email" name="email" <?php if( $this->session->userdata('tmp_email')!=''){?> value="<?php echo $this->session->userdata('tmp_email')?>" <?php $this->session->unset_userdata('tmp_email');} ?> placeholder="Email" onkeyup="myFunction()">
            <div>
               <select style="float: left;width: 20%;" class="form-control rounded-left" name="country_code" readonly="">
                  <option value="880">880</option>
               </select>
               <input style="float: left;width: 80%;" <?php if( $this->session->userdata('tmp_mobile_no')!=''){?> value="<?php echo $this->session->userdata('tmp_mobile_no')?>" <?php $this->session->unset_userdata('tmp_mobile_no');} ?> type="text"  maxlength="10" class="form-control rounded-right mb-2" id="phone" name="phone" placeholder="Phone" onkeypress="return isNumber(event)"> 
            </div>
            <div>
               <input type="password"  class="form-control rounded-2 mb-2" id="password" name="password" placeholder="Password"> 
               <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
            </div>
            <div>
               <div>
                  <input type="password" class="form-control rounded-2 mb-2" id="confirm" name="confirm_password" placeholder="Confirm-Password"> 
                  <span toggle="#confirm" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
               </div>

               <div class="row">
                  <div class="col-md-12">
                     <div class="checkbox checkbox-default checkb-login">
                        <input value="1" id="checkbox1" type="checkbox" checked="">
                        <label for="checkbox1">
                           By continuing you agree to  <a target="_blank" href="page/terms_and_condition"><strong>Terms & Conditions</strong></a>
                           <!-- Remember me -->
                        </label>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6"><button id="submit" type="submit" class=" btn btn-primary border-0 rounded-0">Sign Up</button></div>
                  <div class="col-md-6" style="line-height: 2">
                     <span class="float-right">Already a member? <a href="login" class="orange">Login</a></span>
                  </div>
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
      $('#confirm').on('keyup', function () {
          if ($(this).val() == $('#password').val()) {
             $("#div_msg").show();
              $('#message').html('matching').css('color', 'green');
              $('#submit').removeAttr('disabled');
          } else 
          {
      
            //$("#submit").delay(1000).fadeOut(800);
      
            $("#div_msg").show();
            $('#message').html('not matching').css('color', 'red');
      
            $("#submit").attr("disabled", true);
            
          }
      });
   </script>
   <script>
      function check_data(){
          var ok=true;
      
          var name=$('#name').val();
          var email=$('#email').val();
          var phone=$('#phone').val();
          //intRegex = /[0-9 -()+]+$/;
          var password=$('#password').val();
          var confirm=$('#confirm').val();
          $("#load").css("display", "block");
          $("#submit").attr("disabled", true);
          var agreement=0;

          if($('#checkbox1').prop('checked')) 
          {
            var agreement=1;
          } 

          else 
          {
            var agreement=0;
          }
        
      
      
          if(name== "")
          {
              $("#div_msg").show();
              $('#message').html('Name can not be empty.').css('color', 'red')
              ok=false;
              $("#load").css("display", "none");
              $('#submit').removeAttr('disabled');
          }

          else if(email== "")
          {
            $("#div_msg").show();
            $('#message').html('Email can not be empty.').css('color', 'red')
            ok=false;
            $("#load").css("display", "none");
            $('#submit').removeAttr('disabled');
          }
          
          else if(phone== "")
          {
            $("#div_msg").show();
            $('#message').html('Phone Number can not be empty.').css('color', 'red')
            ok=false;
            $("#load").css("display", "none");
            $('#submit').removeAttr('disabled');
          }
      
          else if(phone.length != 10)
          {
            $("#div_msg").show();
            $("#message").html('Enter a valid phone number Ex: 01XXXXXXXXX').css('color','red');
            ok=false;
            $("#load").css("display", "none");
            $('#submit').removeAttr('disabled');
          }
              
          else if(password== "")
          {
            $("#div_msg").show();
            $('#message').html('Password can not be empty.').css('color', 'red')
            ok=false;
            $("#load").css("display", "none");
            $('#submit').removeAttr('disabled');
          }
      
          else if(agreement==0)
          {
            $("#div_msg").show();
            $('#message').html('Please check the agreement first').css('color', 'red')
            ok=false;
            $("#load").css("display", "none");
            $('#submit').removeAttr('disabled');
          }


          else{
      
          }
          return ok;
      }
          
          
   </script>
   <script type="text/javascript">
      function isNumber(event){
        var keycode = event.which;
        if((keycode>= 48 && keycode<= 57) || keycode== 8){
          return true;
        }
        return false;
      }
   </script>

   <script>
      $(".toggle-password").click(function() {
      
        $(this).toggleClass("fa-eye-slash fa-eye");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
   </script>
   <script>
      //When the page has loaded.
        $( document ).ready(function(){
          $("#submit").click(function(){
            $('#div_msg').fadeIn('slow', function(){
               $('#div_msg').delay(1000).fadeOut(); 
            });
            });
        });
   </script>
   <script>
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
      });
   </script>
</body>
</html>
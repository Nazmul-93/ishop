
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
       
      <div class="col-md-8 mx-auto border m-5 bg-white">
          <div id="load" style="display:none;width:69px;height:89px; solid black;position:absolute;top:50%;left:48%;padding:2px;"><img src='uploads/loading.gif' width="64" height="64" /><br>Loading..</div>
     
           <form onsubmit="return check_data()" method="POST" action="forget/update" class="login-form m-5 p-2">
       <h5 class="text-center pb-3 font-weight-bold">Change Password</h5>

      <?php if($this->session->userdata('err_msg')!=''){?>
       <div  class="alert alert-danger">
        <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
        <strong ><?=$this->session->userdata('err_msg');?></strong> 
        <?php $this->session->unset_userdata('err_msg');?>
      </div>
       <?php } ?>

      <div id="div_msg" class="alert alert-success" style="display: none">
        <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
        <strong id="message"></strong> 
      </div>


      <div>
          <input type="text" value="<?=$this->session->userdata('email');?>" disabled  class="form-control rounded-0 mb-2" > 
        
      </div>

      <div>
          <input type="password"  class="form-control rounded-0 mb-2" id="password" name="password" placeholder="Password"> 
          <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      </div>
       
      <div>
       <input type="password" class="form-control rounded-0 mb-2" id="confirm" name="confirm_password" placeholder="Confirm-Password"> 
       <span toggle="#confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
        
       
      </div>


  
  
 
      <div class="row">
        <div class="col-md-4"><button id="submit" type="submit" class="btn btn-primary bg-orange border-0 rounded-0 btn-sm">Update</button></div>
        <div class="col-md-8" style="line-height: 2">
          <span class="float-right">Already a member? <a href="login">Login</a></span>
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

       
        var password=$('#password').val();
        var confirm=$('#confirm').val();
        $("#load").css("display", "block");
        $("#submit").attr("disabled", true);
        

            
        if(password== ""){
            $("#div_msg").show();
            $('#message').html('Password can not be empty.').css('color', 'red')
            ok=false;
            $("#load").css("display", "none");
            $('#submit').removeAttr('disabled');
        }

        else if(password!=confirm){
            $("#div_msg").show();
            $('#message').html('Password not matched.').css('color', 'red')
            ok=false;
            $("#load").css("display", "none");
            $('#submit').removeAttr('disabled');
        }

        // else if(password.length >= 6)
        //     {
        //         $("#div_msg").show();
        //         $("#message").html('Your password length should be more than 6 characters.').css('color','red');
        //         ok=false;
        //         $("#load").css("display", "none");
        //         $('#submit').removeAttr('disabled');
        //     }

        else{

        }
        return ok;
    }
        
        
 </script>

<script type="text/javascript">
  function isNumber(event){
    var keycode = event.keyCode;
    if(keycode>= 48 && keycode<= 57){
      return true;
    }
    return false;
  }
</script>

<script>
// function myFunction() {
//     var x = document.getElementById("password");
//     if (x.type === "password") {
//         x.type = "text";
//     } else {
//         x.type = "password";
//     }

//     var y = document.getElementById("confirm");
//     if (y.type === "password") {
//         y.type = "text";
//     } else {
//         y.type = "password";
//     }
// }
</script>

<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>

 


</body>
</html>
<?php $this->load->view('admin/headlink'); ?>
<style>
    .input-group-btn {
        display: none;
    }
</style>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <!-- BEGIN HEADER -->
       <?php $this->load->view('admin/head_nav'); ?>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
              <?php $this->load->view('admin/left_nav');?>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <?php $this->load->view('admin/page_title');?>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                      
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                   
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="portlet box green ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-newspaper-o"></i> <?=$this->lang->line('new_label').' '.$this->lang->line('institution_label').' '.$this->lang->line('btn_add_label').' '.$this->lang->line('form_label');?></div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <div id="load" style="display:none;width:69px;height:89px; solid black;position:absolute;top:50%;left:48%;padding:2px;"><img src='uploads/loading.gif' width="64" height="64" /><br>Loading..</div>
                                     <form onsubmit="return check_data()" class="form-horizontal form-bordered form-row-stripped" action="admin/update_password/<?=$this->session->userdata('login_id');?>" method="post" enctype="multipart/form-data">

                                     <div id="div_msg" class="alert alert-success" style="display: none">
                                        <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                                        <strong id="message"></strong> 
                                      </div>
                                        <?php if($this->session->userdata('log_scc')){ ?>
                                        <div class="alert alert-success">
                                            <button class="close" data-close="alert"></button>
                                            <span><?=$this->session->userdata('log_scc');?></span>
                                        </div>
                                         <?php } $this->session->unset_userdata('log_scc');?>
                                        
                                        <?php if($this->session->userdata('log_err')){ ?>
                                        <div class="alert alert-danger">
                                            <button class="close" data-close="alert"></button>
                                            <span><?=$this->session->userdata('log_err');?></span>
                                        </div>
                                         <?php } $this->session->unset_userdata('log_err');?>


                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="control-label col-md-3">
                                                <?=$this->lang->line('').' '.$this->lang->line('current_password_label');?>
                                                    
                                                </label>
                                                <div class="col-md-9">
                                                     <input type="password" name="current_password"  id="current_password" class="form-control" /> 
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-3">
                                                <?=$this->lang->line('').' '.$this->lang->line('new_password_label');?>
                                                    
                                                </label>
                                                <div class="col-md-9">
                                                  <input type="password" id="password" class="form-control" name="password" />
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label col-md-3">
                                                <?=$this->lang->line('').' '.$this->lang->line('confirm_password_label');?>
                                                    
                                                </label>
                                                <div class="col-md-9">
                                                     <input type="password"  id="confirm" class="form-control" /> 
                                                </div>
                                            </div> 

                     
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" id="submit">
                                                        <i class="fa fa-check"></i> <?=$this->lang->line('btn_submit_label');?></button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->


            <!-- BEGIN Right SIDEBAR -->
            <!-- END Right SIDEBAR -->


        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
       <?php $this->load->view('admin/footer'); ?>

      <?php $this->load->view('admin/footerlink'); ?>

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
        //alert();
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

        // else if(password)
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

     <!-- <script>
        function check_registration() 
        {
            $("#err_div").hide();
            //var regex = new RegExp("^(?:\\+?88)?8801[15-9]\\d{8}$");
            var ok=true;
            
            var password= $("#password").val();
            var con_password= $("#confirm_password").val();
            
            if(password=="")
            {
                $("#err_div").show();
                $("#err_msg").html('* Fields must be filled out');
                ok=false;

            }
            

            if(password!=con_password)
            {
                $("#err_div").show();
                $("#err_msg").html('Password Not Matched');
                ok=false;

            }
            return ok;
        }

    </script>
 -->
    </body>

</html>

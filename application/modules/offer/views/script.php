<!-- data table link -->

<script src="backassets/assets/scripts/pages/tb_datatables.js"></script>
<script src="backassets/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<!-- <script src="backassets/assets/scripts/pages/fm_control.js"></script> -->


 

<script>  
 $(document).ready(function(){  
      $('#offername').change(function(){ 
           var offername = $(this).val();
           if(offername != '')  
           {   
            $.ajax({  
                  url:"<?php echo base_url(); ?>offer/check_offername_avalibility",  
                  method:"POST",  
                  data:{offername:offername},  
                  success:function(data){ 
                    console.log(data);
                      $('#offername_result').html(data);  
                  }  
            });  
           }  
      });  
 }); 
 
 $(document).ready(function(){  
      $('#offercode').change(function(){ 
           var offercode = $(this).val();
           if(offercode != '')  
           {  
            $.ajax({  
                  url:"<?php echo base_url(); ?>offer/check_offercode_avalibility",  
                  method:"POST",  
                  data:{offercode:offercode},  
                  success:function(data){ 
                    console.log(data);
                      $('#offercode_result').html(data);  
                  }  
            });  
           }  
      });  
 });
 </script>
 
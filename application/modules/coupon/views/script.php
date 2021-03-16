<!-- data table link -->

<script src="backassets/assets/scripts/pages/tb_datatables.js"></script>
<script src="backassets/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<!-- <script src="backassets/assets/scripts/pages/fm_control.js"></script> -->




<script>  
 $(document).ready(function(){  
      $('#couponcode').change(function(){ 
           var couponcode = $(this).val();
           if(couponcode != '')  
           {   
            $.ajax({   
                  url:"<?php echo base_url(); ?>coupon/check_couponcode_avalibility",  
                  method:"POST",  
                  data:{couponcode:couponcode},  
                  success:function(data){ 
                    console.log(data);
                      $('#couponcode_result').html(data);  
                  }  
            });  
           }  
      });  
 }); 
 

 </script>
 
<!-- data table link -->

<script src="backassets/assets/scripts/pages/tb_datatables.js"></script>
<script src="backassets/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<!-- <script src="backassets/assets/scripts/pages/fm_control.js"></script> -->




<script>  
 $(document).ready(function(){  
      $('#colorname').change(function(){ 
           var colorname = $(this).val();
           if(colorname != '')  
           {  
            $.ajax({  
                  url:"<?php echo base_url(); ?>color/check_colorname_avalibility",  
                  method:"POST",  
                  data:{colorname:colorname},  
                  success:function(data){ 
                    console.log(data);
                      $('#colorname_result').html(data);  
                  }  
            });  
           }  
      });  
 }); 
 
 $(document).ready(function(){  
      $('#colorcode').change(function(){ 
           var colorcode = $(this).val();
           if(colorcode != '')  
           {  
            $.ajax({  
                  url:"<?php echo base_url(); ?>color/check_colorcode_avalibility",  
                  method:"POST",  
                  data:{colorcode:colorcode},  
                  success:function(data){ 
                    console.log(data);
                      $('#colorcode_result').html(data);  
                  }  
            });  
           }  
      });  
 });
 </script>
 
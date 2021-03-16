<!-- data table link -->

<script src="backassets/assets/scripts/pages/tb_datatables.js"></script>
<script src="backassets/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<!-- <script src="backassets/assets/scripts/pages/fm_control.js"></script> -->




<script>  
 $(document).ready(function(){  
      $('#unitname').change(function(){ 
           var unitname = $(this).val();
           if(unitname != '')   
           {  
            $.ajax({  
                  url:"<?php echo base_url(); ?>unit/check_unitname_avalibility",  
                  method:"POST",  
                  data:{unitname:unitname},  
                  success:function(data){ 
                    console.log(data);
                      $('#unitname_result').html(data);  
                  }  
            });  
           }  
      });  
 }); 
 </script>
 
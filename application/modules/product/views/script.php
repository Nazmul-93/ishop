<!-- data table link -->

<script src="backassets/assets/scripts/pages/tb_datatables.js"></script>
<script src="backassets/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>



<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#product_img')
                  .attr('src', e.target.result)
                  .width(100)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

<script>  
 $(document).ready(function(){  
      $('#productname').change(function(){ 
           var productname = $(this).val();
           if(productname != '')  
           {  
            $.ajax({  
                  url:"<?php echo base_url(); ?>product/check_product_avalibility",  
                  method:"POST",  
                  data:{productname:productname},  
                  success:function(data){ 
                    console.log(data);
                      $('#productname_result').html(data);  
                  }  
            });  
           }  
      });  
 }); 
 </script>
 
 
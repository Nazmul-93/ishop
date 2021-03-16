<!-- data table link -->

<script src="backassets/assets/scripts/pages/tb_datatables.js"></script>
<script src="backassets/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<!-- <script src="backassets/assets/scripts/pages/fm_control.js"></script> -->


<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#brand_img')
                  .attr('src', e.target.result)
                  .width(120)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

<script>  
 $(document).ready(function(){  
      $('#brandname').change(function(){ 
           var brandname = $(this).val();
           if(brandname != '')  
           {  
            $.ajax({  
                  url:"<?php echo base_url(); ?>brand/check_brand_avalibility",  
                  method:"POST",  
                  data:{brandname:brandname},  
                  success:function(data){ 
                    console.log(data);
                      $('#brandname_result').html(data);  
                  }  
            });  
           }  
      });  
 }); 
 </script>
 
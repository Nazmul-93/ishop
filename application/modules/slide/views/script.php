<!-- data table link -->

<script src="backassets/assets/scripts/pages/tb_datatables.js"></script>

<script src="backassets/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>

<!-- <script src="backassets/assets/scripts/pages/fm_control.js"></script> -->


<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#slide_img')
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
      $('#slidename').change(function(){ 
           var slidename = $(this).val();
           if(slidename != '')  
           {  
            $.ajax({  
                  url:"<?php echo base_url(); ?>slide/check_slide_avalibility",  
                  method:"POST",  
                  data:{slidename:slidename},  
                  success:function(data){ 
                    console.log(data);
                      $('#slidename_result').html(data);  
                  }  
            });  
           }  
      });  
 }); 
 </script>
 
 
 
 <!-- <script>
     
     $(document).ready(function() {
  $("#basic-form").validate({
    rules: {
        slidename : {
        required: true,
      },
      slide_img : {
        required: true,
      },
    },
    messages : {
        slidename: {
        required: "Name is required"
      },
      slide_img: {
        required: "Image is required"
      },
    }
  });
});
 </script> -->
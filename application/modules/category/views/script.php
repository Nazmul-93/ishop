<!-- data table link -->

<script src="backassets/assets/scripts/pages/tb_datatables.js"></script>

<script src="backassets/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>



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
      $('#category_name').change(function(){ 
           var category_name = $(this).val();
           if(category_name != '')  
           {  
            $.ajax({  
                  url:"<?php echo base_url(); ?>category/check_category_avalibility",  
                  method:"POST",  
                  data:{category_name:category_name},  
                  success:function(data){ 
                    console.log(data);
                      $('#category_name_result').html(data);  
                  }  
            });  
           }  
      });  
 }); 


 // $(".remove").click(function(){
 //        var url = $(this).data("target");
    
 //       swal({
 //        title: "Are you sure?",
 //        text: "You will not be able to recover this imaginary file!",
 //        type: "warning",
 //        showCancelButton: true,
 //        confirmButtonClass: "btn-danger",
 //        confirmButtonText: "Yes, delete it!",
 //        cancelButtonText: "No, cancel plx!",
 //        closeOnConfirm: false,
 //        closeOnCancel: false
 //      },
 //      function(isConfirm) {
 //        if (isConfirm) {
 //          $.ajax({
 //             url: url,
 //             type: 'GET',
 //             error: function() {
 //                alert('Something is wrong');
 //             },
 //             success: function(data) {
 //                  swal("Deleted!", "Your imaginary file has been deleted.", "success");
 //                  location.reload();
 //             }
 //          });
 //        } else {
 //          swal("Cancelled", "Your imaginary file is safe :)", "error");
 //        }
 //      });
     
 //    });
 </script>
 
 
 
 <!-- <script>
     
     $(document).ready(function() {
  $("#basic-form").validate({
    rules: {
        brandname : {
        required: true,
      },
      brand_img : {
        required: true,
      },
    },
    messages : {
        brandname: {
        required: "Name is required"
      },
      brand_img: {
        required: "Image is required"
      },
    }
  });
});
 </script> -->

        
     <script src="backassets/assets/scripts/siqtheme.js"></script>
     <script src="backassets/assets/scripts/pages/jquery.min.js"></script>
     <script src="backassets/assets/scripts/pages/dashboard1.js"></script>
     <script src="backassets/assets/scripts/pages/sweetalert.js"></script>
     
     <script type="text/javascript">
  $(".remove").click(function(){
          var url = $(this).data("target"); 
      
        swal({ 
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary Data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, Delete it!",
          cancelButtonText: "No, Cancel please!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: url,
              type: 'GET',
              error: function() {
                  alert('Something is wrong');
              },
              success: function(data) {
                    swal("Deleted!", "Your imaginary data has been deleted.", "success");
                    location.reload();
              }
            });
          } else {
            swal("Cancelled", "Your imaginary data is safe", "error");
          }
        });
      
      });
 </script>
     
    </body> 
</html>
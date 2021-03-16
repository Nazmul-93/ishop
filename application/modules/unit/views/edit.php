<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3">
            <form class="validate1" action="unit/update/<?= $data['unit_id']; ?>" method="post" enctype="multipart/form-data" novalidate>
                <div class="card-header uppercase">
                    <div class="caption"><i class="ti-pencil-alt"></i> Edit Unit</div>
                    <div class="tools">
                        <a href="unit" class="btn btn-warning">
                            <i class="ti-share"></i>
                        </a> 
                    </div> 
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Unit Name</label>
                            <div class="input-group col">
                                <input type="text" class="form-control" name="unit_name" id="unitname" value="<?=$data['unit_name']; ?>">
                            </div>
                            <span id="unitname_result"></span>
                        </div>
                    </li>
                </ul>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">
                        <i class="ti-save"></i> Save
                    </button> 
                </div>
            </form>
        </div>
    </div>               
</div>

<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(120)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
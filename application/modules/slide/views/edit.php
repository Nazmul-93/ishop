<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3">
            <form class="validate1" action="slide/update/<?= $data['slide_id']; ?>" method="post" enctype="multipart/form-data" novalidate>
                <div class="card-header uppercase">
                    <div class="caption"><i class="ti-pencil-alt"></i> Edit Slide</div>
                    <div class="tools">
                        <a href="slide" class="btn btn-warning">
                            <i class="ti-share"></i>
                        </a> 
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Slide Name</label>
                            <div class="input-group col">
                                <input type="text" class="form-control" name="slide_name" value="<?=$data['slide_name']; ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            
                            <label class="col-md-3 label-control" for="eventRegInput2">Slide Image</label>
                            <div class="col-md-9">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                <img src="uploads/slide/<?=$data['slide_img'];?>" style="height: 80px; widght:100px;"><br>
                                    <div>
                                        <input type="file" name="slide_img" onchange="readURL(this);" value="<?= $data['slide_img']; ?>">&nbsp;&nbsp;&nbsp;
                                        <img id="one" >
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="form-radio col-md-9" >
                                <label class="mr-3">
                                    <input type="radio" name="status" value="1" <?php if($data['status']==1) echo 'checked';?>> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span> Show
                                </label> 
                                <label class="mr-3">
                                    <input type="radio" name="status" value="0" <?php if($data['status']==0) echo 'checked';?>> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span> Hide
                                </label> 
                            </div>
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
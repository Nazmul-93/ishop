<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3">
            <form class="validate1" action="product/update/<?= $data['product_id']; ?>" method="post" enctype="multipart/form-data" novalidate>
                <div class="card-header uppercase">
                    <div class="caption"><i class="ti-pencil-alt"></i> Edit Product</div>
                    <div class="tools">
                        <a href="product" class="btn btn-warning">
                            <i class="ti-share"></i>
                        </a> 
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Product Name</label>
                            <div class="input-group col">
                                <input type="text" class="form-control" name="product_name" value="<?=$data['product_name']; ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Product Code</label>
                            <div class="input-group col">
                                <input class="form-control" id="productcode" name="product_code" value="<?=$data['product_code']; ?>" required>
                            </div>
                            <span id="productcode_result"></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Quantity</label>
                            <div class="input-group col">
                                <input class="form-control" name="quantity" value="<?=$data['quantity']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Short Description</label>
                            <div class="input-group col">
                                <input class="form-control" name="short_description" value="<?=$data['short_description']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Long Description</label>
                            <div class="input-group col">
                                <input class="form-control" name="long_description" value="<?=$data['long_description']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Product Model</label>
                            <div class="input-group col">
                                <input class="form-control" name="product_model" value="<?=$data['product_model']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Product Price</label>
                            <div class="input-group col">
                                <input class="form-control" name="product_price" value="<?=$data['product_price']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Discount Type</label>
                            <div class="col">
                                <select class="form-control" name="discount_type">
                                    <option>Select Type</option>
                                    <option value="">Fixed</option>
                                    <option value="">Percent</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Product Discount Price</label>
                            <div class="input-group col">
                                <input class="form-control" name="product_discount_price" value="<?=$data['product_discount_price']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="eventRegInput2">Product Image</label>
                            <div class="col-md-9">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                <img src="uploads/product/<?=$data['product_img'];?>" style="height: 80px; widght:100px;"><br>
                                    <div>
                                        <input type="file" name="product_img" onchange="readURL(this);" value="<?= $data['product_img']; ?>">&nbsp;&nbsp;&nbsp;
                                        <img id="one" >
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Point</label>
                            <div class="input-group col">
                                <input class="form-control" name="point" value="<?=$data['point']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Warrenty</label>
                            <div class="input-group col">
                                <input class="form-control" name="warrenty" value="<?=$data['warrenty']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Guarantee</label>
                            <div class="input-group col">
                                <input class="form-control" name="guarantee" value="<?=$data['guarantee']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Select Category</label>
                            <div class="col">
                                <select class="form-control" name="category_id">
                                    <option>Select</option>
                                    <?php 
                                    foreach($category_data as $value) { ?>
                                        <option value="<?=$value['category_id']?>" <?php if($value['category_id'] == $data['category_id'] ) echo "Selected";?>><?=$value['category_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Select Brand</label>
                            <div class="col">
                                <select class="form-control" name="brand_id">
                                    <option>Select</option>
                                    <?php 
                                    foreach($brand_data as $value) { ?>
                                        <option value="<?=$value['brand_id']?>" <?php if($value['brand_id'] == $data['brand_id'] ) echo "Selected";?>><?=$value['brand_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Select Color</label>
                            <div class="col">
                                <select class="form-control" name="color_id">
                                    <option>Select</option>
                                    
                                    <option value="">Fixed</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Select Supplier</label>
                            <div class="col">
                                <select class="form-control" name="supplier_id">
                                    <option>Select Type</option>
                                    
                                    <option value="">Fixed</option>
                                    
                                </select>
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
<div class="row">
    <div class="col-lg-12"> 
        <div class="card mb-3">
            <form class="validate1" action="product/save" method="post" enctype="multipart/form-data" >
            <?php echo validation_errors(); ?>  
        
                <div class="card-header uppercase">
                    <div class="caption"><i class="ti-plus"></i> Add New Product</div>
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
                                <input class="form-control" id="productname" name="product_name"placeholder="i.e iPhone">
                            </div>
                            <span id="productname_result"></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Product Code</label>
                            <div class="input-group col">
                                <input class="form-control" id="productcode" name="product_code"placeholder="i.e 00001"  >
                            </div>
                            <span id="productcode_result"></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Quantity</label>
                            <div class="input-group col">
                                <input class="form-control" name="quantity" placeholder="i.e 50">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Short Description</label>
                            <div class="input-group col">
                                <input class="form-control" name="short_description" placeholder="Shortly write here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Long Description</label>
                            <div class="input-group col">
                                <input class="form-control" name="long_description" placeholder=" Write description here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Product Model</label>
                            <div class="input-group col">
                                <input class="form-control" name="product_model" placeholder=" i.e iPhone pro max 11">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Product Price</label>
                            <div class="input-group col">
                                <input class="form-control" name="product_price" placeholder=" 10000"  >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Discount Type</label>
                            <div class="col">
                                <select class="form-control" name="discount_type">
                                    <option>Select Type</option>
                                    <option value="Fixed">Fixed</option>
                                    <option value="Percent">Percent</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Product Discount Price</label>
                            <div class="input-group col">
                                <input class="form-control" name="product_discount_price" placeholder=" i.e 10% or 20 TK">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="eventRegInput2">Product Image</label>
                            <div class="col-md-9">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div>
                                        <input type="file" name="product_img"onchange="readURL(this);" >&nbsp;&nbsp;&nbsp;
                                        <img id="product_img" >
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Point</label>
                            <div class="input-group col">
                                <input class="form-control" name="point" placeholder=" i.e 10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Warrenty</label>
                            <div class="input-group col">
                                <input class="form-control" name="warrenty" placeholder=" i.e 1 year">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Guarantee</label>
                            <div class="input-group col">
                                <input class="form-control" name="guarantee" placeholder=" i.e 10 year">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Select Category</label>
                            <div class="col">
                                <select class="form-control" name="category_id">
                                    <option>Select</option>
                                    <?php foreach($category_data as $row){?>
                                        <option value="<?= $row['category_id'] ?>">
                                            <?= $row['category_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Select Brand</label>
                            <div class="col">
                                <select class="form-control" name="brand_id">
                                    <option>Select</option>
                                    <?php foreach($brand_data as $row){?>
                                        <option value="<?= $row['brand_id'] ?>">
                                            <?= $row['brand_name'] ?>
                                        </option>
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
                                    <input type="radio" name="status" value="1"> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span> Show
                                </label> 
                                <label class="mr-3">
                                    <input type="radio" name="status" value="0"> 
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


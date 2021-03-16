<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3">
            <form class="validate1" action="category/update/<?= $data['category_id']; ?>" method="post" novalidate>
                <div class="card-header uppercase">
                    <div class="caption"><i class="ti-pencil-alt"></i> Edit Category</div>
                    <div class="tools">
                        <a href="category" class="btn btn-warning">
                            <i class="ti-share"></i>
                        </a> 
                    </div>
                </div> 
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Category Name</label>
                            <div class="input-group col">
                                <input type="text" class="form-control" name="category_name" value="<?=$data['category_name']; ?>" required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-3 col-form-label">Parent Category Name</label>
                            <div class="input-group col">
                            <select class="form-control" name="parent_id">
                                <option>Select Category</option>
                                <?php 
                                    foreach($parent_category as $category) { ?>
                                    <option value="<?=$category['category_id']?>" <?php if($category['category_id']== $data['parent_id'] ) echo "Selected";?>>
                                        <?=$category['category_name']?>
                                    </option>
                                    <?php } ?>
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



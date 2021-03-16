<div class="row">
    <div class="col-lg-12"> 
        <div class="card mb-3">
            <form class="validate1" action="category/save" method="post" enctype="multipart/form-data" >
                <div class="card-header uppercase">
                    <div class="caption"><i class="ti-plus"></i> Add New Category</div>
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
                                <input class="form-control" id="category_name" name="category_name"placeholder="i.e iPhone" required>
                            </div>
                            <span id="category_name_result"></span>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-3 col-form-label">Parent Category</label>
                            <div class="col">
                                <select class="form-control" name="parent_id">
                                    <option value="" selected>Select Parent Category</option>

                                    <?php foreach ($parent_category as $row) { ?>
                                        <option value="<?=$row['category_id']?>"><?=$row['category_name']?></option>
                                   <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="form-radio col-md-9" >
                                <label class="mr-3">
                                    <input type="radio" required name="status" value="1"> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span> Show
                                </label> 
                                <label class="mr-3">
                                    <input type="radio" required name="status" value="0"> 
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


<div class="row">
    <div class="col-lg-12"> 
        <div class="card mb-3">
            <form class="validate1" action="brand/save" method="post" enctype="multipart/form-data" >
                <div class="card-header uppercase">
                    <div class="caption"><i class="ti-plus"></i> Add New Brand</div>
                    <div class="tools">
                        <a href="brand" class="btn btn-warning">
                            <i class="ti-share"></i>
                        </a> 
                    </div>
                </div> 
                
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Brand Name</label>
                            <div class="input-group col">
                                <input class="form-control" id="brandname" name="brand_name"placeholder="i.e iPhone" required>
                            </div>
                            <span id="brandname_result"></span>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="eventRegInput2">Brand Image</label>
                            <div class="col-md-9">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div>
                                        <input type="file" name="brand_img"onchange="readURL(this);" required>&nbsp;&nbsp;&nbsp;
                                        <img id="brand_img" >
                                    </div>
                                </div> 
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


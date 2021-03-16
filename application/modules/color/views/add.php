<div class="row">
    <div class="col-lg-12"> 
        <div class="card mb-3">
            <form class="validate1" action="color/save" method="post" enctype="multipart/form-data" >
                <div class="card-header uppercase">
                    <div class="caption"><i class="ti-plus"></i> Add New Color</div>
                    <div class="tools">
                        <a href="color" class="btn btn-warning">
                            <i class="ti-share"></i>
                        </a> 
                    </div>
                </div>
                
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Color Title</label>
                            <div class="input-group col">
                                <input class="form-control" id="colorname" name="color_title"placeholder="i.e Black">
                            </div>
                            <span id="colorname_result"></span>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Color Code</label>
                            <div class="input-group col">
                                <input class="form-control" id="colorcode" name="color_code"placeholder="i.e #000000">
                            </div>
                            <span id="colorcode_result"></span>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="form-radio col-md-9" >
                                <label class="mr-3">
                                    <input type="radio" name="status" value="1"> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span> Active
                                </label> 
                                <label class="mr-3">
                                    <input type="radio" name="status" value="0"> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span> In-active
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


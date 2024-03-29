<div class="row">
    <div class="col-lg-12"> 
        <div class="card mb-3">
            <form class="validate1" action="unit/save" method="post" enctype="multipart/form-data" >
                <div class="card-header uppercase">
                    <div class="caption"><i class="ti-plus"></i> Add New Unit</div>
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
                                <input class="form-control" id="unitname" name="unit_name"placeholder="i.e Litter" required>
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


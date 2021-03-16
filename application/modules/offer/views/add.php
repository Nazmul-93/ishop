<div class="row">
    <div class="col-lg-12"> 
        <div class="card mb-3">
            <form class="validate1" action="offer/save" method="post" enctype="multipart/form-data" >
                <div class="card-header uppercase">
                    <div class="caption"><i class="ti-plus"></i> Add New Offer</div>
                    <div class="tools">
                        <a href="offer" class="btn btn-warning">
                            <i class="ti-share"></i>
                        </a>  
                    </div>
                </div>
                 
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Offer Name</label>
                            <div class="input-group col">
                                <input class="form-control" name="offer_name"placeholder="i.e Festival Offer">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Offer Type</label>
                            <div class="form-radio col-md-9" >
                                <label class="mr-3">
                                    <input type="radio" name="offer_type" value="fixed"> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span> Fixed
                                </label> 
                                <label class="mr-3">
                                    <input type="radio" name="offer_type" value="percent"> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span> Percent
                                </label> 
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Offer Amount</label>
                            <div class="input-group col">
                                <input class="form-control" name="offer_amount"placeholder="i.e 100Tk or 5%">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Offer Start Date</label>
                            <div class="input-group col">
                                <input type="date" class="form-control"name="offer_start_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Offer End Date</label>
                            <div class="input-group col">
                                <input type="date" class="form-control" name="offer_end_date">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="form-radio col-md-9" >
                                <label class="mr-3">
                                    <input type="radio" name="status" value="1"> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span>Offer Active
                                </label> 
                                <label class="mr-3">
                                    <input type="radio" name="status" value="0"> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span>Offer In-active
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


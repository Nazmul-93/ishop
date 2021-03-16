<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3">
            <form class="validate1" action="coupon/update/<?= $data['coupon_id']; ?>" method="post" enctype="multipart/form-data" novalidate>
                <div class="card-header uppercase">
                    <div class="caption"><i class="ti-pencil-alt"></i> Edit Coupon</div>
                    <div class="tools">
                        <a href="coupon" class="btn btn-warning">
                            <i class="ti-share"></i>
                        </a> 
                    </div> 
                </div>  
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Coupon Code</label>
                            <div class="input-group col">
                                <input class="form-control" id="couponcode" name="coupon_code"value="<?=$data['coupon_code']; ?>">
                            </div>
                            <span id="couponcode_result"></span>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Coupon Type</label>
                            <div class="form-radio col-md-9" >
                                <label class="mr-3">
                                    <input type="radio" name="discount_type" value="fixed" <?php if($data['discount_type']=="fixed") echo 'checked';?>> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span> Fixed
                                </label> 
                                <label class="mr-3">
                                    <input type="radio" name="discount_type" value="percent" <?php if($data['discount_type']=="percent") echo 'checked';?>> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span> Percent
                                </label> 
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Discount Amount</label>
                            <div class="input-group col">
                                <input class="form-control" name="discount"value="<?=$data['discount']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Coupon Start Date</label>
                            <div class="input-group col">
                                <input type="date" class="form-control" name="start_date" value="<?=$data['start_date']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Coupon End Date</label>
                            <div class="input-group col">
                                <input type="date" class="form-control" name="end_date" value="<?=$data['end_date']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Only For DayName (optional)</label>
                            <div class="input-group col">
                                <input class="form-control" name="day" value="<?=$data['day']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Min Purchase Requirement (optional)</label>
                            <div class="input-group col">
                                <input class="form-control" name="min_purchase" value="<?=$data['min_purchase']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="form-radio col-md-9" >
                                <label class="mr-3">
                                    <input type="radio" name="status" value="1" <?php if($data['status']==1) echo 'checked';?>> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span>Active
                                </label> 
                                <label class="mr-3">
                                    <input type="radio" name="status" value="0" <?php if($data['status']==0) echo 'checked';?>> 
                                    <span class="radiomark">
                                        <i class="fa fa-circle"></i>
                                    </span>In-active
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

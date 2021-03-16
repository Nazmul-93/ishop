<div class="row">
    <div class="col">
        <div class="card mb-3">
            <div class="card-header">
                <div class="caption uppercase">
                    <i class="ti-view-list"></i> Offer List
                </div>
                <div class="tools">
                    <a href="offer/add" class="btn btn-sm btn-primary">
                        <i class="ti-plus"></i> Add New Offer
                    </a>
                </div> 
            </div>   
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dt-addrows">
                        <thead class="thead-light">
                            <tr>
                                <th>SL NO</th>
                                <th>Offer Name</th>
                                <th>Offer Type</th>
                                <th>Offer Amount</th>
                                <th>Offer Start Date</th>
                                <th>Offer End Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $key => $row) { ?>
                            <tr>
                                <td><?=($key+1);?></td>
                                <td><?=$row['offer_name'];?></td>
                                <td>
                                    <?php 
                                    if($row['offer_type']=="fixed")
                                        echo "Fixed";
                                    else
                                        echo "Percent";
                                    ?>
                                </td> 
                                <td>
                                    <?php 
                                    if($row['offer_type']=="fixed")
                                        echo $row['offer_amount']. " TK";
                                    else
                                        echo $row['offer_amount']. " %";
                                    ?>
                                </td>
                                <td><?=$row['offer_start_date'];?></td>
                                <td><?=$row['offer_end_date'];?></td>
                                
                                <td>
                                <?=$row['status'] ? "<span class='badge badge-success'>Active</span>" :  "<span class='badge badge-warning'>Inactive</span>";?>
                                </td>
                                 
                                <td> 
                                    <?php
                                        $data['model']  = "offer";
                                        $data['id']  = $row['offer_id'];
                                        $this->load->view('backend/common/action_buttons', $data);
                                    ?>
                                </td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


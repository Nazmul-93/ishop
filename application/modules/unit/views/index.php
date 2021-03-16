<div class="row">
    <div class="col">
        <div class="card mb-3">
            <div class="card-header">
                <div class="caption uppercase">
                    <i class="ti-view-list"></i> Unit List
                </div>
                <div class="tools">
                    <a href="unit/add" class="btn btn-sm btn-primary">
                        <i class="ti-plus"></i> Add New Unit
                    </a> 
                </div>
            </div>  
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dt-addrows">
                        <thead class="thead-light">
                            <tr>
                                <th>SL NO</th>
                                <th>Unit Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $key => $row) { ?>
                            <tr>
                                <td><?=($key+1);?></td>
                                <td><?=$row['unit_name'];?></td>
                                <td> 
                                    <?php
                                        $data['model']  = "unit";
                                        $data['id']  = $row['unit_id'];
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


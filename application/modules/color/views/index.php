<div class="row">
    <div class="col">
        <div class="card mb-3">
            <div class="card-header">
                <div class="caption uppercase">
                    <i class="ti-view-list"></i> Color List
                </div>
                <div class="tools">
                    <a href="color/add" class="btn btn-sm btn-primary">
                        <i class="ti-plus"></i> Add New Color
                    </a>
                </div>
            </div>  
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dt-addrows">
                        <thead class="thead-light">
                            <tr>
                                <th>SL NO</th>
                                <th>Color Title</th>
                                <th>Color Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $key => $row) { ?>
                            <tr>
                                <td><?=($key+1);?></td>
                                <td><?=$row['color_title'];?></td>
                                <td><?=$row['color_code'];?></td>
                                
                                <td>
                                <?=$row['status'] ? "<span class='badge badge-success'>Active</span>" :  "<span class='badge badge-warning'>Inactive</span>";?>
                                </td>
                                 
                                <td> 
                                    <?php
                                        $data['model']  = "color";
                                        $data['id']  = $row['color_id'];
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


<div class="row">
    <div class="col">
        <div class="card mb-3">
            <div class="card-header">
                <div class="caption uppercase">
                    <i class="ti-view-list"></i> Product List
                </div>
                <div class="tools">
                    <a href="product/add" class="btn btn-sm btn-primary">
                        <i class="ti-plus"></i> Add New Product
                    </a>
                </div>
            </div> 
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dt-addrows">
                        <thead class="thead-light">
                            <tr>
                                <th>SL NO</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead> 
                        <tbody>
                        <?php foreach ($data as $key=> $row) { ?>
                            <tr>
                                <td><?=($key+1);?></td>
                                <td><?=$row['product_name'];?></td>
                                <td><img src="uploads/product/<?=$row['product_img'];?>" style="width:100px!important;height:65px!important;" alt="image"></td>
                                
                                <td><?php if($row['status']==1){ echo"Show";}else echo"Hide"; ?></td>
                                
                                <td> 
                                    <?php
                                        $data['model']  = "product";
                                        $data['id']  = $row['product_id'];
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


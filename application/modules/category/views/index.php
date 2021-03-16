<div class="row">
    <div class="col">
        <div class="card mb-3">
            <div class="card-header">
                <div class="caption uppercase">
                    <i class="ti-view-list"></i> Category List
                </div>
                <div class="tools">
                    <a href="category/add" class="btn btn-sm btn-primary">
                        <i class="ti-plus"></i> Add New Category
                    </a>
                </div>
            </div> 
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dt-addrows">
                        <thead class="thead-light">
                            <tr>
                                <th>SL NO</th>
                                <th>Category Name</th>
                                <th>Parent Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($all_category as $key => $row) { ?>
                            <tr>
                                <td><?=($key+1);?></td>
                                <td><?=$row['category_name'];?></td>
                                <td>
                                    
                                <?php 
                                    foreach ($parent_category as  $crow){ 
                                      if ($crow['category_id']==$row['parent_id']){
                                        echo $crow['category_name'];
                                      }
                                    }
                                ?>
                                </td>
                                
                                <td><?php if($row['status']==1){ echo"Show";}else echo"Hide"; ?></td>
                                
                                <td> 
                                    <?php
                                        $data['model']  = "category";
                                        $data['id']  = $row['category_id'];
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


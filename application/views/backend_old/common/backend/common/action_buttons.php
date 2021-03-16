
<?php
$url = base_url().$model."/";
?>
<a href="<?=$url.'edit/'.$id;?>" >
        <button class="btn btn-round mb-1 btn-primary">
            <i class="ti-pencil-alt"></i> Edit
        </button> 
</a>  
<a href="javascript:void()" data-target="<?=$url.'delete/'.$id;?>" class="remove">
    <button class="btn btn-round mb-1 btn-danger" ><i class="ti-trash"></i> Delete</button>
</a> 
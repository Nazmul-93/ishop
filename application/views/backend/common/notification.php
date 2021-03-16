<?php if(!empty($this->session->flashdata('type'))) { ?>
<div class="alert alert-<?php echo $this->session->flashdata('type'); ?> alert-dismissible col-md-4" role="alert" >
    <button type="button" class="close" data-dismiss="alert">×</button>
    <div class="alert-icon">
        <i class="icon-check"></i> 
    </div>
    <div class="alert-message">
        <?php echo $this->session->flashdata('msg'); ?>
    </div>
</div>
<?php } ?>
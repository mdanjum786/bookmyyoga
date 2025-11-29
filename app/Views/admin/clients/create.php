<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
	<div style="float: right;">
		<a href="<?php echo base_url('admin/client');?>" class="btn btn-info">View Client</a>
	</div>
    <h3>Add Client</h3>
    <hr>
    <?php if (session()->getFlashdata('msg') !== NULL) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>
    <form class="form" id="add-gallery-form" enctype="multipart/form-data" method="post" action="<?= base_url('admin/client/uploadFiles');?>">
    	<div class="form-group">
	    	<div class="form-row">
	    		<div class="col">
	    			<label>Upload Image</label>
	    			<input type="file" name="images[]" class="form-control" multiple required>
	    		</div>
	    	</div>
    	</div>
    	<div class="form-group">
	    	<div class="form-row">
	    		<div class="col">
	    			<label>Status</label>
	    			<select class="form-control" name="status" required>
	    				<option value="">Select Status</option>
	    				<option value="1">Active</option>
	    				<option value="0">In Active</option>
	    			</select>
	    		</div>
	    	</div>
    	</div>
    	<div class="form-group">
    		<div class="form-row">
    			<div class="col">
    				<input type="submit" name="submit" value="Submit" class="btn btn-info">
    			</div>
    		</div>
    	</div>
    	
    </form>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
	<script type="text/javascript">
		$(function(){
			
		});
	</script>
<?=  $this->endSection() ?>
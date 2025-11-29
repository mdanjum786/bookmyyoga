<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
	<div style="float: right;">
		<a href="<?php echo base_url('admin/slider');?>" class="btn btn-info">View Slider</a>
	</div>
    <h3>Edit Slider</h3>
    <hr>
    <?php if (session()->getFlashdata('msg') !== NULL) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>
    <form class="form" id="add-gallery-form" enctype="multipart/form-data" method="post" action="<?= base_url('admin/slider/updateSlider');?>">
    	<div class="form-group">
	    	<div class="form-row">
	    		<div class="col">
	    			<label>Upload Image</label>
	    			<input type="file" name="images" class="form-control" accept="image/*" >
	    		</div>
	    	</div>
    	</div>
    	<div class="form-group">
	    	<div class="form-row">
	    		<div class="col">
	    			<label>Heading</label>
	    			<input type="text" name="heading" class="form-control" value="<?= $slider['heading']?>"  >
	    		</div>
	    	</div>
    	</div>
    	<div class="form-group">
	    	<div class="form-row">
	    		<div class="col">
	    			<label>Sub Heading</label>
	    			<input type="text" name="subheading" class="form-control"  value="<?= $slider['subheading']?>" >
	    		</div>
	    	</div>
    	</div>
    	 <div class="form-group">
	    	<div class="form-row">
	    		<div class="col">
	    			<label>Slider button Text</label>
	    			<input type="text" name="slider_btn_text" class="form-control" value="<?= $slider['slider_btn_text']?>"  >
	    		</div>
	    	</div>
    	</div>
    	 <div class="form-group">
	    	<div class="form-row">
	    		<div class="col">
	    			<label>Slider button Link</label>
	    			<input type="text" name="slider_btn_link" class="form-control" value="<?= $slider['slider_btn_link']?>"  >
	    		</div>
	    	</div>
    	</div>
    	<div class="form-group">
	    	<div class="form-row">
	    		<div class="col">
	    			<label>Status</label>
	    			<select class="form-control" name="status" required>
	    				<option value="">Select Status</option>
	    				<option value="1" <?= $slider['status'] == 1 ? 'selected' : '' ?>>Active</option>
	    				<option value="0" <?= $slider['status'] == 0 ? 'selected' : '' ?>>In Active</option>
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
    	<div class="form-group">
    		<div class="form-row">
    			<div class="col">
    				<img src="<?= base_url('assets/sliders/') . $slider['image']; ?>" width="200">
    			</div>
    		</div>
    	</div>
    	<input type="hidden" name="id" value="<?= $slider['id']; ?>">
    	<input type="hidden" name="images2" value="<?= $slider['image']; ?>">
    </form>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
	<script type="text/javascript">
		$(function(){
			
		});
	</script>
<?=  $this->endSection() ?>
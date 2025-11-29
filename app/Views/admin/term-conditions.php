<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
	
    <h3>Term And Conditions</h3>
    <hr>
    <?php if (session()->getFlashdata('msg') !== NULL) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('msg'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>
    <form class="form" id="term-condition-form" enctype="multipart/form-data" method="post" action="<?= base_url('admin/uploadFiles');?>">
    	<div class="form-group">
	    	<div class="form-row">
	    		<div class="col">
	    			<label>Term And Conditions</label>
	    			<textarea name="term_condition" rows="5" class="form-control" id="term_condition">
	    				<?= $term_condition[0]['term_condition'] ?? '' ?>
	    			</textarea>
	    		</div>
	    	</div>
    	</div>
    	<div class="form-group">
	    	<div class="form-row">
	    		<div class="col">
	    			<label>Status</label>
	    			<select class="form-control" name="status" required>
	    				<option value="">Select Status</option>
	    				<option value="1"  <?= $term_condition[0]['status'] == 1 ? 'selected' : '' ?>>Active</option>
	    				<option value="0"  <?= $term_condition[0]['status'] == 0 ? 'selected' : '' ?>>In Active</option>
	    			</select>
	    		</div>
	    	</div>
    	</div>
    	<div class="form-group">
    		<input type="hidden" name="id" value="<?= $term_condition[0]['id'] ?>">
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
			$('#term_condition').summernote({
				height:300
			});

			$(document).on('submit', '#term-condition-form', function(e){
				e.preventDefault();
				let _this = $(this);
				$.ajax({
					type : 'POST',
					url : "<?= base_url('admin/update_term_condition')?>",
					data:_this.serialize(),
					beforeSend:function(){
						_this.find('[type="submit"]').prop('disabled', true);
						_this.find('[type="submit"]').val('Please Wait...');
					},
					dataType:'json',
					success:function(res){
						alert(res.msg);
					},
					complete:function(){
						_this.find('[type="submit"]').prop('disabled', false);
						_this.find('[type="submit"]').val('Submit');
					}

				})
			});
		});
	</script>
<?=  $this->endSection() ?>
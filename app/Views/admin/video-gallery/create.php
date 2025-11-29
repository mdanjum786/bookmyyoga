<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<style type="text/css">
	.inactive{
		color: gray;
	}
	.error-msg{
		color: red;
	}

</style>

<div class="">
	<div class=""  style="float: right;">
		<a href="<?= base_url('admin/video-gallery');?>" class="btn btn-info ">Video Gallery List</a>	
	</div>
	<h3>Add Video Gallery</h3>
	<hr>
	<form class="form" method="" id="add-video-gallery">
		<div class="form-group">
			<div class="form-row">
				<div class="col-12">
					<label>Type</label>
					<select class="form-control select-type" name="type" required="">
						<option value="">Select Type</option>
						<option value="link">Link</option>
						<option value="Video">Video</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group" style="display: none">
			<div class="form-row">
				<div class="col-12">
					<label>Video Link</label>
					<input type="text" name="slug" class="form-control" placeholder="video link" required="" />
				</div>
			</div>
		</div>
		<div class="form-group" style="display: none">
			<div class="form-row">
				<div class="col-12">
					<label>select Video </label>
					<input type="file" name="video_slug" class="form-control" placeholder="video " required="" />
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col-12">
					<label>Satus</label>
					<select class="form-control" name="status" required="">
						<option value="">Select status</option>
						<option value="1">Active</option>
						<option value="0">In Active</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col-12">
					<input type="submit" name="submit" value="Submit" class="btn btn-primary">
				</div>
			</div>
		</div>
	</form>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts')?>
<script type="text/javascript">
	$(function(){
		$(document).on('change', '.select-type', function(e){
			let type = $(this).val();
			if(type == 'link'){
				$('[name="slug"]').closest('.form-group').show();
				$('[name="video_slug"]').closest('.form-group').hide();
				$('[name="slug"]').prop('disabled', false);
				$('[name="video_slug"]').prop('disabled', true);
			}else{
				$('[name="slug"]').closest('.form-group').hide();
				$('[name="video_slug"]').closest('.form-group').show();
				$('[name="slug"]').prop('disabled', true);
				$('[name="video_slug"]').prop('disabled', false);
			}
		});
		$('#add-video-gallery').submit(function(e){
			e.preventDefault();
			console.log('testtttttttttttt');
			let _this = $(this);
			const formData = new FormData(this);
			
			$.ajax({
				type:"POST",
				url:"<?= base_url('admin/video-gallery/add'); ?>",
				data:formData,
				dataType:'json',
				 contentType: false,
                processData: false,
				beforeSend:function(){
					_this.find('[type="submit"]').prop('disabled', true);
					_this.find('[type="submit"]').val('Please Wait...');
				},
				success:function(res){
					console.log('res ', res);
					alert(res.msg);
					if(res.status){
						
						$('#add-video-gallery')[0].reset();
					}
				},
				complete:function(){
					_this.find('[type="submit"]').prop('disabled', false);
					_this.find('[type="submit"]').val('Submit');
				}
			});
		});
	});
</script>
<?= $this->endSection() ?>
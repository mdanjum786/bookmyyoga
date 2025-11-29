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
		<a href="<?= base_url('admin/video-gallery/create');?>" class="btn btn-info add-team-btn-modal">Add Video Gallery</a>	
	</div>
	<h3>Video Gallery List</h3>
	<hr>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Video</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			<tbody>
				<?php
					if(count($video_gallery)){
						$i = 1;
						foreach($video_gallery as $gal){


				?>
				<tr>
					<td><?= $i++; ?></td>
					<td>
						
						<?php if($gal['type'] == 'link') { ?>
						<iframe width="200" height="150" src="<?= $gal['slug'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
					<?php } else{?>
						  <video width="200" height="100%" controls>
                                            <source src="<?= base_url('/');?>assets/gallery/<?= $gal['slug'] ?>" type="video/mp4">
                                            <source src="<?= base_url('/');?>assets/gallery/<?= $gal['slug'] ?>" type="video/ogg">
                                            Your browser does not support the video tag.
                                          </video>
					<?php } ?>
					</td>
					<td><?= $gal['status'] == 1 ? 'Active' : 'In Active ' ?></td>
					<td>
						<a href="javascript:void(0);" data-id="<?= $gal['id']?>" class="edit"><i class="fas fa-edit"></i></a>
						<br>
						<a href="javascript:void(0);" data-id="<?= $gal['id']?>" class="delete"><i class="fa fa-trash" aria-hidden="true"></i>
</a>
					</td>
				</tr>
				<?php
						}
					}
				?>
			</tbody>
		</thead>
	</table>
</div>

<!-- The Modal -->
<div class="modal" id="update-video-gallery-modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Video Gallery</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        	<form class="form" method="" id="update-video-gallery">
		<div class="form-group">
			<div class="form-row">
				<div class="col-12">
					<label>Video Link</label>
					<input type="text" name="slug" class="form-control" placeholder="video link" required="" />
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
		<input type="hidden" name="id">
		<div class="form-group">
			<div class="form-row">
				<div class="col-12">
					<input type="submit" name="submit" value="Submit" class="btn btn-primary">
				</div>
			</div>
		</div>
	</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts')?>
<script type="text/javascript">
	$(function(){
		$(document).on('click', '.edit', function(e){
			e.preventDefault();
			let id = $(this).data('id');
			console.log('id ', id);
			$.ajax({
				'type' : 'POST',
				'url' : "<?= base_url('admin/video-gallery/get');?>",
				data:{id:id},
				dataType : 'json',
				success:function(res){
					console.log('res ', res);
					res.video_gallery[0]['id']
					$('#update-video-gallery').find('[name="slug"]').val(res.video_gallery[0]['slug']);
					$('#update-video-gallery').find('[name="status"]').val(res.video_gallery[0]['status']);
					$('#update-video-gallery').find('[name="id"]').val(res.video_gallery[0]['id']);
					$('#update-video-gallery-modal').modal('show');
				}
			});	
		});
		$('#update-video-gallery').submit(function(e){
			e.preventDefault();
			let _this = $(this);
			$.ajax({
				type:"POST",
				url:"<?= base_url('admin/video-gallery/update'); ?>",
				data: _this.serialize(),
				dataType:'json',
				beforeSend:function(){
					_this.find('[type="submit"]').prop('disabled', true);
					_this.find('[type="submit"]').val('Please Wait...');
				},
				success:function(res){
					console.log('res ', res);
					alert(res.msg);
					if(res.status){
						window.location.reload();
						//$('#add-video-gallery')[0].reset();
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
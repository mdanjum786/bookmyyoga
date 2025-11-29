<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<div style="float: right;">
		<a href="<?php echo base_url('admin/add-gallery');?>" class="btn btn-info">Add Gallery</a>
	</div>
<h3>Gallry List</h3>
<hr>
	<table class="table table-striped" id="gallery-list">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Image</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(count($gallery_images)){
					$i = 1;
					foreach($gallery_images as $image){
						$status = $image['status'] == 1 ? 'Active' : 'In Active';

			?>
			<tr>
				<td><?= $i++; ?></td>
				<td><img src="<?= base_url('assets/gallery/') . $image['image'];?>" width="200"></td>
				<td><?= $status; ?></td>
				<td>
					<a href="javascript:void(0)" class="edit" data-id="<?= $image['id']?>"  data-status="<?= $image['status']; ?>"><i class="fas fa-edit"></i></a>
					<br />
					<a href="javascript:void(0)" style="color:red"><i class='fas fa-trash-alt'></i></a>
				</td>
			</tr>
			<?php
					}
				}
			?>
		</tbody>
	</table>

	<!-- The Modal -->
<div class="modal" id="status-change-modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Gallery Image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       	<form class="form" id="gallery-status-form" >
       		<div class="form-group">
       			<div class="form-row">
       				<div class="col">
       					<label>Status</label>
       					<select name="status" class="form-control"  id="image-status">
       						<option value="1">Active</option>
       						<option value="0">In Active</option>
       					</select>
       				</div>
       			</div>
       		</div>
       		<div class="form-group">
       			<div class="form-row">
       				<div class="col">
       					<input type="submit" class="btn btn-info btn-submit " name="submit"  value="Submit">
       				</div>
       			</div>
       		</div>
       		<input type="hidden" name="id" id="image-id" value="0">
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
<?= $this->section('scripts') ?>
	<script type="text/javascript">
		$(function(){
			//$('#status-change-modal').modal('show');
			$('#gallery-list').DataTable();
			$(document).on('click', '.edit', function(e){
				e.preventDefault();
				let id = $(this).data('id');
				let status = $(this).data('status');
				console.log('id ', id);
				console.log('status ', status);
				$('#image-status').val(status);
				$('#image-id').val(id);
				$('#status-change-modal').modal('show');

			});

			$(document).on('submit', '#gallery-status-form', function(e){
				e.preventDefault();
				let _this = $(this);
				$.ajax({
					type: 'POST',
					url : "<?= base_url('admin/editGallery')?>",
					data: _this.serialize(),
					dataType: 'json',
					beforeSend:function(){
						$('.btn-submit').prop('disabled', true);
						$('.btn-submit').text('Please Wait...');
					},
					success: function(res){
						console.log('res ', res);
						alertify.alert(res.msg);
						//alert()
					},
					complete:function(){
						$('.btn-submit').prop('disabled', false);
						$('.btn-submit').text('Submit');
					}

				});
			});
		});
	</script>
<?=  $this->endSection() ?>
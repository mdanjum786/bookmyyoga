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
	
	<h3>Trainer & Studio List</h3>
	<hr>
</div>
<div class="table-container table-responsive">
	<table class="table table-striped" id="trainer-table">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Business Name</th>
				<th>Email</th>
				<th>Banner Image</th>
				<th>Business Mobile No</th>
				<th>Address</th>
				<th>Username</th>
				<th>Userid</th>
				<th>useremail</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(count($trainers_and_studio)){
					$i = 1;
					foreach($trainers_and_studio as $trainer){


			?>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $trainer['business_name']?></td>
				<td><?= $trainer['email']?></td>
				<td> <img src="<?= base_url('assets/images/trainer-studio/') .$trainer['banner_image'] ?> " width="100"></td>
				<td><?= $trainer['mobile_no']?></td>
				<td><?= $trainer['address']?></td>
				<td><?= $trainer['user_name']?></td>
				<td><?= $trainer['username']?></td>
				<td><?= $trainer['user_email']?></td>
				
				<td><?= $trainer['status'] == 1 ? 'Active' : "In Active " ?></td>
				<td>
					<a href="javascript:void(0);" class="edit" data-id="<?= $trainer['id'] ?>"><i class="fas fa-edit"></i></a>
				<br>
					<a href="javascript:void(0)" class="change-status <?= $trainer['status'] == 1 ? "" : " inactive" ?>" data-id="<?= $trainer['id'] ?>" data-status="<?=$trainer['status']?>"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>
				<br>
				<a href="javascript:void(0);" class="delete" data-id="<?= $trainer['id'] ?>" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i></a>
				</td>
			</tr>
			<?php
					}
				}
			?>
		</tbody>
	</table>
</div>
	



<!-- change-event-status-modal -->
<div class="modal" id="change-event-status-modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        	<form class="form" id="change-status-form">
        		<div class="form-group">
        			<div class="form-row">
        				<div class="col-12">
        					<div class="status-response"></div>
        				</div>
        			</div>
        		</div>
        		<div class="form-group">
        			<div class="form-row">
        				<div class="col">
        					<label>Status</label>
        					<select class="form-control" name="status">
        						<option value="1">Active</option>
        						<option value="0">In Active</option>
        					</select>
        				</div>
        			</div>
        		</div>
        		<div class="form-group">
        			<div class="form-row">
        				<div class="col">
        					<input type="submit" name="submit"  value="Submit" class="btn btn-info status-submit-btn">
        				</div>
        			</div>
        		</div>
        		<input type="hidden" name="status_id" value="0">
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
<?= $this->section('scripts'); ?>
<script type="text/javascript">
	$(function(){
		
	$('#trainer-table').DataTable({
    scrollX: true,
    scrollY: 300
});

		//chnage status
		$(document).on('click',  '.change-status', function(e){
			e.preventDefault();
			let id = $(this).data('id');
			let status = $(this).data('status');
			$('#change-status-form').find('[name="status"]').val(status);
			$('[name="status_id"]').val(id);
			$('#change-event-status-modal').modal('show');
		});
		$(document).on('submit', '#change-status-form', function(e){
			e.preventDefault();
			let _this = $(this);
			$.ajax({
				type:'POST',
				url:"<?= base_url('admin/trainers-and-studio/change-status')?>",
				data: _this.serialize(),
				dataType:'json',
				beforeSend:function(){
					$('.status-submit-btn').prop('disabled', true);
					$('.status-submit-btn').val('Please Wait...');
				},
				success:function(res){
					console.log('res ', res);
					if(res.status){
						$('.status-response').html(`<span class="alert alert-success">${res.msg}</span>`);
						$('#change-status-form').find('[name="status"]').val(res.event_status);
					}else{
						$('.status-response').html(`<span class="alert alert-danger">${res.msg}</span>`);
					}
					setTimeout(function(){
						$('.status-response').html(``);
					},3000);

				},
				complete:function(){
					$('.status-submit-btn').prop('disabled', false);
					$('.status-submit-btn').val('Submit');
				}
			})

		});

	});
</script>
<?= $this->endSection(); ?>
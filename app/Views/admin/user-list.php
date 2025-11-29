<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>

<h3>User List</h3>
<hr>
	<table class="table table-striped" id="gallery-list">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Name</th>
				<th>Contact No</th>
				<th>Email</th>
				<th>username</th>
				<th>user type</th>
			<!-- 	<th>Profile Image</th> -->
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(count($users)){
					$i = 1;
					foreach($users as $user){
						$status = $user['status'] == 1 ? 'Active' : 'In Active';
						$user_type = '';
						switch ($user['role']) {
							case 1:
							$user_type = 'Admin';
								# code...
								break;
								case 2:
								$user_type = 'site  user';
								# code...
								break;
								case 3:
								$user_type = 'yoga-studio';
								# code...
								break;
								case 4:
								$user_type = 'yoga instructor';
								# code...
								break;
								case 5:
								$user_type = 'yoga-institute';
								# code...
								break;
							
							default:
								# code...
								break;
						}

			?>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $user['name'] ?></td>
				<td><?= $user['phone_no'] ?? '' ?></td>
				<td><?= $user['email'] ?></td>
				<td><?= $user['username']; ?></td>
				<td><?= $user_type; ?></td>
			<!-- 	<td><img src="<?= base_url('assets/gallery/') . $user['profile_image'];?>" width="200"></td> -->
				<td><?= $status; ?></td>
				<td>
					<a href="javascript:void(0)" class="edit" data-id="<?= $user['id']?>"  data-status="<?= $user['status']; ?>"><i class="fas fa-edit"></i></a>
					<br />
					<a href="javascript:void(0)" style="color:red"><i class='fas fa-trash-alt'></i></a>
					<br />
					<form action="<?= base_url('admin/loginWithOther')?>" method="POST">
						<input type="hidden" name="email" value="<?= $user['email']?>">
						<input type="hidden" name="login_back_email" value="<?= session()->get('email')?>">
						<input type="submit" value="Login" class="btn btn-info">
					</form>
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
        <h4 class="modal-title">User Status</h4>
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
					url : "<?= base_url('admin/update_user_status')?>",
					data: _this.serialize(),
					dataType: 'json',
					beforeSend:function(){
						$('.btn-submit').prop('disabled', true);
						$('.btn-submit').text('Please Wait...');
					},
					success: function(res){
						console.log('res ', res);
						alert(res.msg);
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
<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<style type="text/css">
	.inactive{
		color: gray;
	}
	.error-msg{
		color: red;
	}
	.trainer-image {
		max-width: 100px;
		max-height: 60px;
		object-fit: cover;
		border-radius: 5px;
	}
	.status-badge {
		font-size: 0.85rem;
		padding: 5px 10px;
	}
	.action-buttons {
		white-space: nowrap;
	}
	.action-buttons a {
		margin-right: 5px;
	}
</style>

<div class="row">
	<div class="col-12">
		<h3>Trainer & Studio List</h3>
		<hr>
	</div>
</div>

<!-- Search and Filter Section -->
<div class="row mb-3">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><i class="fas fa-filter"></i> Search & Filter</h3>
			</div>
			<div class="card-body">
				<form method="GET" action="<?= base_url('admin/trainers-and-studio') ?>" id="filter-form">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="status">Filter by Status:</label>
								<select name="status" id="status" class="form-control form-control-sm">
									<option value="">All Status</option>
									<option value="1" <?= $status_filter == '1' ? 'selected' : '' ?>>Active</option>
									<option value="0" <?= $status_filter == '0' ? 'selected' : '' ?>>Inactive</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="search">Search:</label>
								<input type="text" name="search" id="search" class="form-control form-control-sm" 
									   placeholder="Search by business name, email, mobile, address, user name..." 
									   value="<?= htmlspecialchars($search_filter ?? '', ENT_QUOTES, 'UTF-8') ?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>&nbsp;</label>
								<div>
									<button type="submit" class="btn btn-primary btn-sm btn-block">
										<i class="fas fa-search"></i> Search
									</button>
									<a href="<?= base_url('admin/trainers-and-studio') ?>" class="btn btn-secondary btn-sm btn-block">
										<i class="fas fa-redo"></i> Reset
									</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row mb-3">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<div class="info-box">
							<span class="info-box-icon bg-info"><i class="fas fa-building"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Total Trainers</span>
								<span class="info-box-number">
									<?= isset($filtered_total) && ($status_filter !== '' || $search_filter) ? $filtered_total : $total_trainers ?>
									<?php if(isset($filtered_total) && ($status_filter !== '' || $search_filter) && $filtered_total != $total_trainers): ?>
										<small class="text-muted">(<?= $total_trainers ?> total)</small>
									<?php endif; ?>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info-box">
							<span class="info-box-icon bg-success"><i class="fas fa-check-circle"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Active</span>
								<span class="info-box-number">
									<?= isset($filtered_active) && ($status_filter !== '' || $search_filter) ? $filtered_active : $active_trainers ?>
									<?php if(isset($filtered_active) && ($status_filter !== '' || $search_filter) && $filtered_active != $active_trainers): ?>
										<small class="text-muted">(<?= $active_trainers ?> total)</small>
									<?php endif; ?>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info-box">
							<span class="info-box-icon bg-danger"><i class="fas fa-times-circle"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Inactive</span>
								<span class="info-box-number">
									<?= isset($filtered_inactive) && ($status_filter !== '' || $search_filter) ? $filtered_inactive : $inactive_trainers ?>
									<?php if(isset($filtered_inactive) && ($status_filter !== '' || $search_filter) && $filtered_inactive != $inactive_trainers): ?>
										<small class="text-muted">(<?= $inactive_trainers ?> total)</small>
									<?php endif; ?>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info-box">
							<span class="info-box-icon bg-warning"><i class="fas fa-user"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Total Users</span>
								<span class="info-box-number"><?= count(array_unique(array_column($trainers_and_studio, 'user_id'))) ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="table-container table-responsive">
			<table class="table table-striped table-bordered table-hover" id="trainer-table">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Business Name</th>
						<th>Banner Image</th>
						<th>Logo</th>
						<th>Email</th>
						<th>Mobile No</th>
						<th>Address</th>
						<th>User Info</th>
						<th>About Us</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(count($trainers_and_studio)){
							$i = 1;
							foreach($trainers_and_studio as $trainer):
					?>
					<tr>
						<td><?= $i++; ?></td>
						<td>
							<strong><?= $trainer['business_name'] ?? 'N/A' ?></strong>
							<?php if(isset($trainer['slug'])): ?>
								<br><small class="text-muted">Slug: <?= $trainer['slug'] ?></small>
							<?php endif; ?>
						</td>
						<td>
							<?php if(!empty($trainer['banner_image'])): ?>
								<img src="<?= base_url('assets/images/trainer-studio/') . $trainer['banner_image'] ?>" 
									 alt="Banner" 
									 class="trainer-image"
									 onerror="this.src='<?= base_url('assets/images/placeholder.jpg') ?>'">
							<?php else: ?>
								<span class="text-muted">No Image</span>
							<?php endif; ?>
						</td>
						<td>
							<?php if(!empty($trainer['logo'])): ?>
								<img src="<?= base_url('assets/images/trainer-studio/') . $trainer['logo'] ?>" 
									 alt="Logo" 
									 class="trainer-image"
									 onerror="this.src='<?= base_url('assets/images/placeholder.jpg') ?>'">
							<?php else: ?>
								<span class="text-muted">No Logo</span>
							<?php endif; ?>
						</td>
						<td>
							<?= $trainer['email'] ?? 'N/A' ?>
						</td>
						<td>
							<?= $trainer['mobile_no'] ?? 'N/A' ?>
						</td>
						<td>
							<?php 
								$address = $trainer['address'] ?? '';
								echo strlen($address) > 50 ? substr($address, 0, 50) . '...' : $address;
								if(empty($address)) echo 'N/A';
							?>
						</td>
						<td>
							<strong>Name:</strong> <?= $trainer['user_name'] ?? 'N/A' ?><br>
							<strong>Username:</strong> <?= $trainer['username'] ?? 'N/A' ?><br>
							<strong>Email:</strong> <?= $trainer['user_email'] ?? 'N/A' ?><br>
							<strong>User ID:</strong> <?= $trainer['user_id'] ?? 'N/A' ?>
						</td>
						<td>
							<?php 
								$about = $trainer['about_us'] ?? '';
								if(!empty($about)) {
									echo strlen($about) > 100 ? substr(strip_tags($about), 0, 100) . '...' : strip_tags($about);
								} else {
									echo '<span class="text-muted">N/A</span>';
								}
							?>
						</td>
						<td>
							<?php if($trainer['status'] == 1): ?>
								<span class="badge badge-success status-badge">
									<i class="fas fa-check-circle"></i> Active
								</span>
							<?php else: ?>
								<span class="badge badge-danger status-badge">
									<i class="fas fa-times-circle"></i> Inactive
								</span>
							<?php endif; ?>
						</td>
						<td class="action-buttons">
							<a href="javascript:void(0);" 
							   class="btn btn-sm btn-info edit" 
							   data-id="<?= $trainer['id'] ?>" 
							   title="Edit">
								<i class="fas fa-edit"></i>
							</a>
							<br>
							<a href="javascript:void(0)" 
							   class="btn btn-sm btn-<?= $trainer['status'] == 1 ? 'warning' : 'success' ?> change-status <?= $trainer['status'] == 1 ? "" : " inactive" ?>" 
							   data-id="<?= $trainer['id'] ?>" 
							   data-status="<?= $trainer['status'] ?>" 
							   title="Change Status">
								<i class="fa fa-toggle-<?= $trainer['status'] == 1 ? 'on' : 'off' ?>" aria-hidden="true"></i>
							</a>
							<br>
							<a href="javascript:void(0);" 
							   class="btn btn-sm btn-danger delete" 
							   data-id="<?= $trainer['id'] ?>" 
							   title="Delete"
							   onclick="return confirm('Are you sure you want to delete this trainer/studio?')">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</a>
						</td>
					</tr>
					<?php
							endforeach;
						} else {
					?>
					<tr>
						<td colspan="11" class="text-center">No trainers/studio found</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
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
        						<option value="0">Inactive</option>
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
			scrollY: 400,
			"order": [[ 0, "desc" ]],
			"pageLength": 25,
			"responsive": true,
			"searching": true,
			"columnDefs": [
				{ "orderable": false, "targets": [10] } // Disable sorting on Actions column
			],
			"language": {
				"search": "Search in table:",
				"emptyTable": "No trainers/studio found",
				"zeroRecords": "No matching trainers/studio found"
			}
		});

		// Change status
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
						$('.status-response').html(`<div class="alert alert-success">${res.msg}</div>`);
						$('#change-status-form').find('[name="status"]').val(res.event_status);
						setTimeout(function(){
							location.reload();
						}, 1500);
					}else{
						$('.status-response').html(`<div class="alert alert-danger">${res.msg}</div>`);
					}
					setTimeout(function(){
						$('.status-response').html(``);
					},3000);
				},
				complete:function(){
					$('.status-submit-btn').prop('disabled', false);
					$('.status-submit-btn').val('Submit');
				},
				error: function(){
					$('.status-response').html(`<div class="alert alert-danger">Something went wrong. Please try again.</div>`);
					setTimeout(function(){
						$('.status-response').html(``);
					},3000);
				}
			});
		});

		// Edit functionality (placeholder - implement as needed)
		$(document).on('click', '.edit', function(e){
			e.preventDefault();
			let id = $(this).data('id');
			alertify.alert('Edit Trainer/Studio', 'Edit functionality can be implemented here. Trainer ID: ' + id);
		});

		// Delete functionality (placeholder - implement as needed)
		$(document).on('click', '.delete', function(e){
			e.preventDefault();
			let id = $(this).data('id');
			alertify.confirm('Delete Trainer/Studio', 
				'Are you sure you want to delete this trainer/studio? This action cannot be undone.',
				function(){
					// Implement delete AJAX call here
					alertify.error('Delete functionality needs to be implemented');
				},
				function(){
					alertify.message('Delete cancelled');
				}
			);
		});

	});
</script>
<?= $this->endSection(); ?>

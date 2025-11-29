<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<style>
    .incomplete-badge {
        background-color: #ffc107;
        color: #000;
        padding: 3px 8px;
        border-radius: 3px;
        font-size: 0.75rem;
        font-weight: bold;
    }
    .filter-section {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .user-type-badge {
        font-size: 0.85rem;
    }
</style>

<div class="row">
    <div class="col-12">
<h3>User List</h3>
<hr>
    </div>
</div>

<!-- Filter Section -->
<div class="row">
    <div class="col-12">
        <div class="filter-section">
            <form method="GET" action="<?= base_url('admin/user-list') ?>" id="filter-form">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="roles" class="mb-2"><strong>Filter by Role (Multiple Selection):</strong></label>
                            <div class="form-check">
                                <input class="form-check-input role-checkbox" type="checkbox" name="roles[]" value="1" id="role_1" <?= in_array('1', $role_filter) || in_array(1, $role_filter) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="role_1">Admin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input role-checkbox" type="checkbox" name="roles[]" value="2" id="role_2" <?= in_array('2', $role_filter) || in_array(2, $role_filter) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="role_2">Site User</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input role-checkbox" type="checkbox" name="roles[]" value="3" id="role_3" <?= in_array('3', $role_filter) || in_array(3, $role_filter) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="role_3">Yoga Studio</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input role-checkbox" type="checkbox" name="roles[]" value="4" id="role_4" <?= in_array('4', $role_filter) || in_array(4, $role_filter) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="role_4">Yoga Instructor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input role-checkbox" type="checkbox" name="roles[]" value="5" id="role_5" <?= in_array('5', $role_filter) || in_array(5, $role_filter) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="role_5">Yoga Institute</label>
                            </div>
                            <small class="text-muted">Leave all unchecked to show all roles</small>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status" class="mb-2"><strong>Filter by Status:</strong></label>
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option value="">All Status</option>
                                <option value="1" <?= $status_filter == '1' ? 'selected' : '' ?>>Active</option>
                                <option value="0" <?= $status_filter == '0' ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="trainer_studio_status" class="mb-2"><strong>Trainer Studio Status:</strong></label>
                            <select name="trainer_studio_status" id="trainer_studio_status" class="form-control form-control-sm">
                                <option value="">All Users</option>
                                <option value="has_profile" <?= $trainer_studio_status_filter == 'has_profile' ? 'selected' : '' ?>>Has Trainer/Studio Profile</option>
                                <option value="no_profile" <?= $trainer_studio_status_filter == 'no_profile' ? 'selected' : '' ?>>No Trainer/Studio Profile</option>
                                <option value="active" <?= $trainer_studio_status_filter == 'active' ? 'selected' : '' ?>>Active Trainer/Studio</option>
                                <option value="inactive" <?= $trainer_studio_status_filter == 'inactive' ? 'selected' : '' ?>>Inactive Trainer/Studio</option>
                            </select>
                            <small class="text-muted">Filter by trainer/studio profile status</small>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="mb-2">&nbsp;</label>
                            <div>
                                <button type="submit" class="btn btn-primary btn-sm btn-block">
                                    <i class="fas fa-filter"></i> Apply Filters
                                </button>
                                <a href="<?= base_url('admin/user-list') ?>" class="btn btn-secondary btn-sm btn-block">
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


<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="user-list-table">
		<thead>
			<tr>
				<th>S.No</th>
                        <th>ID</th>
				<th>Name</th>
				<th>Contact No</th>
				<th>Email</th>
                        <th>Username</th>
                        <th>User Type</th>
                        <th>Trainer Profile</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(count($users)){
					$i = 1;
					foreach($users as $user){
                                $status = $user['status'] == 1 ? 'Active' : 'Inactive';
                                $statusClass = $user['status'] == 1 ? 'success' : 'danger';
                                
						$user_type = '';
                                $user_type_class = 'info';
						switch ($user['role']) {
							case 1:
							$user_type = 'Admin';
                                        $user_type_class = 'danger';
								break;
								case 2:
                                        $user_type = 'Site User';
                                        $user_type_class = 'secondary';
								break;
								case 3:
                                        $user_type = 'Yoga Studio';
                                        $user_type_class = 'primary';
								break;
								case 4:
                                        $user_type = 'Yoga Instructor';
                                        $user_type_class = 'warning';
								break;
								case 5:
                                        $user_type = 'Yoga Institute';
                                        $user_type_class = 'info';
								break;
							default:
                                        $user_type = 'Unknown';
								break;
						}

                                // Check if user has inactive trainer/studio profile
                                $hasInactiveProfile = false;
                                if(isset($user['has_trainer_data']) && $user['has_trainer_data']) {
                                    $hasInactiveProfile = (isset($user['trainer_status']) && $user['trainer_status'] == 0);
                                }
                    ?>
                    <tr class="<?= $hasInactiveProfile ? 'table-warning' : '' ?>">
                        <td><?= htmlspecialchars($i++, ENT_QUOTES, 'UTF-8') ?></td>
                        <td data-order="<?= htmlspecialchars($user['id'] ?? 0, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($user['id'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user['name'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user['phone_no'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user['username'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                        <td>
                            <span class="badge badge-<?= $user_type_class ?> user-type-badge">
                                <?= htmlspecialchars($user_type, ENT_QUOTES, 'UTF-8') ?>
                            </span>
                        </td>
                        <td>
                            <?php if(isset($user['has_trainer_data']) && $user['has_trainer_data']): ?>
                                <?php 
                                    $trainerStatus = $user['trainer_status'] ?? null;
                                    $trainerStatusClass = ($trainerStatus == 1) ? 'success' : 'danger';
                                    $trainerStatusText = ($trainerStatus == 1) ? 'Active' : 'Inactive';
                                ?>
                                <span class="badge badge-<?= $trainerStatusClass ?>">
                                    <i class="fas fa-<?= $trainerStatus == 1 ? 'check-circle' : 'times-circle' ?>"></i> <?= $trainerStatusText ?>
                                </span>
                                <?php if(isset($user['trainer_data']['business_name']) && !empty($user['trainer_data']['business_name'])): ?>
                                    <br><small class="text-muted"><strong><?= htmlspecialchars($user['trainer_data']['business_name'], ENT_QUOTES, 'UTF-8') ?></strong></small>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="badge badge-secondary">
                                    <i class="fas fa-minus-circle"></i> No Profile
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="badge badge-<?= $statusClass ?>">
                                <?= htmlspecialchars($status, ENT_QUOTES, 'UTF-8') ?>
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="javascript:void(0)" class="btn btn-sm btn-info edit" 
                                   data-id="<?= htmlspecialchars($user['id'] ?? '', ENT_QUOTES, 'UTF-8') ?>" 
                                   data-status="<?= htmlspecialchars($user['status'] ?? 0, ENT_QUOTES, 'UTF-8') ?>" 
                                   title="Edit Status">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-danger" 
                                   title="Delete" onclick="return confirm('Are you sure?')">
                                    <i class='fas fa-trash-alt'></i>
                                </a>
                                <form action="<?= base_url('admin/loginWithOther')?>" method="POST" class="d-inline">
                                    <input type="hidden" name="email" value="<?= htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                    <input type="hidden" name="login_back_email" value="<?= htmlspecialchars(session()->get('email') ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                    <button type="submit" class="btn btn-sm btn-warning" title="Login as User">
                                        <i class="fas fa-sign-in-alt"></i>
                                    </button>
					</form>
                            </div>
				</td>
			</tr>
			<?php
					}
                        } else {
                    ?>
                    <tr class="no-data-row">
                        <td colspan="10" class="text-center">No users found</td>
                    </tr>
                    <?php
				}
			?>
		</tbody>
	</table>
        </div>
    </div>
</div>

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
       						<option value="0">Inactive</option>
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
		$(document).ready(function(){
			// Wait for DOM to be fully ready
			setTimeout(function() {
				var $table = $('#user-list-table');
				
				if(!$table.length) {
					return;
				}
				
				// Destroy existing DataTable if it exists
				if ($.fn.DataTable.isDataTable('#user-list-table')) {
					try {
						$('#user-list-table').DataTable().destroy();
					} catch(e) {
						// Ignore destroy errors
					}
				}
				
				// Remove "No users found" row if it exists - DataTables will handle empty state
				$table.find('tbody tr.no-data-row').remove();
				
				// Check if we have data rows
				var hasDataRows = $table.find('tbody tr').length > 0;
				
				// Initialize DataTable with minimal configuration
				try {
					var config = {
						"pageLength": 25,
						"responsive": true,
						"autoWidth": false,
						"columnDefs": [
							{ "orderable": false, "targets": [7, 9] }
						],
						"language": {
							"emptyTable": "No users found",
							"zeroRecords": "No matching users found"
						}
					};
					
					// Only add ordering if we have data
					if(hasDataRows) {
						config.order = [[ 1, "desc" ]];
					} else {
						// Disable all features if no data
						config.paging = false;
						config.searching = false;
						config.ordering = false;
						config.info = false;
					}
					
					$table.DataTable(config);
				} catch(e) {
					console.error('DataTables initialization error:', e);
				}
			}, 200);
			
			
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
						if(res.status){
							alertify.success(res.msg);
							setTimeout(function(){
								location.reload();
							}, 1000);
						} else {
							alertify.error(res.msg);
						}
					},
					complete:function(){
						$('.btn-submit').prop('disabled', false);
						$('.btn-submit').text('Submit');
					},
					error: function(){
						alertify.error('Something went wrong. Please try again.');
					}
				});
			});
		});
	</script>
<?=  $this->endSection() ?>

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
		<a href="javascript:void(0);" class="btn btn-info add-team-btn-modal">Add Team</a>	
	</div>
	<h3>Team List</h3>
	<hr>
</div>
<div class="table-container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Name</th>
				<th>Designation</th>
				<th>Image</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(count($teams)){
					$i = 1;
					foreach($teams as $team){


			?>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $team['name']?></td>
				<td><?= $team['designation']?></td>
				<td><img src="<?= base_url('assets/team/') . $team['image'] ?> " width="100"></td>
				<td><?= $team['status'] == 1 ? 'Active' : "In Active " ?></td>
				<td>
					<a href="javascript:void(0);" class="edit" data-id="<?= $team['id'] ?>"><i class="fas fa-edit"></i></a>
				<br>
					<a href="javascript:void(0)" class="change-status <?= $team['status'] == 1 ? "" : " inactive" ?>" data-id="<?= $team['id'] ?>" data-status="<?=$team['status']?>"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>
				<br>
				<a href="javascript:void(0);" class="delete" data-id="<?= $team['id'] ?>" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i></a>
				</td>
			</tr>
			<?php
					}
				}
			?>
		</tbody>
	</table>
</div>
	
	<!-- The Modal -->
<div class="modal" id="add-team-modal">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Team</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="update-password-response">
          
        </div>
        	<form class="form" id="add-team-form">
				<div class="form-group">
					<div class="form-row">
						<div class="col-6 parent-error">
							<label>Name</label>
							<input  type="text" placeholder="Name" name="name" class="form-control">
							<div class="error-msg"></div>
						</div>
						<div class="col-6 parent-error">
							<label>Image</label>
							<input  type="file" placeholder="Image" name="image" class="form-control" accept="image/*">
							<div class="error-msg"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-12 parent-error">
							<label>Designation</label>
							<input  type="text" placeholder="Designation" name="designation" class="form-control">
							<div class="error-msg"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-12">
							<label>Short Description</label>
							<textarea name="short_description" class="form-control" placeholder="Short Description" rows="7"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-12">
							<label>Social Network link(Seperate with comma)</label>
							<input  type="text" placeholder="Social Network link(Seperate with comma)" name="social_network" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-12">
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
						<div class="col-12">
							<input type="submit" name="submit" value="Submit" class="btn btn-info btn-submit">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-12">
							<div class="response-msg"></div>
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


	<!-- The edit -->
<div class="modal" id="edit-team-modal">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Team</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="update-password-response">
          
        </div>
        	<form class="form" id="edit-team-form">
				<div class="form-group">
					<div class="form-row">
						<div class="col-6 parent-error">
							<label>Name</label>
							<input  type="text" placeholder="Name" name="name" class="form-control">
							<div class="error-msg"></div>
						</div>
						<div class="col-6 parent-error">
							<label>Image</label>
							<input  type="file" placeholder="Image" name="image" class="form-control" accept="image/*">
							<div class="error-msg"></div>
							<br />
							<div>
								<img  id="team-image" src="">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-12 parent-error">
							<label>Designation</label>
							<input  type="text" placeholder="Designation" name="designation" class="form-control">
							<div class="error-msg"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-12">
							<label>Short Description</label>
							<textarea name="short_description" class="form-control" placeholder="Short Description" rows="7"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-12">
							<label>Social Network link(Seperate with comma)</label>
							<input  type="text" placeholder="Social Network link(Seperate with comma)" name="social_network" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-12">
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
						<div class="col-12">
							<input type="submit" name="submit" value="Submit" class="btn btn-info btn-submit">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-12">
							<div class="response-msg"></div>
						</div>
					</div>
				</div>\
				<input type="hidden" name="id">
				<input type="hidden" name="image2">
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
		$(document).on('click', '.add-team-btn-modal', function(e){
			e.preventDefault();
			$('#add-team-modal').modal('show');
		});
		$(document).on('submit', '#add-team-form', function(e){
			e.preventDefault();
			let _this = $(this);
			let form_data = new FormData(this);
			console.log('form_data ', form_data);
			$.ajax({
				type : 'POST',
				url : "<?= base_url('admin/team/store'); ?>",
				cache:false,
            	contentType: false,
            	processData: false,
            	data : form_data,
            	dataType:'json',
            	beforeSend:function(){
            		$('.btn-submit').prop('disabled', true);
            		$('.btn-submit').val('Please Wait...');
            	},
            	success: function(res){
					if(res.status){
						$('.response-msg').html(`<span class="alert alert-success">${res.msg}</span>`);
						//$('#change-status-form').find('[name="status"]').val(res.event_status);
						setTimeout(function(){
    						_this.find('.response-msg').html(``);
    					}, 3000);
    					$("#add-team-form")[0].reset();
					}else{
						$.each(res.data, function(field_name, error){
	    					_this.find(`[name="${field_name}"]`).closest('.parent-error').find('.error-msg').html(error);
	    				});
					}
					setTimeout(function(){
						$('.status-response').html(``);
					},3000);
            	},
            	complete:function(){
            		$('.btn-submit').prop('disabled', false);
            		$('.btn-submit').val('Submit');
            	}
			});
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
				url:"<?= base_url('admin/team/change-status')?>",
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

		//Edit team

		$(document).on('click','.edit',function(e){
			e.preventDefault();
			
			let _id = $(this).data('id');
			console.log('id', _id);
			//return false;
			$.ajax({
				type : 'POST',
				url: "<?= base_url('admin/team/get-team-data')?>",
				data:{id:_id},
				dataType:'json',
				beforeSend:function(){

				},
				success:function(res){
					$('#edit-team-form').find('[name="name"]').val(res.name);
					$('#edit-team-form').find('[name="designation"]').val(res.designation);
					$('#edit-team-form').find('[name="social_network"]').val(res.social_network);
					
					$('#edit-team-form').find('[name="image2"]').val(res.image);
					$('#edit-team-form').find('[name="status"]').val(res.status);
					$('#edit-team-form').find('[name="id"]').val(res.id);
					$('#edit-team-form').find('[name="short_description"]').val(res.short_description);
					$('#edit-team-form').find('#team-image').attr('src', "<?=base_url('assets/team/')?>" + res.image);
					$('#edit-team-modal').modal('show');
				},
				complete:function(){

				}
			})
		});

		//

		$(document).on('submit', '#edit-team-form', function(e){
			e.preventDefault();
			let _this = $(this);
			let form_data = new FormData(this);
			console.log('console.log');
			$.ajax({
				type: 'POST',
				url:"<?= base_url('admin/team/update');?>",
				data:form_data,
				processData: false,
    			contentType: false,
    			dataType:'json',
    			beforeSend:function(){
    				_this.find('.btn-submit').prop('disabled', true);
    				_this.find('.btn-submit').val('Please Wait...');
    			},
    			success:function(res){
    				console.log('res ', res);
    				if(res.status){
    					_this.find('.response-msg').html(`<span class="alert alert-success">${res.msg}</span>`);
    					setTimeout(function(){
    						_this.find('.response-msg').html(``);
    						window.location.reload();
    					}, 3000);
    					//$("#create-event-form")[0].reset();
    					//return false;
    				}else{
    					$.each(res.data, function(field_name, error){
	    					_this.find(`[name="${field_name}"]`).closest('.parent-error').find('.error-msg').html(error);
	    				});
    				}
    				
    			},
    			complete:function(){
    				_this.find('.btn-submit').prop('disabled', false);
    				_this.find('.btn-submit').val('Submit');
    			}
			});
		});

	});
</script>
<?= $this->endSection(); ?>
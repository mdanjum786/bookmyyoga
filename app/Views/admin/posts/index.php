<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<style type="text/css">
	.error-msg{
		color: red;
	}
	.inactive{
		color: gray;
	}
</style>
<div>
	<h3>Posts List</h3>
	<hr>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Title</th>
			<th>Image</th>
			
			<th>Description</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if(count($services)){
				$i = 1;
				foreach($services as $event){


		?>
		<tr>
			<td><?= $i++; ?></td>
			<td><?= $event['title'] ?></td>
			<td><img src="<?= base_url('assets/posts/') . $event['image'] ?>" width="150"></td>
			
			<td><?= $event['description'] ?></td>
			<td><?= $event['status'] == 1 ? "Active" : "In active" ?></td>
			<td>
				<a href="javascript:void(0);" class="edit" data-id="<?= $event['id'] ?>"><i class="fas fa-edit"></i></a>
				<br>
				<a href="javascript:void(0)" class="change-status <?= $event['status'] == 1 ? "" : " inactive" ?> " data-id="<?= $event['id'] ?>" data-status="<?=$event['status']?>"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>
				<br>
				<a href="javascript:void(0);" data-id="<?= $event['id'] ?>" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i></a>
			</td>
		</tr>
		<?php	}
			}
			?>
	</tbody>
</table>

<!-- edit-event-modal -->
<div class="modal" id="edit-event-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Posts Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form class="form" id="edit-event-form">
		
		<div class="form-group" >
			<div class="form-row">
				<div class="col parent-error">
					<label> Title</label>
					<input type="text" class="form-control" name="title" placeholder="Event Title">
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
	

		<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Description</label>
					<textarea class="form-control" name="description" id="update-description" rows="7" placeholder=" Description"></textarea>
					<div class="error-msg"></div>
					
				</div>
				
			</div>
		</div>
	<!-- 	<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Additional Description</label>
					<textarea class="form-control" name="additional_description" id="additional_description" rows="7" placeholder=" Description"></textarea>
					<div class="error-msg"></div>
					
				</div>
				
			</div>
		</div> -->
	<!-- 	<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Additional Image</label>
					<input type="file" class="form-control" name="additional_image" id=""accept="image/*">
					<div class="error-msg"></div>
					
				</div>
				<div class="additional_image-container"></div>
			</div>
		</div> -->

		<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Image</label>
					<input type="file" class="form-control" name="image" accept="image/*">
					<div class="error-msg"></div>
					<br />
					<div>
						<img  id="event-image" src=""  width="100" />
					</div>
				</div>
				<div class="col parent-error">
					<label>Status</label>
					<select name="status" class="form-control">

						<option value="">Select Status</option>
						<option value="1">Active</option>
						<option value="0">In Active</option>
					</select>
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col">
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

<!-- change-event-status-modal -->
<div class="modal" id="change-event-status-modal">
  <div class="modal-dialog ">
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

<?= $this->endSection()?>
<?= $this->section('scripts') ?>
<script type="text/javascript">
	$(function(){
		$('#update-description').summernote({
			height:300
		});
		// $('#additional_description').summernote({
		// 	height:300
		// });
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
				url:"<?= base_url('admin/posts/change-status')?>",
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
	
		$(document).on('click','.edit',function(e){
			e.preventDefault();
			
			let _id = $(this).data('id');
			$.ajax({
				type : 'POST',
				url: "<?= base_url('admin/posts/get-event-data')?>",
				data:{id:_id},
				dataType:'json',
				beforeSend:function(){

				},
				success:function(res){
					$('#edit-event-form').find('[name="title"]').val(res.title);
				
					$('#edit-event-form').find('[name="description"]').val(res.description);
					$('#edit-event-form').find('[name="status"]').val(res.status);
					$('#update-description').summernote('code', res.description); 
					// $('#additional_description').summernote('code', res.additional_description); 
					$('#edit-event-form').find('[name="id"]').val(res.id);
					$('#edit-event-form').find('[name="image2"]').val(res.image);
					// $('#edit-event-form').find('[name="additional_image2"]').val(res.additional_image);
					$('#edit-event-form').find('#event-image').attr('src', "<?=base_url('assets/posts/')?>" + res.image);

					
					
					$('#edit-event-modal').modal('show');
				},
				complete:function(){

				}
			})
		});

		//

		$(document).on('submit', '#edit-event-form', function(e){
			e.preventDefault();
			let _this = $(this);
			let form_data = new FormData(this);
			console.log('console.log');
			$.ajax({
				type: 'POST',
				url:"<?= base_url('admin/posts/update');?>",
				data:form_data,
				processData: false,
    			contentType: false,
    			dataType:'json',
    			beforeSend:function(){
    				$('.btn-submit').prop('disabled', true);
    				$('.btn-submit').val('Please Wait...');
    			},
    			success:function(res){
    				console.log('res ', res);
    				if(res.status){
    					_this.find('.response-msg').html(`<span class="alert alert-success">${res.msg}</span>`);
    					setTimeout(function(){
    						_this.find('.response-msg').html(``);
    						//window.location.reload();
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
    				$('.btn-submit').prop('disabled', false);
    				$('.btn-submit').val('Submit');
    			}
			});
		});

	});
</script>
<?= $this->endSection()?>
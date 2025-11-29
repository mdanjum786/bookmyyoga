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
	<h3>Events List</h3>
	<hr>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Title</th>
			<th>Service Name </th>
			<th>Image</th>
			<!-- <th>Start Date </th>
			<th>End Date</th> -->
			<th>Description</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if(count($events)){
				$i = 1;
				foreach($events as $event){


		?>
		<tr>
			<td><?= $i++; ?></td>
			<td><?= $event['title'] ?></td>
			<td><?= $event['s_title'] ?? ''  ?></td>
			<td><img src="<?= base_url('assets/events/') . $event['image'] ?>" width="150"></td>
			
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
        <h4 class="modal-title">Edit Event Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form class="form" id="edit-event-form">
		
		<div class="form-group" >
			<div class="form-row">
				<div class="col parent-error">
					<label>Event Title</label>
					<input type="text" class="form-control" name="title" placeholder="Event Title">
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
	<!-- 	<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Start Date</label>
					<input type="text" class="form-control" name="start_date" placeholder="Select Event Start date" id="start-date">
					<div class="error-msg"></div>
				</div>
				<div class="col parent-error">
					<label>End Date</label>
					<input type="text" class="form-control" name="end_date" placeholder="Select Event End date" id="end-date">
					<div class="error-msg"></div>
				</div>
			</div>
		</div> -->
		<!-- <div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Address</label>
					<input type="text" name="address" class="form-control" placeholder="address">
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div> -->
			<div class="form-group" >
			<div class="form-row">
				<div class="col parent-error">
					<label>Select Servcies</label>
					<select name="services" class="form-control" id="service_id">
					   <option value="">Select Servcies</option>
					   <?php 
					   		if(count($services)){
					   			foreach($services as $service){


					   ?> 
					   <option value="<?= $service['id']?>"><?= $service['title']?></option>
					   <?php
					   		}
					   		}
					   ?>
					</select>
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Description</label>
					<textarea class="form-control" id="update-description" name="description" rows="7" placeholder="Event  Description"></textarea>
					<div class="error-msg"></div>
					
				</div>
				
			</div>
		</div>
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
	$('#update-description').summernote({
		height:300
	});
	$(function(){
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
				url:"<?= base_url('admin/event/change-status')?>",
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
		/*Edit form*/

		// $('#start-date').datetimepicker({
		//   	 icons:{
	 //  	 		  time: 'icon-clock',
		// 	      date: 'icon-calendar',
		// 	      up: 'icon-chevron-up',
		// 	      down: 'icon-chevron-down',
		// 	      previous: 'icon-chevron-left',
		// 	      next: 'icon-chevron-right',
		// 	      today: 'icon-direction',
		// 	      clear: 'icon-trash',
		// 	      close: 'icon-cross'
		//   	 }
    
		// });
		// $('#end-date').datetimepicker({
		//   	 icons:{
	 //  	 		  time: 'icon-clock',
		// 	      date: 'icon-calendar',
		// 	      up: 'icon-chevron-up',
		// 	      down: 'icon-chevron-down',
		// 	      previous: 'icon-chevron-left',
		// 	      next: 'icon-chevron-right',
		// 	      today: 'icon-direction',
		// 	      clear: 'icon-trash',
		// 	      close: 'icon-cross'
		//   	 }
    
		// });
		
		$(document).on('click','.edit',function(e){
			e.preventDefault();
			
			let _id = $(this).data('id');
			$.ajax({
				type : 'POST',
				url: "<?= base_url('admin/event/get-event-data')?>",
				data:{id:_id},
				dataType:'json',
				beforeSend:function(){

				},
				success:function(res){
					$('#edit-event-form').find('[name="title"]').val(res.title);
					// $('#edit-event-form').find('[name="start_date"]').val(res.start_date);
					// $('#edit-event-form').find('[name="end_date"]').val(res.end_date);
					$('#edit-event-form').find('[name="description"]').val(res.description);
					$('#edit-event-form').find('[name="address"]').val(res.address);
					$('#edit-event-form').find('[name="status"]').val(res.status);
					$('#edit-event-form').find('[name="services"]').val(res.service_id);
					//$('#edit-event-form').find('[name="status"]').val(res.status);
					$('#update-description').summernote('code', res.description); 
					$('#edit-event-form').find('[name="id"]').val(res.id);
					$('#edit-event-form').find('[name="image2"]').val(res.image);
					$('#edit-event-form').find('#event-image').attr('src', "<?=base_url('assets/events/')?>" + res.image);
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
				url:"<?= base_url('admin/event/update');?>",
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
    				$('.btn-submit').prop('disabled', false);
    				$('.btn-submit').val('Submit');
    			}
			});
		});

	});
</script>
<?= $this->endSection()?>
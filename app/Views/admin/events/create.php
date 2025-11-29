<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<style type="text/css">
	.error-msg{
		color: red;
	}
</style>
	<div></div>
	<h3>Create Event</h3>
	<hr>
	<form class="form" id="create-event-form">
		
		<div class="form-group" >
			<div class="form-row">
				<div class="col parent-error">
					<label>Event Title</label>
					<input type="text" class="form-control" name="title" placeholder="Event Title">
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
		<div class="form-group" >
			<div class="form-row">
				<div class="col parent-error">
					<label>Select Servcies</label>
					<select name="services" class="form-control">
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
	<!-- 	<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Address</label>
					<input type="text" name="address" class="form-control" placeholder="address">
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div> -->
		<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Description</label>
					<textarea class="form-control"  id="description" name="description" rows="7" placeholder="Event  Description"></textarea>
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
	</form>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script type="text/javascript">
	$(function(){
		$('#description').summernote({
			height:300
		})
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
		
		$(document).on('submit', '#create-event-form', function(e){
			e.preventDefault();
			let _this = $(this);
			let form_data = new FormData(this);
			console.log('console.log');
			$.ajax({
				type: 'POST',
				url:"<?= base_url('admin/event/store');?>",
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
    					}, 3000);
    					$("#create-event-form")[0].reset();
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
		//name fields focus event
		$(document).on('click', '[name]', function(e){
			//e.preventDefault();
			$(this).closest('.parent-error').find('.error-msg').html(``);
		});
	});
</script>
<?= $this->endSection() ?>
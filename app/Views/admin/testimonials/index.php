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
	<h3>Testimonials List</h3>
	<hr>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Name</th>
			<th>Image</th>
			<th>Designation </th>
			<th>Stars</th>
			<th>Testimonials</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if(count($testimonials)){
				$i = 1;
				foreach($testimonials as $testimonial){


		?>
		<tr>
			<td><?= $i++; ?></td>
			<td><?= $testimonial['name'] ?></td>
			<td><img src="<?= base_url('assets/testimonials/') . $testimonial['image'] ?>" width="150"></td>
			<td><?=  $testimonial['designation'] ?></td>
			<td><?=  $testimonial['stars'] ?></td>
			<td><?= $testimonial['testimonials'] ?></td>
			<td><?= $testimonial['status'] == 1 ? "Active" : "In active" ?></td>
			<td>
				<a href="javascript:void(0);" class="edit" data-id="<?= $testimonial['id'] ?>"><i class="fas fa-edit"></i></a>
				<br>
				<a href="javascript:void(0)" class="change-status <?= $testimonial['status'] == 1 ? "" : " inactive" ?>" data-id="<?= $testimonial['id'] ?>" data-status="<?=$testimonial['status']?>"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>
				<br>
				<a href="javascript:void(0);" data-id="<?= $testimonial['id'] ?>" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i></a>
			</td>
		</tr>
		<?php	}
			}
			?>
	</tbody>
</table>

<!-- edit-event-modal -->
<div class="modal" id="edit-event-modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
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

<!-- edit-testimonials-modal -->
<div class="modal" id="edit-testimonials-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Testtimonials Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       	<form class="form" id="edit-testimonials-form">
			
			<div class="form-group" >
				<div class="form-row">
					<div class="col parent-error">
						<label>Name</label>
						<input type="text" class="form-control" name="name" placeholder="Name">
						<div class="error-msg"></div>
					</div>
					
				</div>
			</div>
			<div class="form-group">
				<div class="form-row">
					<div class="col parent-error">
						<label></label>Designation
						<input type="text" class="form-control" name="designation" placeholder="Designation" >
						<div class="error-msg"></div>
					</div>
					<div class="col parent-error">
						<label>Imagee</label>
						<input type="file" class="form-control" name="image">
						<div class="error-msg"></div>
						<br />
						<div>
							<img id="testimonials-image" src="">
						</div>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="form-row">
					<div class="col parent-error">
						<label>Testimonials</label>
						<textarea class="form-control" name="testimonials" rows="7" placeholder="Testimonials"></textarea>
						<div class="error-msg"></div>
					</div>
					
				</div>
			</div>
			<div class="form-group">
				<div class="form-row">
				<div class="col parent-error">
						<label>Stars</label>
						<select name="stars" class="form-control">

							<option value="">Select Stars</option>
							<option value="1">1</option>
							<option value="1.5">1.5</option>
							<option value="2">2</option>
							<option value="2.5">2.5</option>
							<option value="3">3</option>
							<option value="3.5">3.5</option>
							<option value="4">4</option>
							<option value="4.5">4.5</option>
							<option value="5">5</option>
							
						</select>
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

<?= $this->endSection()?>
<?= $this->section('scripts') ?>
<script type="text/javascript">
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
				url:"<?= base_url('admin/testimonials/change-status')?>",
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
		//Edit testimonials

		$(document).on('click','.edit',function(e){
			e.preventDefault();
			
			let _id = $(this).data('id');
			console.log('id', _id);
			//return false;
			$.ajax({
				type : 'POST',
				url: "<?= base_url('admin/testimonials/get-testimonials-data')?>",
				data:{id:_id},
				dataType:'json',
				beforeSend:function(){

				},
				success:function(res){
					$('#edit-testimonials-form').find('[name="name"]').val(res.name);
					$('#edit-testimonials-form').find('[name="designation"]').val(res.designation);
					$('#edit-testimonials-form').find('[name="stars"]').val(res.stars);
					$('#edit-testimonials-form').find('[name="image2"]').val(res.image);
					$('#edit-testimonials-form').find('[name="status"]').val(res.status);
					$('#edit-testimonials-form').find('[name="id"]').val(res.id);
					$('#edit-testimonials-form').find('[name="testimonials"]').val(res.testimonials);
					$('#edit-testimonials-form').find('#testimonials-image').attr('src', "<?=base_url('assets/testimonials/')?>" + res.image);
					$('#edit-testimonials-modal').modal('show');
				},
				complete:function(){

				}
			})
		});

		//

		$(document).on('submit', '#edit-testimonials-form', function(e){
			e.preventDefault();
			let _this = $(this);
			let form_data = new FormData(this);
			console.log('console.log');
			$.ajax({
				type: 'POST',
				url:"<?= base_url('admin/testimonials/update');?>",
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
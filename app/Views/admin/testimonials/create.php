<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<style type="text/css">
	.error-msg{
		color: red;
	}
</style>
	<div></div>
	<h3>Create Testimonials</h3>
	<hr>
	<form class="form" id="testimonials-event-form">
		
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
	</form>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script type="text/javascript">
	$(function(){
		$(document).on('submit', '#testimonials-event-form', function(e){
			e.preventDefault();
			let _this = $(this);
			let form_data = new FormData(this);
			console.log('console.log');
			$.ajax({
				type: 'POST',
				url:"<?= base_url('admin/testimonials/store');?>",
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
    					$("#testimonials-event-form")[0].reset();
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
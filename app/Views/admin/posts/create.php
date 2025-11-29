<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<style type="text/css">
	.error-msg{
		color: red;
	}
</style>
	<div></div>
	<h3>Create Posts</h3>
	<hr>
	<form class="form" id="create-event-form">
		
		<div class="form-group" >
			<div class="form-row">
				<div class="col parent-error">
					<label> Title</label>
					<input type="text" class="form-control" name="title" placeholder=" Title">
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
	
	
		<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Description</label>
					<textarea class="form-control" name="description" rows="7" id="description" placeholder="Description"></textarea>
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
		<!-- <div class="form-group">
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
		// $('#additional_description').summernote({
		// 	height:300
		// });
		$(document).on('submit', '#create-event-form', function(e){
			e.preventDefault();
			let _this = $(this);
			let form_data = new FormData(this);
			console.log('console.log');
			$.ajax({
				type: 'POST',
				url:"<?= base_url('admin/posts/store');?>",
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
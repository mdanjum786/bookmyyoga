<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<style type="text/css">
	.error-msg{
		color: red;
	}
	.event-date-container{
		display: none;
	}
</style>
	<div></div>
	<h3>Update Services</h3>
	<hr>
	<form class="form" id="create-event-form">
		
		<div class="form-group" >
			<div class="form-row">
				<div class="col parent-error">
					<label> Title</label>
					<input type="text" class="form-control" name="title" placeholder=" Title" value="<?=$services['title'] ?>">
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>

		<div class="form-group" >
			<div class="form-row">
				<div class="col parent-error">
					<label> Rating</label>
					<input type="text" class="form-control" name="rating" placeholder=" Rating" value="<?= $services['rating']?>">
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
<div class="form-group" >
			<div class="form-row">
				<div class="col parent-error">
					<label> Price</label>
					<input type="text" class="form-control" name="price" placeholder=" Price" value="<?= (int)$services['price']?>">
					<div class="error-msg"></div>
				</div>
				<div class="col parent-error">
					<label> offer Price</label>
					<input type="text" class="form-control" name="offer_price" placeholder=" Offer Price" value="<?= (int)$services['offer_price']?>">
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>

		<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Select Type</label>
					<select name="type" class="form-control select-type">
						<option value="">Select Type</option>
						<option value="course" <?= $services['type'] == 'course' ? 'selected' : '' ?>>course</option>
						<option value="wellness" <?= $services['type'] == 'wellness' ? 'selected' : '' ?>>Wellness</option>
						<option value="online-store" <?= $services['type'] == 'online-store' ? 'selected' : '' ?>>Online Store</option>
						<option value="yoga-retreat" <?= $services['type'] == 'yoga-retreat' ? 'selected' : '' ?>>Yoga Retreat</option>
						<option value="corporate-yoga" <?= $services['type'] == 'corporate-yoga' ? 'selected' : '' ?>>Corporate Yoga</option>
						<option value="event" <?= $services['type'] == 'event' ? 'selected' : '' ?>>Event</option>
					</select>
				</div>
				
			</div>
		</div>

			<div class="form-group  <?= $services['type'] != 'event' ? ' event-date-container' : '' ?> ">
			<div class="form-row">
				<div class="col parent-error">
					<label>Start Date</label>
					<input type="text" class="form-control" name="start_date" placeholder="Select Event Start date" id="start-date" value="<?= $services['startdate'] ? date('m/d/Y h:i A', $services['startdate']) : ''  ?>">
					<div class="error-msg"></div>
				</div>
				<div class="col parent-error">
					<label>End Date</label>
					<input type="text" class="form-control" name="end_date" placeholder="Select Event End date" id="end-date"  value="<?= $services['enddate'] ?  date('m/d/Y h:i A', $services['enddate']) : ''  ?>">
					<div class="error-msg"></div>
				</div>
			</div>
		</div>
	
	
<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Short Description</label>
					<textarea class="form-control" name="short_description" rows="7" id="short_description" placeholder="Short Description"><?= $services['short_description']?></textarea>
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>

		<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Description</label>
					<textarea class="form-control" name="description" rows="7" id="description" placeholder="Description"><?= $services['description']?></textarea>
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Slug</label>
					<input class="form-control" name="slug"  placeholder="Slug" value="<?=$services['slug'] ?>"/>
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
						<option value="1" <?= $services['status'] == 1 ? 'selected' : '' ?>>Active</option>
						<option value="0" <?= $services['status'] == 0 ? 'selected' : '' ?>>In Active</option>
					</select>
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Meta title</label>
					<input class="form-control" name="meta_title"  placeholder="Meta Title" value="<?=$services['meta_title'] ?>" />
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Meta Keywords</label>
					<input class="form-control" name="meta_keywords"  placeholder="Meta Keywords" value="<?=$services['meta_keywords'] ?>" />
					<div class="error-msg"></div>
				</div>
				
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col parent-error">
					<label>Meta Description</label>
					<input class="form-control" name="meta_description"  placeholder="Meta Description"  value="<?=$services['meta_description'] ?>"/>
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
					<img src="<?= base_url('assets/services/') . $services['image'] ?>" width="200">
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


		<input type="hidden" name="id" value="<?= $services['id'] ?>">
		<input type="hidden" name="image2" value="<?= $services['image'] ?>">
	</form>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script type="text/javascript">
	$(function(){

			$('#start-date').datetimepicker({
		  	 icons:{
	  	 		  time: 'icon-clock',
			      date: 'icon-calendar',
			      up: 'icon-chevron-up',
			      down: 'icon-chevron-down',
			      previous: 'icon-chevron-left',
			      next: 'icon-chevron-right',
			      today: 'icon-direction',
			      clear: 'icon-trash',
			      close: 'icon-cross'
		  	 }
    
		});
		$('#end-date').datetimepicker({
		  	 icons:{
	  	 		  time: 'icon-clock',
			      date: 'icon-calendar',
			      up: 'icon-chevron-up',
			      down: 'icon-chevron-down',
			      previous: 'icon-chevron-left',
			      next: 'icon-chevron-right',
			      today: 'icon-direction',
			      clear: 'icon-trash',
			      close: 'icon-cross'
		  	 }
    
		});

	$(document).on('change','.select-type',function(){
		if($(this).val() == 'event'){
			$('.event-date-container').show();
		}else{
			$('.event-date-container').hide();
		}
	});

	$('#description').summernote({
		height:300
	})
		$('#additional_description').summernote({
			height:300
		});
		$(document).on('submit', '#create-event-form', function(e){
			e.preventDefault();
			let _this = $(this);
			let form_data = new FormData(this);
			console.log('console.log');
			$.ajax({
				type: 'POST',
				url:"<?= base_url('admin/services/update');?>",
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
		//name fields focus event
		$(document).on('click', '[name]', function(e){
			//e.preventDefault();
			$(this).closest('.parent-error').find('.error-msg').html(``);
		});
	});
</script>
<?= $this->endSection() ?>
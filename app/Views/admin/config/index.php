<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>


<div>
	<h3>Configuration</h3>
	<hr>
</div>
<form class="form" id="config-form">
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>Tag Line</label>
				<input type="text" name="tag_line" class="form-control" placeholder="Tag Line" value="<?= $config_data[0]['tag_line'] ?? '' ?>">
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-6">
				<label>Logo</label>
				<input type="file" name="logo" class="form-control" placeholder="logo" accept="image/*">
			</div>
			<div class="col-6">
				<?php
					if(isset($config_data[0]['logo']) && !empty($config_data[0]['logo'])){
						echo '<img src="'.base_url('assets/images/'). $config_data[0]['logo'].'"  width="100" />';
					}
				?>
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-6">
				<label>Fav Icon</label>
				<input type="file" name="fav_icon" class="form-control" placeholder="Tag Line" accept="image/*">
			</div>
			<div class="col-6">
				<?php
					if(isset($config_data[0]['fav_icon']) && !empty($config_data[0]['fav_icon'])){
						echo '<img src="'.base_url('assets/images/'). $config_data[0]['fav_icon'].'" width="100" />';
					}
				?>
			</div>
		</div>
	</div>
<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>Tag Line</label>
				<input type="text" name="about_us_title" class="form-control" placeholder="About Us Title" value="<?= $config_data[0]['about_us_title'] ?? '' ?>">
			</div>
		</div>
	</div>
<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>About Us </label>
				<textarea class="form-control" name="about_us" id="about-us" placeholder="About Us" rows="10"><?= $config_data[0]['about_us'] ??  '' ?></textarea>
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-6">
				<label>About Us Image</label>
				<input type="file" name="about_us_image" class="form-control" placeholder="about_us_image" accept="image/*">
			</div>
			<div class="col-6">
				<?php
					if(isset($config_data[0]['about_us_image']) && !empty($config_data[0]['logo'])){
						echo '<img src="'.base_url('assets/images/'). $config_data[0]['about_us_image'].'"  width="100" />';
					}
				?>
			</div>
		</div>
	</div>

	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>Email(comma seperator for multiple email)</label>
				<input type="text" name="email" class="form-control" placeholder="email" value="<?= $config_data[0]['email'] ?? '' ?>">
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>Phone_no (comma seperator for multiple phone no)</label>
				<input type="text" name="phone_no" class="form-control" placeholder="Phone No" value="<?= $config_data[0]['phone_no'] ?? '' ?>">
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>Whats App No </label>
				<input type="text" name="whatsapp_no" class="form-control" placeholder="Whats App No" value="<?= $config_data[0]['whatsapp_no'] ?? '' ?>">
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>Address</label>
				<textarea name="address" class="form-control" placeholder="Address"  rows="5"><?= $config_data[0]['address'] ?? '' ?></textarea>
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>Insta link</label>
				<input type="text" name="insta_link" class="form-control" placeholder="Insta link"  value="<?= $config_data[0]['insta_link'] ?? '' ?>">
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>Twitter Link</label>
				<input type="text" name="x_link" class="form-control" placeholder="Twitter Link" value="<?= $config_data[0]['x_link'] ?? '' ?>">
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>Facebook link</label>
				<input type="text" name="facebook_link" class="form-control" placeholder="Facebook link" value="<?= $config_data[0]['facebook_link'] ?? '' ?>">
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>Linkedin</label>
				<input type="text" name="linkedin" class="form-control" placeholder="Linkedin" value="<?= $config_data[0]['linkedin'] ?? '' ?>">
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>youtube Video link</label>
				<input type="text" name="youtube_link" class="form-control" placeholder="youtube Video link" value="<?= $config_data[0]['youtube_link'] ?? '' ?>">
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<label>Geo Location</label>
				<input type="text" name="geo_location" class="form-control" placeholder="Geo Location Link" value="<?= $config_data[0]['geo_location'] ?? '' ?>">
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<input type="submit" name="submit" value="Submit" class="btn btn-info btn-submit">
			</div>
		</div>
	</div>
	<div  class="form-group">
		<div class="form-row">
			<div class="col-12">
				<div class="response-msg"></div>
			</div>
		</div>
	</div>
</form>

<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script type="text/javascript">
	$(function(){
		$('#about-us').summernote({
			 placeholder: 'About Us',
        tabsize: 2,
        height: 300,
		});
		$(document).on('submit', '#config-form', function(e){
			e.preventDefault();
			let form_data = new FormData(this);
			console.log('form_data ', form_data);
			$.ajax({
				type : 'POST',
				url : "<?= base_url('admin/config/store'); ?>",
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
            		console.log('res ', res);
            		if(res.status){
            			$('.response-msg').html(`<div class="alert alert-success">
								  <strong>Success!</strong> ${res.msg}.
								</div>`)
            		}else{
            			$('.response-msg').html(`<div class="alert alert-danger">
								  <strong>Error!</strong> ${res.msg}
								</div>`);
            		}
            		setTimeout(function(){
            			$('.response-msg').html(``);
            		},3000);
            		console.log('res ', res);
            	},
            	complete:function(){
            		$('.btn-submit').prop('disabled', false);
            		$('.btn-submit').val('Submit');
            	}
			});
		});
	});
</script>
<?= $this->endSection(); ?>
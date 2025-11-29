<?= $this->extend('front/master-layout') ?>
<?= $this->section('content') ?>
<section class="bg-light" id="user-dashboard">
     <style>
        .list-group-item.active {
    background: #619e90 !important;
}
.bg-warning {
    background: #06C167 !important;
}
 
    
    @media (max-width: 768px) {
        .main_flex_div {
            display: flex;
            flex-direction: column;
        }
        .inner_flex_div {
            min-width: 100% !important;
        }
        .modal-content {
            padding: 10px 0px !important;
            min-width: 95% !important;
            height: 700px;
            overflow: scroll;
        }
        .close {
            margin-right: 10px;
        }
    }
    
    
    
    </style>
    <?php include('trainer-alert.php'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
			<?php include('user-sidebar.php'); ?>
			</div>
				<div class="col-md-8">
			    <div class="left_sidebar">
			          <div  id="orderDetails" class="order_card">
                        <div class="card">
                            <div class="card-body">
                                <div class="top-status">
                                    <h5 class="mb-3">Profile </h5>
                                <form class="user-profile-form" id="user-profile-form">
                                    <div class="row">
                               
                                  <div class="form-group col-md-6 mb-4 has-error has-danger error-parent">
                                    <input type="text" name="name" class="form-control" id="fullname" placeholder="Enter Name" required="" value="<?= session()->get('name')?>">
                                    <div class="error-msg"></div>
                                   
                                </div>
                                <div class="form-group col-md-6 mb-4 has-error has-danger error-parent">
                                    <input type="file" name="profile_image" class="form-control" >

                                    <div class="user-profile-image" id="user-profile-image">
                                        
                                    </div>
                                    <div class="error-msg"></div>
                                   
                                </div>
                             

                                  <div class="form-group col-md-6 mb-4 has-error has-danger error-parent">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" readonly="" value="<?= session()->get('username')?>">
                                    <div class="error-msg"></div>
                                   
                                </div>
                    
                                <div class="form-group col-md-6 mb-4 error-parent">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" readonly="" value="<?= session()->get('email')?>">
                                    <div class="error-msg"></div>
                                   
                                </div>
                    
                                <div class="form-group col-md-6 mb-4 error-parent">
                                    <input type="text" name="phone_no" class="form-control" id="phone" placeholder="Contact No" required="" value="<?= session()->get('phone_no') ?>">
                                    <div class="error-msg"></div>
                                   
                                </div>
                    
                                <div class="form-group col-md-6 mb-4 error-parent">
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?= session()->get('address') ?>">
                                    <div class="error-msg"></div>
                                   
                                </div>

                                  <div class="form-group col-md-6 mb-4 error-parent">
                                    <input type="password" name="password" class="form-control" id="userpassword" placeholder="Password" >
                                    <div class="error-msg"></div>
                                   
                                </div>
                    
                                <div class="form-group col-md-6 mb-4 error-parent">
                                    <input type="password" name="crm_password" class="form-control" id="crm_password" placeholder="Confirm Password">
                                    <div class="error-msg"></div>
                                    <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">
                                   
                                </div>
                    
                               
                    
                                <div class="col-md-12 mb-4">
                                    <button type="submit" class="btn-default btn-submit">Submit</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>

                                <div class="col-md-12">
                                   <div class="res-msg"> </div>
                                </div>
                               
                            </div>
                             </form>
                                </div>
                            </div>
                        </div>
                       
			    </div>
			</div>
		</div>
    </div>
	</div>
</section>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script type="text/javascript">
    $(function(){
        $('#user-profile-image').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#user-profile-image').html(`<img src="${e.target.result}" width="200">`);
                }
                reader.readAsDataURL(file);
            }
        });

        $('#user-profile-form').validate({
            rules:{
          
            name:{
                required:true,
            },
            password:{
              
                 minlength:6
            },
            crm_password:{
                equalTo:'#userpassword'
            },
            address:{
                required:true
            }
           

        },
        messages:{
           
            name:{
                required:"Please enter name"
            }
           
           
        },
         errorPlacement: function(error, element) {
            console.log('error ', error);
            console.log('element ', element);
            $(element).closest('.error-parent').find('.error-msg').html(error);
            // Append the error message after the input field
           // error.insertAfter(element);
        },
        submitHandler:function(form){
            let formData = new FormData(form);
           let _this = $('#user-profile-form');
            $.ajax({
                type : 'POST',
                url:"<?= base_url('front/update-userprofile') ?>",
                data:formData,
                contentType: false, // Important for file uploads
                processData: false,
                dataType:'json',
                beforeSend:function(){
                    _this.find('[type="submit"]').prop('disabled', true);
                    _this.find('.loading').show();
                },
                success:function(res){
                    if(res.status){
                        $('.res-msg').html(`<span class="aler alert-success success">${res.msg}</span>`);
                        // _this[0].reset();
                    }else{
                         $('.res-msg').html(`<span class="aler alert-danger error">${res.msg}</span>`);
                    }
                },
                complete:function(){
                    _this.find('[type="submit"]').prop('disabled', false);
                    _this.find('.loading').hide();

                }

            });
            return false;
        }
        });
    });
</script>
<?= $this->endSection() ?>


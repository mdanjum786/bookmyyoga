<?= $this->extend('front/master-layout') ?>


<?= $this->section('content') ?>
<style type="text/css">
   /* :root {
            --primary-color: #0d6efd;
            --error-color: #dc3545;
            --success-color: #198754;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
*/
        .form-container {
            max-width: 400px;
            margin: 2rem auto;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            background-color: #ffffff;
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #344767;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(13,110,253,.15);
        }

        .password-wrapper {
            position: relative;
        }



        .password-strength {
            height: 5px;
            margin-top: 5px;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

      
        .success-message {
            display: none;
            margin-top: 1rem;
            animation: slideIn 0.5s ease;
        }

        .btn-primary {
            padding: 0.75rem 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13,110,253,.2);
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .loading {
            display: none;
            margin-left: 8px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .input-group-text {
            background-color: #f8f9fa;
            border: 2px solid #e9ecef;
            border-right: none;
        }

        .form-control.is-invalid {
            border-color: var(--error-color);
            background-image: none;
        }

        .form-control.is-valid {
            border-color: var(--success-color);
            background-image: none;
        }

        .progress {
            height: 4px;
            margin-top: 0.5rem;
        }
        .error-msg{
            color: red;
            font-size: 14px
        }
</style>
    <div class="page-header">
        <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Page Header Box Start -->
          <div class="page-header-box">
            <h1 class="text-anime-style-2" data-cursor="-opaque">Register</h1>
            <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
              </ol>
            </nav>
          </div>
          <!-- Page Header Box End -->
        </div>
      </div>
    </div>
  </div>
<div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Create Account</h2>
            <form id="registrationForm"  class="register-form" autocomplete="off">
                <div class="mb-3 error-parent">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="name" 
                           placeholder="Enter your full name" >
                    <div class="error-message error-msg" id="fullNameError"></div>
                </div>
                  <div class="mb-3 error-parent">
                    <label for="usertype" class="form-label">User Type</label>
                    <select name="usertype" class="form-control" >
                        <option value="">Select Type</option>
                        <option value="2">SITE USER</option>
                        <option value="3">YOGA STUDIO</option>
                        <option value="4">YOGA INSTRUCTOR</option>
                        <option value="5">YOGA INSTITUTE</option>
                    </select>
                    <div class="error-message error-msg" id="usertype"></div>
                </div>


                <div class="mb-3 error-parent">
                    <label for="useremail" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="useremail" name="email"
                           placeholder="Enter your email" autocomplete="off"  >
                    <div class="error-message error-msg" id="emailError"></div>
                </div>


                <div class="mb-3 error-parent">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"  
                           placeholder="username" autocomplete="off">
                    <div class="error-message error-msg" id="usernameError"></div>
                </div>

                <div class="mb-3 error-parent">
                    <label for="phone" class="form-label">Mobile Number</label>
                    <input type="tel" class="form-control" id="phone" name="mobile_no" 
                           placeholder="Enter your phone number" autocomplete="off" >
                    <div class="error-message error-msg" id="phoneError"></div>
                </div>

                <div class="mb-3 error-parent">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" autocomplete="off" name="password"  
                           placeholder="Enter password">
                    <div class="progress">
                        <div class="progress-bar" id="passwordStrength" role="progressbar"></div>
                    </div>
                    <!-- <small class="form-text text-muted" id="passwordHint">Password must be at least 8 characters long with numbers, letters, and special characters</small> -->
                    <div class="error-message error-msg" id="passwordError"></div>
                </div>

                <div class="mb-3 error-parent">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" autocomplete="off" class="form-control" id="confirmPassword" name="confirm_password" 
                           placeholder="Confirm your password">
                    <div class="error-message error-msg" id="confirmPasswordError"></div>
                </div>

                <div class="mb-4 form-check error-parent">
                    <input type="checkbox" class="form-check-input" id="terms" name="terms"   data-parsley-error-message="Please checked term and conditions">
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="<?= base_url('term-conditions')?>" >Terms and Conditions</a>
                    </label>
                    <div class="error-message error-msg" id="termsError"></div>
                </div>

                <button type="submit" class="btn  w-100" id="submitBtn" style="background: #619e90;color:#fff">
                    Create Account
                    <span class="loading">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </span>
                </button>
                <div>
                    Already have an account? <a href="<?= base_url('login')?>"> Sign In</a>
                </div>

                <div class="res-msg" id="successMessage" >
                   
                </div>
            </form>
        </div>
    </div>

    <!-- Terms and Conditions Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a><h5 class="modal-title" >Terms and Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please read these terms and conditions carefully before using our service.</p>
                    <!-- Add your terms content here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="acceptTerms()">Accept</button>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript">
    $(function(){
    $.validator.addMethod("noSpace", function (b, a) {
        return b.indexOf(" ") < 0 && b !== ""
    }, "Enter without any spaces .");
      $('#registrationForm').validate({
        rules:{
            'username':{
                required:true,
                noSpace:true,
                 remote: {
                    url: "<?= base_url('verify_user')?>", // URL to the server-side script
                    type: "post",
                    data: {
                        username: function() {
                            return $("#username").val(); // Send the username value
                        }
                    }
                }
            },
            name:{
                required:true,
            },
            email:{
                required:true,
                email:true,
                 remote: {
                    url: "<?= base_url('verify_email')?>", // URL to the server-side script
                    type: "post",
                    data: {
                        username: function() {
                            return $("#useremail").val(); // Send the username value
                        }
                    }
                }
            },
            password:{
                required:true,
                 minlength:6,
                 noSpace:true
            },
            confirm_password:{
                equalTo:'#password',
                noSpace:true
            },
            terms:{
                required:true
            }

        },
        messages:{
            username:{
                required:"Please enter username",
                remote:"username already exists"
            },
            name:{
                required:"Please enter name"
            },
            email:{
                required:"Please enter email",
                email:'Please enter valid email',
                remote:"Email id already exists"
            },
            mobile_no:{
                required:"Please enter mobile no"
            },
            terms:{
                required:'Please check term and conditions checkbox'
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
           let _this = $('#registrationForm');
            $.ajax({
                type : 'POST',
                url:"<?= base_url('register-user') ?>",
                data:_this.serialize(),
                dataType:'json',
                beforeSend:function(){
                    _this.find('[type="submit"]').prop('disabled', true);
                    _this.find('.loading').show();
                },
                success:function(res){
                    if(res.status){
                        $('.res-msg').html(`<span class="aler alert-success success">${res.msg}</span>`);
                        _this[0].reset();
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
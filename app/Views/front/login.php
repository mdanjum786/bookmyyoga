<?= $this->extend('front/master-layout') ?>


<?= $this->section('content') ?>
<style type="text/css">


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

        .error-message {
            color: var(--error-color);
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
            animation: fadeIn 0.3s ease;
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
</style>
    <div class="page-header">
        <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Page Header Box Start -->
          <div class="page-header-box">
            <h1 class="text-anime-style-2" data-cursor="-opaque">Login</h1>
            <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
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
            <h2 class="text-center mb-4">Login</h2>
            <form id="login-form" >
            

                <div class="mb-3 error-parent">
                    <label for="username" class="form-label">Email/Username </label>
                    <input type="text" class="form-control" id="username" name="username" 
                           placeholder="Enter your email/username">
                    <div class="error-msg" id="emailError"></div>
                </div>

             

                <div class="mb-3 error-parent">
                    <div  style="display: flex;justify-content: space-between;">
                        <label for="password" class="form-label">Password</label>
                        <a href="<?= base_url('forget-password')?>">Forget Password</a>
                    </div>
                    
                    <input type="password" class="form-control" id="password" name="password" required
                           placeholder="Create a strong password">
                    <div class="error-msg"></div>
                  
                </div>

              


                <button type="submit mb-3" class="btn  w-100" id="submitBtn" style="background: #619e90;
    color:#fff">
                    Login
                    <span class="loading">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </span>
                </button>
                <div class="text-center mb-3" >
                  Create New Account <a href="<?= base_url('register')?>">Sign Up</a>
                </div>
                <div class="res-msg"></div>

               <!--  <div class="alert alert-success success-message" id="successMessage" role="alert">
                    Account created successfully! Redirecting...
                </div> -->
            </form>
        </div>
    </div>

  
    <?= $this->endSection() ?>

    <?= $this->section('scripts') ?>
<script type="text/javascript">
    $(function(){
      $('#login-form').validate({
        rules:{
            'username':{
                required:true,
                
            },
           
            password:{
                required:true
            }

        },
        messages:{
            username:{
                required:"Please enter username"
            },
            
        },
         errorPlacement: function(error, element) {
            console.log('error ', error);
            console.log('element ', element);
            $(element).closest('.error-parent').find('.error-msg').html(error);
            // Append the error message after the input field
           // error.insertAfter(element);
        },
        submitHandler:function(form){
           let _this = $('#login-form');
            $.ajax({
                type : 'POST',
                url:"<?= base_url('auth') ?>",
                data:_this.serialize(),
                dataType:'json',
                beforeSend:function(){
                    _this.find('[type="submit"]').prop('disabled', true);
                    _this.find('.loading').show();
                },
                success:function(res){
                    if(res.status){
                        $('.res-msg').html(`<span class="aler alert-success success">${res.msg}</span>`);
                        window.location.href = "<?= base_url('dashboard')?>"
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
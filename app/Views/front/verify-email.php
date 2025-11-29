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
            max-width: 500px;
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
<!--     <div class="page-header">
        <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
       
          <div class="page-header-box">
            <h1 class="text-anime-style-2" data-cursor="-opaque">Register</h1>
            <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
              </ol>
            </nav>
          </div>
     
        </div>
      </div>
    </div>
  </div> -->
<div class="container">
        <div class="form-container">
            <h4 class="text-center mb-4">BookMyYoga</h4>
           <div class="text-center">
            <?php
                if($status){
                    ?>

                    <p><img src="<?= base_url('assets/front/images/check-mark.png')?>" width="20"> <?= $msg?></p>
                    <p style="display: flex;justify-content: space-between;">
                        <a href="<?= base_url('/')?>" class="btn btn-primary">Home</a>
                        <a href="<?= base_url('login')?>" class="btn btn-primary">Login</a>
                    </p>
                 <?php   
                }else{


                    ?>
                     <p><img src="<?= base_url('assets/front/images/wrong.png')?>" width="20"><?= $msg?> </p>
                    <?php
                }
            ?>
               
           </div>
        </div>
    </div>

    <?= $this->endSection() ?>

<?= $this->section('scripts') ?>

 <?= $this->endSection() ?>
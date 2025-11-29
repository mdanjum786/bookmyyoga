<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets');?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets');?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets');?>/dist/css/adminlte.min.css">
  <style type="text/css">
  	.p-type-change{
  		cursor: pointer;
  	}
    .response-msg{
      color: red;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Admin</b>Panel</a>
    </div>
    <div class="card-body">
      <p class="response-msg login-box-msg"></p>
      <p class="login-box-msg">Sign in to start your session</p>
     

      <form action="" method="post" autocomplete="off" class="login-form" id="login-form">
        <div class="input-group mb-3 parent-error">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="error-msg"></div>
        <div class="input-group mb-3 parent-error">
          <input type="password" autocomplete="off" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append p-type-change">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="error-msg"></div>
        <div class="row">
          <div class="col-7">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block btn-submit">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     <!--  <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

     <!--  <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
     <!--  <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('assets');?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets');?>/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
	$(function(){
		$(document).on('submit', '#login-form', function(e){
			e.preventDefault();
			let _this = $(this);
			$.ajax({
				type:'POST',
				url : "<?= base_url('admin/auth');?>",
				data : _this.serialize(),
        dataType:'json',
        beforeSend:function(){
          $('.btn-submit').prop('disabled', true);
          $('.btn-submit').text('Please Wait...');
        },
				success : function(res){
					console.log('res ', res);
          if(res.status){
            window.location.href = "<?= base_url('admin/dashboard');?>"
            return false
          }
          $('.response-msg').text(res.msg);
          setTimeout(function(){
             $('.response-msg').text('');
          },3000);
				},
        complete:function(){
          $('.btn-submit').prop('disabled', false);
          $('.btn-submit').text('Sign In');
        }
			});
		});
		$(document).on('click', '.p-type-change', function(e){
			e.preventDefault();
			
			if($(this).find('span').hasClass('fa-lock')){
				$(this).find('span').removeClass('fa-lock');
				$(this).find('span').addClass('fa-unlock');
				$('#login-form').find('[name="password"]').attr('type','text');
			}else{
				
				$(this).find('span').removeClass('fa-unlock');
				$(this).find('span').addClass('fa-lock');
				$('#login-form').find('[name="password"]').attr('type','password');
			}
		});
	});
</script>
</body>

</html>

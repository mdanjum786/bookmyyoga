
<?= $this->extend('front/master-layout') ?>
<?= $this->section('content') ?>
<style type="text/css">
  .error-msg{
    color:red;
  }
</style>
<!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-dark" data-bg-img="images/bg/bg2.jpg">
      <div class="container pt-30 pb-30">
        <!-- Section Content -->
        <div class="section-content text-center">
          <div class="row"> 
            <div class="col-md-6 col-md-offset-3 text-center">
              <h2 class="text-theme-colored font-36">BECOME A MEMBER</h2>
              <ol class="breadcrumb text-center mt-10 white">
                <li><a href="<?=base_url() ?>">Home</a></li>
                
                <li class="active">BECOME A MEMBER</li>
              </ol>
            </div>
          </div>
        </div>
      </div>      
    </section>

    <!-- Section: Features -->
<section id="contact" class="divider bg-silver-light">
  <div class="container pt-60 pb-60">
    <!-- <div class="section-title text-center">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="text-uppercase line-bottom-center mt-0">Contact Us</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
        </div>
      </div>
    </div> -->
    <div class="row pt-10">
      <div class="col-md-12">
        <div class="form_data">
        <!-- Contact Form -->
        <form id="contact_form" name="contact_form" class="" action="#" method="post">

          <div class="row">
            <div class="col-sm-3">
              <div class="form-group mb-30 error-parent">
                <label for="">Name</label>
                <input name="name" class="form-control required" type="text" placeholder="Enter Name" >
                 <div class="error-msg"></div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group mb-30 error-parent">
                <label for="">Email</label>
                <input name="email" class="form-control required email" type="email" placeholder="Enter Email"
                >
                 <div class="error-msg"></div>
              </div>
            </div>
         
            <div class="col-sm-3">
              <div class="form-group mb-30 error-parent">
                <label for="">Mobile Number</label>
                <input name="mobile_no" class="form-control required" type="text" placeholder="Enter mobile no"
                 >
                <div class="error-msg"></div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group mb-30 error-parent">
                 <label for="">Aadhar Number</label>
                <input name="aadhar_no" class="form-control" type="text" placeholder="Enter Aadhar No" >
                 <div class="error-msg"></div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group mb-30 error-parent">
                <label for="">Gender</label>
                <select name="gender" class="form-control" >
                  <option value="male">Male</option>
                  <option value="femail">Femail</option>
                </select>
                 <div class="error-msg"></div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group mb-30 error-parent">
                <label for="">Nationality</label>
                <input name="nationality" class="form-control" type="text" placeholder="Nationality" >
                 <div class="error-msg"></div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group mb-30 error-parent">
                  <label for="">City</label>
                <input name="city" class="form-control" type="text" placeholder="Enter City" >
                 <div class="error-msg"></div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group mb-30 error-parent">
                  <label for="">Pin Code</label>
                <input name="pincode" class="form-control" type="text" placeholder="Enter pincode" >
                <div class="error-msg"></div>
              </div>
              
            </div>
             <div class="col-sm-6">
                <div class="form-group error-parent">
                  <label for="">Profession</label>
                  <input type="text" name="profession" class="form-control" placeholder="Enter Profession" >
                 <div class="error-msg"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group error-parent">
                  <label for="">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" >
                 <div class="error-msg"></div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group error-parent">
                  <label for="">Address</label>
                  <textarea name="address" class="form-control required" rows="5" placeholder="Enter Message"
                    aria-required="true" ></textarea>
                    <div class="error-msg"></div>
                </div>
              </div>
            <div class="col-sm-3">
            <div class="form-group mb-30 error-parent">
              <label for="">Upload image</label>
              <input name="profile" class="form-control" type="file" >
               <div class="error-msg"></div>
            </div>
           <!--  <diV>
              <label class="input-preview" for="img">
                <input class="input-preview__src" name="img" id="img" type="file" />
              </label>
            </diV> -->
            </div>

          </div>

         
          <div class="form-group">
            <input name="form_botcheck" class="form-control" type="hidden" value="">
            <button type="submit"
              class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px btn-submit"
              data-loading-text="Please wait...">Submit</button>
            <button type="reset"
              class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px btn-reset">Reset</button>
          </div>
          <input type="hidden" name="front_signup" value="1">
        </form>
      </div>
        <!-- Contact Form Validation-->
        <script type="text/javascript">
          // $("#contact_form").validate({
          //   submitHandler: function (form) {
          //     var form_btn = $(form).find('button[type="submit"]');
          //     var form_result_div = '#form-result';
          //     $(form_result_div).remove();
          //     form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
          //     var form_btn_old_msg = form_btn.html();
          //     form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
          //     $(form).ajaxSubmit({
          //       dataType: 'json',
          //       success: function (data) {
          //         if (data.status == 'true') {
          //           $(form).find('.form-control').val('');
          //         }
          //         form_btn.prop('disabled', false).html(form_btn_old_msg);
          //         $(form_result_div).html(data.message).fadeIn('slow');
          //         setTimeout(function () { $(form_result_div).fadeOut('slow') }, 6000);
          //       }
          //     });
          //   }
          // });
          $(function(){
            console.log('member');
            $(document).on('submit', '#contact_form', function(e){
              e.preventDefault();
              let form_data = new FormData(this);
              $.ajax({
                type : 'POST',
                url: "<?= base_url('add-member') ?>",
                processData:false,
                contentType:false,
                cache:false,
                data : form_data,
                dataType:'json',
                beforeSend:function(){
                  $('.btn-submit').prop('disabled', true);
                  $('.btn-submit').text('Please Wait...');
                },
                success: function(res){
                  console.log('res  ', res);
                  if(res.status){
                    window.location.href = "<?= base_url('thankyou')?>";
                  }else{
                  
                    $.each(res.data,function(field, error ){
                       $(`[name="${field}"]`).addClass('error');
                      $(`[name="${field}"]`).closest('.error-parent').find('.error-msg').text(error);
                      console.log(field , error);
                    });
                  
                  }
                },
                complete: function(){
                  $('.btn-submit').prop('disabled', false);
                  $('.btn-submit').text('Submit');
                }

              })
            });
            //input fields event

            $(document).on('focus', '[name]', function(){
              $(this).removeClass('error');
              $(this).closest('.error-parent').find('.error-msg').text('');
            });
            $('#btn-reset').click(function(){
                $('#contact_form')[0].reset();
            });
          });
        </script>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
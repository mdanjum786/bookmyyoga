<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<style type="text/css">
  .error-msg{
    color: red;
  }
</style>
<div style="float: right;">
  <a href="<?php echo base_url('admin/member-list');?>" class="btn  btn-info" >Member List</a>
</div>
<h3>Add Member</h3>
<hr>
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
              <div class="col-sm-12">
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
           
            </div>

          </div>

         
          <div class="form-group">
            <input name="form_botcheck" class="form-control" type="hidden" value="">
            <button type="submit"
              class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px btn-submit btn btn-info"
              data-loading-text="Please wait...">Submit</button>
            <button type="reset"
              class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px btn-reset btn btn-info">Reset</button>
          </div>
  
        </form>
      </div>

 <?= $this->endSection() ?>
 <?=  $this->section('scripts')?>
 <script type="text/javascript">
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
                    alertify.alert('Member Addedd successfully');
                     $('#contact_form')[0].reset();
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

  <?= $this->endSection() ?>
<?= $this->extend('front/master-layout') ?>



<?= $this->section('content') ?>
     <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Page Header Box Start -->
          <div class="page-header-box">
            <h1 class="text-anime-style-2" >Contact Us</h1>
            <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
              </ol>
            </nav>
          </div>
          <!-- Page Header Box End -->
        </div>
      </div>
    </div>
  </div>



<div class="page-contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <!-- Contact Info Item Start -->
          <div class="contact-info-item wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <!-- Icon Box Start -->
             <div class="icon-box">
              <img src="<?= base_url('assets/front/')?>images/icon-green-location.svg" alt="">
             </div>
            <!-- Icon Box End -->

            <!-- Contact Info Content Start -->
            <div class="contact-info-content">
              <h3>location</h3>
              <p><?= $config_data[0]['address']; ?></p>
            </div>
            <!-- Contact Info Content End -->
          </div>
          <!-- Contact Info Item End -->
        </div>

        <div class="col-lg-4 col-md-6">
          <!-- Contact Info Item Start -->
          <div class="contact-info-item wow fadeInUp" data-wow-delay="0.25s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">
            <!-- Icon Box Start -->
             <div class="icon-box">
              <img src="<?= base_url('assets/front/')?>images/icon-green-mail.svg" alt="">
             </div>
            <!-- Icon Box End -->

            <!-- Contact Info Content Start -->
            <div class="contact-info-content">
              <h3>email</h3>
              <p><?= $config_data[0]['email']; ?></p>
            
            </div>
            <!-- Contact Info Content End -->
          </div>
          <!-- Contact Info Item End -->
        </div>

        <div class="col-lg-4 col-md-6">
          <!-- Contact Info Item Start -->
          <div class="contact-info-item wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
            <!-- Icon Box Start -->
             <div class="icon-box">
              <img src="<?= base_url('assets/front/')?>images/icon-green-phone.svg" alt="">
             </div>
            <!-- Icon Box End -->

            <!-- Contact Info Content Start -->
            <div class="contact-info-content">
              <h3>phone</h3>
              <p><?= $config_data[0]['phone_no']; ?></p>
              
            </div>
            <!-- Contact Info Content End -->
          </div>
          <!-- Contact Info Item End -->
        </div>

       
      </div>
    </div>
   </div>

   <div class="contact-us-form">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <!-- Contact Us Image Start -->
           <div class="contact-us-img">
            <figure class="reveal image-anime" style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
              <img src="<?= base_url('assets/front/')?>images/contact-us-img.jpg" alt="" style="transform: translate(0px, 0px);">
            </figure>
           </div>
          <!-- Contact Us Image End -->
        </div>
        <div class="col-lg-6">
          <div class="contact-form">
            <!-- Section Title Start -->
            <div class="section-title">
                            <h3 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">contact us</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque"><span><div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">G</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">t</div></div></span> <div style="position:relative;display:inline-block;"> <div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">I</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">n</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">T</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">o</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">u</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">c</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">h</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">W</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">i</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">t</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">h</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">U</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">s</div></div></h2>
                        </div>
                        <!-- Section Title End -->

            <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.25s" novalidate="true" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="name" class="form-control" id="fullname" placeholder="Enter Name" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                    
                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                    
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                    
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                    
                                <div class="form-group col-md-12 mb-5">
                                    <textarea name="msg" class="form-control" id="msg" rows="5" placeholder="Your Message" required=""></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                    
                                <div class="col-md-12">
                                    <button type="submit" class="btn-default disabled">send message</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>
                            </div>
                        </form>
          </div>
        </div>
      </div>
    </div>
  </div>




<!--   <div class="google-map">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                 
                    <div class="google-map-iframe">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96737.10562045308!2d-74.08535042841811!3d40.739265258395164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1703158537552!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                   
                </div>
            </div>
        </div>
    </div> -->
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript">
  $(function(){
    $(document).on('submit', '#contact_form1', function(e){
      e.preventDefault();
      let _this = $(this);
      $.ajax({
        type:'POST',
        url:"<?= base_url('send-email')?>",
        data:_this.serialize(),
        beforeSend:function(){
          _this.find('[type="submit"]').prop('disabled', true);
          _this.find('[type="submit"]').text('Please Wait.....');
        },
        dataType:'json',
        success:function(res){
          //Send your message
          if(res.status){
            $('.response-msg').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> ${res.msg}
    
</div>`)
          }else{
              $('.response-msg').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> ${res.msg}
   
</div>`)
          }
        },
        complete:function(){
           _this.find('[type="submit"]').prop('disabled', false);
          _this.find('[type="submit"]').text('Send your message');
        }

      });
    });
  });
</script>
<?= $this->endSection() ?>
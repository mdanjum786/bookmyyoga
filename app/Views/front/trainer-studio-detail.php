<?= $this->extend('front/master-layout') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>

<?= $this->section('content') ?>
<style type="text/css">
  .list-start{
    line-height: normal;
    display: inline-block;
    color: #fff;
    padding: 2px 4px 2px 6px;
    border-radius: 3px;
    font-weight: 500;
    font-size: 12px;
    vertical-align: middle;
    background-color: #388e3c
}


.mn-social-bottom-c {
   margin: calc(50vh - 23px) calc(50vw - 194px);
}
.mn-social-bottom-c p {
   margin: -85px 0 20px;
   text-align: center;
   font-family: "Playball", cursive;
   font-size: 25px;
   color: #5a5a5a;
}
.mn-social-bottom {
   background: #f5f5f5;
   width: 46px;
   height: 46px;
   box-sizing: border-box;
   padding: 10px 0 0;
   color: #619e90;
   border-radius: 4px;
   margin: 0 7.5px 15px;
   display: flex;
   align-items: center;
   transition: all 0.3s;
   font-size: 19px;
   display: inline-block;
   text-align: center;
   position: relative;
}
.mn-social-bottom i{
    font-size:24px;
}
.mn-social-bottom:hover {
   background: #619e90;
   color: #fff;
   top: -3px;
}
#mn-social-bottom-hidden {
   display: none;
}
.fa-plus {
   transition: -webkit-transform 0.3s;
}
.fa-plus.mn-social-r {
   -webkit-transform: rotate(45deg);
}








</style>
    <div class="page-header">
        <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Page Header Box Start -->
          <div class="page-header-box">
            <h1 class="text-anime-style-2" data-cursor="-opaque"><?= ucfirst('Trainers And Studio'); ?></h1>
            <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $trainer_data[0]['business_name']; ?></li>
              </ol>
            </nav>
          </div>
          <!-- Page Header Box End -->
        </div>
      </div>
    </div>
  </div>

  <div class="page-service-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Service Single Content Start -->
                    <div class="service-single-content">

                        <!-- Service Featured Image Start -->
                        <div class="service-featured-img">
                            <figure class="reveal image-anime" style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                                <!--<img src="<?//= base_url('assets/images/trainer-studio/') . $trainer_data[0]['banner_image']?>" alt="" style="transform: translate(0px, 0px);">-->
                                <img src="https://html.awaikenthemes.com/physiocare/images/service-single-img.jpg" alt=""  >
                            </figure>
                        </div>
                        <div>
                           <a href="javascript:void(0)" style="color: #696e72">
                                 <h2>
                                <span><i class="fa-solid fa-location-dot"></i></span> <?= $trainer_data[0]['address'] ?? '' ?> 
                                      <?php  if(isset($trainer_data[0]['cname']) && !empty($trainer_data[0]['cname'])){  ?>
                                        , <?= $trainer_data[0]['cname'] ?>
                                    <?php } ?></h2>
                                    </a>
                        </div>
                           
                        <div class="studeio-detail">
                      

                          <p> <?= $trainer_data[0]['about_us']?> </p>
                            
                        </div>
                        <!-- Service Entry Content End -->
                    </div>
                    <!-- Service Single Content End -->

                      <section class="products row list group" style="display:none">

                        <?php
                        if(count($trainers_and_studio)){
                          ?>
                           <div class="mb-3 mt-3"><h3>Trainer and studio list in <?= $trainer_data[0]['cname'] ?? '' ?></h3></div>
                          <?php

                        foreach($trainers_and_studio as $trainer){

                            $phoneNumber = $trainer['whatsapp_no'];
                            $message = "I am looking for yoga services ";
                            $encodedMessage = urlencode($message);
                            $whatsapp_url = "https://api.whatsapp.com/send?phone={$phoneNumber}&text={$encodedMessage}";
                            //echo $url;

                      ?>
                        <article class="product col-md-3 course-list-item" data-id="<?= $trainer['id'] ?>">
                            <div class="product__inner">

                                <section class="product__image">
                                  <a href="<?= base_url('trainers-and-studio/') . $trainer['slug']; ?>">
                                    <?php
                                        if(isset($trainer['banner_image']) && !empty($trainer['banner_image'])){


                                    ?>
                                    <img src="<?= base_url('assets/images/trainer-studio/') . $trainer['banner_image']?>" />
                                    <?php
                                } else{


                                    ?>
                                      <img src="<?= base_url('assets/images/trainer-studio/no-image.jpg')?>" />

                                <?php } ?>
                                    </a>
                                </section>

                                <div class="product__details">

                                    <section class="product__name mb-1">
                                        <a href="<?= base_url('trainers-and-studio/') . $trainer['slug']; ?>">
                                            <?= $trainer['business_name']?>
                                        </a>
             
           <!--  <div class="product__price "><span style="text-decoration: line-through;color:#d1c5c5">Rs.0.00</span> Rs.0.00</div>
           <p class="mb-1 star list-start">5<i class="fa fa-star" style="font-size: 9px;"></i> </p> -->

                                    </section>
                                    <section>
                                        <a href="<?= base_url('trainers-and-studio/') . $trainer['slug']; ?>" style="color: #696e72"> <span><i class="fa-solid fa-location-dot"></i></span> <?= $trainer['address'] ?? '' ?>
                                        <?php
                                            if(isset($trainer['cname']) && !empty($trainer['cname'])){


                                        ?>
                                        , <?= $trainer['cname'] ?>
                                    <?php } ?>
                                    </a>
                                    </section>

                             

                                    <section class="product__short_description">
                                        <a href="<?= base_url('trainers-and-studio/') . $trainer['slug']; ?>" style="color:#000">
                                          <?= substr(strip_tags($trainer['about_us']),0,100) ?? ''  ;?>
                                        </a>
                                    </section>

                                    <div class="btn_book">
                                        <a href="tel:<?= $trainer['mobile_no'] ?>" class="btn_bokt  "><img
                                                src="<?= base_url(); ?>assets/front/images/icon-phone.svg"> <?= $trainer['mobile_no'] ?></a>
                                           <!--  <a href="mailto:<?= $trainer['email'] ?>" class="btn_bokt  "><img
                                                src="<?= base_url(); ?>assets/front/images/icon-email.svg"></a> -->
                                        <a href="<?= $whatsapp_url?>" class=" btn_w  " target="_blanck"><i
                                                class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                                        <a href="javascript:void(0);" class=" btn_email btn-enquiry  " data-title="<?= $trainer['business_name']?>"><i
                                                class="fa fa-comment  "></i> Send Enquiry</a>
                                                
                                    </div>

                                </div>

                            </div>
                        </article>
                        <?php } }?>
                      


                    </section>
                      
                       <div class="sociasssl">
                          
   
                                   <a class="mn-social-bottom"><i class="fa-brands fa-facebook"></i></a>
                                   <a class="mn-social-bottom"><i class="fa-brands fa-twitter"></i></a>
                                   <a class="mn-social-bottom"><i class="fa-brands fa-linkedin"></i></a>
                                   <a class="mn-social-bottom"><i class="fa-brands fa-google-plus"></i></a>
                                   <a class="mn-social-bottom"><i class="fa-brands fa-pinterest-p"></i></a>
                                   <a class="mn-social-bottom" onclick="$('#mn-social-bottom-hidden').slideToggle();$('.fa-plus').toggleClass('mn-social-r')"><i class="fa fa-plus"></i></a>
                                   <div id="mn-social-bottom-hidden">
                                      <a class="mn-social-bottom"><i class="fa-brands fa-tumblr"></i></a>
                                      <a class="mn-social-bottom"><i class="fa-brands fa-get-pocket"></i></a>
                                      <a class="mn-social-bottom"><i class="fa-brands fa-stumbleupon"></i></a>
                                      <a class="mn-social-bottom"><i class="fa-brands fa-reddit"></i></a>
                                      <a class="mn-social-bottom"><i class="fa-brands fa-envelope"></i></a>
                                      <a class="mn-social-bottom"><i class="fa-brands fa-delicious"></i></a>
                                   </div>
                                </div>
                                                          
                     
                </div>
                <div class="col-lg-4">
                 <div class="service-sidebar">
                    <!-- Service Categories List Start -->
                    <div class="service-catagery-list wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                      <h3>Enquiry Now</h3>
                      <form id="appointmentForm" action="#" method="POST" data-toggle="validator" novalidate="true">
                        <div class="row">
                            <div class="form-group col-sm-12 mb-3">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required="">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-sm-12 mb-3">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required="">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-sm-12 mb-3 has-error has-danger">
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" required="">
                                <div class="help-block with-errors"></div>
                            </div>

                            

                            <!-- <div class="form-group col-md-12 mb-3">
                                <input type="date" name="date" class="form-control" id="date" required="">
                                <div class="help-block with-errors"></div>
                            </div> -->

                            <div class="form-group col-md-12 mb-3 has-error has-danger">
                                <textarea name="msg" id="msg" class="form-control" required="" rows="3" placeholder="Message"></textarea> 
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn-default disabled">Enquiry</button>
                                <div id="msgSubmit" class="h3 hidden"></div>
                            </div>
                        </div>
                    </form>
                      
                    </div>
                  
                    <div class="sidebar-cta-box wow fadeInUp" data-wow-delay="0.5s"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <!-- Cta Content Start -->
                        <div class="icon-box">
                            <img src="https://bmy.maalaxmielectrical.com/assets/front/images/icon-cta.svg" alt="">
                        </div>

                        <div class="cta-content">
                            <h3>Ready to Start Your Journey to Recovery?</h3>
                            <p>Contact us today to schedule your initial consultation and take the first step towards a
                                pain-free life.</p>
                        </div>
                        <!-- Cta Content End -->

                        <!-- Cta Appointment Button Start -->
                        <div class="cta-appointment-btn">
                            <a href="javascript:void(0);" class="btn-default book-apointment-btn">book appointment</a>
                        </div>
                        <!-- Cta Appointment Button End -->
                    </div>
                    <!-- Sidebar Cta Box End -->
                </div>
                    <!-- Service Sidebar End -->
                </div>
            </div>
        </div>
    </div>

<script>
    var url = window.location;
var title = document.title;
var mnsocial = document.getElementsByClassName('mn-social-bottom');
mnsocial[0].href = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
mnsocial[1].href = 'https://twitter.com/home?status=' + url + ' ' + title;
mnsocial[2].href = 'https://www.linkedin.com/shareArticle?mini=true&url=' + url;
mnsocial[3].href = 'https://plus.google.com/share?url=' + url;
mnsocial[4].href = 'https://pinterest.com/pin/create/link/?url=' + url;
mnsocial[6].href = 'https://www.tumblr.com/share/link?url=' + url;
mnsocial[7].href = 'https://getpocket.com/save?url=' + url;
mnsocial[8].href = 'http://www.stumbleupon.com/submit?url=' + url;
mnsocial[9].href = 'http://www.reddit.com/submit?url=' + url;
mnsocial[10].href = 'mailto:?&subject=' + url + '&body=' + title + ', ' + url;
mnsocial[11].href = 'https://delicious.com/share?url=' + url;
    
</script>


 
 <!-- Scrolling Ticker Section End -->
<?= $this->endSection() ?>


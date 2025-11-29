 <?= $this->extend('front/master-layout') ?>
 <?= $this->section('content') ?>
 <!-- Hero Section Start -->
  <?php
    if(count($sliders)){
    //     echo "<pre>";
    //     print_r($teams);
    //    // print_r($sliders);
    //     echo "</pre>";

   
  ?>
 <div class="hero bg-image hero-slider">
     <div class="hero-slider-layout">
         <div class="swiper">
             <div class="swiper-wrapper">
                 <!-- Hero Slide Start -->
                <?php
                    foreach($sliders as $slider){

                    
                ?>
                 <div class="swiper-slide">
                     <div class="hero-slide">
                         <!-- Slider Image Start -->
                         <div class="hero-slider-image">
                             <img src="<?= base_url('assets/sliders/') . $slider['image']?>" alt="slider image">
                         </div>
                         <!-- Slider Image End -->

                         <!-- Slider Content Start -->
                         <div class="container">
                             <div class="row align-items-center">
                                 <div class="col-lg-12">
                                     <!-- Hero Content Start -->
                                     <div class="hero-content">
                                         <!-- Section Title Start -->
                                         <div class="section-title">
                                           
                                             <h1 class="text-anime-style-2" data-cursor="-opaque">
                                                 <?= $slider['heading'] ?>
                                             </h1>
                                             <p class="wow fadeInUp" data-wow-delay="0.25s">
                                             <?= $slider['subheading'] ?>
                                             </p>
                                         </div>
                                         <!-- Section Title End -->

                                         <!-- Hero Content Body Start -->
                                         <div class="hero-content-body  wow fadeInUp" data-wow-delay="0.5s">
                                             <a href="#" class="btn-default">explore services</a>
                                             <!--<a href="javascript:void(0);" class="btn-default btn-highlighted book-apointment-btn">book appointment</a>-->
                                            <a href="#" class="btn-default">book appointment</a>
                                               <!--<a href="#" class="btn-default">book appointment</a>-->
                                         </div>
                                         <!-- Hero Content Body End -->
                                     </div>
                                     <!-- Hero Content End -->
                                 </div>
                             </div>
                         </div>
                         <!-- Slider Content End -->
                     </div>
                 </div>
                 <?php } ?>
                 <!-- Hero Slide End -->

              
             </div>
             <div class="swiper-pagination"></div>
         </div>
     </div>
 </div>
 <?php } ?>
 <!-- Hero Section End -->
<!-- Our Scrolling Ticker Section Start -->
 <div class="our-scrolling-ticker">
     <!-- Scrolling Ticker Start -->
     <div class="scrolling-ticker-box">
         <div class="scrolling-content">
             
             <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">For any additional inqueries1 :
                <?= $config_data[0]['email']?></span>
             <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">Book Appointment:<?= $config_data[0]['phone_no']?></span>
             
         </div>

         <div class="scrolling-content">
         <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">For any additional inqueries 2:
                <?= $config_data[0]['email']?></span>
             <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">Book Appointment:<?= $config_data[0]['phone_no']?></span>
             
         </div>
          <div class="scrolling-content">
         <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">For any additional inqueries 3:
                <?= $config_data[0]['email']?></span>
             <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">Book Appointment:<?= $config_data[0]['phone_no']?></span>
             
         </div>
          <div class="scrolling-content">
         <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">For any additional inqueries 4:
                <?= $config_data[0]['email']?></span>
             <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">Book Appointment:<?= $config_data[0]['phone_no']?></span>
             
         </div>
          <div class="scrolling-content">
         <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">For any additional inqueries 5:
                <?= $config_data[0]['email']?></span>
             <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">Book Appointment:<?= $config_data[0]['phone_no']?></span>
             
         </div>
     </div>
 </div>
 <!-- Scrolling Ticker Section End -->
 <!-- Home Contact Us Start -->
 <div class="home-contact-us">
     <div class="container">
         <div class="row">
             <div class="col-lg-4 col-md-6">
                 <!-- Contact Item Start -->
                 <div class="home-contact-item wow fadeInUp">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/'); ?>images/icon-home-contact-us-1.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Home Contact Content Start -->
                     <div class="home-contact-content">
                         <h3>expert Yoga Instructors</h3>
                         <p>Our team of licensed and certified Yoga Instructors</p>
                     </div>
                     <!-- Home Contact Content End -->
                 </div>
                 <!-- Contact Item End -->
             </div>

             <div class="col-lg-4 col-md-6">
                 <!-- Contact Item Start -->
                 <div class="home-contact-item wow fadeInUp" data-wow-delay="0.25s">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/'); ?>images/icon-home-contact-us-2.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Home Contact Content Start -->
                     <div class="home-contact-content">
                         <h3>Get Our service</h3>
                         <p>Our Yoga & Wellness services are designed according to you</p>
                     </div>
                     <!-- Home Contact Content End -->
                 </div>
                 <!-- Contact Item End -->
             </div>

             <div class="col-lg-4 col-md-6">
                 <!-- Contact Item Start -->
                 <div class="home-contact-item wow fadeInUp" data-wow-delay="0.5s">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/'); ?>images/icon-home-contact-us-3.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Home Contact Content Start -->
                     <div class="home-contact-content">
                         <h3>free consultant</h3>
                         <p>Our mission is to enhance the quality of people life</p>
                     </div>
                     <!-- Home Contact Content End -->
                 </div>
                 <!-- Contact Item End -->
             </div>
         </div>
     </div>
 </div>
 <!-- Home Contact Us End -->

 <!-- About Us Start -->
 <div class="about-us">
     <div class="container">
         <div class="row align-items-center">
                <div class="section-title col-md-12 text-center m-0">
                        
                  <h3 class="wow fadeInUp m-0"><?= $config_data[0]['about_us_title']?></h3>
             </div>
             <div class="col-lg-6">
                 <!-- About Image Start -->
                 <div class="about-us-image">
                     <div class="about-img">
                         <figure class="reveal image-anime">
                             <img src="<?= base_url('assets/front/'); ?>images/about-img.jpg" alt="">
                         </figure>

                         <!-- Company Experience Box Start -->
                         <div class="company-experience">
                             <div class="icon-box">
                                 <img src="<?= base_url('assets/front/')?>images/icon-experience.svg" alt="">
                             </div>
                             <div class="company-experience-content">
                                 <h3><span class="counter">12</span>+</h3>
                                 <p>years of experience</p>
                             </div>
                         </div>
                         <!-- Company Experience Box End -->
                     </div>
                 </div>
                 <!-- About Image End -->
             </div>
             <div class="col-lg-6">
                 <!-- About Us Content Start -->
                 <div class="about-content vddd">
                     <!-- Section Title Start -->
                     <div class="section-title">
                       
                        
                        <!--  <h2 class="text-anime-style-2" data-cursor="-opaque">We Are The Best For
                             <span>Physiotherapy</span>
                         </h2> -->
                         <p class="wow fadeInUp vvv" data-wow-delay="0.25s"><?= $config_data[0]['about_us']?></p>
                     </div>
                     <!-- Section Title End -->

                   

                     <!-- About Us Footer Start -->
                     <div class="about-us-footer d-none">
                         <!-- Doctor Info Start -->
                         <div class="doctor-info wow fadeInUp" data-wow-delay="1s">
                             <div class="doctor-info-item">
                                 <div class="image-box">
                                     <figure class="image-anime">
                                         <img src="<?= base_url('assets/front/')?>images/about-doctor-img.jpg" alt="">
                                     </figure>
                                 </div>
                                 <div class="doctor-info-content d-none">
                                     <h3>Trupthi </h3>
                                        <p>Yogacharya</p>
                                 </div>
                             </div>
                         </div>
                         <!-- Doctor Info End -->

                         <!-- Appointment Button Start -->
                         <div class="appointment-btn wow fadeInUp" data-wow-delay="1s">
                             <a href="javascript:void(0);" class="btn-default book-apointment-btn">Make an appointment</a>
                         </div>
                         <!-- Appointment Button End -->
                     </div>
                     <!-- About Us Footer End -->
                 </div>
                 <!-- About Us Content End -->
             </div>
         </div>
     </div>
 </div>
 <!--  About Us End -->

 <!-- Gallery Carousel Section Start -->
  <?php
  $gflag = false;
  if(count($gallery_images) && $gflag){

  ?>
 <div class="gallery-carousel">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- Scrolling Content Start -->
                 <div class="gallery-carousel-box">
                    <?php
                        for($i=1; $i<=2; $i++){

                    ?>
                     <div class="gallery-scrolling-content">
                         <!-- Image Item Start -->
                          <?php
                            foreach($gallery_images as $gal){

                           
                          ?>
                         <div class="gallery-image">
                             <figure class="image-anime">
                                 <img src="<?= base_url('assets/gallery/'). $gal['image']; ?>" alt="">
                             </figure>
                         </div>
                         <?php } ?>
                         <!-- Image Item End -->

                     </div>
                        <?php
                            }
                        ?>
                 
                 </div>
                 <!-- Scrolling Content End -->
             </div>
         </div>
     </div>

 </div>
 <?php
 }
 ?>
 <!-- Gallery Carousel Section End -->

 <!-- Our Service Start -->
  <?php
    if(count($services)){

        // echo "<pre>";
        // print_r($services);
        // echo "</pre>";
  ?>
 <div class="our-service serv_bg" >
     <div class="container">
         <div class="row align-items-center section-row">
             <div class="col-lg-7">
                 <!-- Section Title Start -->
                 <div class="section-title">
                     <h3 class="wow fadeInUp">Our Services</h3>
                     <h2 class="text-anime-style-2" data-cursor="-opaque"><span>We Provide</span> The Best Services
                     </h2>
                 </div>
                 <!-- Section Title End -->
             </div>

             <div class="col-lg-5">
                 <!-- Section Button Start -->
                 <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
                     <a href="<?= base_url('services')?>" class="btn-default">view all services</a>
                 </div>
                 <!-- Section Button End -->
             </div>
         </div>

         <div class="row">
            <?php
              $i = 0;
                foreach($services as $service){
               
            ?>
             <div class="col-lg-3 col-md-6">
                 <!-- Service Item Start -->
                 <div class="service-item br_5 p-1 wow fadeInUp" data-wow-delay="<?= $i; ?>s">
                     <!-- Icon Box Start -->
                     <div class="service_img">
                        <a href="<?= base_url('services/'). $service['slug']; ?>"> <img src="<?= base_url('assets/services/'). $service['image']?>" alt="br_5" class="br_5"></a>
                     </div>
                     <!-- Icon Box End -->

                     <!-- Service Body Start -->
                    <div  style="padding:10px;" class="servi_ce_d">
                      <div class="service-body m-0">
                         <a href="<?= base_url('services/'). $service['slug']; ?>"><h5><?= $service['title']?></h5></a>
                         <!-- <p>We understand that injuries and acute pain can unexpectedly. Our emergency physiotherapy.
                         </p> -->
                     </div>
                     <!-- Service Body End -->

                     <!-- Service Footer Start -->
                     <div class="service-footer" >
                         <a href="<?= base_url('services/'). $service['slug']; ?>" class="service-btn"><img src="<?= base_url('assets/front/')?>images/arrow-white.svg" alt="">
                         </a>
                     </div>
                    </div>
                    
                     <!-- Service Footer End -->
                 </div>
                 <!-- Service Item End -->
             </div>
            <?php
              $i = $i+0.2;
            }
          ?>
    


             <div class="col-lg-12 d-none">
                 <!-- Service Item Start -->
                 <div class="service-item service-cta-item wow fadeInUp" data-wow-delay="1.2s">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/')?>images/icon-cta.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Service Body Start -->
                     <div class="service-body">
                         <h3>ready to start your wellness journey to recovery?</h3>
                         <p>We understand that illness and bad helth can unexpectedly.Our Health Experts.
                         </p>
                     </div>
                     <!-- Service Body End -->

                     <!-- Service Footer Start -->
                     <div class="service-cta-btn">
                         <a href="javascript:void(0);" class="btn-default book-apointment-btn">Book Appointment</a>
                     </div>
                     <!-- Service Footer End -->
                 </div>
                 <!-- Service Item End -->
             </div>
         </div>
     </div>
 </div>
 <?php
    }
 ?>
 <!-- Our Service End -->

 <!-- Solution Your Plan Start -->
 <div class="solution-your-plan">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-lg-6">
                 <!-- Solution Plan Image Start -->
                 <div class="solution-plan-image">
                     <div class="solution-plan-img-1">
                         <figure class="image-anime reveal">
                             <img src="<?= base_url('assets/front/')?>images/solution-plan-img-1.jpg" alt="">
                         </figure>
                     </div>

                     <div class="solution-plan-img-2">
                         <figure class="image-anime reveal">
                             <img src="<?= base_url('assets/front/')?>images/solution-plan-img-2.jpg" alt="">
                         </figure>
                     </div>
                 </div>
                 <!-- Solution Plan Image End -->
             </div>
             <div class="col-lg-6">
                 <!-- Solution Plan Content Start -->
                 <div class="solution-plan-content">
                     <!-- Section Title Start -->
                     <div class="section-title">
                         <h3 class="wow fadeInUp">solution to your plan</h3>
                         <h2 class="text-anime-style-2" data-cursor="-opaque"> <span>We Proudly</span> Give Quality
                             Services</h2>
                         <p class="wow fadeInUp" data-wow-delay="0.25s">Start your journey to yoga and  wellness today. Whether you're a beginner or an experienced practitioner, we have a class or service for you. Book a session or drop in to experience the benefits of yoga and holistic healing</p>
                     </div>
                     <!-- Section Title End -->

                     <!-- Solution Plan Body Start -->
                     <div class="solution-plan-body wow fadeInUp" data-wow-delay="0.5s">
                         <ul>
                             <li>Experienced Instructors.</li>
                             <li>Holistic Approach.</li>
                             <li>Ayurvedic Consultations.</li>
                         </ul>
                     </div>
                     <!-- Solution Plan Body End -->

                     <!-- Solution Plan Counter Start -->
                     <div class="solution-plan-counter">
                         <div class="row">
                             <div class="col-lg-4 col-md-4">
                                 <!-- Solution Counter Item Start -->
                                 <div class="solution-counter-item">
                                     <div class="icon-box">
                                         <img src="<?= base_url('assets/front/')?>images/icon-solution-counter-1.svg" alt="">
                                     </div>

                                     <div class="solution-counter-content">
                                         <h3><span class="counter">100</span>+</h3>
                                         <p>skilled Trainers</p>
                                     </div>
                                 </div>
                                 <!-- Solution Counter Item End -->
                             </div>

                             <div class="col-lg-4 col-md-4">
                                 <!-- Solution Counter Item Start -->
                                 <div class="solution-counter-item">
                                     <div class="icon-box">
                                         <img src="<?= base_url('assets/front/')?>images/icon-solution-counter-2.svg" alt="">
                                     </div>

                                     <div class="solution-counter-content">
                                         <h3><span class="counter">98</span>%</h3>
                                         <p>success rate</p>
                                     </div>
                                 </div>
                                 <!-- Solution Counter Item End -->
                             </div>

                             <div class="col-lg-4 col-md-4">
                                 <!-- Solution Counter Item Start -->
                                 <div class="solution-counter-item">
                                     <div class="icon-box">
                                         <img src="<?= base_url('assets/front/')?>images/icon-solution-counter-3.svg" alt="">
                                     </div>

                                     <div class="solution-counter-content">
                                         <h3><span class="counter">1000</span>+</h3>
                                         <p>Happy Client</p>
                                     </div>
                                 </div>
                                 <!-- Solution Counter Item End -->
                             </div>
                         </div>
                     </div>
                     <!-- Solution Plan Counter End -->
                 </div>
             </div>
             <!-- Solution Plan Content End -->
         </div>
     </div>
 </div>
 <!-- Solution Your Plan End -->

 <!-- Why Choose Us Start -->
 <div class="why-choose-us">
     <div class="container">
         <div class="row section-row">
             <!-- Section Title Start -->
             <div class="section-title">
                 <h3 class="wow fadeInUp">why us</h3>
                 <h2 class="text-anime-style-2" data-cursor="-opaque"><span>Excellence In</span> Care And
                     Rehabilitation</h2>
             </div>
             <!-- Section Title End -->
         </div>

         <!-- Why Choose Us Box Start -->
         <div class="why-choose-us-box">
             <div class="row no-gutters align-items-center">
                 <div class="col-lg-6">
                     <!-- Why Choose Box Start -->
                     <div class="why-choose-box-1">
                         <!-- Why Choose Item Start -->
                         <div class="why-choose-item wow fadeInUp">
                             <!-- Icon Box Start -->
                             <div class="icon-box">
                                 <img src="<?= base_url('assets/front/')?>images/icon-why-us-1.svg" alt="">
                             </div>
                             <!-- Icon Box End -->

                             <!-- Why Choose Content Start -->
                             <div class="why-choose-content">
                                 <h3>Experienced Instructors</h3>
                                 <p>Certified teachers with years of expertise..</p>
                             </div>
                             <!-- Why Choose Content End -->
                         </div>
                         <!-- Why Choose Item End -->

                         <!-- Why Choose Item Start -->
                         <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s">
                             <!-- Icon Box Start -->
                             <div class="icon-box">
                                 <img src="<?= base_url('assets/front/')?>images/icon-why-us-2.svg" alt="">
                             </div>
                             <!-- Icon Box End -->

                             <!-- Why Choose Content Start -->
                             <div class="why-choose-content">
                                 <h3>Meditation & Mindfulness Coaching</h3>
                                 <p>Cultivate inner peace and focus..</p>
                             </div>
                             <!-- Why Choose Content End -->
                         </div>
                         <!-- Why Choose Item End -->

                         <!-- Why Choose Item Start -->
                         <div class="why-choose-item wow fadeInUp" data-wow-delay="0.5s">
                             <!-- Icon Box Start -->
                             <div class="icon-box">
                                 <img src="<?= base_url('assets/front/')?>images/icon-why-us-3.svg" alt="">
                             </div>
                             <!-- Icon Box End -->

                             <!-- Why Choose Content Start -->
                             <div class="why-choose-content">
                                 <h3>expertise and experience</h3>
                                 <p>Internationally Certified teachers with years of expertise..</p>
                             </div>
                             <!-- Why Choose Content End -->
                         </div>
                         <!-- Why Choose Item End -->
                     </div>
                     <!-- Why Choose Box End -->
                 </div>

                 <div class="col-lg-6">
                     <!-- Why Choose Box Start -->
                     <div class="why-choose-box-2">
                         <!-- Why Choose Item Start -->
                         <div class="why-choose-item wow fadeInUp">
                             <!-- Icon Box Start -->
                             <div class="icon-box">
                                 <img src="<?= base_url('assets/front/')?>images/icon-why-us-4.svg" alt="">
                             </div>
                             <!-- Icon Box End -->

                             <!-- Why Choose Content Start -->
                             <div class="why-choose-content">
                                 <h3>Restorative Yoga</h3>
                                 <p>Deep relaxation and healing through passive stretching.</p>
                             </div>
                             <!-- Why Choose Content End -->
                         </div>
                         <!-- Why Choose Item End -->

                         <!-- Why Choose Item Start -->
                         <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s">
                             <!-- Icon Box Start -->
                             <div class="icon-box">
                                 <img src="<?= base_url('assets/front/')?>images/icon-why-us-5.svg" alt="">
                             </div>
                             <!-- Icon Box End -->

                             <!-- Why Choose Content Start -->
                             <div class="why-choose-content">
                                 <h3>Private Sessions</h3>
                                 <p>Personalized yoga instruction tailored to your needs.</p>
                             </div>
                             <!-- Why Choose Content End -->
                         </div>
                         <!-- Why Choose Item End -->

                         <!-- Why Choose Item Start -->
                         <div class="why-choose-item wow fadeInUp" data-wow-delay="0.5s">
                             <!-- Icon Box Start -->
                             <div class="icon-box">
                                 <img src="<?= base_url('assets/front/')?>images/icon-why-us-6.svg" alt="">
                             </div>
                             <!-- Icon Box End -->

                             <!-- Why Choose Content Start -->
                             <div class="why-choose-content">
                                 <h3>community involvement</h3>
                                 <p>A supportive and welcoming space for all levels.</p>
                             </div>
                             <!-- Why Choose Content End -->
                         </div>
                         <!-- Why Choose Item End -->
                     </div>
                     <!-- Why Choose Box End -->
                 </div>

                 <div class="col-lg-12">
                     <!-- Why Choose Image Start -->
                     <div class="why-choose-image">
                         <img src="<?= base_url('assets/front/')?>images/why-us-img.png" alt="">
                     </div>
                     <!-- Why Choose Image End -->
                 </div>
             </div>
         </div>
         <!-- Why Choose Us Box End -->
     </div>
 </div>
 <!-- Why Choose Us End -->

 <!-- Need Attention Start -->
 <div class="need-attention parallaxie">
     <div class="container">
         <div class="row section-row">
             <!-- Section Title Start -->
             <div class="section-title">
                 <h3 class="wow fadeInUp">need attention</h3>
                 <h2 class="text-anime-style-2" data-cursor="-opaque">Where Do You Need Attention?</h2>
                 <p class="wow fadeInUp" data-wow-delay="0.25s">We understand that illness and bad health can happen
                     unexpectedly. Our Yoga & Wellness services are designed to provide prompt and effective
                     care to help you manage.</p>
             </div>
             <!-- Section Title End -->
         </div>

         <div class="row">
             <div class="col-lg-4 col-md-4 col-6">
                 <!-- Need Attention List Start -->
                 <div class="need-attention-list wow fadeInUp">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/')?>images/icon-need-attention-1.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Need Attention Content Start -->
                     <div class="need-attention-content">
                         <p>neck pain</p>
                     </div>
                     <!-- Need Attention Content End -->
                 </div>
                 <!-- Need Attention List End -->
             </div>

             <div class="col-lg-4 col-md-4 col-6">
                 <!-- Need Attention List Start -->
                 <div class="need-attention-list wow fadeInUp">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/')?>images/icon-need-attention-2.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Need Attention Content Start -->
                     <div class="need-attention-content">
                         <p>shoulder pain</p>
                     </div>
                     <!-- Need Attention Content End -->
                 </div>
                 <!-- Need Attention List End -->
             </div>

             <div class="col-lg-4 col-md-4 col-6">
                 <!-- Need Attention List Start -->
                 <div class="need-attention-list wow fadeInUp">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/')?>images/icon-need-attention-3.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Need Attention Content Start -->
                     <div class="need-attention-content">
                         <p>hip pain</p>
                     </div>
                     <!-- Need Attention Content End -->
                 </div>
                 <!-- Need Attention List End -->
             </div>

             <div class="col-lg-4 col-md-4 col-6">
                 <!-- Need Attention List Start -->
                 <div class="need-attention-list wow fadeInUp" data-wow-delay="0.25s">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/')?>images/icon-need-attention-4.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Need Attention Content Start -->
                     <div class="need-attention-content">
                         <p>knee pain</p>
                     </div>
                     <!-- Need Attention Content End -->
                 </div>
                 <!-- Need Attention List End -->
             </div>

             <div class="col-lg-4 col-md-4 col-6">
                 <!-- Need Attention List Start -->
                 <div class="need-attention-list wow fadeInUp" data-wow-delay="0.25s">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/')?>images/icon-need-attention-5.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Need Attention Content Start -->
                     <div class="need-attention-content">
                         <p>elbow pain</p>
                     </div>
                     <!-- Need Attention Content End -->
                 </div>
                 <!-- Need Attention List End -->
             </div>

             <div class="col-lg-4 col-md-4 col-6">
                 <!-- Need Attention List Start -->
                 <div class="need-attention-list wow fadeInUp" data-wow-delay="0.25s">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/')?>images/icon-need-attention-6.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Need Attention Content Start -->
                     <div class="need-attention-content">
                         <p>tricep pain</p>
                     </div>
                     <!-- Need Attention Content End -->
                 </div>
                 <!-- Need Attention List End -->
             </div>

             <div class="col-lg-4 col-md-4 col-6">
                 <!-- Need Attention List Start -->
                 <div class="need-attention-list wow fadeInUp" data-wow-delay="0.5s">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/')?>images/icon-need-attention-7.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Need Attention Content Start -->
                     <div class="need-attention-content">
                         <p>hand pain</p>
                     </div>
                     <!-- Need Attention Content End -->
                 </div>
                 <!-- Need Attention List End -->
             </div>

             <div class="col-lg-4 col-md-4 col-6">
                 <!-- Need Attention List Start -->
                 <div class="need-attention-list wow fadeInUp" data-wow-delay="0.5s">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/')?>images/icon-need-attention-8.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Need Attention Content Start -->
                     <div class="need-attention-content">
                         <p>foot pain</p>
                     </div>
                     <!-- Need Attention Content End -->
                 </div>
                 <!-- Need Attention List End -->
             </div>

             <div class="col-lg-4 col-md-4 col-6">
                 <!-- Need Attention List Start -->
                 <div class="need-attention-list wow fadeInUp" data-wow-delay="0.5s">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/')?>images/icon-need-attention-9.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Need Attention Content Start -->
                     <div class="need-attention-content">
                         <p>ankle pain</p>
                     </div>
                     <!-- Need Attention Content End -->
                 </div>
                 <!-- Need Attention List End -->
             </div>
         </div>
     </div>
 </div>
 <!-- Need Attention End -->

 <!-- Our Team Start -->
  <?php
    if(count($teams)){

   
  ?>
 <div class="our-team">
     <div class="container">
         <div class="row align-items-center section-row">
             <div class="col-lg-12">
                 <!-- Section Title Start -->
                 <div class="section-title text-center">
                     <h3 class="wow fadeInUp">Experienced team</h3>
                     <h2 class="text-anime-style-2" data-cursor="-opaque"><span>Our Dedicated</span> & Experienced
                         Team</h2>
                 </div>
                 <!-- Section Title End -->
             </div>

           <!--   <div class="col-lg-3">
                
                 <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
                     <a href="#" class="btn-default">view all team</a>
                 </div>
               
             </div> -->
         </div>

         <div class="row">
                <div class="testimonial-slider">
                     <div class="swiper">
                         <div class="swiper-wrapper" data-cursor-text="Drag">
            <?php
                foreach($teams as $team){

                
            ?>
            <div class="swiper-slide">
                                  
                           
             <div class="new">
                 <!-- Team Member Item Start -->
                 <div class="team-member-item wow fadeInUp">
                     <!-- Team Image Start -->
                     <div class="team-image">
                         <figure class="image-anime">
                             <img src="<?= base_url('assets/team/') . $team['image']?>" alt="">
                         </figure>

                     </div>
                 

                     <!-- Team Content Start -->
                     <div class="team-content">
                         <h3><?= $team['name']?></h3>
                         <p><?=$team['designation']?></p>
                     </div>
                     <!-- Team Content End -->
                 </div>
                 <!-- Team Member Item End -->
             </div>
               </div>
             
            <?php } ?>
             </div>
                         <div class="swiper-pagination mt-2"></div>
                     </div>
                 </div>
         </div>
     </div>
 </div>
 <?php
    }
 ?>
 <!-- Our Team End -->

<!----vedio---->
 <div class="our_vedio">
     <div class="container">
         <div class="row section-row align-items-center">
             <div class="col-lg-12">
                 <!-- Section Title Start -->
                 <div class="section-title text-center">
                 
                     <h2 class="text-anime-style-2 text-white"  ><b>Our Vedio</b>  </h2>
                 </div>
                 <!-- Section Title End -->
             </div>

            
         </div>


         <div class="row">
              <div class="testimonial-slider">
                     <div class="swiper">
                         <div class="swiper-wrapper" data-cursor-text="Drag">
              <div class=" swiper-slide">
                 <!-- Blog Item Start -->
                 <div class="blog-item wow fadeInUp">
                     <!-- Post Featured Image Start-->
                     <div class="post_featured-image"  >
                         <iframe width="100%" height="250" src="https://www.youtube.com/embed/MMHJR0ZwpQw" title="BOOKMYYOGA || DIABETES || YOGA TIPS BY ANIL CHOUHAN" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                     </div>
                      </div> 
             </div>
             <!-- Blog Item End -->
             <div class=" swiper-slide">
                 <!-- Blog Item Start -->
                 <div class="blog-item wow fadeInUp">
                     <!-- Post Featured Image Start-->
                     <div class="post_featured-image"  >
                       <iframe width="100%" height="250" src="https://www.youtube.com/embed/qUpdLBP2JLg" title="BOOKMYYOGA || BACKPAIN || YOGA TIPS BY ANANYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                     </div>
                      </div> 
             </div>
             <!-- Blog Item End -->
             <div class=" swiper-slide">
                 <!-- Blog Item Start -->
                 <div class="blog-item wow fadeInUp">
                     <!-- Post Featured Image Start-->
                     <div class="post_featured-image"  >
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/7tJoKPpDVy0" title="YOGA WITH ANANYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                     </div>
                      </div> 
             </div>
             <!-- Blog Item End -->
               <div class=" swiper-slide">
                 <!-- Blog Item Start -->
                 <div class="blog-item wow fadeInUp">
                     <!-- Post Featured Image Start-->
                     <div class="post_featured-image"  >
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/7tJoKPpDVy0" title="YOGA WITH ANANYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                     </div>
                      </div> 
             </div>
             <!-- Blog Item End -->
               </div>
                      </div> 
             </div>
         </div>
     </div>
 </div>
<!----vedio---->

 <!-- Client Testimonial Start -->
  <?php
    if(count($testimonials)){

   
  ?>
 <div class="our-testimonial parallaxie pt-5">
     <div class="container">
         <div class="row section-row">
             <div class="col-lg-12">
                 <!-- Section Title Start -->
                 <div class="section-title">
                     <h3 class="wow fadeInUp">review</h3>
                     <h2 class="text-anime-style-2" data-cursor="-opaque"><span>What</span> Our Client Say</h2>
                 </div>
                 <!-- Section Title End -->
             </div>
         </div>

         <div class="row">
             <div class="col-lg-12">
                 <!-- Testimonial Slider Start -->
                 <div class="testimonial-slider">
                     <div class="swiper">
                         <div class="swiper-wrapper" data-cursor-text="Drag">
                             <!-- Testimonial Slide Start -->
                              <?php
                                foreach($testimonials as $test){

                              
                              ?>
                             <div class="swiper-slide">
                                 <div class="testimonial-item">
                                     <div class="testimonial-header">
                                        <?php
                                            if(!empty($test['stars'])){

                                           
                                        ?>
                                         <div class="testimonial-rating">
                                        
                                            <?php
                                                switch($test['stars']){
                                                    case 1:
                                                        echo ' <i class="fa-solid fa-star"></i>';
                                                        break;
                                                    case 1.5:
                                                        echo ' <i class="fa-solid fa-star"></i>
                                                         <i class="fa-solid fa-star-half-stroke"></i>';
                                                        break;
                                                    case 2:
                                                        echo ' <i class="fa-solid fa-star"></i>
                                                         <i class="fa-solid fa-star"></i>
                                                        ';
                                                        break;
                                                    case 2.5:
                                                        echo ' <i class="fa-solid fa-star"></i>
                                                         <i class="fa-solid fa-star"></i>
                                                          <i class="fa-solid fa-star-half-stroke"></i>
                                                         ';
                                                        break;
                                                    case 3:
                                                        echo ' <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                       
                                                        ';
                                                        break;
                                                    case 3.5:
                                                        echo ' <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half-stroke"></i>
                                                        ';
                                                        break;
                                                    case 4:
                                                        echo ' <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>

                                                        ';
                                                        break;
                                                    case 4.5:
                                                        echo ' <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half-stroke"></i>
                                                        ';
                                                        break;
                                                    case 5:
                                                        echo ' <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        ';
                                                        break;
                                                   
                                                            
                                                }

                                               
                                            ?>
                                             <!-- <i class="fa-solid fa-star"></i>
                                           
                                             <i class="fa-solid fa-star"></i>
                                             <i class="fa-solid fa-star"></i>
                                             <i class="fa-solid fa-star"></i>
                                             <i class="fa-solid fa-star"></i> -->
                                         </div>
                                         <?php
                                            }
                                ?>
                                         <div class="testimonial-content">
                                             <p>
                                                <?= $test['testimonials']?>
                                             </p>
                                         </div>
                                     </div>
                                     <div class="testimonial-body">
                                         <div class="author-image">
                                             <figure class="image-anime">
                                                 <img src="<?= base_url('assets/testimonials/'). $test['image'];?>" alt="">
                                             </figure>
                                         </div>
                                         <div class="author-content">
                                             <h3><?= $test['name']; ?></h3>
                                             <p><?= $test['designation']; ?></p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <?php } ?>
                             <!-- Testimonial Slide End -->

                         </div>
                         <div class="swiper-pagination"></div>
                     </div>
                 </div>
                 <!-- Testimonial Slider End -->
             </div>
         </div>
     </div>
 </div>
 <?php  } ?>
 <!-- Client Testimonial End -->

 <!-- Our Blog Section End -->
 <?php
    if(count($posts)){


 ?>
 <div class="our-blog">
     <div class="container">
         <div class="row section-row align-items-center">
             <div class="col-lg-9">
                 <!-- Section Title Start -->
                 <div class="section-title">
                     <h3 class="wow fadeInUp">news & blog</h3>
                     <h2 class="text-anime-style-2" data-cursor="-opaque"><span>Our Latest</span> Insights And
                         Updates</h2>
                 </div>
                 <!-- Section Title End -->
             </div>

             <div class="col-lg-3">
                 <!-- Section Button Start -->
                 <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
                     <a href="<?= base_url('blogs'); ?>" class="btn-default">view all blog</a>
                 </div>
                 <!-- Section Button End -->
             </div>
         </div>

         <div class="row">
            <?php
                foreach($posts as $post){


            ?>
             <div class="col-lg-4 col-md-6">
                 <!-- Blog Item Start -->
                 <div class="blog-item wow fadeInUp">
                     <!-- Post Featured Image Start-->
                     <div class="post-featured-image" data-cursor-text="View">
                         <figure>
                             <a href="#" class="image-anime">
                                 <img src="<?= base_url('assets/posts/') . $post['image']; ?>" alt="">
                             </a>
                         </figure>
                     </div>
                     <!-- Post Featured Image End -->

                     <!-- post Item Content Start -->
                     <div class="post-item-content">
                         <!-- post Item Body Start -->
                         <div class="post-item-body">
                             <h2><a href="<?= base_url('blogs/') . $post['slug']; ?>"><?= $post['title']?></a></h2>
                         </div>
                         <!-- Post Item Body End-->

                         <!-- Post Item Footer Start-->
                         <div class="post-item-footer">
                             <a href="<?= base_url('blogs/') . $post['slug']; ?>" class="readmore-btn">read more</a>
                         </div>
                         <!-- Post Item Footer End-->
                     </div>
                     <!-- post Item Content End -->
                 </div>
                 <!-- Blog Item End -->
             </div>
         <?php } ?>
            
         </div>
     </div>
 </div>
<?php } ?>
 <!-- Our Blog End -->

 <!-- Our Scrolling Ticker Section Start -->
 <div class="our-scrolling-ticker">
     <!-- Scrolling Ticker Start -->
     <div class="scrolling-ticker-box">
         <div class="scrolling-content">
             
             <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">For any additional inqueries :
                <?= $config_data[0]['email']?></span>
             <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">Book Appointment:<?= $config_data[0]['phone_no']?></span>
             
         </div>

         <div class="scrolling-content">
         <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">For any additional inqueries :
                <?= $config_data[0]['email']?></span>
             <span><img src="<?= base_url('assets/front/')?>images/icon-sparkles.svg" alt="">Book Appointment:<?= $config_data[0]['phone_no']?></span>
             
         </div>
     </div>
 </div>

 <!-- Our Scrolling Ticker Section Start -->
 <?php
    if(count($clients)){
 ?>
 <div class="">
     <!-- Scrolling Ticker Start -->
     <marquee  direction="right" behavior="scroll">
        <?php
            foreach($clients as $client){

 
        ?>
         
             
             <img src="<?= base_url('assets/clients/') . $client['image']; ?>" alt="" width="100"> 
             
         
         <?php } ?>

    </marquee>
 </div>
 
 <?php
    }
 ?>
 <!-- Scrolling Ticker Section End -->
 <?= $this->endSection() ?>
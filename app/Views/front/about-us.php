<?= $this->extend('front/master-layout') ?>


<?= $this->section('content') ?>

  <div class="page-header">
      <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Page Header Box Start -->
          <div class="page-header-box">
            <h1 class="text-anime-style-2" >About Us</h1>
            <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
              </ol>
            </nav>
          </div>
          <!-- Page Header Box End -->
        </div>
      </div>
    </div>
  </div>

  <div class="about-us page-about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- About Image Start -->
                    <div class="about-us-image">
                        <div class="about-img">
                            <figure class="reveal image-anime" style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                                <img src="<?= base_url('assets/images/') .$config_data[0]['about_us_image'] ?>" alt="" style="transform: translate(0px, 0px);">
                            </figure>

                            <!-- Company Experience Box Start -->
                            <div class="company-experience">
                                <div class="icon-box">
                                    <img src="<?= base_url('assets/front/')?>images/icon-experience.svg" alt="">
                                </div>
                                <div class="company-experience-content">
                                    <h3><span class="counter">15</span>+</h3>
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
                        <div class="about-content">
                        <!-- Section Title Start -->
                            <div class="section-title">
                            <h3 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><?= $config_data[0]['about_us_title']?></h3>
                           
                            <p class="wow fadeInUp" data-wow-delay="0.25s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;"><?= $config_data[0]['about_us']?></p>
                            </div>
                       

                        <!-- About Us Footer Start -->
                        <div class="about-us-footer">
                            <!-- Doctor Info Start -->
                            <div class="doctor-info wow fadeInUp" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
                                <div class="doctor-info-item">
                                    <div class="image-box">
                                        <figure class="image-anime">
                                            <img src="<?= base_url('assets/front/')?>images/about-doctor-img.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="doctor-info-content">
                                        <h3>Dr.Simmi Thampiraj</h3>
                                        <p>Psychologist</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Doctor Info End -->

                            <!-- Appointment Button Start -->
                            <div class="appointment-btn wow fadeInUp" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
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

        <div class="company-counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Company Counter Item Start -->
                    <div class="company-counter-item">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="<?= base_url('assets/front/')?>images/icon-counter-1.svg" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Company Counter Content Start -->
                        <div class="company-counter-content">
                            <h3><span class="counter">78</span>+</h3>
                            <p>skilled therapist</p>
                        </div>
                        <!-- Company Counter Content End -->
                    </div>
                    <!-- Company Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Company Counter Item Start -->
                    <div class="company-counter-item">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="<?= base_url('assets/front/')?>images/icon-counter-2.svg" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Company Counter Content Start -->
                        <div class="company-counter-content">
                            <h3><span class="counter">98</span>%</h3>
                            <p>success rate</p>
                        </div>
                        <!-- Company Counter Content End -->
                    </div>
                    <!-- Company Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Company Counter Item Start -->
                    <div class="company-counter-item">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="<?= base_url('assets/front/')?>images/icon-counter-3.svg" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Company Counter Content Start -->
                        <div class="company-counter-content">
                            <h3><span class="counter">950</span>+</h3>
                            <p>patients treated</p>
                        </div>
                        <!-- Company Counter Content End -->
                    </div>
                    <!-- Company Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Company Counter Item Start -->
                    <div class="company-counter-item">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="<?= base_url('assets/front/')?>images/icon-counter-4.svg" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Company Counter Content Start -->
                        <div class="company-counter-content">
                            <h3><span class="counter">78</span>+</h3>
                            <p>Skilled Therapist</p>
                        </div>
                        <!-- Company Counter Content End -->
                    </div>
                    <!-- Company Counter Item End -->
                </div>
            </div>
        </div>
    </div>


    <div class="mission-vision">
        <div class="container">
            <div class="row section-row">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">vision to victory</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque"><span><div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">W</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">'</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">r</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">a</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">R</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">c</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">o</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">g</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">n</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">i</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">z</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">d</div></div> </span> <div style="position:relative;display:inline-block;"> <div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">&amp;</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">Q</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">u</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">a</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">l</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">i</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">t</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">y</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">L</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">a</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">d</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div><div style="position: relative; display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">r</div></div></h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Mva Item Start -->
                    <div class="our-mva-item wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="<?= base_url('assets/front/')?>images/icon-our-mission.svg" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Mva Content Start -->
                        <div class="mva-item-content">
                            <h3>our mission</h3>
                            <p>At BOOKMYYOGA, our mission is to create a sanctuary of holistic healing and rejuvenation, where individuals reconnect with their inner peace, vitality, and balance. Through ancient wellness practices, modern therapies, and nature-inspired experiences, we aim to nurture the mind, body, and soul, fostering a transformative journey toward overall well-being.</p>
                        </div>
                        <!-- Mva Content End -->
                    </div>
                    <!-- Mva Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Mva Item Start -->
                    <div class="our-mva-item wow fadeInUp" data-wow-delay="0.25s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="<?= base_url('assets/front/')?>images/icon-our-vision.svg" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Mva Content Start -->
                        <div class="mva-item-content">
                            <h3>our vision</h3>
                            <p>Our vision is to be a globally recognized wellness destination that empowers individuals to embrace a healthier, more fulfilling lifestyle. We aspire to blend traditional wisdom with contemporary wellness approaches, offering personalized healing experiences that promote lasting harmony, self-discovery, and inner bliss.</p>
                        </div>
                        <!-- Mva Content End -->
                    </div>
                    <!-- Mva Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Mva Item Start -->
                    <div class="our-mva-item wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="<?= base_url('assets/front/')?>images/icon-our-approch.svg" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Mva Content Start -->
                        <div class="mva-item-content">
                            <h3>our approch</h3>
                            <p>Holistic Healing – Integrating Ayurveda, yoga, meditation, naturopathy, and alternative therapies for a complete wellness experience.<br>
Personalized Wellness Journeys – Crafting customized programs tailored to individual health goals and needs</p>
                        </div>
                        <!-- Mva Content End -->
                    </div>
                    <!-- Mva Item End -->
                </div>
            </div>
            
            <!-- Call To Action Start -->
            <div class="cta-infobar wow fadeInUp" data-wow-delay="0.75s" style="visibility: visible; animation-delay: 0.75s; animation-name: fadeInUp;">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <!-- Cta Content Start -->
                        <div class="cta-info-content">
                            <div class="icon-box">
                                <img src="<?= base_url('assets/front/')?>images/icon-cta.svg" alt="">
                            </div>

                            <div class="cta-content">
                                <h3>ready to start your journey to recovery?</h3>
                                <p>Contact us today to schedule your initial consultation and take the first step towards a pain-free life.</p>
                            </div>
                        </div>
                        <!-- Cta Content End -->
                    </div>

                    <div class="col-lg-6">
                        <!-- Cta Appointment Button Start -->
                        <div class="cta-appointment-btn">
                            <a href="javascript:void(0);" class="btn-default book-apointment-btn"> book appointment</a>
                        </div>
                        <!-- Cta Appointment Button End -->
                    </div>
                </div>
            </div>
            <!-- Call To Action End -->
        </div>
    </div>


 <!-- Our Team Start -->
  <?php
    if(count($teams)){

   
  ?>
 <div class="our-team">
     <div class="container">
         <div class="row align-items-center section-row">
             <div class="col-lg-12">
                 <!-- Section Title Start -->
                 <div class="section-title">
                     <h3 class="wow fadeInUp">theraphist team</h3>
                     <h2 class="text-anime-style-2" data-cursor="-opaque"><span>Our Dedicated</span> & Experienced
                         Therapist Team</h2>
                 </div>
                 <!-- Section Title End -->
             </div>
<!-- 
             <div class="col-lg-3">
                 
                 <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
                     <a href="#" class="btn-default">view all team</a>
                 </div>
                
             </div> -->
         </div>

         <div class="row">
            <?php
                foreach($teams as $team){

                
            ?>
             <div class="col-lg-3 col-md-6">
                 <!-- Team Member Item Start -->
                 <div class="team-member-item wow fadeInUp">
                     <!-- Team Image Start -->
                     <div class="team-image">
                         <figure class="image-anime">
                             <img src="<?= base_url('assets/team/') . $team['image']?>" alt="">
                         </figure>

                         <!-- Team Social Icon Start -->
                         <!-- <div class="team-social-icon">
                             <ul>
                                 <li><a href="#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a></li>
                                 <li><a href="#" class="social-icon"><i class="fa-brands fa-youtube"></i></a></li>
                                 <li><a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a></li>
                                 <li><a href="#" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a></li>
                             </ul>
                         </div> -->
                         <!-- Team Social Icon End -->
                     </div>
                     <!-- Team Image End -->

                     <!-- Team Content Start -->
                     <div class="team-content">
                         <h3><?= $team['name']?></h3>
                         <p><?=$team['designation']?></p>
                     </div>
                     <!-- Team Content End -->
                 </div>
                 <!-- Team Member Item End -->
             </div>
            <?php } ?>
          
         </div>
     </div>
 </div>
 <?php
    }
 ?>
 <!-- Our Team End -->

 <!-- Client Testimonial Start -->
  <?php
    if(count($testimonials)){

   
  ?>
 <div class="our-testimonial parallaxie">
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
         <!--      <section class="about-wrap abput_bg style1 ptb-100">
                <div class="container">
                    <div class="row gx-5 align-items-center">
                        <?php
                            if(isset($config_data[0]['about_us_image']) && !empty($config_data[0]['about_us_image'])){

                        ?>
                        <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="about-img-wrap pb-0">
                                <img src="<?= base_url('assets/images/') .$config_data[0]['about_us_image'] ?>" alt="About Us Image" class="about-img w100">
                                 
                            </div>
                        </div>
                    <?php } ?>
                        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                            <div class="about-content">
                                <div class="content-title style1">
                                    <span>About Our Program</span>
                                    <h2 class="mb-0"> <?= $config_data[0]['about_us_title']?></h2>
                                    <p><?= $config_data[0]['about_us']  ?></p>
                             
                                  </div>
                                
                            </div>
                        </div>
                    </div>
                </div> -->
           <!--  </section> -->
            <!-- end -->
             <!-- gallery -->

<?= $this->endSection() ?>
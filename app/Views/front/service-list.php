<?= $this->extend('front/master-layout') ?>
<?= $this->section('content') ?>
<div class="page-header">
    <div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
				heder
				</div>
			</div>
		</div>
	</div>

	<!-- Our Service Start -->
  <?php
    if(count($services)){

        // echo "<pre>";
        // print_r($services);
        // echo "</pre>";
  ?>
 <div class="our-service">
     <div class="container">
         

         <div class="row">
            <?php
              $i = 0;
                foreach($services as $service){
               
            ?>
             <div class="col-lg-3 col-md-6">
                 <!-- Service Item Start -->
                 <div class="service-item wow fadeInUp" data-wow-delay="<?= $i; ?>s">
                     <!-- Icon Box Start -->
                     <div class="">
                         <img src="<?= base_url('assets/services/'). $service['image']?>" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Service Body Start -->
                    <div  style="padding:10px;">
                      <div class="service-body ">
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
    


             <div class="col-lg-12">
                 <!-- Service Item Start -->
                 <div class="service-item service-cta-item wow fadeInUp" data-wow-delay="1.2s">
                     <!-- Icon Box Start -->
                     <div class="icon-box">
                         <img src="<?= base_url('assets/front/')?>images/icon-cta.svg" alt="">
                     </div>
                     <!-- Icon Box End -->

                     <!-- Service Body Start -->
                     <div class="service-body">
                         <h3>ready to start your journey to recovery?</h3>
                         <p>We understand that injuries and acute pain can unexpectedly. Our emergency physiotherapy.
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
                                 <h3>experienced team</h3>
                                 <p>We understand that injuries and acute pain can unexpectedly.</p>
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
                                 <h3>patient-centered approach</h3>
                                 <p>We understand that injuries and acute pain can unexpectedly.</p>
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
                                 <p>We understand that injuries and acute pain can unexpectedly.</p>
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
                                 <h3>advanced technology</h3>
                                 <p>We understand that injuries and acute pain can unexpectedly.</p>
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
                                 <h3>convenient and accessible</h3>
                                 <p>We understand that injuries and acute pain can unexpectedly.</p>
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
                                 <p>We understand that injuries and acute pain can unexpectedly.</p>
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
 <!-- Client Testimonial End -->

<?= $this->endSection() ?>
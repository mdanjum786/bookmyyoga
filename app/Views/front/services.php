<?= $this->extend('front/master-layout') ?>


<?= $this->section('content') ?>
    <div class="page-header">
        <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Page Header Box Start -->
          <div class="page-header-box">
            <h1 class="text-anime-style-2" data-cursor="-opaque">Service</h1>
            <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $service[0]['title']; ?></li>
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
                                <img src="<?= base_url('assets/services/'). $service[0]['image']?>" alt="" style="transform: translate(0px, 0px);">
                            </figure>
                        </div>
                        <!-- Service Featured Image End -->

                        <!-- Service Entry Content Start -->
                        <div class="service-entry">
                            <?= $service[0]['description']?>
                        </div>
                        <!-- Service Entry Content End -->
                    </div>
                    <!-- Service Single Content End -->
                </div>
                <div class="col-lg-4">
                    <!-- Service Sidebar Start -->
                    <div class="service-sidebar">
                        <!-- Service Categories List Start -->
                        <?php
                          if(count($services)){

                        
                        ?>
                        <div class="service-catagery-list wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <h3>our services</h3>
                            <ul>
                              <?php
                                foreach($services as $ser){

                                  if($ser['id'] == $service[0]['id']){
                                    continue;
                                  }
                              ?>
                              <li><a href="<?= base_url('services/') . $ser['slug'] ; ?>"><?= $ser['title'] ?></a></li>
                                <?php } ?>
                                
                                <!-- <li><a href="#">hand therapy</a></li>
                                <li><a href="#">sports therapy</a></li>
                                <li><a href="#">cupping therapy</a></li> -->
                            </ul>
                        </div>
                        <?php
                           }
                        ?>
                        <!-- Service Categories List End -->

                        <!-- Opening Hour Section Start -->
                       <!--  <div class="opening-hour-section wow fadeInUp" data-wow-delay="0.25s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">
                            <h3>opening hours</h3>
                            <ul>
                                <li>mon to fri : 10:00 to 6:00</li>
                                <li>sat : 10:00AM To 3:00PM</li>
                                <li>sun : closed</li>
                            </ul>
                        </div> -->
                        <!-- Opening Hour Section End -->

                        <!-- Sidebar Cta Box Start -->
                        <div class="sidebar-cta-box wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <!-- Cta Content Start -->
                            <div class="icon-box">
                                <img src="<?=base_url('assets/front/')?>images/icon-cta.svg" alt="">
                            </div>

                            <div class="cta-content">
                                <h3>Ready to Start Your Journey to Recovery?</h3>
                                <p>Contact us today to schedule your initial consultation and take the first step towards a pain-free life.</p>
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
 <!-- Scrolling Ticker Section End -->
<?= $this->endSection() ?>


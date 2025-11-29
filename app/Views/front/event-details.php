<?= $this->extend('front/master-layout') ?>


<?= $this->section('content') ?>
     <div class="breadcrumb-wrap bg-f br-2">
         <div class="overlay"></div>
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2><?= $event[0]['title'] ?></h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="<?= base_url('/'); ?>">Home</a></li>
                                <li><?= $event[0]['title'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                    <!-- end -->
                 <section class="about_wrap abput_bg style1 ptb-100">
                <div class="container">
                    <div class="row gx-5 align-items-center">
                     <div class="col-lg-12 aos-init" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                            <div class="about-content">
                                <div class="content-title style1">
                                    
                                    <h2> <?= $event[0]['title'] ?></h2>
                                  
                                  </div>
                                  <div class="event-details">
                                    <?= $event[0]['description'] ?>
                                  </div>
                                
                            </div>
                        </div>

                      
                    </div>
                </div>
            </section>
            <!-- end -->


             <section id="gallery" class="ptb-100" style="display:none">
        <div class="container">
           <div class="section-title style1 text-center mb-40">
                      
                        <h2>  Our Gallery</h2>
                    </div>
          <div id="image-gallery">
            <div class="row">
               <?php
                  if(count($gallery_images)){

                     foreach($gallery_images as $gal){


                        ?>
                         <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                <div class="img-wrapper">
                  <a href="<?= base_url('assets/gallery/'). $gal['image']?>"><img src="<?= base_url('assets/gallery/'). $gal['image']?>" class="img-responsive"></a>
                  <div class="img-overlay">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
                <?php }} ?>
             
          <!--     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                <div class="img-wrapper">
                  <a href="./assets/img/gallery/2.jpg"><img src="./assets/img/gallery/2.jpg" class="img-responsive"></a>
                  <div class="img-overlay">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                  </div>
                </div>
              </div> -->
            <!--   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                <div class="img-wrapper">
                  <a href="./assets/img/gallery/3.jpg"><img src="./assets/img/gallery/3.jpg" class="img-responsive"></a>
                  <div class="img-overlay">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                  </div>
                </div>
              </div> -->
            <!--   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                <div class="img-wrapper">
                  <a href="./assets/img/gallery/4.jpg"><img src="./assets/img/gallery/4.jpg" class="img-responsive"></a>
                  <div class="img-overlay">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                  </div>
                </div>
              </div> -->
            
            </div><!-- End row -->
          </div><!-- End image gallery -->
        </div><!-- End container --> 
      </section>


<section class="wh-wrap style1 bg-chathamas ptb-100 mb-4" style="display:none">
                <div class="container">
 <div class="section-title style2 text-center mb-40">
                        <span>Our Projectwwwwww</span>
                        <h2>We're Providing Our Gallery</h2>
                    </div>

                    <div class="row align-items-center mb-40">
                       <?php
                            if(count($video_gallery)){
                                foreach($video_gallery as $vi){



                        ?>
                        <div class="col-lg-4 aos-init" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="vedio">
                        <iframe width="100%" height="350" src="<?= $vi['slug']?>"  ></iframe>
                       
                            </div>
                        </div>
                    <?php   } }?>
                      
                      <!--  <div class="col-lg-4 aos-init" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="vedio">
                        <iframe width="100%" height="350" src="./assets/img/vedio/v3.mp4"  ></iframe>
                                                   </div>
                        </div> -->
                        
                        <!--  <div class="col-lg-4 aos-init" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="vedio">
                        <iframe width="100%" height="350" src="./assets/img/vedio/v3.mp4"  ></iframe>
                      
                            </div>
                        </div> -->
                    </div>
                    
                    
                      </div>
            </section>
<?= $this->endSection() ?>


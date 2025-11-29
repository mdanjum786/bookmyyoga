<?= $this->extend('front/master-layout') ?>


<?= $this->section('content') ?>


<!-- Section: inner-header -->
   <!-- Section: inner-header -->
      <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Page Header Box Start -->
          <div class="page-header-box">
            <h1 class="text-anime-style-2" >Video Gallery</h1>
            <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Video Gallery</li>
              </ol>
            </nav>
          </div>
          <!-- Page Header Box End -->
        </div>
      </div>
    </div>
  </div>



    <section class="wh-wrap style1  ptb-100 mb-5 mt-5">
                <div class="container">
<!--  <div class="section-title style2 text-center mb-40">
                        <span>Our Project</span>
                        <h2>We're Providing Our Gallery</h2>
                    </div>
 -->
                    <div class="row align-items-center mb-40">
                        
                         <?php
                            if(count($data)){
                                foreach($data as $gal){


                            if($gal['type'] == 'link' ){

                           

                        ?>
                        <div class="col-lg-4 aos-init" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="vedio">
                        <iframe width="100%" height="350" src="<?= $gal['slug']?>"  ></iframe>
                       
                            </div>
                        </div>
                        <?php  } else { ?>
                            <div class="col-lg-4">
                                 <div class="image-container">
                                        <video width="100%" height="350" controls>
                                            <source src="<?= base_url('/');?>assets/gallery/<?= $gal['slug'] ?>" type="video/mp4">
                                            <source src="<?= base_url('/');?>assets/gallery/<?= $gal['slug'] ?>" type="video/ogg">
                                            Your browser does not support the video tag.
                                          </video>
                                      
                                    </div>
                            </div>
                    <?php   } }} ?>
                    
                       
                    </div>

                    <div>
                         <?php  
            
            if($total > 9){
                echo $links; 
            }
          
          ?>
                    </div>
                    
                      </div>
            </section>
<!-- end -->
<?= $this->endSection() ?>
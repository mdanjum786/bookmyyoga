<?= $this->extend('front/master-layout') ?>


<?= $this->section('content') ?>

              <!-- Hero Section Start -->
                <div class="breadcrumb-wrap bg-f br-2">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>About Us</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="<?= base_url('/')?>">Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
             
                <section class="about-wrap abput_bg style1 ptb-100">
                <div class="container">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6 aos-init" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="about-img-wrap pb-0">
                                <img src="assets/img/about/about-img-1.jpg" alt="Image" class="about-img w100">
                                 
                            </div>
                        </div>
                        <div class="col-lg-6 aos-init" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                            <div class="about-content">
                                <div class="content-title style1">
                                    <span>Uniting Hearts and Hands for a Brighter, More Inclusive Future</span>
                                    <h2> Empowering Communities, Enriching Lives – From Education to Health, Every Step Counts."</h2>
                                    <p>At ANN HOPE AND CARE FOUNDATION, we are dedicated to transforming lives and uplifting communities through holistic support and care. Our mission spans across multiple areas, including education, healthcare, women’s empowerment, marriage assistance, and skill development. We believe that every step we take towards providing basic needs, creating opportunities, and offering hope, contributes to building stronger, more self-sufficient communities.
                                   <br> By empowering individuals with the tools they need to thrive, whether it’s through education, job training, or health services, we are working to ensure that no one is left behind. Together, we are not just changing lives – we are enriching them for a better tomorrow. Join us in our mission to create a world where everyone has the opportunity to succeed and lead a fulfilling life.
                                    </p>
                                    <p>Suggested Image: Kids studying in a classroom with books and laptops.</p>
                                    <p>Join us in making a difference—because together, we can build a brighter tomorrow!</p>    
                                    <h5>Akash Deep, Founder and President</h5>
                               <a href="<?= base_url('donate-now')?>" class="btn style1">Donate Now</a>
                               <a href="<?= base_url('contact-us')?>" class="btn style1">Join U</a>
                                  </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?= $this->endSection() ?>
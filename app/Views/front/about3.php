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
             
                 <!-- end -->
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
                                    <span>Be the Change, Be the Hope – Join Our Mission Today</span>
                                    <h2>  Be the reason someone believes in kindness. Join hands with us to create a better world."</h2>
                                    <p>
                                      At ANN HOPE AND CARE FOUNDATION, we believe that every individual has the power to make a difference. Our mission to uplift communities and transform lives needs your support. Whether it's through education, healthcare, women’s empowerment, or skill development, your involvement can help us provide critical services to those in need.
                                      <br>We are inviting you to join hands with us and take meaningful action in creating a brighter, more inclusive future. By becoming part of our efforts, you will directly contribute to building stronger communities, where everyone has the chance to live with dignity, equality, and opportunity.
                                      <br>Together, we can empower individuals, provide essential services, and drive long-term change. Your time, skills, and support can help us reach new heights in transforming lives and creating lasting impact.
                                      <br>Join us in our mission. Let’s make a difference, one step at a time, and create a world where everyone has the opportunity to thrive.
                                      <p> <b>Suggested Image:</b> A group of volunteers helping people in need.</p>
                                    </p>
                               <!-- <a href="contact.html" class="btn style1">Donate Now</a> -->
                               <a href="<?= base_url('contact-us')?>" class="btn style1">Join U</a>
                                  </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?= $this->endSection() ?>
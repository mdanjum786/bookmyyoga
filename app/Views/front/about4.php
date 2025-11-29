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
                                    <span>Real Stories, Real Impact – Transforming Lives Every Day</span>
                                    <h2> See the Difference We’re Making, Together.""</h2>
                                    <p>
                                     Behind every donation, every volunteer hour, and every partnership, there is a story of transformation. From providing life-saving medical care to enabling education for underprivileged children, our foundation's work changes lives in tangible, meaningful ways.
                                    <br>Meet the individuals whose lives have been touched by your support – empowering women, feeding the hungry, and offering hope to those facing adversity. Together, we are writing stories of change, and your involvement is a vital chapter in that narrative.
                                    <br><b>Call to Action:</b>
                                    <br>Join us in creating more stories of hope and success. Become part of the solution today and help us change lives, one step at a time.

                                    </p>
                               <a href="<?= base_url('donate-now')?>" class="btn style1">Donate Now</a>
                               <!-- <a href="contact.html" class="btn style1">Join U</a> -->
                                  </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?= $this->endSection() ?>
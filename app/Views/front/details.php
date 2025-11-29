<?= $this->extend('front/master-layout') ?>


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
</style>
    <div class="page-header">
        <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Page Header Box Start -->
          <div class="page-header-box">
            <h1 class="text-anime-style-2" data-cursor="-opaque"><?= ucfirst(str_replace("-"," ",$service[0]['type'])); ?></h1>
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
                        <div class="service-featured-img mb-0">
                            <figure class="reveal image-anime" style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                                <img src="<?= base_url('assets/services/'). $service[0]['image']?>" alt="" style="transform: translate(0px, 0px);">
                            </figure>
                        </div>
                        <!-- Service Featured Image End -->

                        <!-- Service Entry Content Start -->
                           
                        <div class="service-entry bg-light pt-3 px-2">
                             <div class="pric_e">
                              <div class="  list-detail-page mb-3 d-flex    ">
                               

                                  <div class="rating-price gap-3 align-items-center justify-content-end" style="display: flex;">
                                   <?php
                                      if(isset($service[0]['offer_price']) && !empty($service[0]['offer_price'])){ 
                                    ?>
                                        <div class=" mr-2 " style="margin-right: 10px" ><span><strong>Price : </strong></span><span style="text-decoration: line-through;color:#d1c5c5">Rs.<?= $service[0]['price']?></span> Rs.<?= $service[0]['offer_price']?></div>
                                    <?php } else {?>
                                        <div class="mr-2 " style="margin-right: 10px">Rs.<?= $service[0]['price']?></div>
                                    <?php } ?>
                                    <div> <p class="mb-1 star list-start" ><?= $service[0]['rating'] ?? '5'?><i class="fa fa-star" style="font-size: 9px;"></i> </p></div>
                                    <a href="javascript:void(0);" class=" btn__book btn-enquiry  " style="cursor: pointer;" contenteditable="false"><i class="fa fa-shopping-bag  "></i>  Book Now</a>
                                  </div>
                                   
                                
                              </div>
                          </div>

                          <div> <?= $service[0]['description']?> </div>
                            
                        </div>
                        <!-- Service Entry Content End -->
                    </div>
                    <!-- Service Single Content End -->
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




 
 <!-- Scrolling Ticker Section End -->
<?= $this->endSection() ?>


<?= $this->extend('front/master-layout') ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<?= $this->section('content') ?>

  <div class="page-header">
      <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Page Header Box Start -->
          <div class="page-header-box">
            <h1 class="text-anime-style-2" >Trainsers & Studio</h1>
            <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Trainsers & Studio</li>
              </ol>
            </nav>
          </div>
          <!-- Page Header Box End -->
        </div>
      </div>
    </div>
  </div>

  
  <section class="py-5 product_list">
       
       <div class="container">
          
          <div class="row">
              
               <div class="col-md-8">
               <!--    <div class="main_heading">-->
               <!--    <h1 class="mb-2">WELLNESS</h1>-->
               <!--    <img src="https://www.bookmyyoga.in/Content/Images/uploaded/bmy_wellness.png" class="w100" />-->
               <!--</div>-->
                   <div class="wrapper">
  
  <header class="filter_section">
   <div class="filter">
      
       <span>
            <span>Filter</span>
             <select class="form-control  select br_25" id="products-orderby" name="products-orderby" >
                <option selected="selected"  >Created on</option>
                <option  >Name: A to Z</option>
                <option  >Name: Z to A</option>
                <option  >Price: Low to High</option>
                <option  >Price: High to Low</option>
                <option  >Position</option>
              </select>
       </span>
       <span><label>Display</label>
       <select class="form-control select br_25 " id="products-pagesize" name="products-pagesize" style="width:100px" >
           <option  selected="" selected>3</option>
            <option   >6</option>
            <option  >9</option>
        </select>
       </span>
       </div>
   <div class="short_icon">
        <i class="[ icon  icon--grid ]  [ fa  fa-th ]  [ icon ]  "></i>
    <i class="[ icon  icon--list ]  [ fa  fa-reorder ]  [ icon ] active"></i>
   </div>
  </header>

  <section class="products row list group">

    <article class="product col-md-3">
      <div class="product__inner">
        <section class="product__image">
          <img src="https://bmy.maalaxmielectrical.com/assets/services/1742558365-services-IMG20250301111202.jpg"></img>
        </section>
        <div class="product__details"> 
        <section class="product__name">Yoga & Acupressure Retreat</section>
            <div class="reating">
                <span class="rating">3.2 <i class="fa fa-star"></i></span> <span><b>5 Rating </b></span> <span class="Responsive"> <img src="assets/img/about/responsive.svg" ></span>
            </div> 
          <div class="mt-2">
            <p><i class="fa fa- map-marker"></i> Noida sector 63 H-Block</p>
        </div>
          <div class="btn_book">
              <a href="javascript:void(0);" class="btn_bokt  "><img src="https://bmy.maalaxmielectrical.com/assets/front/images/icon-phone.svg" > +91-88102-69302</a>
                 <a href="javascript:void(0);" class=" btn_w  "><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                  <a href="javascript:void(0);" class=" btn_email  "><i class="fa fa-comment  "></i> Send Enquiry</a>
              </div>
        </div>
        </div>
    </article>
    <!-- /product -->

      <article class="product col-md-3">
      <div class="product__inner">
        <section class="product__image">
          <img src="https://bmy.maalaxmielectrical.com/assets/services/1742558365-services-IMG20250301111202.jpg"></img>
        </section>
        <div class="product__details"> 
        <section class="product__name">Yoga & Acupressure Retreat</section>
            <div class="reating">
                <span class="rating">3.2 <i class="fa fa-star"></i></span> <span><b>5 Rating </b></span> <span class="Responsive"> <img src="assets/img/about/responsive.svg" ></span>
            </div> 
          <div class="mt-2">
            <p><i class="fa fa- map-marker"></i> Noida sector 63 H-Block</p>
        </div>
          <div class="btn_book">
              <a href="javascript:void(0);" class="btn_bokt  "><img src="https://bmy.maalaxmielectrical.com/assets/front/images/icon-phone.svg" > +91-88102-69302</a>
                 <a href="javascript:void(0);" class=" btn_w  "><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                  <a href="javascript:void(0);" class=" btn_email  "><i class="fa fa-comment  "></i> Send Enquiry</a>
              </div>
        </div>
        </div>
    </article>
    <!-- /product -->
      <article class="product col-md-3">
      <div class="product__inner">
        <section class="product__image">
          <img src="https://bmy.maalaxmielectrical.com/assets/services/1742558365-services-IMG20250301111202.jpg"></img>
        </section>
        <div class="product__details"> 
        <section class="product__name">Yoga & Acupressure Retreat</section>
            <div class="reating">
                <span class="rating">3.2 <i class="fa fa-star"></i></span> <span><b>5 Rating </b></span> <span class="Responsive"> <img src="assets/img/about/responsive.svg" ></span>
            </div> 
          <div class="mt-2">
            <p><i class="fa fa- map-marker"></i> Noida sector 63 H-Block</p>
        </div>
          <div class="btn_book">
              <a href="javascript:void(0);" class="btn_bokt  "><img src="https://bmy.maalaxmielectrical.com/assets/front/images/icon-phone.svg" > +91-88102-69302</a>
                 <a href="javascript:void(0);" class=" btn_w  "><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                  <a href="javascript:void(0);" class=" btn_email  "><i class="fa fa-comment  "></i> Send Enquiry</a>
              </div>
        </div>
        </div>
    </article>
    <!-- /product -->
    

  </section><!-- /products -->
  
</div><!-- /wrapper -->
          </div>
            
                  <div class="col-md-4">
                    <!-- Service Sidebar Start -->
                    <div class="service-sidebar">
                        <!-- Service Categories List Start -->
                                                <div class="service-catagery-list wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <h3>our services</h3>
                            <ul>
                                                            <li><a href="https://bmy.maalaxmielectrical.com/services/yttc-300hr-1">YTTC-300HR</a></li>
                                                              <li><a href="https://bmy.maalaxmielectrical.com/services/yttc-500hr">YTTC-500HR</a></li>
                                                                
                                <!-- <li><a href="#">hand therapy</a></li>
                                <li><a href="#">sports therapy</a></li>
                                <li><a href="#">cupping therapy</a></li> -->
                            </ul>
                        </div>
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
                                <img src="https://bmy.maalaxmielectrical.com/assets/front/images/icon-cta.svg" alt="">
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
      
  </section>
 
  


      

<?= $this->endSection() ?>
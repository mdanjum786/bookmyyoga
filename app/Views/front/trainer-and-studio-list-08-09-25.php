<?= $this->extend('front/master-layout') ?>


<?= $this->section('content') ?>
<style>

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
<div class="page-header" style="">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-2">Trainer And Studio</h1>
                    <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Trainer and Studio</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>
</div>

                     <!--<div class="trainers-and-studio">-->
                     <!--  <div class="swiper">-->
                     <!--       <div class="swiper-wrapper" data-cursor-text="Drag">-->
                     <!--         <div class=" swiper-slide">-->
                                 <!-- Blog Item Start -->
                     <!--           <img src="https://bmy.maalaxmielectrical.com/assets/services/1742558365-services-IMG20250301111202.jpg"> -->
                     <!--        </div>-->
                             <!-- Blog Item End -->
                     <!--        <div class=" swiper-slide">-->
                                 <!-- Blog Item Start -->
                     <!--           <img src="https://bmy.maalaxmielectrical.com/assets/services/1742558365-services-IMG20250301111202.jpg">-->
                     <!--        </div>-->
           
                     <!--      </div>-->
                            
                     <!--   </div>-->
                     <!--</div>-->
                 
         
<section class="py-5 product_list">

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <div class="wrapper">

                    <header class="filter_section">
                       <form class="form-filter" id="form-filter">
                        <div class="filter">
                          
                            <span>
                                <span>Filter</span>

                                <select class="form-control course-sort  select br_25" id="products-orderby"
                                    name="sort">
                                    <option value="date" <?= $order_data == 'date' ? 'selected' : '' ?> >Most Recent</option>
                                    <option value="atoz" <?= $order_data == 'atoz' ? 'selected' : '' ?>>Name: A to Z</option>
                                    <option value="ztoa" <?= $order_data == 'ztoa' ? 'selected' : '' ?>>Name: Z to A</option>
                                   <!--  <option value="">Price: Low to High</option>
                                    <option value="">Price: High to Low</option> -->
                                   
                                </select>
                            </span>
                            <span><label>Display</label>
                                <select class="form-control select br_25 page-limit " id="page-limit"
                                    name="limit" style="width:100px">
                                    <option selected="" selected><?= $perPage; ?></option>
                                    <option>12</option>
                                    <option>24</option>
                                    <option>36</option>
                                    <option>48</option>
                                    <option>96</option>
                                    <option>192</option>
                                </select>
                            </span>
                         
                        </div>
                         </form>
                        <div class="short_icon">
                            <i class="[ icon  icon--grid ]  [ fa  fa-th ]  [ icon ]  "></i>
                            <i class="[ icon  icon--list ]  [ fa  fa-reorder ]  [ icon ] active"></i>
                        </div>
                    </header>

                    <section class="products row list group">
                      <div class="mb-2">total <?= $total ?> result founds</div>
                        <?php
                        if(count($trainers_and_studio)){

                        foreach($trainers_and_studio as $trainer){

                            $phoneNumber = $trainer['whatsapp_no'];
                            $message = "I am looking for yoga services ";
                            $encodedMessage = urlencode($message);
                            $whatsapp_url = "https://api.whatsapp.com/send?phone={$phoneNumber}&text={$encodedMessage}";
                            //echo $url;

                      ?>
                        <article class="product col-md-3 course-list-item" data-id="<?= $trainer['id'] ?>">
                            <div class="product__inner">

                                <!--<section class="product__image">-->
                                  
                                <!--</section>-->
                                 <section class="product__image">
                                     <!--<img src="https://bmy.maalaxmielectrical.com/assets/services/1742558365-services-IMG20250301111202.jpg"></img>-->
           
                                      <div class="trainers-and-studio">
                                         <div class="swiper">
                                           <div class="swiper-wrapper" data-cursor-text="Drag">
                                            <div class=" swiper-slide">
                                         <!-- Blog Item Start -->
                                         <div class="blog-item wow fadeInUp">
                                             <!-- Post Featured Image Start-->
                                             <div class="post_featured-image"  >
                                               <a href="<?= base_url('trainers-and-studio/') . $trainer['slug']; ?>">
                                                            <?php
                                                                if(isset($trainer['banner_image']) && !empty($trainer['banner_image'])){
                        
                        
                                                            ?>
                                                            <img src="<?= base_url('assets/images/trainer-studio/') . $trainer['banner_image']?>" />
                                                            <?php
                                                        } else{
                        
                        
                                                            ?>
                                                              <img src="<?= base_url('assets/images/trainer-studio/no-image.jpg')?>" />
                        
                                                        <?php } ?>
                                                            </a>
                                             </div>
                                              </div> 
             </div> 
                                           </div>
                                            
                                         </div>
                                       </div>
                                </section>

                                <div class="product__details">

                                    <section class="product__name mb-1">
                                        <a href="<?= base_url('trainers-and-studio/') . $trainer['slug']; ?>">
                                            <?= $trainer['business_name']?>
                                        </a>
             
           <!--  <div class="product__price "><span style="text-decoration: line-through;color:#d1c5c5">Rs.0.00</span> Rs.0.00</div>
           <p class="mb-1 star list-start">5<i class="fa fa-star" style="font-size: 9px;"></i> </p> -->

                                    </section>
                                    <section>
                                        <a href="<?= base_url('trainers-and-studio/') . $trainer['slug']; ?>" style="color: #696e72"> <span><i class="fa-solid fa-location-dot"></i></span> <?= $trainer['address'] ?? '' ?>
                                        <?php
                                            if(isset($trainer['cname']) && !empty($trainer['cname'])){


                                        ?>
                                        , <?= $trainer['cname'] ?>
                                    <?php } ?>
                                    </a>
                                    </section>

                             

                                    <section class="product__short_description">
                                        <a href="<?= base_url('trainers-and-studio/') . $trainer['slug']; ?>" style="color:#000">
                                          <?= substr(strip_tags($trainer['about_us']),0,100) ?? ''  ;?>
                                        </a>
                                    </section>

                                    <div class="btn_book">
                                        <a href="tel:<?= $trainer['mobile_no'] ?>" class="btn_bokt  "><img
                                                src="<?= base_url(); ?>assets/front/images/icon-phone.svg"> <?= $trainer['mobile_no'] ?></a>
                                           <!--  <a href="mailto:<?= $trainer['email'] ?>" class="btn_bokt  "><img
                                                src="<?= base_url(); ?>assets/front/images/icon-email.svg"></a> -->
                                        <a href="<?= $whatsapp_url?>" class=" btn_w  " target="_blanck"><i
                                                class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                                        <a href="javascript:void(0);" class=" btn_email btn-enquiry  " data-title="<?= $trainer['business_name']?>"><i
                                                class="fa fa-comment  "></i> Send Enquiry</a>
                                                
                                    </div>

                                </div>

                            </div>
                        </article>
                        <?php } } else{?>
                        <article class="product col-md-3">
                            <h3>Data not found</h3>
                        </article>
                        <?php
                        }
                        ?>


                    </section>

                </div>
                 <!-- Post Pagination Start -->
                <div class="post-pagination wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                  <?php
                    if($total > $perPage){
                      echo   $links; 
                  }
                  ?>
              
                </div>
          <!-- Post Pagination End -->
            </div>

            <div class="col-md-4">
                <!-- Service Sidebar Start -->
                <div class="service-sidebar">
                    <!-- Service Categories List Start -->
                    <div class="service-catagery-list wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                      <h3>Feel free to ask</h3>
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

</section>






<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
  $(function(){
    $(document).on('click', '.btn-enquiry', function(e){
        e.preventDefault();
        let _this = $(this);
        let title = _this.data('title');
        let id = $(this).closest('.course-list-item').data('id');
        let enquiry_modal = $('#book-apointment-modal');
        enquiry_modal.find('.modal-title').text(`Enquiry for ${title}`);
        enquiry_modal.find('[name="service_id"]').val(id);
        
        enquiry_modal.modal('show');
    });
    $(document).on('change', '.page-limit',function(){
      //console.log('test  ')
      $('#form-filter').submit();
    });//course-sort

     $(document).on('change', '.course-sort',function(){
      //console.log('test  ')
      $('#form-filter').submit();
    });//course-sort
  });

</script>
<?= $this->endSection() ?>
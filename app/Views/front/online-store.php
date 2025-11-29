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
                    <h1 class="text-anime-style-2">Store</h1>
                    <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Store</li>
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
                        <?php
                        if(count($courses)){

                        foreach($courses as $course){

                      ?>
                        <article class="product col-md-3 course-list-item" data-id="<?= $course['id'] ?>">
                            <div class="product__inner">

                                <section class="product__image">
                                  <a href="<?= base_url('detail/') . $course['slug']; ?>">
                                    <img src="<?= base_url('assets/services/') . $course['image']?>"></img>
                                    </a>
                                </section>

                                <div class="product__details">

                                    <section class="product__name mb-1">
                                        <a href="<?= base_url('detail/') . $course['slug']; ?>">
                                            <?= $course['title']?>
                                        </a>


                                    </section>

                                   <div class="d-flex gap-3 align-items-center">
                                    <?php
                                        if(isset($course['offer_price']) && !empty($course['offer_price'])){ 
                                    ?>
                                        <div class="product__price "><span style="text-decoration: line-through;color:#d1c5c5">Rs.<?= $course['price']?></span> Rs.<?= $course['offer_price']?></div>
                                    <?php } else {?>
                                        <div class="product__price ">Rs.<?= $course['price']?></div>
                                    <?php } ?>
                                   <!--  <a href="javascript:void(0);" class=" btn_email  "><i
                                                class="fa fa-comment  "></i> Read More</a> -->
                                   </div>
                                    <p class="mb-1 star list-start" ><?= $course['rating'] ?? '5'?><i class="fa fa-star" style="font-size: 9px;"></i> </p>

                                    <section class="product__short_description">
                                        <a href="<?= base_url('detail/') . $course['slug']; ?>">
                                          <?= strip_tags($course['short_description']) ?? ''  ;?>
                                        </a>
                                    </section>

                                    <div class="btn_book">
                                        <a href="javascript:void(0);" class="btn_bokt  "><img
                                                src="<?= base_url(); ?>assets/front/images/icon-phone.svg">
                                            +91-88102-69302</a>
                                        <a href="javascript:void(0);" class=" btn_w  "><i
                                                class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                                        <a href="javascript:void(0);" class=" btn_email btn-enquiry  "><i
                                                class="fa fa-comment  "></i> Send Enquiry</a>
                                                
                                    </div>

                                </div>

                            </div>
                        </article>
                        <?php } } else{?>
                        <article class="product col-md-3">
                            <h3>No data Found</h3>
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
                      echo $links; 
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
        let id = $(this).closest('.course-list-item').data('id');
        let enquiry_modal = $('#book-apointment-modal');
        enquiry_modal.find('.modal-title').text('Product Enquiry');
        enquiry_modal.find('[name="service_id"]').val(id);
        console.log('testtt testt');
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
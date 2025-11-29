<?= $this->extend('front/master-layout') ?>


<?= $this->section('content') ?>
<style type="text/css">
          .modal-img {
            width: 100%;
            height: auto;
        }
        .close-icon {
            position: absolute;
            top: 10px;
            right: 15px;
            z-index: 1050; /* Ensure it is above the modal content */
            color: white; /* Change color as needed */
            cursor: pointer;
        }
    </style>
</style>


<!-- Section: inner-header -->
      <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Page Header Box Start -->
          <div class="page-header-box">
            <h1 class="text-anime-style-2" >Gallery</h1>
            <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
              </ol>
            </nav>
          </div>
          <!-- Page Header Box End -->
        </div>
      </div>
    </div>
  </div>


     <!-- Gallery Grid 3 -->


      <section id="gallery" class="mt-5 mb-5">
        <div class="container">
       <!--     <div class="section-title style1 text-center mb-40">
                      
                        <h2>  Our Gallery</h2>
                    </div> -->
          <div id="image-gallery">
            <div class="row">
                <?php
                if(count($data)){

                foreach($data as $image){
                ?>
              

                
                
                  <div class="col-md-4 mb-3">

                    <div class="card" >
                      <a href="javascript:void(0);" data-id="<?= $image['id']?>" data-image="<?= base_url('assets/gallery/'). $image['image']?>" class="show-image">
                      <img src="<?= base_url('assets/gallery/'). $image['image']?>" class="card-img-top" alt="Image 1">
                    </a>
                     
                  </div>
                 
                  </div>
                
                
              
          <?php } } ?>
        <div>
            <?php
                    if($total > 9){
                        echo $links; 
                    }
                ?>
        </div>
            
            </div><!-- End row -->
          </div><!-- End image gallery -->
        </div><!-- End container --> 
      </section>



   <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <span class="close-icon" data-bs-dismiss="modal" aria-label="Close">&times;</span>
                <img src="" class="modal-img" alt="Full Image">
            </div>
        </div>
    </div>
    
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript">
  $(function(){
    $(document).on('click', '.show-image',function(e){
      e.preventDefault();
      let image = $(this).data('image');
      $('#imageModal').find('img').attr('src', image);
      $('#imageModal').modal('show');
    });
  }); 

</script>
<?= $this->endSection() ?>
<?= $this->extend('front/master-layout') ?>


<?= $this->section('content') ?>

  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Page Header Box Start -->
          <div class="page-header-box">
            <h1 class="text-anime-style-2" >Blogs</h1>
            <nav class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/'); ?>">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
              </ol>
            </nav>
          </div>
          <!-- Page Header Box End -->
        </div>
      </div>
    </div>
  </div>


<div class="page-blog">
        <div class="container">
            <div class="row">

            <?php
            if(count($posts)){


                foreach($posts as $post){


            ?>
             <div class="col-lg-4 col-md-6">
                 <!-- Blog Item Start -->
                 <div class="blog-item wow fadeInUp">
                     <!-- Post Featured Image Start-->
                     <div class="post-featured-image" data-cursor-text="View">
                         <figure>
                             <a href="#" class="image-anime">
                                 <img src="<?= base_url('assets/posts/') . $post['image']; ?>" alt="">
                             </a>
                         </figure>
                     </div>
                     <!-- Post Featured Image End -->

                     <!-- post Item Content Start -->
                     <div class="post-item-content">
                         <!-- post Item Body Start -->
                         <div class="post-item-body">
                             <h2><a href="<?= base_url('blogs/') . $post['slug']; ?>"><?= $post['title']?></a></h2>
                         </div>
                         <!-- Post Item Body End-->

                         <!-- Post Item Footer Start-->
                         <div class="post-item-footer">
                             <a href="<?= base_url('blogs/') . $post['slug']; ?>" class="readmore-btn">read more</a>
                         </div>
                         <!-- Post Item Footer End-->
                     </div>
                     <!-- post Item Content End -->
                 </div>
                 <!-- Blog Item End -->
             </div>
         <?php } } else{?>
          <div class="col-lg-4 col-md-6">
            No blogs founds
          </div>
         <?php } ?>
          



            </div>

      <div class="row">
        <div class="col-md-12">
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
      </div>
    </div>
    </div>

<?= $this->endSection() ?>
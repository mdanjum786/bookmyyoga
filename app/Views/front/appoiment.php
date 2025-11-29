<!DOCTYPE html>
<html lang="zxx">
 
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Link of CSS files -->
  <?php include './inc/css.php' ?>
    
    </head>

    <body>
        <div class="page-wrapper">
            <div class="overlay"></div>
          <?php include './inc/header.php' ?>
            <!-- Hero Section Start -->
           <div class="breadcrumb-wrap bg-f br-2">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>Book Appointment</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="index.php">Home</a></li>
                                <li>Appointment</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end -->
               <section class="appointment-form-wrap ptb-100">
                    <div class="container">
                        <div class="row">
                             <div class="col-xl-8 ">
                                <video width="100%"   controls="" controlslist="nodownload" playsinline="" muted autoplay="" loop="" poster="https://videocdn.cdnpk.net/videos/eea6da1d-0a94-4ca5-93e4-1398d2dff129/horizontal/thumbnails/large.jpg?uid=P33956938&amp;ga=GA1.1.1354215762.1730911043&amp;item_id=2814626" class="_1rv23cv0 $block $h-full $absolute $overflow-hidden $max-w-full $inset-0 $w-full $object-cover"><source src="https://videocdn.cdnpk.net/videos/faf4ca2b-0100-4401-8a2d-2047b4eaf43c/horizontal/previews/watermarked/large.mp4" type="video/mp4"></video>
                             </div>
                            <div class="col-xl-4   col-lg-14  ">
                                <form action="#" class="book-appointment-form">
                                    <div class="content-title">
                                        <h4>Support Help   Now Us </h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" placeholder="Phone Number">
                                            </div>
                                        </div>
                                       <div class="col-md-6">
                                            <div class="form-group">
                                               <input type="text" placeholder="Amount">  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-20">
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-12">
                                            <h5 class="mb-0">Gender</h5>
                                        </div>
                                        <div class="col-xl-9 col-md-9 col-sm-9 col-12">
                                            <div class="radio-btn">
                                                <div class="form-group">
                                                    <input type="radio" id="test1" name="radio-group" checked="">
                                                    <label for="test1">Male</label>
                                                  </div>
                                                  <div class="form-group">
                                                    <input type="radio" id="test2" name="radio-group">
                                                    <label for="test2">Female</label>
                                                  </div>
                                                 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select name="select_service" id="select_service">
                                                    <option value="0" data-display="Select Service">Select Service</option>
                                                    <option value="1">School</option>
                                                    <option value="2">Eduction</option>
                                                   
                                                </select>   
                                            </div>
                                        </div>
                                       
                                        
                                        
                                        <!-- <div class="col-12">
                                            <div class="form-group">
                                                <textarea name="item_desc" id="item_desc" cols="30" rows="10" placeholder="Message"></textarea>
                                            </div>
                                        </div> -->
                                        <div class="col-12">
                                            <button type="submit" class="btn style1 d-block w-100">Donate Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
 
           <!-- start-footer -->
            <?php include './inc/footer.php' ?>
           
        
        </div>
        <!-- Page Wrapper End -->
        <?php include './inc/script.php' ?>
       
    </body>
 
</html>
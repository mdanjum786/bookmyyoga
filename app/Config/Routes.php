<?php

use CodeIgniter\Router\RouteCollection;
//use App\Controllers\LoginAdminController;
/**
 * @var RouteCollection $routes
 */
#register-user
$routes->post('register-user', 'FrontController::registerUser');
$routes->get('yoga-teacher-training-course', 'LandingController::yttc');
//yttc-enquiry
$routes->get('yttc-enquiry', 'LandingController::yttc_enquiry');

//landing_enquiry
$routes->post('yttc-enquiry', 'LandingController::landing_enquiry');
$routes->get('verify-email/(:any)', 'FrontController::verify_email_bytoken/$1');
$routes->get('reset-password/(:any)', 'FrontController::reset_password_link/$1');
$routes->post('reset-password', 'FrontController::reset_password');
$routes->post('verify_user', 'FrontController::verify_user');
$routes->post('verify_email', 'FrontController::verify_email');
$routes->post('reset-link', 'FrontController::sent_reset_password');
$routes->get('/', 'FrontController::index');
$routes->get('forget-password', 'FrontController::forget_password');
$routes->get('about1', 'FrontController::about1');
$routes->get('privacy-policy', 'FrontController::privacy_policy');
$routes->get('register', 'FrontController::register');
$routes->get('term-conditions', 'FrontController::term_condition');
$routes->get('about2', 'FrontController::about2');
$routes->get('about3', 'FrontController::about3');
$routes->get('about4', 'FrontController::about4');
$routes->get('courses', 'FrontController::courses');
$routes->get('wellness', 'FrontController::wellness_list');
$routes->get('yoga-retreat', 'FrontController::yoga_retreat');
$routes->get('corporate-yoga', 'FrontController::corporate_yoga');
$routes->get('store', 'FrontController::online_store');
//$routes->get('trainers-and-studio', 'FrontController::trainers_studio');
$routes->get('team', 'FrontController::team_list');
$routes->post('send-email', 'ContactUsController::index');
$routes->post('book-apointment', 'ContactUsController::book_apointment');
$routes->get('gallery', 'FrontController::gallery');
$routes->get('video-gallery', 'FrontController::videoGallery');
$routes->get('health-awareness', 'FrontController::healthAwareness');
$routes->get('rural-development', 'FrontController::ruralDevelopment');
$routes->get('environment', 'FrontController::Environment');
$routes->get('service-list', 'FrontController::service_list');
$routes->get('services/(:any)', 'FrontController::services/$1');
$routes->get('events/(:any)', 'FrontController::events/$1');
$routes->get('donate-now', 'FrontController::donate_now');
$routes->get('blogs', 'FrontController::blog');
$routes->get('blogs/(:any)', 'FrontController::blog_detail/$1');
$routes->get('detail/(:any)', 'FrontController::detail/$1');
$routes->get('trainers-and-studio/(:any)', 'FrontController::trainers_and_studio_detail/$1');

$routes->get('women-child-development', 'FrontController::womenChildDevelopment');
$routes->get('yoga-spirituality-development', 'FrontController::yogaSpiritualityDevelopment');
$routes->get('event', 'FrontController::event');
$routes->get('member', 'FrontController::member',['filter' => 'CheckFrontAlreadyLoggedIn']);
$routes->post('user/change-password', 'FrontController::changePassword');
$routes->get('thankyou', 'FrontController::thankyou');
$routes->get('logout', 'FrontController::logout');
$routes->post('add-member', 'FrontController::addMember');
$routes->get('member-certificate', 'PdfController::memberCertificate', ['filter' => 'CheckFrontLogin']);
$routes->get('profile', 'FrontController::profile', ['filter' => 'CheckFrontLogin']);
$routes->get('about-us', 'FrontController::aboutUs');
$routes->get('contact-us', 'FrontController::contactUs');
$routes->get('login', 'FrontController::login', ['filter' => 'CheckFrontAlreadyLoggedIn']);
$routes->post('auth', 'FrontController::frontAuth');
$routes->get('dashboard', 'FrontController::dashboard', ['filter' => 'CheckFrontLogin']);
$routes->get('user/trainers-and-studio', 'FrontController::trainers_and_studio', ['filter' => 'CheckFrontLogin']);
$routes->get('trainers-and-studio', 'FrontController::trainer_studio_list');
$routes->post('get-state', 'FrontController::get_state');
$routes->post('get-city', 'FrontController::get_city');
$routes->get('admin/login', 'AdminLoginController', ['filter' => 'CheckAlreadyLoggedIn'] );
$routes->post('admin/auth', 'AdminLoginController::auth');
$routes->group('front',['filter' => 'CheckFrontLogin'], function ($routes) {
  $routes->post('update-userprofile', 'FrontController::update_userprofile');
  $routes->post('update_trainer_studio', 'FrontController::update_trainer_studio');
});
 $routes->post('admin/loginWithOther', 'AdminLoginController::loginWithOtherUser');
 $routes->post('admin/login_back', 'AdminLoginController::login_back');

$routes->group('admin', ['filter' => 'CheckAuth'], function ($routes) {
  
   // $routes->get('dashboard', 'AdminLoginController::dashboard');
   

    //admin panel controller
    $routes->get('dashboard', 'AdminPanelController');
    $routes->get('user-list', 'AdminPanelController::user_list');
    $routes->post('update_user_status', 'AdminPanelController::update_user_status');
    $routes->get('privacy-policy', 'AdminPanelController::privacy_policy');
    $routes->post('update_privacy_policy', 'AdminPanelController::update_privacy_policy');
    $routes->post('update_term_condition', 'AdminPanelController::update_term_condition');
    $routes->get('term-conditions', 'AdminPanelController::term_condition');
    $routes->get('logout', 'AdminPanelController::logout');
    $routes->get('add-gallery', 'AdminPanelController::addGallery');
    $routes->post('uploadFiles', 'AdminPanelController::uploadFiles');
    $routes->post('editGallery', 'AdminPanelController::editGallery');
    $routes->get('gallery', 'AdminPanelController::gallery');
    $routes->get('add-member', 'AdminPanelController::addMember');
    $routes->get('member-list', 'AdminPanelController::memberList');
    $routes->get('member/certificate/(:any)', 'AdminPanelController::certificate/$1');
    //$routes->get('blog', 'Admin\Blog::index');

      /*Event route*/
   $routes->get('event/create','EventController::create');
   $routes->get('event','EventController::index');
   $routes->post('event/store','EventController::store');
   $routes->post('event/change-status','EventController::changeStatus');
   $routes->post('event/get-event-data','EventController::getEventData');
   $routes->post('event/update','EventController::update');
      /*end event route*/



     /*Posts route*/
   $routes->get('posts/create','PostController::create');
   $routes->get('posts','PostController::index');
   $routes->post('posts/store','PostController::store');
   $routes->post('posts/change-status','PostController::changeStatus');
   $routes->post('posts/get-event-data','PostController::getEventData');
   $routes->post('posts/update','PostController::update');
      /*end event route*/

         /*servcie route*/
   $routes->get('services/create','ServicesController::create');
    $routes->get('services/edit/(:any)','ServicesController::edit/$1');
   $routes->get('services','ServicesController::index');
   $routes->post('services/store','ServicesController::store');
   $routes->post('services/change-status','ServicesController::changeStatus');
   $routes->post('services/get-event-data','ServicesController::getEventData');
   $routes->post('services/update','ServicesController::update');

      /* Route For Teams*/
   $routes->get('team','TeamController::index');
   $routes->post('team/store','TeamController::store');
   $routes->post('team/change-status','TeamController::changeStatus');
   $routes->post('team/get-team-data','TeamController::getTeamData');
   $routes->post('team/update','TeamController::update');
      /* end Route For Teams*/

      /* Route For Config*/
   $routes->get('config','ConfigController::index');
   $routes->post('config/store','ConfigController::store');

   //Route for testimonials
  $routes->get('testimonials','Testimonials::index');
  $routes->get('testimonials/create','Testimonials::create');
  $routes->post('testimonials/store','Testimonials::store');
  $routes->post('testimonials/change-status','Testimonials::changeStatus');
  $routes->post('testimonials/get-testimonials-data','Testimonials::getTestimonialsData');
  $routes->post('testimonials/update','Testimonials::update');

  //sliders

  $routes->get('slider/create', 'SliderController::create');
  $routes->get('slider/edit/(:any)', 'SliderController::edit/$1');
  $routes->post('slider/uploadFiles', 'SliderController::uploadFiles');
  $routes->post('slider/editSlider', 'SliderController::editSlider');
  $routes->get('slider', 'SliderController::index');

  $routes->post('slider/updateSlider', 'SliderController::updateSlider');

  //client

  $routes->get('client/create', 'ClientController::create');
  $routes->post('client/uploadFiles', 'ClientController::uploadFiles');
  $routes->post('client/editClient', 'ClientController::editClient');
  $routes->get('client', 'ClientController::index');
    //video-gallery

  $routes->get('video-gallery', 'VideoGalleryController::index');
  $routes->get('video-gallery/create', 'VideoGalleryController::create');
  $routes->post('video-gallery/uploadFiles', 'VideoGalleryController::uploadFiles');
  $routes->post('video-gallery/editGallery', 'VideoGalleryController::editClient');
  $routes->post('video-gallery/add', 'VideoGalleryController::add');
  $routes->post('video-gallery/get', 'VideoGalleryController::getDataById');
  $routes->post('video-gallery/update', 'VideoGalleryController::update');

  #trainer-studio
  $routes->get('trainers-and-studio', 'TrainerController::index');
  $routes->get('trainers-and-studio', 'TrainerController::index');
  $routes->post('trainers-and-studio/change-status','TrainerController::changeStatus');
  //$routes->get('video-gallery', 'VideoGalleryController::index');
});


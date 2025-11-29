<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\MyController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use CodeIgniter\Exceptions\PageNotFoundException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use App\Models\AdminModel;
use App\Models\TrainersAndStudioModel;

use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\SMTP;  
use PHPMailer\PHPMailer\Exception;

class FrontController extends MyController
{
    public function index()
    {
        //
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES ';
        $data['meta_description'] = "BOOKMYYOGA connects you with certified yoga instructors and classes across India. Discover personalized sessions, wellness retreats, and holistic health guidance—all in one place";
        $data['meta_keywords'] = "yoga teacher training course,book yoga classes online, yoga teacher booking, yoga retreat India, online yoga sessions, book yoga near me, yoga class scheduler, virtual yoga classes, certified yoga instructors, yoga booking platform, yoga session reservations, private yoga lessons, group yoga bookings, yoga event registration, yoga class finder India, yoga class booking app, book my yoga, yoga class management, yoga teacher scheduling, yoga therapy sessions, wellness booking portal
";
        $database = \Config\Database::connect();
        $db = $database->table('gallery');
        $db->where('status', 1);
        $db->orderBy('id', 'RANDOM');
        $db->limit(8);
        $galley_data = $db->get()->getResultArray();
        $data['gallery_images'] = $galley_data;
         #video gallery data
        $query = $database->table('video_gallery');
        $video_gallery = $query->where('status', 1)->limit(8)->get()->getResultArray();
        $data['video_gallery'] = $video_gallery;
         #servcies data
        $query = $database->table('posts');
        $posts = $query->where('status', 1)
        ->orderBy('id', 'desc')
        ->limit(9)
        ->get()

        ->getResultArray();
        $data['posts'] = $posts;
        #team data
        $query = $database->table('teams');
        $teams = $query->where('status', 1)->get()->getResultArray();
        $data['teams'] = $teams;
        #slider data
        #team data
        $query = $database->table('sliders');
        $sliders = $query->where('status', 1)->get()->getResultArray();
        $data['sliders'] = $sliders;
        #cleint data
        $query = $database->table('clients');
        $clients = $query->where('status', 1)->get()->getResultArray();
        $data['clients'] = $clients;
        #testimonials
        $query = $database->table('testimonials');
        $testimonials = $query->where('status', 1)->get()->getResultArray();
        $data['testimonials'] = $testimonials;
     
        $cur_date = strtotime(date('Y-m-d'));
      
        $this->load_view('front/home',$data);
    }
    public function gallery(){
        $data['meta_title'] = 'Galley';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $database = \Config\Database::connect();
        // $db = $database->table('gallery');
        // $db->where('status', 1);
        // $db->orderBy('id', 'DESC');
        // $galley_data = $db->get()->getResultArray();
        // $data['gallery_images'] = $galley_data;
        $perPage=9;
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        //$this->db->connect();
        $offset = ($page-1) * $perPage;
    
        $builder = $database->table('gallery as t1');
        $data2 = $builder
        ->where('t1.status',1)
            ->select('t1.*')
            ->orderBy('t1.id', 'DESC')
            ->get($perPage,$offset)
            ->getResultArray();
    
        $total = $builder->where('t1.status',1)->countAllResults();
        $data['data'] = $data2;
        $data['total'] = $total;
        $data['links'] = $pager->makeLinks($page,$perPage,$total);
    
        $this->load_view('front/gallery',$data);
        //return view('front/gallery', $data);
    }
   public function videoGallery(){
        $data['meta_title'] = 'Video Galley';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $database = \Config\Database::connect();
         $perPage=9;
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        //$this->db->connect();
        $offset = ($page-1) * $perPage;
    
        $builder = $database->table('video_gallery as t1');
        $data2 = $builder
        ->where('t1.status',1)
            ->select('t1.*')
            ->orderBy('t1.id', 'DESC')
            ->get($perPage,$offset)
            ->getResultArray();
    
        $total = $builder->where('t1.status',1)->countAllResults();
        $data['data'] = $data2;
        $data['links'] = $pager->makeLinks($page,$perPage,$total);
        $data['total'] = $total;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load_view('front/video-gallery',$data);
        //return view('front/gallery', $data);
    }
     public function member(){
        $data['meta_title'] = 'Become Member';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/member',$data);
       // return view('front/member', $data);
    }

    public function womenChildDevelopment(){
        $data['meta_title'] = 'Women AND Child Development';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/women-child-development',$data);
       // return view('front/member', $data);
    }
    public function yogaSpiritualityDevelopment(){
        $data['meta_title'] = 'Yoga And Spirituality Development';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/yoga-spirituality-development',$data);
       // return view('front/member', $data);
    }
    public function environment(){
        $data['meta_title'] = 'Environment';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/environment',$data);
       // return view('front/member', $data);
    }
    public function healthAwareness(){
        $data['meta_title'] = 'Health Awareness';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/health-awareness',$data);
       // return view('front/member', $data);
    }
     public function ruralDevelopment(){
        $data['meta_title'] = 'Rural Development';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/rural-development',$data);
       // return view('front/member', $data);
    }
    public function addMember(){
        helper(['form']);
        $validation =  \Config\Services::validation();
        $database = \Config\Database::connect();
        $db = $database->table('members');
        $img = $this->request->getFile('profile');
        $session = \Config\Services::session();
       $rules = [
            "email" => [
                "label" => "Email", 
                "rules" => "required|valid_email|is_unique[members.email]"
            ],
            "password" => [
                "label" => "Password", 
                "rules" => "required|min_length[6]"
            ],
            "name" =>[
                "label" => "Name",
                "rules" => 'required'
            ],
            "mobile_no" =>[
                "label" => "Mobile No",
                "rules" => 'required|min_length[10]'
            ],
            "aadhar_no" =>[
                "label" => "aadhar no",
                "rules" => 'required|min_length[12]'
            ],
            "city" =>[
                "label" => "City",
                "rules" => 'required'
            ],
            "nationality" =>[
                "label" => "nationality",
                "rules" => 'required'
            ],
            
              "gender" =>[
                "label" => "gender",
                "rules" => 'required'
            ],
              "address" =>[
                "label" => "Address",
                "rules" => 'required'
            ],
              "pincode" =>[
                "label" => "Pincode",
                "rules" => 'required'
            ],
            'profession' => [
                "label" => "Profession",
                "rules" => 'required'
            ],
            'profile' => [
                "label" => "Profile Image",
                'rules'  => 'uploaded[profile]|mime_in[profile,image/jpeg,image/png,image/jpg]'
               
            ]

        ];

        if ($this->validate($rules)) {
          
            if (! $img->hasMoved()) {
               $newName = time() . '-member-' . $img->getClientName()  ;
               $img->move(ROOTPATH . 'assets/profile',$newName);
               $createdtime = time();
                $data = [
                    'profile' =>  $newName,
                    'email' =>  $this->request->getPost('email'),
                    'password' =>  $this->request->getPost('password'),
                    'mobile_no' =>  $this->request->getPost('mobile_no'),
                    'aadhar_no' =>  $this->request->getPost('aadhar_no'),
                    'city' =>  $this->request->getPost('city'),
                    'nationality' =>  $this->request->getPost('nationality'),
                    'gender' =>  $this->request->getPost('gender'),
                    'address' =>  $this->request->getPost('address'),
                    'pincode' =>  $this->request->getPost('pincode'),
                    'name' =>  $this->request->getPost('name'),
                    'profession' => $this->request->getPost('profession'),
                    'createddate' => $createdtime
                   
                ];
     
                $save = $db->insert($data);
                $inserted_id = $database->insertID();
                if($save){
                    if($this->request->getPost('front_signup')){
                        $session_data = [
                            'front_username'  =>  $this->request->getPost('name'),
                            'front_userid'  => sprintf("%06d", $inserted_id),
                            'front_email'     => $this->request->getPost('email'),
                            'front_logged_in' => true,
                            'front_createdtime' => $createdtime,
                        ];
                 
                        $session->set($session_data);
                    }
                    $msg['status']  = true;
                    $msg['msg'] = 'Registered successfully';
                    echo json_encode($msg);
                    exit();
                }
                
                $msg['status']  = false;
                $msg['msg'] = 'Something wrong, Please try again';
                $msg['data']  = [];
                echo json_encode($msg);
                exit();
            }
            $msg['status']  = false;
            $msg['msg'] = 'Something wrong, Please try again';
            $msg['data']  = [];
            echo json_encode($msg);
            exit();
        }
        $msg['status'] = false;
        $msg['msg'] = 'Please fill all required fields';
        $msg['data'] = json_decode(json_encode($validation->getErrors()), true);// (array)$validation->getErrors();
        echo json_encode($msg);
        exit();
    }
    public function thankyou(){
        $data['meta_title'] = 'thankyou';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $session = \Config\Services::session();
        $this->load_view('front/thankyou',$data);
        //return view('front/thankyou', $data);
    }
    public function logout(){
        if(session()->has('logged_in')) {
            session()->remove('logged_in');
            session()->remove('username');
            session()->remove('name');
            session()->remove('email');
            session()->remove('phone_no');
            session()->remove('user_id');
            session()->remove('profile_image');
            session()->remove('address');
            session()->remove('role_id');
            session()->remove('is_admin');
            return redirect()->to('login')->with('fail', "You are logged out.");
        }
    }
    public function memberCertificate(){
         $dompdf = new Dompdf();

         $data = [
            'border_image'    => $this->imageToBase64(ROOTPATH . '/assets/images/pdf/s2.png'),
            'logo'    => $this->imageToBase64(ROOTPATH . '/assets/images/logo-wide.png'),
            'qr'    => $this->imageToBase64(ROOTPATH . '/assets/images/pdf/qr.png'),
            'email'         => session()->get('front_email'),
            'name'      => session()->get('front_username'),
            'user_id'      => session()->get('front_userid'),
            'mobileNumber' => '000000000',
        ];
      
        //$dompdf->set_paper("a4", "portrait");
        $html = view('front/member-pdf', $data);

        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('member.pdf', [ 'Attachment' => false ]);
        
        return view('front/member-pdf');
    
    }
    private function imageToBase64($path) {
        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
    public function aboutUs(){
        $database = \Config\Database::connect();
         $query = $database->table('teams');
        $teams = $query->where('status', 1)->get()->getResultArray();
        $data['teams'] = $teams;
         $query = $database->table('testimonials');
        $testimonials = $query->where('status', 1)->get()->getResultArray();
        $data['testimonials'] = $testimonials;
        #slider data
         #servcies data
        $data['meta_title'] = 'About Us - ';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/about-us', $data);
    }
     public function contactUs(){
        $data['meta_title'] = 'Contact Us ';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/contact-us',$data);
       // return view('front/contact-us');
    }
    public function login(){
        $data['meta_title'] = 'Login';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/login',$data);
       // return view('front/login');
    }
    public function frontAuth(){
         //$data = [];
        helper(['form']);
        //$session = \Config\Services::session();
       // $session = \Config\Services::session($config);
        $session = \Config\Services::session();
        if ($this->request->getMethod() == "POST") {
            $validation =  \Config\Services::validation();

            $rules = [
                "username" => [
                    "label" => "Email/Usernname", 
                    "rules" => "required"
                ],
                "password" => [
                    "label" => "Password", 
                    "rules" => "required"
                ],
                
            ];

            if ($this->validate($rules)) {
                $data = array('email'=>$this->request->getPost('email'),'password'=>$this->request->getPost('password')); 
                $db = \Config\Database::connect();
                $fields = 'username';
                if (filter_var($this->request->getPost('username'), FILTER_VALIDATE_EMAIL)) {
                        $fields = 'email';
                } 


                $builder = $db->table('admins');
                $query =    $builder->where([$fields => $this->request->getPost('username'), 'password' => md5($this->request->getPost('password')), 'status' => 1])->get();
                $userdata = $query->getResultArray();
                if(count($userdata) == 1){
                     $session_data = [
                        'username'  => $userdata[0]['username'],
                        'name'  => $userdata[0]['name'],
                        'email'     =>  $userdata[0]['email'],
                        'user_id'  => $userdata[0]['id'],
                        'phone_no'  => $userdata[0]['phone_no'],
                        'address'  => $userdata[0]['address']  ?? '',
                        'profile_image'  => $userdata[0]['profile_image'] ?? '' ,
                        'logged_in' => true,
                        'role_id' =>  $userdata[0]['role'],
                    ];
                    if($userdata[0]['role'] == 1){
                        $session_data['is_admin'] = true;
                    }
                    // echo "sss";
                    // die;
                    $session->set($session_data);
                    $session->regenerate();
                    $msg['status'] = true;
                    $msg['msg'] = 'User loggedin successfully';
                    echo json_encode($msg);
                    exit();
                }

                $msg['status'] = false;
                $msg['msg'] = 'Invalid credentials';
                echo json_encode($msg);
                exit();  
               
            } else {
                $msg['status'] = false;
                $msg['msg'] = 'Please fill email and password
                ';
                $msg['data'] = $validation->getErrors();
                echo json_encode($msg);
                exit();
            }
        }

    }

    public function dashboard(){
        // echo "<pre>";
        // print_r(session()->get());
        // echo "</pre>";
        $data['meta_title'] = 'User dashboard';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/dashboard',$data);
        //return view('front/dashboard', $data);
    }

    public function event(){
          $database = \Config\Database::connect();
    
       // $perPage=12;
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $perPage = $this->request->getVar('limit') ?? 12;
        $order_data = $this->request->getVar('sort') ?? 'date';
        $orderby = $this->request->getVar('sort') ?? 'id';
        $course_order = 'desc';
        switch($orderby){
            case 'id':
            $orderby = 'id';
                $course_order = 'desc';
                break;
                  case 'date':
                    $orderby = 'id';
                $course_order = 'desc';
                # code...
                break;
                  case 'atoz':
                  $orderby = 'title';
                $course_order = 'asc';
                break;
                  case 'ztoa':
                $orderby = 'title';
                $course_order = 'desc';
                break;
                 
        }
        //$this->db->connect();
        $offset = ($page-1) * $perPage;
    
        $builder = $database->table('services as t1');
        $data2 = $builder
        ->where('t1.status',1)
        ->where('t1.type','event')
            ->select('t1.*')
            ->orderBy($orderby, $course_order)
            ->get($perPage,$offset)
            ->getResultArray();
    
        $total = $builder->where('t1.status',1)->where('t1.type', 'event')->countAllResults();
        $data['courses'] = $data2;
        $data['total'] = $total;
        $data['perPage'] = $perPage;
        $data['order_data'] = $order_data;
        $data['links'] = $pager->makeLinks($page,$perPage,$total);
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "servcie list";
        $data['meta_keywords'] = "servcie list";

        $this->load_view('front/event',$data);
        //return view('front/dashboard', $data);
    }
    public function changePassword(){
        
        $validation =  \Config\Services::validation();
        $database = \Config\Database::connect();
       // $img = $this->request->getFile('members');
        if(!session()->has('front_logged_in')){
            $msg['status'] = false;
            $msg['msg'] = 'Something Wrong';
            $msg['data'] = [];
            echo json_encode($msg);
            exit();
        }
        
        $rules = [
             'password' => [
                'label' => 'Password',
                'rules' => 'required|max_length[255]|min_length[6]',  
            ],
            'crm_password' =>[
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]|max_length[255]|min_length[6]'
            ],
        ];
    
        if ($this->validate($rules)) {
            $db = $database->table('members');
            $data = [
                'password' => $this->request->getPost('password')
            ];
            $db->where('email', session('front_email'));
            $save = $db->update($data);
            if($save){
                $msg['status'] = true;
                $msg['msg'] = 'Password updated successfully';
                echo json_encode($msg);
                exit();
            }
            $msg['status'] = false;
            $msg['msg'] = 'Something wrong, Please try again!';
            $msg['data'] = [];
            echo json_encode($msg);
            exit();
        }
        $msg['status'] = false;
        $msg['msg'] = 'Please fill all required fields';
        $msg['data'] = $validation->getErrors();// (array)$validation->getErrors();
        echo json_encode($msg);
        exit();
        /*
            'password'     => 'required|max_length[255]',
        'pass_confirm' => 'required|max_length[255]|matches[password]',
        */
    }
    public function services($slug){

        
        $database = \Config\Database::connect();
         $query = $database->table('services');
        $services = $query->where('status', 1)->where('slug', $slug)->get()->getResultArray();
        if(count($services) == 0){
            throw PageNotFoundException::forPageNotFound();
        }
        // echo "<pre>";
        // print_r($services);
        // echo "</pre>";
        // die;
        $query = $database->table('events');
        $events = $query->where('status', 1)->where('service_id', $services[0]['id'])->get()->getResultArray();

        $db = $database->table('gallery');
        $db->where('status', 1);
        $db->orderBy('id', 'RANDOM');
        $db->limit(8);
        $galley_data = $db->get()->getResultArray();
        $data['gallery_images'] = $galley_data;
         #video gallery data
        $query = $database->table('video_gallery');
        $video_gallery = $query->where('status', 1)->limit(8)->get()->getResultArray();
        $data['video_gallery'] = $video_gallery;
        $data['service'] = $services;
        $data['s_events'] = $events;
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';

        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/services',$data);
    }
    public function events($slug){
          $database = \Config\Database::connect();
         $query = $database->table('events');
        $events = $query->where('status', 1)->where('slug', $slug)->get()->getResultArray();
        if(count($events) == 0){
            throw PageNotFoundException::forPageNotFound();
        }
        // echo "<pre>";
        // print_r($services);
        // echo "</pre>";
        // die;
        $db = $database->table('gallery');
        $db->where('status', 1);
        $db->orderBy('id', 'RANDOM');
        $db->limit(8);
        $galley_data = $db->get()->getResultArray();
        $data['gallery_images'] = $galley_data;
         #video gallery data
        $query = $database->table('video_gallery');
        $video_gallery = $query->where('status', 1)->limit(8)->get()->getResultArray();
        $data['video_gallery'] = $video_gallery;
        $data['event'] = $events;
        $data['meta_title'] = 'servcie';

        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/event-details',$data);
    }

    public function donate_now(){
         $data['meta_title'] = 'servcie';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/appointment',$data);
    }
     public function about1(){
         $data['meta_title'] = 'servcie';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/about1',$data);
    }
 
    public function about2(){
         $data['meta_title'] = 'servcie';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/about2',$data);
    }
    public function about3(){
         $data['meta_title'] = 'servcie';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/about3',$data);
    }
    public function about4(){
         $data['meta_title'] = 'servcie';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/about4',$data);
    }
    public function team_list(){
          $data['meta_title'] = 'servcie';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/team-list',$data);
    }
    public function service_list(){
         $database = \Config\Database::connect();
            #testimonials
        $query = $database->table('testimonials');
        $testimonials = $query->where('status', 1)->get()->getResultArray();
        $data['testimonials'] = $testimonials;
           $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "servcie list";
        $data['meta_keywords'] = "servcie list";
        $this->load_view('front/service-list',$data);
    }
    public function blog(){
        $database = \Config\Database::connect();
    
        $perPage=12;
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        //$this->db->connect();
        $offset = ($page-1) * $perPage;
    
        $builder = $database->table('posts as t1');
        $data2 = $builder
        ->where('t1.status',1)
            ->select('t1.*')
            ->orderBy('t1.id', 'DESC')
            ->get($perPage,$offset)
            ->getResultArray();
    
        $total = $builder->where('t1.status',1)->countAllResults();
        $data['posts'] = $data2;
        $data['total'] = $total;
        $data['perPage'] = $perPage;
        $data['links'] = $pager->makeLinks($page,$perPage,$total);
           $data['meta_title'] = 'BOOKMYYOGA - blog list';
        $data['meta_description'] = "servcie list";
        $data['meta_keywords'] = "servcie list";
        $this->load_view('front/blogs',$data);
    }
    public function blog_detail($slug){
        $database = \Config\Database::connect();
         $query = $database->table('posts');
        $posts = $query->where('status', 1)->where('slug', $slug)->get()->getResultArray();
        if(count($posts) == 0){
            throw PageNotFoundException::forPageNotFound();
        }
       
        $db = $database->table('posts');
        $db->where('status', 1);
        $db->where('slug !=', $slug);
        $db->orderBy('id', 'RANDOM');
        $db->limit(8);
        $post_list = $db->get()->getResultArray();
        $data['post_list'] = $post_list;
        $data['posts'] = $posts;
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/blog_details',$data);
    }

    public function wellness_list(){
        $database = \Config\Database::connect();
    
       // $perPage=12;
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $perPage = $this->request->getVar('limit') ?? 12;
        $order_data = $this->request->getVar('sort') ?? 'date';
        $orderby = $this->request->getVar('sort') ?? 'id';
        $course_order = 'desc';
        switch($orderby){
            case 'id':
            $orderby = 'id';
                $course_order = 'desc';
                break;
                  case 'date':
                    $orderby = 'id';
                $course_order = 'desc';
                # code...
                break;
                  case 'atoz':
                  $orderby = 'title';
                $course_order = 'asc';
                break;
                  case 'ztoa':
                $orderby = 'title';
                $course_order = 'desc';
                break;
                 
        }
        //$this->db->connect();
        $offset = ($page-1) * $perPage;
    
        $builder = $database->table('services as t1');
        $data2 = $builder
        ->where('t1.status',1)
        ->where('t1.type','wellness')
            ->select('t1.*')
            ->orderBy($orderby, $course_order)
            ->get($perPage,$offset)
            ->getResultArray();
    
        $total = $builder->where('t1.status',1)->where('t1.type', 'wellness')->countAllResults();
        $data['courses'] = $data2;
        $data['total'] = $total;
        $data['perPage'] = $perPage;
        $data['order_data'] = $order_data;
        $data['links'] = $pager->makeLinks($page,$perPage,$total);
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "servcie list";
        $data['meta_keywords'] = "servcie list";
        $this->load_view('front/wellness-list',$data);
    }
       public function yoga_retreat(){
         $database = \Config\Database::connect();
    
       // $perPage=12;
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $perPage = $this->request->getVar('limit') ?? 12;
        $order_data = $this->request->getVar('sort') ?? 'date';
        $orderby = $this->request->getVar('sort') ?? 'id';
        $course_order = 'desc';
        switch($orderby){
            case 'id':
            $orderby = 'id';
                $course_order = 'desc';
                break;
                  case 'date':
                    $orderby = 'id';
                $course_order = 'desc';
                # code...
                break;
                  case 'atoz':
                  $orderby = 'title';
                $course_order = 'asc';
                break;
                  case 'ztoa':
                $orderby = 'title';
                $course_order = 'desc';
                break;
                 
        }
        //$this->db->connect();
        $offset = ($page-1) * $perPage;
    
        $builder = $database->table('services as t1');
        $data2 = $builder
        ->where('t1.status',1)
        ->where('t1.type','yoga-retreat')
            ->select('t1.*')
            ->orderBy($orderby, $course_order)
            ->get($perPage,$offset)
            ->getResultArray();
    
        $total = $builder->where('t1.status',1)->where('t1.type', 'yoga-retreat')->countAllResults();
        $data['courses'] = $data2;
        $data['total'] = $total;
        $data['perPage'] = $perPage;
        $data['order_data'] = $order_data;
        $data['links'] = $pager->makeLinks($page,$perPage,$total);
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "servcie list";
        $data['meta_keywords'] = "servcie list";
        $this->load_view('front/yoga-retreat',$data);
    }
       public function corporate_yoga(){
        $database = \Config\Database::connect();
    
       // $perPage=12;
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $perPage = $this->request->getVar('limit') ?? 12;
        $order_data = $this->request->getVar('sort') ?? 'date';
        $orderby = $this->request->getVar('sort') ?? 'id';
        $course_order = 'desc';
        switch($orderby){
            case 'id':
            $orderby = 'id';
                $course_order = 'desc';
                break;
                  case 'date':
                    $orderby = 'id';
                $course_order = 'desc';
                # code...
                break;
                  case 'atoz':
                  $orderby = 'title';
                $course_order = 'asc';
                break;
                  case 'ztoa':
                $orderby = 'title';
                $course_order = 'desc';
                break;
                 
        }
        //$this->db->connect();
        $offset = ($page-1) * $perPage;
    
        $builder = $database->table('services as t1');
        $data2 = $builder
        ->where('t1.status',1)
        ->where('t1.type','corporate-yoga')
            ->select('t1.*')
            ->orderBy($orderby, $course_order)
            ->get($perPage,$offset)
            ->getResultArray();
    
        $total = $builder->where('t1.status',1)->where('t1.type', 'corporate-yoga')->countAllResults();
        $data['courses'] = $data2;
        $data['total'] = $total;
        $data['perPage'] = $perPage;
        $data['order_data'] = $order_data;
        $data['links'] = $pager->makeLinks($page,$perPage,$total);
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "servcie list";
        $data['meta_keywords'] = "servcie list";
        $this->load_view('front/corporate-yoga',$data);
    }
       public function online_store(){
         $database = \Config\Database::connect();
    
       // $perPage=12;
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $perPage = $this->request->getVar('limit') ?? 12;
        $order_data = $this->request->getVar('sort') ?? 'date';
        $orderby = $this->request->getVar('sort') ?? 'id';
        $course_order = 'desc';
        switch($orderby){
            case 'id':
            $orderby = 'id';
                $course_order = 'desc';
                break;
                  case 'date':
                    $orderby = 'id';
                $course_order = 'desc';
                # code...
                break;
                  case 'atoz':
                  $orderby = 'title';
                $course_order = 'asc';
                break;
                  case 'ztoa':
                $orderby = 'title';
                $course_order = 'desc';
                break;
                 
        }
        //$this->db->connect();
        $offset = ($page-1) * $perPage;
    
        $builder = $database->table('services as t1');
        $data2 = $builder
        ->where('t1.status',1)
        ->where('t1.type','online-store')
            ->select('t1.*')
            ->orderBy($orderby, $course_order)
            ->get($perPage,$offset)
            ->getResultArray();
    
        $total = $builder->where('t1.status',1)->where('t1.type', 'online-store')->countAllResults();
        $data['courses'] = $data2;
        $data['total'] = $total;
        $data['perPage'] = $perPage;
        $data['order_data'] = $order_data;
        $data['links'] = $pager->makeLinks($page,$perPage,$total);
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "servcie list";
        $data['meta_keywords'] = "servcie list";

        $this->load_view('front/online-store',$data);
    }
       public function trainers_studio(){
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $this->load_view('front/trainers-studio',$data);
    }
    public function courses(){
        $database = \Config\Database::connect();
    
       // $perPage=12;
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $perPage = $this->request->getVar('limit') ?? 12;
        $order_data = $this->request->getVar('sort') ?? 'date';
        $orderby = $this->request->getVar('sort') ?? 'id';
        $course_order = 'desc';
        switch($orderby){
            case 'id':
            $orderby = 'id';
                $course_order = 'desc';
                break;
                  case 'date':
                    $orderby = 'id';
                $course_order = 'desc';
                # code...
                break;
                  case 'atoz':
                  $orderby = 'title';
                $course_order = 'asc';
                break;
                  case 'ztoa':
                $orderby = 'title';
                $course_order = 'desc';
                break;
                 
        }
        //$this->db->connect();
        $offset = ($page-1) * $perPage;
    
        $builder = $database->table('services as t1');
        $data2 = $builder
        ->where('t1.status',1)
        ->where('t1.type','course')
            ->select('t1.*')
            ->orderBy($orderby, $course_order)
            ->get($perPage,$offset)
            ->getResultArray();
    
        $total = $builder->where('t1.status',1)->countAllResults();
        $data['courses'] = $data2;
        $data['total'] = $total;
        $data['perPage'] = $perPage;
        $data['order_data'] = $order_data;
        $data['links'] = $pager->makeLinks($page,$perPage,$total);
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "servcie list";
        $data['meta_keywords'] = "servcie list";
        $this->load_view('front/course',$data);
    }
    public function detail($slug){

    	$data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "servcie list";
        $data['meta_keywords'] = "servcie list";
        $database = \Config\Database::connect();
         $query = $database->table('services');
        $services = $query->where('status', 1)->where('slug', $slug)->get()->getResultArray();
        if(count($services) == 0){
            throw PageNotFoundException::forPageNotFound();
        }

        $data['service'] = $services;
      
        $this->load_view('front/details',$data);
    }
     public function privacy_policy(){
         $database = \Config\Database::connect();
        $db = $database->table('privacy_policy');
        $db->where('status', 1);
        $db->orderBy('id', 'DESC');
        $privacy_policy = $db->get()->getResultArray();
        $data['privacy_policy'] = $privacy_policy;

        $data['meta_title'] = 'BOOKMYYOGA - Privacy And Policy';
        $data['meta_description'] = "Privacy And Policy";
        $data['meta_keywords'] = "Privacy And Policy";
       
        $this->load_view('front/privacy_policy',$data);
    }
     public function term_condition(){
         $database = \Config\Database::connect();
        $db = $database->table('term_condition');
        $db->where('status', 1);
        $db->orderBy('id', 'DESC');
        $term_condition = $db->get()->getResultArray();
        $data['term_condition'] = $term_condition;

        $data['meta_title'] = 'BOOKMYYOGA - Term And Condition';
        $data['meta_description'] = "Term And Condition";
        $data['meta_keywords'] = "Term And Condition";
            
        $this->load_view('front/term_condition',$data);
    }
    public function register(){
        $data['meta_title'] = 'BOOKMYYOGA - REGISTER';
        $data['meta_description'] = "BOOKMYYOGA - REGISTER";
        $data['meta_keywords'] = "BOOKMYYOGA - REGISTER";
         $this->load_view('front/register',$data);
    }
    public function registerUser(){
        //dd('test');
         helper(['form']);
        $validation =  \Config\Services::validation();
        $database = \Config\Database::connect();
        $db = $database->table('admins');
        $session = \Config\Services::session();
       $rules = [
            "email" => [
                "label" => "Email", 
                "rules" => "required|valid_email|is_unique[admins.email]"
            ],
             "username" => [
                "label" => "Username", 
                "rules" => "required|is_unique[admins.username]"
            ],
            "password" => [
                "label" => "Password", 
                "rules" => "required|min_length[6]"
            ],
             "confirm_password" => [
                "label" => "Confirm Password", 
                "rules" => "matches[password]"
            ],
            "name" =>[
                "label" => "Name",
                "rules" => 'required'
            ],
            "mobile_no" =>[
                "label" => "Mobile No",
                "rules" => 'required|min_length[10]'
            ],
            
          

        ];

        if ($this->validate($rules)) {
          
               $createdtime = time();
               $role = 2;
               switch ($this->request->getPost('usertype')) {
                   case 2:
                   $role = $this->request->getPost('usertype');
                       # code...
                       break;

                         case 3:
                         $role = $this->request->getPost('usertype');
                       # code...
                       break;
                       
                         case 4:
                         $role = $this->request->getPost('usertype');
                       # code...
                       break;
                       
                         case 5:
                         $role = $this->request->getPost('usertype');
                       # code...
                       break;
                       
                   
                   default:
                       # code...
                       break;
               }
                $data = [
                    'username' =>  $this->request->getPost('username'),
                    'email' =>  $this->request->getPost('email'),
                    'password' =>  md5(trim($this->request->getPost('password'))),
                    'phone_no' =>  $this->request->getPost('mobile_no'),
                    'name' =>  $this->request->getPost('name'),
                    'role' =>  $role,
                ];
     
                $save = $db->insert($data);
                $inserted_id = $database->insertID();
                if($save){
                    self::verifyEmail($data);
                 
                    $msg['status']  = true;
                    $msg['msg'] = 'Registered successfully, Please verify your email';
                    echo json_encode($msg);
                    exit();
                }
                
                $msg['status']  = false;
                $msg['msg'] = 'Something wrong, Please try again';
                $msg['data']  = [];
                echo json_encode($msg);
                exit();
            
            $msg['status']  = false;
            $msg['msg'] = 'Something wrong, Please try again';
            $msg['data']  = [];
            echo json_encode($msg);
            exit();
        }
        $msg['status'] = false;
        $msg['msg'] = 'Please fill all required fields';
        $msg['data'] = json_decode(json_encode($validation->getErrors()), true);// (array)$validation->getErrors();
        echo json_encode($msg);
        exit();
    }
    private function verifyEmail($userData){
        $key = "shamsanjum123456789";

        //JWT::decode($token, $this->key, ['HS256']);

        $data  = [
            'username' => $userData['username'],
            'email' => $userData['email']
        ];
        $verify_link = base_url('verify-email') . '/' . JWT::encode($data, $key,'HS256');
        //JWT::encode($data, $this->key);
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';             //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@bookmyyoga.in';   //  sender username
        $mail->Password = 'Nazre@321';       // sender password
        $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
        $mail->Port = 587;                          // port - 587/465

        $mail->setFrom('no-reply@bookmyyoga.in', 'bookmyyoga.in');
        $mail->addAddress($userData['email']);
          $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = 'Verify Email';//$request->emailSubject;
        $body = '
            Hi '.$userData['name'].',<br />

            Verify your email to click below button <br/>
            <a href="'.$verify_link.'">Verify Email</a>


        ';
        $mail->Body    =  $body;//$this->request->getPost('subj
        if($mail->send()){
            return true;
        }
        return false;
    }
    public function verify_user(){
        $userdata = new AdminModel();
        $user = $userdata->where('username', $this->request->getPost('username'))->first();
        if($user){
            echo "false";
            exit(0);
        }
        echo "true";
        exit(0);

    }
    public function verify_email(){
        $userdata = new AdminModel();
        $user = $userdata->where('email', $this->request->getPost('email'))->first();
        if($user){
            echo "false";
            exit(0);
        }
        echo "true";
        exit(0);
    }
    public function verify_email_bytoken($token){
       // echo $token;
      //  die;
        $msg = 'Invalid email verification link';
        $status = false;
        $key = "shamsanjum123456789";
        $data =  JWT::decode($token, new Key($key, 'HS256'));
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        if($data){
            $userdata = new AdminModel();
            $user = $userdata->where('email', $data->email)->first();
            // echo "<pre>";
            // print_r($user);
            // echo "</pre>";
            if($user){
                $status = true;
                $msg = "Email verify successfully";
                if($user['status']){
                    $msg = "Email already verified";
                }else{
                    $updateData = [
                    'status' => 1
                    ]; 
                    $userdata->update($user['id'], $updateData);
                }  
            }
        }

       $this->load_view('front/verify-email',compact('msg','status'));

    }
    public function forget_password(){
        $data['meta_title'] = 'BOOKMYYOGA - FORGET PASSWORD';
        $data['meta_description'] = "BOOKMYYOGA - FORGET PASSWORD";
        $data['meta_keywords'] = "BOOKMYYOGA - FORGET PASSWORD";
        $this->load_view('front/forget-password', $data);
    }
    public function sent_reset_password(){
         $key = "shamsanjum123456789";

        //JWT::decode($token, $this->key, ['HS256']);

        $userdata = new AdminModel();
        $data = $userdata->where('email', $this->request->getPost('email'))->first();
        if($data){
            $reset_link = base_url('reset-password') . '/' . JWT::encode(['username' => $data['username'], 'email' => $data['email']], $key,'HS256');
            //JWT::encode($data, $this->key);
            $mail = new PHPMailer();
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'no-reply@bookmyyoga.in';   //  sender username
            $mail->Password = 'Nazre@321';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('no-reply@bookmyyoga.in', 'bookmyyoga.in');
            $mail->addAddress($this->request->getPost('email'));
              $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = 'Reset Password';//$request->emailSubject;
            $body = '
                Hi '.$data['name'].',<br />

                Reset password to click below button <br/>
                <a href="'.$reset_link.'">Reset Link</a>


            ';
            $mail->Body    =  $body;//$this->request->getPost('subj
            if($mail->send()){
                $msg['status'] = true;
                $msg['msg'] = "Please check yout email to reset password";
                echo json_encode($msg);
                exit(0);
            }
        }
       
        $msg['status'] = false;
        $msg['msg'] = "Email not found";
        echo json_encode($msg);
        exit(0);
    }
    public function reset_password_link($token){

        $this->load_view('front/reset-password', compact('token'));
    }
    public function reset_password(){

        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $key = "shamsanjum123456789";
        $data =  JWT::decode($token, new Key($key, 'HS256'));
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        if($data){
            $userdata = new AdminModel();
            $user = $userdata->where('email', $data->email)->first();
            // echo "<pre>";
            // print_r($user);
            // echo "</pre>";
            if($user){
                
               
                $updateData = [
                'password' => md5($password)
                ]; 
                $userdata->update($user['id'], $updateData);
                $msg['status'] = true;
                $msg['msg'] ="Password reset successfully";
                echo json_encode($msg);
                exit(0);
            }
            $msg['status'] = false;
            $msg['msg'] = 'Invalid token';
            echo json_encode($msg);
            exit(0);
        }
        else{
            $msg['status'] = false;
            $msg['msg'] = 'Invalid token';
            echo json_encode($msg);
            exit(0);
        }

    }
    public function profile(){
         $data['meta_title'] = 'Profile';
        $data['meta_description'] = "Profile";
        $data['meta_keywords'] = "Profile";
        $this->load_view('front/user/profile', $data);
    }
    public function update_userprofile(){
        // echo "<pre>";
        // print_r($this->request->getPost());
        // echo "</pre>";
       $userdata = new AdminModel();
        $user = $userdata->where('id', session()->get('user_id'))->first();
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        // die;
        $updateData = [];
        if($user){
            
           if(!empty($this->request->getPost('password'))){
                $updateData['password'] = md5($this->request->getPost('password'));
           }
           $updateData['address'] = $this->request->getPost('address');
           $updateData['name'] = $this->request->getPost('name');
           $updateData['phone_no'] = $this->request->getPost('phone_no');
           //session()->set(['address' => $this->request->getPost('address')]);

           //$img->getName() != ""
           $user_profile = $this->request->getFile('profile_image');
           if($user_profile->getName() != ""){
                  $newName = session()->get('user_id') . time() . '-profile-' . $user_profile->getClientName()  ;
                    $user_profile->move(ROOTPATH . 'assets/prfile',$newName);
                $updateData['profile_image'] = $newName;
                session()->set(['profile_image' => $newName]);

           }
           session()->set(['address' => $this->request->getPost('address'), 
            'name' => $this->request->getPost('name'),
            'phone_no' => $this->request->getPost('phone_no'),
       ]);
        //     echo "<pre>";
        // print_r($updateData);
        // echo "</pre>";
        // die;
            
            $userdata->update($user['id'], $updateData);
            $msg['status'] = true;
            $msg['msg'] ="User Profile updated successfully";
            echo json_encode($msg);
            exit(0);
        }
        $msg['status'] = false;
        $msg['msg'] = 'Something wrong, Please try again!';
        echo json_encode($msg);
        exit(0);
    }
    public function trainers_and_studio(){
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "Trainer And Studio";
        $data['meta_keywords'] = "Trainer And Studio";
        $trainers_and_studio = new TrainersAndStudioModel();
        $trainers_and_studio_data = $trainers_and_studio->where('user_id', session()->get('user_id'))->first();
        $data['trainers_and_studio_data'] = $trainers_and_studio_data;
        $database = \Config\Database::connect();
        $db = $database->table('country');
        $db->where('status', 1);
        $country = $db->get()->getResultArray();
        $data['state'] = [];
        $data['city'] = [];
        if($trainers_and_studio_data){
            $db = $database->table('state');
            $db->where('status', 1);
            $db->where('country_id', $trainers_and_studio_data['country_id']);
            $state = $db->get()->getResultArray();
            $data['state'] = $state;

            $db = $database->table('city');
            $db->where('status', 1);
            $db->where('state_id', $trainers_and_studio_data['state_id']);
            $city = $db->get()->getResultArray();
            $data['city'] = $city;
        }
        $data['countries'] = $country;
        $this->load_view('front/user/trainer-studio', $data);
    }
    public function get_state(){
         $database = \Config\Database::connect();
        $db = $database->table('state');
        $db->where('country_id', $this->request->getPost('country_id'));
        $db->where('status', 1);
        $state = $db->get()->getResultArray();
        echo json_encode(['data' => $state]);
    }
    public function get_city(){
         $database = \Config\Database::connect();
        $db = $database->table('city');
        $db->where('state_id', $this->request->getPost('state_id'));
        $db->where('status', 1);
        $city = $db->get()->getResultArray();
        echo json_encode(['data' => $city]);
    }
    public function update_trainer_studio(){
        $trainer_studio = new TrainersAndStudioModel();
        $user = $trainer_studio->where('user_id', session()->get('user_id'))->first();
       
        $updateData = [];
        $updateData['business_name'] = $this->request->getPost('business_name');
       $updateData['about_us'] = $this->request->getPost('about_us');
       $updateData['address'] = $this->request->getPost('address');
       $updateData['country_id'] = $this->request->getPost('country_id');
       $updateData['state_id'] = $this->request->getPost('state_id');
       $updateData['city_id'] = $this->request->getPost('city_id');
       $updateData['status'] = 0;
       $updateData['mobile_no'] = $this->request->getPost('mobile_no');
       $updateData['whatsapp_no'] = $this->request->getPost('whatsapp_no');
       $updateData['email'] = $this->request->getPost('email');
       if(null !== $this->request->getPost('other_city_checkbox')){
              $db = \Config\Database::connect();
            // Data to be inserted
            $data = [
                'state_id' => $this->request->getPost('state_id'),
                'name' => $this->request->getPost('other_city'),
                'status' => 1
            ];
            // Insert data into the table
            $db->table('city')->insert($data);
            // Get the last inserted ID
             $insertedId = $db->insertID();
             $updateData['city_id'] = $insertedId;
       }
       // echo "<pre>";
       // print_r($updateData);
       // die;
      
        if($user){
            
          
          
           $updateData['name'] = $this->request->getPost('name');
           $updateData['phone_no'] = $this->request->getPost('phone_no');
           session()->set(['address' => $this->request->getPost('address')]);

           //$img->getName() != ""
           $banner_image = $this->request->getFile('banner_image');
           if($banner_image->getName() != ""){
                  $newName = session()->get('user_id') . time() . '-banner-' . $banner_image->getClientName()  ;
                    $banner_image->move(ROOTPATH . 'assets/images/trainer-studio',$newName);
                $updateData['banner_image'] = $newName;
                //session()->set(['banner_image' => $newName]);

           }
        //     echo "<pre>";
        // print_r($updateData);
        // echo "</pre>";
        // die;
            
            $trainer_studio->update($user['id'], $updateData);
            $msg['status'] = true;
            $msg['msg'] ="Trainer and studio updated successfully";
            echo json_encode($msg);
            exit(0);
        }else{
            $updateData['slug'] = $trainer_studio->createSlug($updateData['business_name']);
            $updateData['user_id'] = session()->get('user_id');
            $trainer_studio->insert($updateData);
            $msg['status'] = true;
            $msg['msg'] ="Trainer and studio added successfully";
            echo json_encode($msg);
            exit(0);

        }
        $msg['status'] = false;
        $msg['msg'] = 'Something wrong, Please try again!';
        echo json_encode($msg);
        exit(0);
    }
    public function trainer_studio_list(){
         $database = \Config\Database::connect();
    
       // $perPage=12;
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $perPage = $this->request->getVar('limit') ?? 12;
        $order_data = $this->request->getVar('sort') ?? 'date';
        $orderby = $this->request->getVar('sort') ?? 'random';
        $course_order = 'desc';
        switch($orderby){
            case 'id':
            $orderby = 'id';
                $course_order = 'desc';
                break;
                  case 'date':
                    $orderby = 'id';
                $course_order = 'desc';
                # code...
                break;
                  case 'atoz':
                  $orderby = 'business_name';
                $course_order = 'asc';
                break;
                  case 'ztoa':
                $orderby = 'business_name';
                $course_order = 'desc';
                break;
                 
        }
        //$this->db->connect();
        $offset = ($page-1) * $perPage;
    
        $builder = $database->table('trainers_and_studio as t1');
         $builder
        ->join('city as c', 't1.city_id = c.id', 'left')
        ->where('t1.status',1)
            ->select('t1.*, c.name as cname');
            if($orderby == 'random'){
                $builder->orderBy('RAND()');
            }else{
                $builder->orderBy($orderby, $course_order);
            }
            
            $data2 = $builder->get($perPage,$offset)
            ->getResultArray();
    
        $total = $builder->where('t1.status',1)->countAllResults();
        $data['trainers_and_studio'] = $data2;
        $data['total'] = $total;
        $data['perPage'] = $perPage;
        $data['order_data'] = $order_data;
        $data['links'] = $pager->makeLinks($page,$perPage,$total);
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "Trainer and studio";
        $data['meta_keywords'] = "Trainer and studio";
     
        $this->load_view('front/trainer-and-studio-list',$data);
    }
        public function trainers_and_studio_detail($slug){
        
        $data['meta_title'] = 'BEST YOGA TEACHER TRAINING COURSE | YOGA RETREAT | BEST WELLNESS SERVICES | YOGA CLASSES';
        $data['meta_description'] = "Trainer and studio";
        $data['meta_keywords'] = "Trainer and studio";
        $database = \Config\Database::connect();
         $query = $database->table('trainers_and_studio as t1');
         $query->join('city as c', 't1.city_id = c.id', 'left')
            ->select('t1.*, c.name as cname');
        $services = $query->where('t1.status', 1)->where('t1.slug', $slug)->get()->getResultArray();
        if(count($services) == 0){
            throw PageNotFoundException::forPageNotFound();
        }

        $data['trainer_data'] = $services;
         $builder = $database->table('trainers_and_studio as t1');
        $data2 = $builder
        ->join('city as c', 't1.city_id = c.id', 'left')
        ->where('t1.status',1)
        ->where('city_id', $services[0]['city_id'])
        ->where('t1.id <>',  $services[0]['id'])
            ->select('t1.*, c.name as cname')
            ->orderBy('id', 'desc')
            ->limit(20)
            ->get()
            ->getResultArray();
         $data['trainers_and_studio'] = $data2;
      
        $this->load_view('front/trainer-studio-detail',$data);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
class AdminPanelController extends BaseController
{
    public function index()
    {
        $database = \Config\Database::connect();
        
        // Get total users count
        $totalUsers = $database->table('admins')->countAllResults();
        
        // Get active users count
        $activeUsers = $database->table('admins')->where('status', 1)->countAllResults();
        
        // Get yoga trainer/instructor users (role 4)
        $yogaTrainers = $database->table('admins')->where('role', 4)->countAllResults();
        
        // Get trainers with incomplete data (yoga trainers without trainer_studio entry)
        // First get all user_ids that have trainer data
        $trainerUserIds = $database->table('trainers_and_studio')
            ->select('user_id')
            ->get()
            ->getResultArray();
        $trainerUserIdsArray = array_column($trainerUserIds, 'user_id');
        
        // Get yoga trainers without trainer data
        $incompleteTrainersQuery = $database->table('admins')
            ->where('role', 4);
        
        if(!empty($trainerUserIdsArray)) {
            $incompleteTrainersQuery->whereNotIn('id', $trainerUserIdsArray);
        }
        
        $incompleteTrainers = $incompleteTrainersQuery->get()->getResultArray();
        
        // Get total trainers and studio count
        $totalTrainersStudio = $database->table('trainers_and_studio')->countAllResults();
        
        // Get active trainers and studio count
        $activeTrainersStudio = $database->table('trainers_and_studio')->where('status', 1)->countAllResults();
        
        // Get total members count
        $totalMembers = $database->table('members')->countAllResults();
        
        // Get total services count
        $totalServices = $database->table('services')->countAllResults();
        
        // Get total posts count
        $totalPosts = $database->table('posts')->countAllResults();
        
        // Get total events count
        $totalEvents = $database->table('events')->countAllResults();
        
        // Get total gallery images count
        $totalGallery = $database->table('gallery')->countAllResults();
        
        // Get recent users (last 10) with date
        $recentUsers = $database->table('admins')
            ->select('admins.*, COALESCE(admins.created_at, NULL) as created_date')
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();
        
        // Get recent trainers (last 5) with date
        $recentTrainers = $database->table('trainers_and_studio')
            ->select('trainers_and_studio.*, admins.name as user_name, admins.email as user_email, COALESCE(trainers_and_studio.created_at, trainers_and_studio.created_date, trainers_and_studio.updated_date, NULL) as created_date')
            ->join('admins', 'admins.id = trainers_and_studio.user_id')
            ->orderBy('trainers_and_studio.id', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();
        
        $data = [
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'yogaTrainers' => $yogaTrainers,
            'incompleteTrainers' => $incompleteTrainers,
            'totalTrainersStudio' => $totalTrainersStudio,
            'activeTrainersStudio' => $activeTrainersStudio,
            'totalMembers' => $totalMembers,
            'totalServices' => $totalServices,
            'totalPosts' => $totalPosts,
            'totalEvents' => $totalEvents,
            'totalGallery' => $totalGallery,
            'recentUsers' => $recentUsers,
            'recentTrainers' => $recentTrainers
        ];
        
        return view('admin/dashboard', $data);
    }

    public function logout() {
        if(session()->has('logged_in')) {
            session()->remove('logged_in');
            session()->remove('is_admin');
            session()->remove('username');
            session()->remove('email');
            return redirect()->to('admin/login')->with('fail', "You are logged out.");
        }
    }
    public function addGallery(){

        return view('admin/add-gallery');
    }

     function uploadFiles() {
        helper(['form', 'url']);
 
        $database = \Config\Database::connect();
        $db = $database->table('gallery');
 
        $msg = 'Please select a valid files';
        $status = false; 
        if ($this->request->getFileMultiple('images')) {
            $i = 1;
             foreach($this->request->getFileMultiple('images') as $file)
             {   
                $newName = time()  . $i++ . '-gal-' . $file->getClientName()  ;
                $file->move(ROOTPATH . 'assets/gallery',$newName);
               
                $data = [
                    'image' =>  $newName,//$file->getClientName(),
                    'status' => $this->request->getVar('status')
                ];
 
              $save = $db->insert($data);
              $msg = 'Files have been successfully uploaded';
              $status = true;
             }
        }
 
        return redirect()->to( base_url('/admin/add-gallery') )->with('msg', $msg);        
    }
    public function gallery(){
        $database = \Config\Database::connect();
        $db = $database->table('gallery');
        $db->orderBy('id', 'DESC');
        $galley_data = $db->get()->getResultArray();
        return view('admin/gallery', ['gallery_images' => $galley_data]);
    }
    public function editGallery(){
        $status = $this->request->getVar('status');
        $id = $this->request->getVar('id');
        $database = \Config\Database::connect();
        $builder = $database->table('gallery');
        $data = [
            'status' => $status,
           
        ];

        $builder->where('id', $id);
        $res = $builder->update($data);
        if($res){
            $msg['status'] = true;
            $msg['msg'] = 'Status Change successfully';
            echo json_encode($msg);
            exit();
        }
        $msg['status'] = false;
        $msg['msg'] = 'Somthing wrong, Please try again!';
        echo json_encode($msg);
        exit();
    }
    public function addMember(){
        return view('admin/add-member');
    }
    public function memberList(){
        $database = \Config\Database::connect();
        $db = $database->table('members');
        $db->orderBy('id', 'DESC');
        $members = $db->get()->getResultArray();
        return view('admin/member-list', ['members' => $members]);
    }
    public function certificate($id){

       $dompdf = new Dompdf();
       // echo "<pre>";
       //  print_r($dompdf);
       // echo "</pre>";
       // die;

        $database = \Config\Database::connect();
        $db = $database->table('members');
        $db->where('id', $id);
        $members = $db->get()->getResultArray();
        // echo "<pre>";
        //  print_r($members);
        //  echo $members[0]['name'];
        //  die;
        if(count($members)){
        
         $data = [
            'border_image'    => $this->imageToBase64(ROOTPATH . '/assets/images/pdf/s2.png'),
            'logo'    => $this->imageToBase64(ROOTPATH . '/assets/images/logo-wide.png'),
            'qr'    => $this->imageToBase64(ROOTPATH . '/assets/images/pdf/qr.png'),
            'email'         => $members[0]['email'],
            'name'      => $members[0]['name'],
            'user_id'        => sprintf("%06d", $members[0]['id']),//john.doe@email.com'
            'membership_date' =>$members[0]['createddate'],
            'fav_image' => $this->imageToBase64(ROOTPATH . '/assets/images/favicon.png'),
        ];
        // echo "<pre>";
        //  print_r($data);
        // echo "</pre>";
        // die;
        $dompdf->set_paper("a4", "portrait");
        $html = view('front/member-pdf', $data);
        $dompdf->loadHtml($html,'UTF-8');
        $dompdf->render();
        
        $dompdf->stream('member.pdf', [ 'Attachment' => false ]);
        exit(0);

        
        }else{
            echo 'member not found';
         die;
        }
        
    }
       private function imageToBase64($path) {
        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
    public function privacy_policy(){
         $database = \Config\Database::connect();
        $db = $database->table('privacy_policy');
        $db->orderBy('id', 'DESC');
        $privacy_policy = $db->get()->getResultArray();
        $data['privacy_policy'] = $privacy_policy;
      
        return view('admin/privacy-policy', $data);
    }
    public function term_condition(){
        $database = \Config\Database::connect();
        $db = $database->table('term_condition');
        $db->orderBy('id', 'DESC');
        $term_condition = $db->get()->getResultArray();
        $data['term_condition'] = $term_condition;
       
        return view('admin/term-conditions', $data);
    }
    public function update_privacy_policy(){
         $status = $this->request->getPost('status');
         $privacy_policy = $this->request->getPost('privacy_policy');
        $id = $this->request->getPost('id');
        $database = \Config\Database::connect();
        $builder = $database->table('privacy_policy');
        $data = [
            'status' => $status,
            'privacy_policy' => $privacy_policy,
           
        ];

        $builder->where('id', $id);
        $res = $builder->update($data);
        if($res){
            $msg['status'] = true;
            $msg['msg'] = 'Privacy Policy updated successfully';
            echo json_encode($msg);
            exit();
        }
        $msg['status'] = false;
        $msg['msg'] = 'Somthing wrong, Please try again!';
        echo json_encode($msg);
        exit();
    }
    public function update_term_condition(){
        $status = $this->request->getPost('status');
         $term_condition = $this->request->getPost('term_condition');
        $id = $this->request->getPost('id');
        $database = \Config\Database::connect();
        $builder = $database->table('term_condition');
        $data = [
            'status' => $status,
            'term_condition' => $term_condition,
           
        ];

        $builder->where('id', $id);
        $res = $builder->update($data);
        if($res){
            $msg['status'] = true;
            $msg['msg'] = 'Term And condition updated successfully';
            echo json_encode($msg);
            exit();
        }
        $msg['status'] = false;
        $msg['msg'] = 'Somthing wrong, Please try again!';
        echo json_encode($msg);
        exit();
    }

    public function user_list(){
        $database = \Config\Database::connect();
        
        // Get filter parameters - support multiple roles
        $roles = $this->request->getVar('roles'); // Can be array or single value
        $status = $this->request->getVar('status');
        $trainer_studio_status = $this->request->getVar('trainer_studio_status');
        
        $db = $database->table('admins');
        
        // Normalize roles - support multiple roles
        $normalizedRoles = [];
        if($roles) {
            // Convert to array if it's a single value
            if(!is_array($roles)) {
                $roles = [$roles];
            }
            // Remove empty values and normalize
            foreach($roles as $r) {
                if($r !== null && $r !== '') {
                    $normalizedRoles[] = (string)$r;
                }
            }
        }
        
        // Apply role filters - support multiple roles
        if(!empty($normalizedRoles)) {
            $db->whereIn('role', $normalizedRoles);
        }
        
        // Apply status filter
        if($status !== null && $status !== '') {
            $db->where('status', $status);
        }
        
        // Filter by trainer studio status
        if($trainer_studio_status) {
            try {
                // Get all user_ids that have trainer/studio data
                $trainerQuery = $database->table('trainers_and_studio')
                    ->select('user_id, status as trainer_status');
                
                if($trainer_studio_status == 'active') {
                    $trainerQuery->where('status', 1);
                } elseif($trainer_studio_status == 'inactive') {
                    $trainerQuery->where('status', 0);
                }
                
                $trainerData = $trainerQuery->get()->getResultArray();
                $trainerUserIdsArray = array_column($trainerData, 'user_id');
                
                if($trainer_studio_status == 'has_profile' || $trainer_studio_status == 'active' || $trainer_studio_status == 'inactive') {
                    // Show users who have trainer/studio profiles
                    if(!empty($trainerUserIdsArray)) {
                        $db->whereIn('id', $trainerUserIdsArray);
                    } else {
                        // No users with trainer profiles, return empty result
                        $db->where('1', '0'); // Force no results
                    }
                } elseif($trainer_studio_status == 'no_profile') {
                    // Show users who don't have trainer/studio profiles
                    if(!empty($trainerUserIdsArray)) {
                        $db->whereNotIn('id', $trainerUserIdsArray);
                    }
                    // If trainerUserIdsArray is empty, all users don't have profiles
                }
            } catch(\Exception $e) {
                // Log error but don't break the page
                log_message('error', 'Error in trainer studio status filter: ' . $e->getMessage());
            }
        }
        
        $db->orderBy('id', 'desc');
        $users = $db->get()->getResultArray();
        
        // Check which users have trainer/studio data and get their status
        foreach($users as &$user) {
            // Ensure all required fields exist
            if(!isset($user['id'])) $user['id'] = '';
            if(!isset($user['name'])) $user['name'] = '';
            if(!isset($user['email'])) $user['email'] = '';
            if(!isset($user['username'])) $user['username'] = '';
            if(!isset($user['phone_no'])) $user['phone_no'] = '';
            if(!isset($user['role'])) $user['role'] = '';
            if(!isset($user['status'])) $user['status'] = 0;
            
            // Check if user has trainer/studio profile
            $trainerData = $database->table('trainers_and_studio')
                ->where('user_id', $user['id'])
                ->get()
                ->getRowArray();
            
            $user['has_trainer_data'] = !empty($trainerData);
            $user['trainer_data'] = $trainerData ? $trainerData : [];
            $user['trainer_status'] = $trainerData ? ($trainerData['status'] ?? null) : null;
        }
        
        // Prepare role filter for view
        $selectedRoles = $roles;
        if(!is_array($selectedRoles) && $selectedRoles) {
            $selectedRoles = [$selectedRoles];
        }
        if(empty($selectedRoles)) {
            $selectedRoles = [];
        }
        
        $data['users'] = $users;
        $data['role_filter'] = $selectedRoles; // Now an array
        $data['status_filter'] = $status;
        $data['trainer_studio_status_filter'] = $trainer_studio_status;
        
        return view('admin/user-list', $data);
    }
    public function update_user_status(){
         $status = $this->request->getVar('status');
        $id = $this->request->getVar('id');
        $database = \Config\Database::connect();
        $builder = $database->table('admins');
        $data = [
            'status' => $status,
           
        ];

        $builder->where('id', $id);
        $res = $builder->update($data);
        if($res){
            $msg['status'] = true;
            $msg['msg'] = 'Status Change successfully';
            echo json_encode($msg);
            exit();
        }
        $msg['status'] = false;
        $msg['msg'] = 'Somthing wrong, Please try again!';
        echo json_encode($msg);
        exit();
    }


}

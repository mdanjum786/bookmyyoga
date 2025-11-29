<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
class AdminPanelController extends BaseController
{
    public function index()
    {
        //
        return view('admin/dashboard');
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
        $db = $database->table('admins');
        $db->orderBy('id', 'desc');
        $data['users'] = $db->get()->getResultArray();
       // echo json_encode(['data' => $city]);
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

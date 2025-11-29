<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel;
class AdminLoginController extends BaseController
{
    public function index()
    {
    
        $session = \Config\Services::session();


       return view('admin/login');
    }
    public function dashboard(){
        return view('admin/dashboard');
    }
    public function auth(){
         //$data = [];
        helper(['form']);
        //$session = \Config\Services::session();
       // $session = \Config\Services::session($config);
        $session = \Config\Services::session();
        if ($this->request->getMethod() == "POST") {
            $validation =  \Config\Services::validation();

            $rules = [
                "email" => [
                    "label" => "Email", 
                    "rules" => "required"
                ],
                "password" => [
                    "label" => "Password", 
                    "rules" => "required"
                ],
                
            ];

            if ($this->validate($rules)) {
                $data = array('email'=>$this->request->getVar('email'),'password'=>md5($this->request->getVar('password')), 'role'=> 1); 
                $db = \Config\Database::connect();
                $builder = $db->table('admins');
                $query =    $builder->where(['email' => $this->request->getVar('email'), 'password' => md5($this->request->getVar('password'))])->get();
                $userdata = $query->getResultArray();
                if(count($userdata) == 1){
                     $session_data = [
                        'username'  => 'Admin',
                        'email'     => $this->request->getVar('email'),
                        'logged_in' => true,
                        'is_admin' => true,
                    ];
                    // echo "sss";
                    // die;
                    session()->regenerate();
                    $session->set($session_data);
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
                $msg['msg'] = 'Please fill all fields';
                $msg['data'] = $validation->getErrors();
                echo json_encode($msg);
                exit();
            }
        }
    }
    public function loginWithOtherUser(){
         $db = \Config\Database::connect();
         $session = \Config\Services::session();
         $builder = $db->table('admins');
                $query =    $builder->where(['email' => $this->request->getPost('email')])->get();
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
                    $session_data['login_back_email'] = $this->request->getPost('login_back_email');

                    // echo "sss";
                    // die;
                    $session->set($session_data);
                    $session->regenerate();
        return redirect()->to('/dashboard');
    }
}
public function login_back(){
     $session = \Config\Services::session();
   // $data = array('email'=>$this->request->getVar('email'),'password'=>md5($this->request->getVar('password')), 'role'=> 1); 
                $db = \Config\Database::connect();
                $builder = $db->table('admins');
                $query =    $builder->where(['email' => $this->request->getVar('login_back_email')])->get();
                $userdata = $query->getResultArray();
                if(count($userdata) == 1){
                     $session_data = [
                        'username'  => 'Admin',
                        'email'     => $this->request->getVar('email'),
                        'logged_in' => true,
                        'is_admin' => true,
                    ];
                    
                    session()->regenerate();
                    $session->set($session_data);
}
 return redirect()->to('admin/dashboard');
}
}

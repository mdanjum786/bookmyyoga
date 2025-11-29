<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TeamController extends BaseController
{
    public function index()
    {
        //
        $database = \Config\Database::connect();
        $db = $database->table('teams');
        $teams = $db->orderBy('id', 'DESC')->get()->getResultArray();
        $data['teams'] = $teams;
        return view('admin/team/index', $data);
    }
    public function store(){
          helper(['form', 'url']);
 
        $database = \Config\Database::connect();
        $validation =  \Config\Services::validation();
        $db = $database->table('teams');
 
        // $msg = 'Please select a valid files';
        // $status = false; 
        $image = $this->request->getFile('image');
        $designation = $this->request->getPost('designation');
        $short_description = $this->request->getPost('short_description');
        $social_network = $this->request->getPost('social_network');
        $name = $this->request->getPost('name');

         $validationRule = [
            'image' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[image]',
                    //'required[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                ],
            ],
            'name' => [
                'label' => 'Name',
                'rules' =>[
                    'required[name]'
                ]
            ],
            'designation'  => [
                'label' => 'Designation',
                'rules' => [
                    'required[designation]'
                ]
            ]
        ];
        if (! $this->validate($validationRule)) {
            $msg['status'] = false;
            $msg['data'] = $validation->getErrors();
            $msg['msg'] =  'Please fill all required field';
            echo json_encode($msg);
            exit(); 
        }
        $newName = '';
         if (! $image->hasMoved()) {
           $newName = time() . '-team-' . $image->getClientName()  ;
            $image->move(ROOTPATH . 'assets/team',$newName);
        }
        $data = [
            'image' =>  $newName,//$file->getClientName(),
            'status' => $this->request->getPost('status') ?? 0,
            'name' => $name,
            'designation' => $designation,
            'short_description' => $short_description,
            'social_network' => $social_network,
            'createddate' => time()
        ];
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die;
        $db = $database->table('teams');
        $save = $db->insert($data);
        if($save){
            $msg['status'] = true;
            $msg['msg'] = 'Team added successfully';
            echo json_encode($msg);
            exit();
        }
        $msg['status'] = false;
        $msg['msg'] = 'Something wrong, Please try again!';
        $msg['data'] = [];
        echo json_encode($msg);
        exit();
      
       
    }

      public function changeStatus(){
        $id = $this->request->getPost('status_id');
        $status = $this->request->getPost('status');
         $database = \Config\Database::connect();
         $data = [
                
                'status' => $this->request->getPost('status'),
                'updateddate' => time()
            ];
            $db = $database->table('teams');
            $db->where('id', $id);
            $save = $db->update($data);
            if($save){
                $msg['status'] = true;
                $msg['msg'] = 'Status Change successfully';
                $msg['event_status'] = $status;
                echo json_encode($msg);
                exit();
            }
        $msg['status'] = false;
        $msg['msg'] = 'Something wrong, Please try again!';
        $msg['event_status'] = $status;
        echo json_encode($msg);
        exit();
    }

    public function getTeamData(){
        $id = $this->request->getPost('id');
        $database = \Config\Database::connect();
        $db = $database->table('teams');
        $data = $db->where('id', $id)->get()->getRowArray();
        echo json_encode($data);
    }
    public function update(){
        helper(['form']);
        $validation =  \Config\Services::validation();
        $database = \Config\Database::connect();
        $img = $this->request->getFile('image');
        $designation = $this->request->getPost('designation');
        $short_description = $this->request->getPost('short_description');
        $social_network = $this->request->getPost('social_network');
        $name = $this->request->getPost('name');
        
        $rules = [
            'image' => [
                'label' => 'Image File',
                'rules' => [
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                ],
            ],
            'name' => [
                'label' => 'Name',
                'rules' =>[
                    'required[name]'
                ]
            ],
            'designation'  => [
                'label' => 'Designation',
                'rules' => [
                    'required[designation]'
                ]
            ]
        ];
        $newName  = $this->request->getPost('image2');
        if ($this->validate($rules)) {
            if($img->getName() != ""){
                 if (! $img->hasMoved()) {
                    if(file_exists(FCPATH . 'assets/team/' .$this->request->getPost('image2'))){
                        unlink(FCPATH . 'assets/team/' .$this->request->getPost('image2'));
                    }
                    $newName = time() . '-team-' . $img->getClientName()  ;
                    $img->move(ROOTPATH . 'assets/team',$newName);
                }
            }
            
            $data = [
            'image' =>  $newName,//$file->getClientName(),
            'status' => $this->request->getPost('status') ?? 0,
            'name' => $name,
            'designation' => $designation,
            'short_description' => $short_description,
            'social_network' => $social_network,
            'updateddate' => time()
        ];
          
            $db = $database->table('teams');
            $db->where('id', $this->request->getPost('id'));
            $save = $db->update($data);
            if($save){
                $msg['status'] = true;
               
                $msg['msg'] = 'Team updated successfully';
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
    }
}

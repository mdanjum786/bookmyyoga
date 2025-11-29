<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Testimonials extends BaseController
{
    public function index()
    {
        //
        $database = \Config\Database::connect();
        $db = $database->table('testimonials');
        $testimonials = $db->orderBy('id', 'DESC')->get()->getResultArray();
        $data['testimonials'] = $testimonials;
        return view('admin/testimonials/index', $data);
    }
    public function create(){
        return view('admin/testimonials/create');
    }
    public function store(){
        helper(['form']);
        $validation =  \Config\Services::validation();
        $database = \Config\Database::connect();
        $img = $this->request->getFile('image');
        
        $rules = [
            'name' => [
                'label' => 'Name',
                'rules' => 'required'
            ],
            'designation' =>[
                'label' => 'Designation',
                'rules' => 'required' 
            ],
            // 'end_date' =>[
            //     'label' => 'End Date',
            //     'rules' => 'required'
            // ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required'
            ],
            'testimonials' =>[
                'label' => 'Testimonials',
                'rules' => 'required'
            ],
             'image' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[image]',
                    // 'required[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                ],
                'errors' => [
                	'uploaded' => 'Image field is required',
            	],
            ],
            'stars' =>[
                'label' => 'Stars',
                'rules' => 'required'
            ],
        ];
        $newName  = '';
        if ($this->validate($rules)) {
             if (! $img->hasMoved()) {
               $newName = time() . '-testimonials-' . $img->getClientName()  ;
                $img->move(ROOTPATH . 'assets/testimonials',$newName);
            }
            $data = [
                'name' => $this->request->getPost('name'),
                'designation' => $this->request->getPost('designation'),
                'stars' => $this->request->getPost('stars'),
                'status' => $this->request->getPost('status'),
                'testimonials' => $this->request->getPost('testimonials'),
                'createddate' => time(),
                'image' => $newName
            ];
          
            $db = $database->table('testimonials');
            $save = $db->insert($data);
            if($save){
                $msg['status'] = true;
               
                $msg['msg'] = 'Testimonials added successfully';
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
    public function edit($id){

    }
    public function update(){
         helper(['form']);
        $validation =  \Config\Services::validation();
        $database = \Config\Database::connect();
        $titel = $this->request->getPost('title');
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        $status = $this->request->getPost('status');
        $description = $this->request->getPost('description');
        $img = $this->request->getFile('image');
        
       $rules = [
            'name' => [
                'label' => 'Name',
                'rules' => 'required'
            ],
            'designation' =>[
                'label' => 'Designation',
                'rules' => 'required' 
            ],
            // 'end_date' =>[
            //     'label' => 'End Date',
            //     'rules' => 'required'
            // ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required'
            ],
            'testimonials' =>[
                'label' => 'Testimonials',
                'rules' => 'required'
            ],
             'image' => [
                'label' => 'Image File',
                'rules' => [
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                ]
               
            ],
            'stars' =>[
                'label' => 'Stars',
                'rules' => 'required'
            ],
        ];
        $newName  = $this->request->getPost('image2');
        if ($this->validate($rules)) {
            if($img->getName() != ""){
                 if (! $img->hasMoved()) {
                    if(file_exists(FCPATH . 'assets/testimonials/' .$this->request->getPost('image2'))){
                        unlink(FCPATH . 'assets/testimonials/' .$this->request->getPost('image2'));
                    }
                    $newName = time() . '-event-' . $img->getClientName()  ;
                    $img->move(ROOTPATH . 'assets/testimonials',$newName);
                }
            }
            
            $data = [
                'name' => $this->request->getPost('name'),
                'designation' => $this->request->getPost('designation'),
                'stars' => $this->request->getPost('stars'),
                'status' => $this->request->getPost('status'),
                'testimonials' => $this->request->getPost('testimonials'),
                'updateddate' => time(),
                'image' => $newName
            ];
           
            $db = $database->table('testimonials');
            $db->where('id', $this->request->getPost('id'));
            $save = $db->update($data);
            if($save){
                $msg['status'] = true;
               
                $msg['msg'] = 'testimonials updated successfully';
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
    public function changeStatus(){
        $id = $this->request->getPost('status_id');
        $status = $this->request->getPost('status');
         $database = \Config\Database::connect();
         $data = [
                
                'status' => $this->request->getPost('status'),
                'updateddate' => time()
            ];
            $db = $database->table('testimonials');
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
    public function getTestimonialsData(){
         $id = $this->request->getPost('id');
        $database = \Config\Database::connect();
        $db = $database->table('testimonials');
        $data = $db->where('id', $id)->get()->getRowArray();
        echo json_encode($data);
    }
}

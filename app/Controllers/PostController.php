<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Services;
use App\Models\PostModel;
class PostController extends BaseController
{
    public function index()
    {
        //
        $database = \Config\Database::connect();
        $db = $database->table('posts');
        $events = $db->orderBy('id', 'DESC')->get()->getResultArray();
        $data['services'] = $events;
        return view('admin/posts/index', $data);
    }
    public function create(){
        return view('admin/posts/create');
    }
    public function store(){
        helper(['form']);
        $validation =  \Config\Services::validation();
        $database = \Config\Database::connect();
        $titel = $this->request->getPost('title');
        // $start_date = $this->request->getPost('start_date');
        // $end_date = $this->request->getPost('end_date');
        $status = $this->request->getPost('status');
        $description = $this->request->getPost('description');
        //$additional_description = $this->request->getPost('additional_description');
        $img = $this->request->getFile('image');
         //$additional_description = $this->request->getPost('additional_description');
        //$img = $this->request->getFile('image');
       // $additional_img = $this->request->getFile('additional_image');
         $Services = new PostModel();
         $slug = $Services->createSlug($titel);
        
        $rules = [
            'title' => [
                'label' => 'Title',
                'rules' => 'required'
            ],
           
            'status' => [
                'label' => 'Status',
                'rules' => 'required'
            ],
            'description' =>[
                'label' => 'Description',
                'rules' => 'required'
            ],
             'image' => [
                'label' => 'Image File',
                    'rules' => [
                        'uploaded[image]',
                        'is_image[image]',
                        'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    ],
                    'errors' => [
                    'uploaded' => 'Image field is required',
                ],
            ]
           
        ];
        $newName  = '';
        $additional_img2 = '';
        if ($this->validate($rules)) {
             if (! $img->hasMoved()) {
               $newName = time() . '-posts-' . $img->getClientName()  ;
                $img->move(ROOTPATH . 'assets/posts',$newName);
            }
            //  if (! $additional_img->hasMoved()) {
            //    $additional_img2 = time() . '-services-' . $additional_img->getClientName()  ;
            //     $additional_img->move(ROOTPATH . 'assets/services',$additional_img2);
            // }
            $data = [
                'title' => $this->request->getPost('title'),
                'status' => $this->request->getPost('status'),
                'description' => $this->request->getPost('description'),
               // 'additional_description' => $this->request->getPost('additional_description'),
                'createddate' => time(),
                'image' => $newName,
                 //'additional_description' => $this->request->getPost('additional_description'),
              
                //'additional_image' => $additional_img2,
                'slug' => $slug,
            ];
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // die;
            $db = $database->table('posts');
            $save = $db->insert($data);
            if($save){
                $msg['status'] = true;
               
                $msg['msg'] = 'Posts added successfully';
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
     
        $status = $this->request->getPost('status');
        $description = $this->request->getPost('description');
       // $additional_description = $this->request->getPost('additional_description');
        $img = $this->request->getFile('image');
        //$additional_img = $this->request->getFile('additional_image');
        
        $rules = [
            'title' => [
                'label' => 'Title',
                'rules' => 'required'
            ],
        
            'status' => [
                'label' => 'Status',
                'rules' => 'required'
            ],
            'description' =>[
                'label' => 'Description',
                'rules' => 'required'
            ],
             'image' => [
                    'label' => 'Image File',
                    'rules' => [
                       // 'uploaded[image]',
                        // 'required[image]',
                        'is_image[image]',
                        'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    ],
                    'errors' => [
                    'uploaded' => 'Image field is required',
                ],
            ],
           
        ];
        $newName  = $this->request->getPost('image2');
        //$additional_imgName  = $this->request->getPost('additional_image2');
        if ($this->validate($rules)) {
            if($img->getName() != ""){
                 if (! $img->hasMoved()) {
                    if(file_exists(FCPATH . 'assets/posts/' .$this->request->getPost('image2'))){
                        unlink(FCPATH . 'assets/posts/' .$this->request->getPost('image2'));
                    }
                    $newName = time() . '-posts-' . $img->getClientName()  ;
                    $img->move(ROOTPATH . 'assets/posts',$newName);
                }
            }

            //  if($additional_img->getName() != ""){
            //      if (! $additional_img->hasMoved()) {
            //         if(!empty($this->request->getPost('additional_image2'))){
            //             if(file_exists(FCPATH . 'assets/services/' .$this->request->getPost('additional_image2'))){
            //                 unlink(FCPATH . 'assets/services/' .$this->request->getPost('additional_image2'));
            //             } 
            //         }
            //         $additional_imgName = time() . '-services-' . $additional_img->getClientName()  ;
            //         $additional_img->move(ROOTPATH . 'assets/services',$additional_imgName);
            //     }
            // }
            
            $data = [
                'title' => $this->request->getPost('title'),
                'status' => $this->request->getPost('status'),
                'description' => $this->request->getPost('description'),
               // 'additional_description' => $this->request->getPost('additional_description'),
                //'additional_description' => $this->request->getPost('additional_description'),
                'createddate' => time(),
                'image' => $newName,
                //'additional_image' => $additional_imgName,
            ];
          
            $db = $database->table('posts');
            $db->where('id', $this->request->getPost('id'));
            $save = $db->update($data);
            if($save){
                $msg['status'] = true;
               
                $msg['msg'] = 'Post updated successfully';
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
            $db = $database->table('posts');
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
    public function getEventData(){
        $id = $this->request->getPost('id');
        $database = \Config\Database::connect();
        $db = $database->table('posts');
        $data = $db->where('id', $id)->get()->getRowArray();
       
        echo json_encode($data);

    }
}

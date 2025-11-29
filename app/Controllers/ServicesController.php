<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Services;

class ServicesController extends BaseController
{
    public function index()
    {
        //
        $database = \Config\Database::connect();
        $db = $database->table('services');
        $services = $db->orderBy('id', 'DESC')->get()->getResultArray();
        $data['services'] = $services;
        return view('admin/services/index', $data);
    }
    public function create(){
        return view('admin/services/create');
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
        $additional_description = $this->request->getPost('additional_description');
        $img = $this->request->getFile('image');
         $additional_description = $this->request->getPost('additional_description');
        //$img = $this->request->getFile('image');
        $additional_img = $this->request->getFile('additional_image');
         $Services = new Services();
         $slug = $Services->generateUniqueSlug($this->request->getPost('slug'));
        
        $rules = [
            'title' => [
                'label' => 'Title',
                'rules' => 'required'
            ],
             'slug' => [
                'label' => 'Slug',
                'rules' => 'required'
            ],
           
            'status' => [
                'label' => 'Status',
                'rules' => 'required'
            ],
              'price' => [
                'label' => 'Price',
                'rules' => 'required'
            ],
              
            'short_description' =>[
                'label' => 'Short Description',
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
               $newName = time() . '-services-' . $img->getClientName()  ;
                $img->move(ROOTPATH . 'assets/services',$newName);
            }
         
            $data = [
                'title' => $this->request->getPost('title'),
                'status' => $this->request->getPost('status'),
                'description' => $this->request->getPost('description'),
                'short_description' => $this->request->getPost('short_description'),
                'price' => $this->request->getPost('price'),
                'offer_price' => $this->request->getPost('offer_price'),
                'rating' => $this->request->getPost('rating'),
                'createddate' => time(),
                'image' => $newName,
                'slug' => $slug, //$this->request->getPost('additional_description'),
              
                'meta_title' => $this->request->getPost('meta_title'),
                'meta_keywords' => $this->request->getPost('meta_keywords'),
                'meta_description' => $this->request->getPost('meta_description'),
                'type' =>   $this->request->getPost('type'),
                'startdate' => null !== $this->request->getPost('start_date') && !empty($this->request->getPost('start_date')) ? strtotime($this->request->getPost('start_date')) : null,
                'enddate' => null !== $this->request->getPost('end_date') && !empty($this->request->getPost('end_date')) ? strtotime($this->request->getPost('end_date')) : null,
            ];
        
            $db = $database->table('services');
            $save = $db->insert($data);
            if($save){
                $msg['status'] = true;
                $msg['msg'] = 'Services added successfully';
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
        $database = \Config\Database::connect();
        $db = $database->table('services');
        $services = $db->where('id', $id)->get()->getRowArray();
        $data['services'] = $services;
        // echo "<pre>";
        // print_r($data);
        // echo"</pre>";
        // die;
         return view('admin/services/edit', $data);
    }
    public function update(){
        helper(['form']);
        $validation =  \Config\Services::validation();
        $database = \Config\Database::connect();
        $titel = $this->request->getPost('title');
     
        $status = $this->request->getPost('status');
        $description = $this->request->getPost('description');
        $additional_description = $this->request->getPost('additional_description');
        $img = $this->request->getFile('image');
        $additional_img = $this->request->getFile('additional_image');
         $Services = new Services();
        // $serviceData = $Services->find($serviceId);
         $slug = $Services->generateUniqueSlug($this->request->getPost('slug'), $this->request->getPost('id'));
        $rules = [
            'title' => [
                'label' => 'Title',
                'rules' => 'required'
            ],

            //  'slug' => [
            //     'label' => 'Slug',
            //     'rules' => 'required'
            // ],
        
            'status' => [
                'label' => 'Status',
                'rules' => 'required'
            ],
            'price' => [
                'label' => 'Price',
                'rules' => 'required'
            ],
              
            'short_description' =>[
                'label' => 'Short Description',
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
       
        if ($this->validate($rules)) {
            if($img->getName() != ""){
                 if (! $img->hasMoved()) {
                    if(file_exists(FCPATH . 'assets/services/' .$this->request->getPost('image2'))){
                        unlink(FCPATH . 'assets/services/' .$this->request->getPost('image2'));
                    }
                    $newName = time() . '-services-' . $img->getClientName()  ;
                    $img->move(ROOTPATH . 'assets/services',$newName);
                }
            }

           
            
            $data = [
                'title' => $this->request->getPost('title'),
                'status' => $this->request->getPost('status'),
                'description' => $this->request->getPost('description'),
                'short_description' => $this->request->getPost('short_description'),
                'price' => $this->request->getPost('price'),
                'offer_price' => $this->request->getPost('offer_price'),
                'rating' => $this->request->getPost('rating'),
                'createddate' => time(),
                'image' => $newName,
                'slug' => $slug, //$this->request->getPost('additional_description'),
              
                'meta_title' => $this->request->getPost('meta_title'),
                'meta_keywords' => $this->request->getPost('meta_keywords'),
                'meta_description' => $this->request->getPost('meta_description'),
                'type' =>   $this->request->getPost('type'),
                 'startdate' => null !== $this->request->getPost('start_date') && !empty($this->request->getPost('start_date')) ? strtotime($this->request->getPost('start_date')) : null,
                'enddate' => null !==$this->request->getPost('end_date') && !empty($this->request->getPost('end_date')) ? strtotime($this->request->getPost('end_date')) : null,
            ];
          
            $db = $database->table('services');
            $db->where('id', $this->request->getPost('id'));
            $save = $db->update($data);
            if($save){
                $msg['status'] = true;
               
                $msg['msg'] = 'Services updated successfully';
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
            $db = $database->table('services');
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
        $db = $database->table('services');
        $data = $db->where('id', $id)->get()->getRowArray();
       
        echo json_encode($data);
       // echo "<pre>";
       //  print_r($data);
       // echo "</pre>";

    }
}

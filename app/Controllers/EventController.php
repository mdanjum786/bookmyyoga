<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Events;
class EventController extends BaseController
{
    public function index()
    {
        //
         $database = \Config\Database::connect();
        $db = $database->table('events');
        $events = $db->select('events.*, services.title as s_title') // Select columns from both tables
             ->join('services', 'services.id = events.service_id','left') // Join condition
             ->orderBy('events.id', 'DESC') // Order by event ID in descending order
             ->get()
             ->getResultArray();
        $data['events'] = $events;
        $db = $database->table('services');
        $services = $db->orderBy('id', 'DESC')->get()->getResultArray();
        $data['services'] = $services;
        return view('admin/events/index', $data);
    }
    public function create(){
        $database = \Config\Database::connect();
        $db = $database->table('services');
        $services = $db->orderBy('id', 'DESC')->get()->getResultArray();
        $data['services'] = $services;
        return view('admin/events/create', $data);
    }
    public function store(){
        helper(['form']);
        $validation =  \Config\Services::validation();
        $database = \Config\Database::connect();
        $titel = $this->request->getPost('title');
        $status = $this->request->getPost('status');
        $service_id = $this->request->getPost('services');
        $description = $this->request->getPost('description');
        $img = $this->request->getFile('image');
        $events = new Events();
        $slug = $events->generateUniqueSlug($titel);
        
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
                    // 'required[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                ],
                'errors' => [
                'uploaded' => 'Image field is required',
            ],
            ],
            'services' =>[
                'label' => 'services',
                'rules' => 'required'
            ],
        ];
        $newName  = '';
        if ($this->validate($rules)) {
             if (! $img->hasMoved()) {
               $newName = time() . '-event-' . $img->getClientName()  ;
                $img->move(ROOTPATH . 'assets/events',$newName);
            }
            $data = [
                'title' => $this->request->getPost('title'),
                'status' => $this->request->getPost('status'),
                'description' => $this->request->getPost('description'),
                'address' => $this->request->getPost('address'),
                'createddate' => time(),
                'image' => $newName,
                'service_id' => $service_id,
                'slug' => $slug,
            ];
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // die;
            $db = $database->table('events');
            $save = $db->insert($data);
            if($save){
                $msg['status'] = true;
               
                $msg['msg'] = 'Event added successfully';
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
        $img = $this->request->getFile('image');
        $service_id = $this->request->getPost('services');
        
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
            'services' =>[
                'label' => 'services',
                'rules' => 'required'
            ],
        ];
        $newName  = $this->request->getPost('image2');
        if ($this->validate($rules)) {
            if($img->getName() != ""){
                 if (! $img->hasMoved()) {
                    if(file_exists(FCPATH . 'assets/events/' .$this->request->getPost('image2'))){
                        unlink(FCPATH . 'assets/events/' .$this->request->getPost('image2'));
                    }
                    $newName = time() . '-event-' . $img->getClientName()  ;
                    $img->move(ROOTPATH . 'assets/events',$newName);
                }
            }
            
            $data = [
                'title' => $this->request->getPost('title'),
                'status' => $this->request->getPost('status'),
                'description' => $this->request->getPost('description'),
                'address' => $this->request->getPost('address'),
                'createddate' => time(),
                'image' => $newName,
                'service_id' => $service_id,
            ];
          
            $db = $database->table('events');
            $db->where('id', $this->request->getPost('id'));
            $save = $db->update($data);
            if($save){
                $msg['status'] = true;
               
                $msg['msg'] = 'Event updated successfully';
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
            $db = $database->table('events');
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
        $db = $database->table('events');
        $data = $db->where('id', $id)->get()->getRowArray();
        $data['start_date'] = date('m/d/Y h:i A', $data['start_date']);
        $data['end_date'] = date('m/d/Y h:i A', $data['end_date']);
        echo json_encode($data);
       // echo "<pre>";
       //  print_r($data);
       // echo "</pre>";

    }
}

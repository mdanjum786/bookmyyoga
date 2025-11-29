<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SliderController extends BaseController
{
    public function index()
    {
        //
        $database = \Config\Database::connect();
        $db = $database->table('sliders');
        $sliders = $db->orderBy('id', 'DESC')->get()->getResultArray();
        $data['sliders'] = $sliders;
        return view('admin/sliders/index', $data);
    }
   
    public function create(){

        return view('admin/sliders/create');
    }

     function uploadFiles() {
        helper(['form', 'url']);
 
        $database = \Config\Database::connect();
        $db = $database->table('sliders');
 
        $msg = 'Please select a valid files';
        $status = false; 
       
        if ($this->request->getFileMultiple('images')) {
            $i = 1;
             foreach($this->request->getFileMultiple('images') as $file)
             {   
                $newName = time()  . $i++ . '-sliders-' . $file->getClientName()  ;
                $file->move(ROOTPATH . 'assets/sliders',$newName);
               
                $data = [
                    'image' =>  $newName,//$file->getClientName(),
                    'status' => $this->request->getVar('status'),
                    'heading' => $this->request->getVar('heading'),
                    'subheading' => $this->request->getVar('subheading'),
                    'slider_btn_text' => $this->request->getVar('slider_btn_text'),
                    'slider_btn_link' => $this->request->getVar('slider_btn_link'),
                    'createddate' => time()
                ];
        //          echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die;
              $save = $db->insert($data);
              $msg = 'Files have been successfully uploaded';
              $status = true;
             }
        }
 
        return redirect()->to( base_url('/admin/slider/create') )->with('msg', $msg);        
    }
  
    public function editSlider(){
        $status = $this->request->getVar('status');
        $id = $this->request->getVar('id');
        $database = \Config\Database::connect();
        $builder = $database->table('sliders');
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
    public function edit($id){
    // $status = $this->request->getVar('status');
        //$id = $this->request->getVar('id');
        $database = \Config\Database::connect();
        $builder = $database->table('sliders');
        $builder->where('id', $id);
        $res = $builder->get()->getResultArray();
        // echo "<pre>";
        // print_r($res);
        $data['slider'] = $res[0];
        return view('admin/sliders/edit', $data);
    }
    public function updateSlider(){
           helper(['form', 'url']);
 
        $database = \Config\Database::connect();
        $db = $database->table('sliders');
 
        $msg = 'Please select a valid files';
        $status = false; 
         $img = $this->request->getFile('images');
        $newName  = $this->request->getPost('images2');
        // echo $newName;
        // die;
        //if ($this->validate($rules)) {
            if($img->getName() != ""){
                 if (! $img->hasMoved()) {
                    if(file_exists(FCPATH . 'assets/sliders/' .$this->request->getPost('images2'))){
                        unlink(FCPATH . 'assets/sliders/' .$this->request->getPost('images2'));
                    }
                    $newName = time() . '-sliders-' . $img->getClientName()  ;
                    $img->move(ROOTPATH . 'assets/sliders',$newName);
                }
            }
        
        // if ($this->request->getFileMultiple('images')) {
        //     $i = 1;
        //      foreach($this->request->getFileMultiple('images') as $file)
        //      {   
                // $newName = time()  . $i++ . '-sliders-' . $file->getClientName()  ;
                // $file->move(ROOTPATH . 'assets/sliders',$newName);
               
                $data = [
                    'image' =>  $newName,//$file->getClientName(),
                    'status' => $this->request->getVar('status'),
                    'heading' => $this->request->getVar('heading'),
                    'subheading' => $this->request->getVar('subheading'),
                    'slider_btn_text' => $this->request->getVar('slider_btn_text'),
                    'slider_btn_link' => $this->request->getVar('slider_btn_link'),
                    'updateddate' => time()
                ];
        //          echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die;
             $db->where('id', $this->request->getPost('id'));
              $save = $db->update($data);
              $msg = 'Files have been successfully uploaded';
              $status = true;
        //      }
        // }
 
        return redirect()->to( base_url('/admin/slider/edit/' . $this->request->getPost('id')) )->with('msg', $msg);       
    }
}

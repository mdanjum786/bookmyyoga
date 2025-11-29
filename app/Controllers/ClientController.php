<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ClientController extends BaseController
{
    public function index()
    {
        //
        $database = \Config\Database::connect();
        $db = $database->table('clients');
        $clients = $db->orderBy('id', 'DESC')->get()->getResultArray();
        $data['clients'] = $clients;
        // echo "<pre>";
        //     print_r($data);
        // echo "</pre>";
        // die;
        return view('admin/clients/index', $data);
    }
   
    public function create(){
        $database = \Config\Database::connect();
        $db = $database->table('clients');
        $clients = $db->orderBy('id', 'DESC')->get()->getResultArray();
        $data['clients'] = $clients;

        return view('admin/clients/create', $data);
    }

     function uploadFiles() {
        helper(['form', 'url']);
 
        $database = \Config\Database::connect();
        $db = $database->table('clients');
 
        $msg = 'Please select a valid files';
        $status = false; 
        if ($this->request->getFileMultiple('images')) {
            $i = 1;
             foreach($this->request->getFileMultiple('images') as $file)
             {   
                $newName = time()  . $i++ . '-clients-' . $file->getClientName()  ;
                $file->move(ROOTPATH . 'assets/clients',$newName);
               
                $data = [
                    'image' =>  $newName,//$file->getClientName(),
                    'status' => $this->request->getVar('status'),
                    'createddate' => time()
                ];
 
              $save = $db->insert($data);
              $msg = 'Files have been successfully uploaded';
              $status = true;
             }
        }
 
        return redirect()->to( base_url('/admin/client/create') )->with('msg', $msg);        
    }
  
    public function editClient(){
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
}

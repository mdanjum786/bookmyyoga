<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Events;
class TrainerController extends BaseController
{
    public function index()
    {
        //
         $database = \Config\Database::connect();
        $db = $database->table('trainers_and_studio');
        $trainers_and_studio = $db->select('trainers_and_studio.*, admins.name as user_name, admins.username, admins.email as user_email') // Select columns from both tables
             ->join('admins', 'admins.id = trainers_and_studio.user_id') // Join condition
             ->orderBy('trainers_and_studio.id', 'DESC') // Order by event ID in descending order
             ->get()
             ->getResultArray();
        $data['trainers_and_studio'] = $trainers_and_studio;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die;
        // $db = $database->table('services');
        // $services = $db->orderBy('id', 'DESC')->get()->getResultArray();
        // $data['services'] = $services;
        return view('admin/trainer-studio/index', $data);
    }

     public function changeStatus(){
        $id = $this->request->getPost('status_id');
        $status = $this->request->getPost('status');
         $database = \Config\Database::connect();
         $data = [
                
                'status' => $this->request->getPost('status'),
                'updated_date' => time()
            ];
            $db = $database->table('trainers_and_studio');
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
   
 
}

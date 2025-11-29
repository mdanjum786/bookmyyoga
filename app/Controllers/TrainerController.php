<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Events;
class TrainerController extends BaseController
{
    public function index()
    {
        $database = \Config\Database::connect();
        
        // Get filter parameters
        $status = $this->request->getVar('status');
        $search = $this->request->getVar('search');
        
        $db = $database->table('trainers_and_studio');
        $db->select('trainers_and_studio.*, admins.name as user_name, admins.username, admins.email as user_email');
        $db->join('admins', 'admins.id = trainers_and_studio.user_id');
        
        // Apply status filter
        if($status !== null && $status !== '') {
            $db->where('trainers_and_studio.status', $status);
        }
        
        // Apply search filter
        if($search && !empty(trim($search))) {
            $searchTerm = trim($search);
            $db->groupStart();
            $db->like('trainers_and_studio.business_name', $searchTerm);
            $db->orLike('trainers_and_studio.email', $searchTerm);
            $db->orLike('trainers_and_studio.mobile_no', $searchTerm);
            $db->orLike('trainers_and_studio.address', $searchTerm);
            $db->orLike('admins.name', $searchTerm);
            $db->orLike('admins.email', $searchTerm);
            $db->orLike('admins.username', $searchTerm);
            $db->groupEnd();
        }
        
        $db->orderBy('trainers_and_studio.id', 'DESC');
        $trainers_and_studio = $db->get()->getResultArray();
        
        // Get statistics
        $totalTrainers = $database->table('trainers_and_studio')->countAllResults();
        $activeTrainers = $database->table('trainers_and_studio')->where('status', 1)->countAllResults();
        $inactiveTrainers = $database->table('trainers_and_studio')->where('status', 0)->countAllResults();
        
        // Get filtered statistics if filters are applied
        $filteredTotal = count($trainers_and_studio);
        $filteredActive = count(array_filter($trainers_and_studio, function($t) { return $t['status'] == 1; }));
        $filteredInactive = count(array_filter($trainers_and_studio, function($t) { return $t['status'] == 0; }));
        
        $data['trainers_and_studio'] = $trainers_and_studio;
        $data['status_filter'] = $status;
        $data['search_filter'] = $search;
        $data['total_trainers'] = $totalTrainers;
        $data['active_trainers'] = $activeTrainers;
        $data['inactive_trainers'] = $inactiveTrainers;
        $data['filtered_total'] = $filteredTotal;
        $data['filtered_active'] = $filteredActive;
        $data['filtered_inactive'] = $filteredInactive;
        
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

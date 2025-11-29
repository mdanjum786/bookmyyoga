<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use Psr\Log\LoggerInterface;
class MyController extends BaseController
{
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        // Add your code here.
    }
    public function load_view($view, $data=array()){
        $database = \Config\Database::connect();
        $db = $database->table('config');
        $data['config_data'] = $db->get()->getResultArray();
        $trainer_studio_flag = false;
        if (session()->get('logged_in')){
            $db = $database->table('trainers_and_studio');
            $trainers_and_studio = $db->where('user_id', session()->get('user_id'))->get()->getResultArray();
            if(count($trainers_and_studio)){
                $trainer_studio_flag = true;
            }
        }
       // $query = $database->table('services');
        $services = []; //$query->where('status', 1)->get()->getResultArray();
        $data['trainer_studio_flag'] = $trainer_studio_flag;
        $data['services'] = $services;
        // $query = $database->table('events');
        // $events = $query->where('status', 1)->orderBy('id', 'desc')->get()->getResultArray();
        // $data['events'] = $events;
        echo view($view, $data);
    }
}

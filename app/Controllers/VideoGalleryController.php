<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class VideoGalleryController extends BaseController
{
	public function index(){
		$database = \Config\Database::connect();
        $db = $database->table('video_gallery');
        $video_gallery = $db->orderBy('id', 'DESC')->get()->getResultArray();
        $data['video_gallery'] = $video_gallery;
		return view('admin/video-gallery/index', $data);
	}
	public function create(){
		return view('admin/video-gallery/create');
	}
	public function add(){
		//$data = $this->request->getPost();
		$database = \Config\Database::connect();
		
		// echo "<pre>";
		// print_r($this->request->getPost());
		// print_r($this->request->getFile('video_slug'));
		// echo "</pre>";
		if($this->request->getPost('type') == 'link'){
			$data = [
				'slug' => trim($this->request->getPost('slug')),
				'type' => 'link',
				'status' => (int)trim($this->request->getPost('status')),
				'createddate' => time(),
		];
	}else{

		$file = $this->request->getFile('video_slug');
		 $newName = time()  .  '-video-' . $file->getClientName()  ;
                $file->move(ROOTPATH . 'assets/gallery',$newName);
               
		$data = [
				'slug' => $newName,
				'type' => 'video',
				'status' => (int)trim($this->request->getPost('status')),
				'createddate' => time(),
		];
	}

		
		// var_dump($data);
		// die;
		$db = $database->table('video_gallery');
        $save = $db->insert($data);
        if($save){
            $msg['status'] = true;
           
            $msg['msg'] = 'Video Gallery added successfully';
            echo json_encode($msg);
            exit();
        }
        $msg['status'] = false;
        $msg['msg'] = 'Something wrong, Please try again!';
        $msg['data'] = [];
        echo json_encode($msg);
        exit();
	}
	public function getDataById(){
		$database = \Config\Database::connect();
        $db = $database->table('video_gallery');
        $id = $this->request->getPost('id');
        $db->where('id', $id);
        $video_gallery = $db->get()->getResultArray();
        $data['video_gallery'] = $video_gallery;
        echo json_encode($data);
	}
	public function update(){
		$database = \Config\Database::connect();
		

		$data = [
				'slug' => trim($this->request->getPost('slug')),
				'status' => (int)trim($this->request->getPost('status')),
				'updateddate' => time(),
		];
		// var_dump($data);
		// die;

		$db = $database->table('video_gallery');
		$db->where('id', $this->request->getPost('id'));
        $save = $db->update($data);
        if($save){
            $msg['status'] = true;
           
            $msg['msg'] = 'Video Gallery updated successfully';
            echo json_encode($msg);
            exit();
        }
        $msg['status'] = false;
        $msg['msg'] = 'Something wrong, Please try again!';
        $msg['data'] = [];
        echo json_encode($msg);
        exit();
	}
}
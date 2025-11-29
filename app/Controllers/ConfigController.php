<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ConfigController extends BaseController
{
    public function index()
    {
        //
        $database = \Config\Database::connect();
        $db = $database->table('config');
        $config_data = $db->get()->getResultArray();
        $data['config_data'] = $config_data;
        return view('admin/config/index', $data);
    }
    public function store(){
        $database = \Config\Database::connect();
        $db = $database->table('config');
        $data = $db->get()->getResultArray();
        $tag_line = $this->request->getPost('tag_line');
        $email = $this->request->getPost('email');
        $phone_no = $this->request->getPost('phone_no');
        $whatsapp_no = $this->request->getPost('whatsapp_no');
        $address = $this->request->getPost('address');
        $insta_link = $this->request->getPost('insta_link');
        $x_link = $this->request->getPost('x_link');
        $facebook_link = $this->request->getPost('facebook_link');
        $youtube_link = $this->request->getPost('youtube_link');
        $linkedin = $this->request->getPost('linkedin');
        $tag_line = $this->request->getPost('tag_line');
        $logo =   $this->request->getFile('logo');
        $fav_icon =   $this->request->getFile('fav_icon');
        $about_us =   $this->request->getPost('about_us');
        $about_us_title =   $this->request->getPost('about_us_title');
        $about_us_image =   $this->request->getFile('about_us_image');
        if(count($data)){
            $logo_name = $data[0]['logo'];
            $fav_name = $data[0]['fav_icon'];
            $about_image_name = $data[0]['about_us_image'];
            if (!empty($_FILES['logo']['name'])){
                $logo_name = time() . '-logo-' . $logo->getClientName()  ;
                $logo->move(ROOTPATH . 'assets/images',$logo_name);
            }
            if (!empty($_FILES['fav_icon']['name'])){
                $fav_name = time() . '-fav-' . $fav_icon->getClientName()  ;
                $fav_icon->move(ROOTPATH . 'assets/images',$fav_name);
            }
            if (!empty($_FILES['about_us_image']['name'])){
                $about_image_name = time() . '-fav-' . $about_us_image->getClientName()  ;
                $about_us_image->move(ROOTPATH . 'assets/images',$about_image_name);
            }
        }else{
            $logo_name = '';
            $fav_name = '';
            $about_image_name= '';
            if (!empty($_FILES['logo']['name'])){
                $logo_name = time() . '-logo-' . $logo->getClientName()  ;
                $logo->move(ROOTPATH . 'assets/images',$logo_name);
            }

            if (!empty($_FILES['fav_icon']['name'])){
                $fav_name = time() . '-fav-' . $fav_icon->getClientName()  ;
                $fav_icon->move(ROOTPATH . 'assets/images',$fav_name);
            }
            if (!empty($_FILES['about_us_image']['name'])){
                $about_image_name = time() . '-fav-' . $about_us_image->getClientName()  ;
                $about_us_image->move(ROOTPATH . 'assets/images',$about_image_name);
            }
        }
       $config_data = [
            'tag_line' => $tag_line,
            'email' => $email,
            'phone_no' => $phone_no,
            'whatsapp_no' => $whatsapp_no,
            'insta_link' => $insta_link,
            'address' => $address,
            'x_link' => $x_link,
            'facebook_link' => $facebook_link,
            'youtube_link' => $youtube_link,
            'linkedin' => $linkedin,
            'logo' => $logo_name,
            'fav_icon' => $fav_name,
            'fav_icon' => $fav_name,
            'about_us_image' => $about_image_name,
            'about_us' => $about_us,
            'about_us_title' => $about_us_title,
            'geo_location' => $this->request->getPost('geo_location'),
       ];
       $db = $database->table('config');
       if(count($data)){
         $res = $db->update($config_data);
       }else{
         $res = $db->insert($config_data);
       }
      
       if($res){
            $msg['status'] =  true;
            $msg['msg'] =  'Data  Updated successfully';
            echo json_encode($msg);
            exit();
       }
        $msg['status'] =  false;
        $msg['msg'] =  'Something wrong, Please try again!';
        echo json_encode($msg);
        exit();
    }
}

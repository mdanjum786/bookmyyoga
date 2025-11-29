<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\MyController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
class PdfController extends BaseController
{
    public function index()
    {
    }
    public function memberCertificate(){
         $dompdf = new Dompdf();

         $data = [
            'border_image'    => $this->imageToBase64(ROOTPATH . '/assets/images/pdf/s2.png'),
            'logo'    => $this->imageToBase64(ROOTPATH . '/assets/images/logo-wide.png'),
            'qr'    => $this->imageToBase64(ROOTPATH . '/assets/images/pdf/qr.png'),
             'sign'    => $this->imageToBase64(ROOTPATH . '/assets/images/pdf/sign.png'),
           
            'email'         => session()->get('front_email'),
            'name'      => session()->get('front_username'),
            'user_id'        => sprintf("%06d", session()->get('front_userid')),//john.doe@email.com'
            'membership_date' => session()->get('front_createdtime'),
            'fav_image' => $this->imageToBase64(ROOTPATH . '/assets/images/favicon.png'),
        ];
        // echo "<pre>";
        // 	print_r($data);
        // echo "</pre>";
        // die;
        $dompdf->set_paper("a4", "portrait");
        $html = view('front/member-pdf', $data);
        $dompdf->loadHtml($html,'UTF-8');
        $dompdf->render();
        
        $dompdf->stream('member.pdf', [ 'Attachment' => false ]);
        exit(0);

    
    }
    private function imageToBase64($path) {
        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
}
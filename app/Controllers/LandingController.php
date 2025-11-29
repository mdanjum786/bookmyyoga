<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Controllers\MyController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use CodeIgniter\Exceptions\PageNotFoundException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use App\Models\AdminModel;
use App\Models\TrainersAndStudioModel;

use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\SMTP;  
use PHPMailer\PHPMailer\Exception;

class LandingController extends MyController
{
    // Pincode autocomplete for trainer studio form
   public function yttc(){
    // $this->load_view('front/gallery',$data);
     return view('front/landing/yttc');
   }
   public function yttc_enquiry(){
    return view('front/landing/contact');
   }

   public function landing_enquiry(){
    require FCPATH."vendor/autoload.php";
    	$mail = new PHPMailer();     // Passing `true` enables exceptions

   
        // Email server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';             //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@bookmyyoga.in';   //  sender username
        $mail->Password = 'Nazre@321';       // sender password
        $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
        $mail->Port = 587;                          // port - 587/465

        $mail->setFrom('no-reply@bookmyyoga.in', 'bookmyyoga.in');
        $mail->addAddress('info@bookmyyoga.in');
          $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = 'Yttc Landing Page Enquiry - 001';//$request->emailSubject;
        $body = '<table>
        	
        	<tr><td>Name </td><td>'.$this->request->getPost('name').'</td></tr>
        	<tr><td>Email </td><td>'.$this->request->getPost('email').'</td></tr>
        	<tr><td>Phone </td><td>'.$this->request->getPost('phone_no').'</td></tr>

        </table>';
        $mail->Body    =  $body;//$this->request->getPost('subject'); //$request->emailBody;

        // $mail->AltBody = plain text version of email body;

        if( !$mail->send() ) {
            $msg['status'] = false;
            $msg['msg'] = "Somthing Wrong, Please try again!";
          

        	// $msg['status'] = false;
        	// $msg['msg'] = 'Somthing Wrong, Please try again!';
           // return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
        }
        
        else {
            $msg['status'] = true;
            $msg['msg'] = "Your enquiry has been submitted successfully. We will contact you as soon as possible";
        	// $msg['status'] =true;
        	// $msg['msg'] = 'Form submitted successfully';
            //return back()->with("success", "Email has been sent.");
        }
        echo json_encode($msg);
        exit(0);
   }
}

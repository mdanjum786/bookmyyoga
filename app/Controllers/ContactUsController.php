<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\MyController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\SMTP;  
use PHPMailer\PHPMailer\Exception;

class ContactUsController extends MyController
{
    public function index()
    {


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

        $mail->Subject = 'Contect Us Enquiry';//$request->emailSubject;
        $body = '<table>
        	<tr><td>Subject </td><td>'.$this->request->getPost('subject').'</td</tr>
        	<tr><td>Name </td><td>'.$this->request->getPost('fullname').'</td</tr>
        	<tr><td>Email </td><td>'.$this->request->getPost('email').'</td</tr>
        	<tr><td>Phone No </td><td>'.$this->request->getPost('phone').'</td</tr>
        	<tr><td>Message </td><td>'.$this->request->getPost('message').'</td</tr>
        </table>';
        $mail->Body    =  $body;//$this->request->getPost('subject'); //$request->emailBody;

        // $mail->AltBody = plain text version of email body;

        if( !$mail->send() ) {
            echo "Somthing Wrong, Please try again!";
            exit(0);

        	// $msg['status'] = false;
        	// $msg['msg'] = 'Somthing Wrong, Please try again!';
           // return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
        }
        
        else {
            echo "success";
            exit(0);
        	// $msg['status'] =true;
        	// $msg['msg'] = 'Form submitted successfully';
            //return back()->with("success", "Email has been sent.");
        }
        echo json_encode($msg);
    }
    public function book_apointment(){
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

        $mail->Subject = 'Apointment Enquiry';//$request->emailSubject;
        $body = '<table>
            <tr><td>Service </td><td>'.$this->request->getPost('services').'</td</tr>
            <tr><td>Name </td><td>'.$this->request->getPost('name').'</td</tr>
            <tr><td>Email </td><td>'.$this->request->getPost('email').'</td</tr>
            <tr><td>Phone No </td><td>'.$this->request->getPost('phone').'</td</tr>
            <tr><td>Message </td><td>'.$this->request->getPost('msg').'</td</tr>
        </table>';
        $mail->Body    =  $body;//$this->request->getPost('subject'); //$request->emailBody;

        // $mail->AltBody = plain text version of email body;

        if( !$mail->send() ) {
            echo "Somthing Wrong, Please try again!";
            exit(0);

            // $msg['status'] = false;
            // $msg['msg'] = 'Somthing Wrong, Please try again!';
           // return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
        }
        
        else {
            echo "success";
            exit(0);
            // $msg['status'] =true;
            // $msg['msg'] = 'Form submitted successfully';
            //return back()->with("success", "Email has been sent.");
        }
        echo json_encode($msg);
    }
}

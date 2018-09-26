<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PHPMailer extends CI_Controller {

    function test_mail() {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'nexter@seno.web.id',
            'smtp_pass' => 'Ander 4ll i5 well',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $mail = $this->email;

        $mail->from('nexter@nexterweb.id', 'Your Name');
        $mail->to('nexter.three@gmail.com');
        $mail->cc('andrianext@pismatex.web.id');
   
        $mail->subject('Mail Test');
        $mail->message('Testing the mail class dari codeigniter.');

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->print_debugger();
        } else {
            echo "Message sent!";
        }
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PHPMailerAutoload {

    protected $_CI;

    function __construct() {
        $this->_CI = &get_instance();
    }

    public function PHPMailerAutoload() {
        //require_once('/PHPMailer/PHPMailerAutoload.php');
        $this->_CI->load('PHPMailer/PHPMailerAutoload.php');
    }

}

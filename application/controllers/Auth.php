<?php
  class Auth extends CI_Controller {
    function __construct() {
      parent::__construct
      $this->load->helper('form');
      $this->load->model('users_model');
    }

    function index() {
      $this->login();
    }

    function login() {
      // login fail message
      $msg = "";

      if($this->input->post('password')) {
        $stat = $this->check_login();
        $msg = $stat['msg'];
        if($stat['result'] == 'ok') {
          // login success
          if($this->session->userdata('role') == 'admin_user')
        }
      }
    }
  }
?>

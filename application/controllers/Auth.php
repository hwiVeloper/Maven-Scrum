<?php
  class Auth extends CI_Controller {
    function __construct() {
      parent::__construct();
      $this->load->helper('form');
      $this->load->model('Users_model');
      $this->load->library('session');
    }

    function index() {
      $this->login();
    }

    function login() {
      // Login fail message
      $msg = "";

      if($this->input->post('password')) {
        $stat = $this->check_login();
        $msg = $stat['msg'];
        if($stat['result'] == 'ok') {
          // Login success
          if($this->session->userdata('role') == '5') {
            // Go Admin Menu
            redirect('Auth/admin_main_menu');
          }else {
            // Go User Menu
            redirect('Auth/user_main_menu');
          }
          return;
        }
      }else {
        // Password is NULL
        // Remove session information and ask user information
        $this->session->sess_destroy();
      }

      // If the code reach here, there is no session information
      // or login process has been failed
      $view_setup['msg'] = $msg;
      // load login view
      $this->load->view('login_view', $view_setup);
    }

    function check_login() {
      // Get user information from login_view's form
      $user_name = $this->input->post('user_name');
      $password  = $this->input->post('password');

      // Initialize array to return
      $ret = array();

      // Usie Users_model to check login information
      $user_record = $this->Users_model->check_login($user_name, $password);
      if($user_record) {
        // Pass check process
        // And make session
        $this->session->set_userdata('user_id', $user_record->id);
        $this->session->set_userdata('user_name', $user_record->name);
        $this->session->set_userdata('user_level', $user_record->level);
        $ret['result'] = 'ok'; $ret ['msg'] = 'Logged-in!';
      }else {
        // Login failed!
        $ret['result'] = 'notok';

        // Alert failed status to login form to notify message
        $ret['msg'] = 'Invalid User/Pass - Try Again!';
      }
      return $ret;
    }

    function logout() {
      // Remove session
      $this->session->sess_destroy();
      redirect('Auth');
    }

    function admin_main_menu() {
      // Open admin main view
      $view_setup['user_id'] = $this->session->userdata('user_id');
      $view_setup['user_name'] = $this->session->userdata('user_name');
      $view_setup['user_level'] = $this->session->userdata('user_level');
      $this->load->view('logged_in_view', $view_setup);
    }

    function user_main_menu() {
      // Open user main view
      $view_setup['user_id'] = $this->session->userdata('user_id');
      $view_setup['user_name'] = $this->session->userdata('user_name');
      $view_setup['user_level'] = $this->session->userdata('user_level');
      $this->load->view('logged_in_view', $view_setup);

    }
  }
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('MMain');
	}

  // Main index
	public function index() {
		// if session isset
    if($this->session->userdata('user_id')){
      $this->load->view('header');
  		$this->load->view('login_success');
      $this->load->view('footer');
    }else{
			if($this->input->post('user_id')
			&& $this->input->post('user_password')){
				$status = $this->check_login();
				$msg = $status['msg'];
        if($status['result'] == TRUE) {
					echo "<script>alert('$msg')</script>";
          redirect('Main', 'refresh');
        }else{
					echo "<script>alert('$msg')</script>";
				}
			}
      $this->load->view('header');
      $this->load->view('main');
      $this->load->view('footer');
    }
	}
	function check_login() {
		// Get user information from login_view's form
		$id = $this->input->post('user_id');
		$password  = $this->input->post('user_password');

		// Initialize array to return
		$ret = array();

		// Use Users_model to check login information
		$user_data = $this->MMain->check_login($id, $password);
		if($user_data) {
			// Pass check process
			// And make session
			$this->session->set_userdata('user_id'   , $user_data->user_id   );
			$this->session->set_userdata('user_name' , $user_data->user_name );
			$this->session->set_userdata('user_level', $user_data->user_level);
			$this->session->set_userdata('user_birth', $user_data->user_birth);
			$this->session->set_userdata('user_email', $user_data->user_email);
			$this->session->set_userdata('user_field', $user_data->user_field);
			$this->session->set_userdata('user_img'  , $user_data->user_img  );
			$ret['result'] = TRUE;
			$ret['msg'] = '안녕하세요, '.$this->session->userdata('user_name').' 님.';
		}else {
			// Login failed!
			$ret['result'] = FALSE;

			// Alert failed status to login form to notify message
			$ret['msg'] = '아이디 또는 비밀번호가 일치하지 않습니다.';
		}
		return $ret;
	}

	function logout() {
		// Remove session
		$this->session->sess_destroy();
		redirect('Main');
	}
}

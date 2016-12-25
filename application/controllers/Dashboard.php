<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  /**
   * Constructor
   */
  function __construct() {
		parent::__construct();
		$this->load->model('MDashboard');
	}

  /**
   * index : default access
   */
  function index() {
    // Session check
    // if(!($this->session->userdata('user_id'))){
    //   echo "<script>alert('먼저 로그인을 해주세요.');</script>";
    //   redirect('Main', 'refresh');
    // }

    // Get date parameter (GET)
    if($this->uri->segment(2)){
      $date = $this->uri->segment(2);
    }else{
      $date = date("Y-m-d");
    }

    $view_params['today_count'] = $this->MDashboard->today_count($date);
    $view_params['today_plans'] = $this->MDashboard->today_plans($date);

    $this->load->view('header');
    $this->load->view('dashboard', $view_params);
    $this->load->view('footer');
  }
}
?>

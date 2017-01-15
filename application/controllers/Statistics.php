<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Controller{

  public function __construct() {
    parent::__construct();

    $this->load->model('MStatistics');
  }

  function index() {
    if($this->uri->segment(3) && $this->uri->segment(4)){
      $y = $this->uri->segment(3);
      $m = $this->uri->segment(4);
    }else{
      $y = date("Y");
      $m = date("m");
    }

    // Member list
    $view_params['members'] = $this->MStatistics->get_members();
    // Attendance
    foreach($view_params['members'] as $k=>$row) {
      $view_params['attendance'][$k] = $this->MStatistics->get_attendance($y, $m, $row['user_id']);
    }
    $this->load->view('header');
    $this->load->view('statistics', $view_params);
    $this->load->view('footer');
  }

}

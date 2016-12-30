<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!($this->session->userdata('user_id'))){
      echo "<script>alert('먼저 로그인을 해주세요.')</script>";
      redirect('Main', 'refresh');
    }
  }

  function index() {
    $this->load->view('header');
    $this->load->view('home');
    $this->load->view('footer');
  }
}

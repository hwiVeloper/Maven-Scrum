<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller{

  public function __construct() {
    parent::__construct();

    if( ! $this->session->userdata('user_id') ) {
      echo "<script>alert('먼저 로그인을 해주세요.');</script>";
      redirect('Main', 'refresh');
    }

    $this->load->model('MForum');
  }

  function index() {
    $ym = "";

    if( $this->uri->segment(2) ) {
      $ym = $this->uri->segment(2);
    } else{
      $ym = $this->MForum->get_max_ym();
    }

    $view_params['ym'] = $ym;
    $view_params['ym_list'] = $this->MForum->get_ym_list();
    $view_params['list'] = $this->MForum->get_forum_list_by_ym($ym);

    $this->load->view('header');
    $this->load->view('forum_list', $view_params);
    $this->load->view('footer');
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggestions extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // Session check
    if(!($this->session->userdata('user_id'))){
      echo "<script>alert('먼저 로그인을 해주세요.')</script>";
      redirect('Main', 'refresh');
    }

    $this->load->model('MSuggestions');
  }

  function index() {
    $view_params['suggestions'] = $this->MSuggestions->get_suggestions();

    $this->load->view('header');
    $this->load->view('suggestions', $view_params);
    $this->load->view('footer');
  }

  function add() {
    if(!($this->input->post('suggestion_content'))){
      echo "<script>alert('올바르지 않은 요청입니다.')</script>";
      redirect('Suggestions');
    }
    $data = array(
        'user_id' => $this->input->post('user_id'),
        'suggestion_content' => $this->input->post('suggestion_content'),
    );

    $this->MSuggestions->add_suggestion($data);

    redirect('Suggestions', 'refresh');
  }

  function delete() {
    if(!($this->uri->segment(3))){
      echo "<script>alert('올바르지 않은 요청입니다.')</script>";
      redirect('Suggestions');
    }

    $id = $this->uri->segment(3);

    $valid_id = $this->MSuggestions->check_valid_if_delete($id);
    if($this->session->userdata('user_id') != $valid_id){
      echo "<script>alert('올바르지 않은 요청입니다.')</script>";
      redirect('Suggestions');
    }

    $this->MSuggestions->delete_suggestion($id);

    redirect('Suggestions', 'refresh');
  }
}

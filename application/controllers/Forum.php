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

    if( $this->input->post('forum_ym') ) {
      $ym = $this->input->post('forum_ym');
    } else if( $this->uri->segment(2) ) {
      $ym = $this->uri->segment(2);
    } else {
      $ym = $this->MForum->get_max_ym();
    }

    // 나눔의장 내용 마크다운 지원
    $this->load->library('markdown');

    $view_params['ym'] = $ym;
    $view_params['ym_list'] = $this->MForum->get_ym_list();
    $view_params['list'] = $this->MForum->get_forum_list_by_ym($ym);
    $view_params['open'] = $this->MForum->get_forum_open($ym);

    $this->load->view('header');
    $this->load->view('forum_list', $view_params);
    $this->load->view('footer');
  }

  function add() {
    if( ! $this->input->post('forum_ym') ) {
      echo "<script>alert('올바르지 않은 요청입니다.')</script>";
      redirect('Main', 'refresh');
    }

    $ym = $this->input->post('forum_ym');
    $title = $this->input->post('forum_title');
    $content = $this->input->post('forum_content');
    $writer = $this->input->post('forum_writer');
    $type = $this->input->post('forum_type');
    $dttm = date('Y-m-d h:i:s');

    if( $this->MForum->check_forum_count_by_ym($ym, $writer) != 0 ) {
      echo "<script>alert('이번 회에는 이미 등록했습니다.')</script>";
      redirect('Forum/'.$ym, 'refresh');
    }

    $data = array(
      'forum_ym' => $ym,
      'forum_title' => $title,
      'forum_content' => $content,
      'forum_writer' => $writer,
      'forum_type' => $type,
      'forum_dttm' => $dttm
    );

    if(!($this->MForum->insert($data) > 0)) {
      echo "<script>alert('올바르지 않은 요청입니다.')</script>";
      redirect('Forum', 'refresh');
    } else {
      redirect('Forum', 'refresh');
    }
  }

  function modify() {
    if( ! $this->input->post('forum_ym') ) {
      echo "<script>alert('올바르지 않은 요청입니다.')</script>";
      redirect('Main', 'refresh');
    }

    $ym = $this->input->post('forum_ym');
    $title = $this->input->post('forum_title');
    $content = $this->input->post('forum_content');
    $writer = $this->input->post('forum_writer');
    $type = $this->input->post('forum_type');
    $dttm = date('Y-m-d h:i:s');

    $data = array(
      'forum_title' => $title,
      'forum_content' => nl2br($content),
      'forum_type' => $type,
    );

    $this->MForum->update($data, $ym, $writer);
    redirect('Forum/'.$ym, 'refresh');
  }

  function remove() {
    if(! ($this->input->post('forum_ym') && $this->input->post('forum_writer'))) {
      echo "<script>alert('올바르지 않은 요청입니다.')</script>";
      redirect('Main', 'refresh');
    }

    $ym = $this->input->post('forum_ym');
    $writer = $this->input->post('forum_writer');

    $this->MForum->delete($ym, $writer);

    redirect('Forum/'.$ym, 'refresh');
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // Session check
    if(!($this->session->userdata('user_id'))){
      echo "<script>alert('먼저 로그인을 해주세요.');</script>";
      redirect('Main', 'refresh');
    }

    //$this->load->model('MCalendar');

    $prefs['template'] = array(
			'table_open'				=> '<table class="table" border="0" cellpadding="4" cellspacing="0" style="">',
			'heading_row_start'			=> '<tr>',
			'heading_previous_cell'		=> '<th><a href="{previous_url}">&lt;&lt;</a></th>',
			'heading_title_cell'		=> '<th colspan="{colspan}">{heading}</th>',
			'heading_next_cell'			=> '<th><a href="{next_url}">&gt;&gt;</a></th>',
			'heading_row_end'			=> '</tr>',
			'week_row_start'			=> '<tr style="text-align:center">',
			'week_day_cell'				=> '<td>{week_day}</td>',
			'week_row_end'				=> '</tr>',
			'cal_row_start'				=> '<tr style="text-align:center">',
			'cal_cell_start'			=> '<td>',
			'cal_cell_start_today'		=> '<td>',
			'cal_cell_start_other'		=> '<td style="color: #666;">',
			'cal_cell_content'			=> '<a href="{content}">{day}</a>',
			'cal_cell_content_today'	=> '<a href="{content}"><strong>{day}</strong></a>',
			'cal_cell_no_content'		=> '{day}',
			'cal_cell_no_content_today'	=> '<strong>{day}</strong>',
			'cal_cell_blank'			=> '&nbsp;',
			'cal_cell_other'			=> '{day}',
			'cal_cell_end'				=> '</td>',
			'cal_cell_end_today'		=> '</td>',
			'cal_cell_end_other'		=> '</td>',
			'cal_row_end'				=> '</tr>',
			'table_close'				=> '</table>'
		);
    $prefs['show_next_prev'] = TRUE;

    $this->load->library('calendar', $prefs);
  }

  function view() {
    if($this->uri->segment(3) && $this->uri->segment(4)){
      $y = $this->uri->segment(3);
      $m = $this->uri->segment(4);
      $view_params['cal_view'] = $this->calendar->generate($y, $m);
    }else{
      $view = $this->calendar->generate();
      $view_params['cal_view'] = $this->calendar->generate();
    }

    $this->load->view('header');
    $this->load->view('calendar', $view_params);
    $this->load->view('footer');
  }
}

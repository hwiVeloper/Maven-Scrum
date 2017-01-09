<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller{

  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();

    // Session check
    if(!($this->session->userdata('user_id'))){
      echo "<script>alert('먼저 로그인을 해주세요.');</script>";
      redirect('Main', 'refresh');
    }

    $this->load->model('MCalendar');

    $prefs['template'] = array(
			'table_open'				=> '<table class="table" border="0" cellpadding="4" cellspacing="0" style="">',
			'heading_row_start'			=> '<tr>',
			'heading_previous_cell'		=> '<th><a href="{previous_url}">&lt;&lt;</a></th>',
			'heading_title_cell'		=> '<th colspan="{colspan}"><h3>{heading}</h3></th>',
			'heading_next_cell'			=> '<th><a href="{next_url}">&gt;&gt;</a></th>',
			'heading_row_end'			=> '</tr>',
			'week_row_start'			=> '<tr style="text-align:center;">',
			'week_day_cell'				=> '<td>{week_day}</td>',
			'week_row_end'				=> '</tr>',
			'cal_row_start'				=> '<tr style="text-align:center">',
			'cal_cell_start'			=> '<td>',
			'cal_cell_start_today'		=> '<td class="bg-primary">',
			'cal_cell_start_other'		=> '<td style="color: #666;">',
			'cal_cell_content'			=> '<a class="is-content" href="{content}" style="color:#fff"><strong>{day}</strong></a>',
			'cal_cell_content_today'	=> '<a class="is-content-today" href="{content}" style="color:#fff"><strong>{day}</strong></a>',
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
    $prefs['day_type'] = 'abr';

    $this->load->library('calendar', $prefs);
  }

  /**
   * View Calendar
   */
  function view() {
    if($this->uri->segment(3) && $this->uri->segment(4)){
      $y = $this->uri->segment(3);
      $m = $this->uri->segment(4);
    }else{
      $y = date("Y");
      $m = date("m");
    }

    $contents = $this->MCalendar->check_content($y, $m, $this->session->userdata('user_id'));
    $data = $this->get_calendar_link($contents);

    $view_params['cal_view'] = $this->calendar->generate($y, $m, $data);
    $view_params['month_info'] = $this->MCalendar->get_month_info_by_user($y, $m, $this->session->userdata('user_id'));

    $this->load->view('header');
    $this->load->view('calendar', $view_params);
    $this->load->view('footer');
  }

  /**
   * Get calendar link (contents of calendar)
   */
  function get_calendar_link($contents) {
    $data = array();
    foreach($contents as $k=>$row) :
      $data[$row['day']] = $row['cal_link'];
    endforeach;

    return $data;
  }
}

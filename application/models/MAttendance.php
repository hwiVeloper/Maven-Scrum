<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAttendance extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_today_attendance($user, $date) {
    $this->db->where('user_id', $user);
    $this->db->where('attendance_date', $date);
    $query = $this->db->get('scrum_attendance');

    return $query->num_rows();
  }

  function add_attendance($data) {
    $this->db->insert('scrum_attendance', $data);
  }
}
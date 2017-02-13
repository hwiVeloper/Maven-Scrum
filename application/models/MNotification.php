<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MNotification extends CI_Model{

  private $today_date;
  private $user_id;

  public function __construct(){
    parent::__construct();
    $this->today_date = date("Y-m-d");
    $this->user_id = $this->session->userdata('user_id');
  }

  function add_notification($target_controller, $target_user, $target_date) {
    if($this->user_id == $target_user) {
      return;
    }
    $data = array(
      'alarm_from_user' => $this->user_id,
      'alarm_to_user' => $target_user,
      'alarm_target_date' => $target_date,
      'alarm_target_controller' => $target_controller,
      'alarm_status' => 0
    );

    $query = $this->db->insert('scrum_alarm', $data);
    return;
  }

  function view_notifications() {
    $sql = "SELECT a.*
                 , u2.user_name AS user_name_to
                 , u1.user_name AS user_name_from
                 , u1.user_img AS user_img
            FROM scrum_alarm a
               , scrum_user u1
               , scrum_user u2
            WHERE alarm_to_user = '$this->user_id'
            AND a.alarm_from_user = u1.user_id
            AND a.alarm_to_user = u2.user_id
            AND a.alarm_status = 0
            ORDER BY alarm_creation_dttm DESC
            ";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function count_notification() {
    $sql = "SELECT COUNT(*) count
            FROM scrum_alarm
            WHERE alarm_to_user = '$this->user_id'
            AND alarm_status = 0
            ORDER BY alarm_creation_dttm DESC
            ";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->count;
  }

  function click_notification($id) {
    $this->db->where('alarm_id', $id);
    $this->db->set('alarm_status', 1);
    $this->db->update('scrum_alarm');
  }
}

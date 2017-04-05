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

  function add_notification($data) {
    $query = $this->db->insert('scrum_alarm', $data);
    return;
  }

  function view_notifications() {
    $sql = "SELECT a.*
                 , u1.user_name AS user_name_to
                 , (SELECT user_name FROM scrum_user WHERE user_id = a.alarm_from_user) AS user_name_from
                 , (SELECT user_img FROM scrum_user WHERE user_id = a.alarm_from_user) AS user_img_from
            FROM scrum_alarm a
               , scrum_user u1
            WHERE alarm_target_user = '$this->user_id'
            AND a.alarm_to_user = u1.user_id
            AND a.alarm_status = 0
            ORDER BY alarm_creation_dttm DESC
            ";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function count_notification() {
    $sql = "SELECT COUNT(*) count
            FROM scrum_alarm
            WHERE alarm_target_user = '$this->user_id'
            AND alarm_status = 0
            ORDER BY alarm_creation_dttm DESC
            ";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->count;
  }

  function click_notification($id, $date) {
    $sql = "UPDATE scrum_alarm
            SET alarm_status = 1
            WHERE alarm_target_user = '$this->user_id'
            AND alarm_target_date = '$date'";
    $query = $this->db->query($sql);

    // $this->db->where('alarm_to_user', $this->user_id);
    // $this->db->where('alarm_target_date', $info->alarm_target_date);
    // $this->db->set('alarm_status', 1);
    // $this->db->update('scrum_alarm');
  }

  function get_notification_info($id) {
    $sql = "SELECT *
            FROM scrum_alarm
            WHERE alarm_id = $id";
    $query = $this->db->query($sql);

    return $query->row();
  }

  function delete_notification($id) {
    $this->db->where('alarm_ref_reply', $id);
    $this->db->delete('scrum_alarm');
  }

  function get_notification_date($id) {
    $sql = "SELECT alarm_target_date
            FROM scrum_alarm
            WHERE alarm_id = $id";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->alarm_target_date;
  }
}

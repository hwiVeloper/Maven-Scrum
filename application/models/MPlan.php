<?php
class MPlan extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function view_plan($date, $user) {
    $sql = "SELECT *
            FROM scrum_plan
            WHERE user_id = '$user'
            AND plan_date = '$date'
            ORDER BY plan_detail_seq";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function view_comment($date, $user) {
    $sql = "SELECT plan_comment
            FROM scrum_plan_info
            WHERE user_id = '$user'
            AND plan_date = '$date'";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function add_plan($data) {
    $query = $this->db->insert('scrum_plan', $data);
    return 1;
  }

  function add_plan_info($data) {
    $query = $this->db->insert('scrum_plan_info', $data);
    return;
  }

  function additional_plan($data) {
    $query = $this->db->insert('scrum_plan', $data);
    return 1;
  }

  function modify_plan($data) {
    $this->db->where('plan_date', $data['plan_date']);
    $this->db->where('user_id', $data['user_id']);
    $this->db->where('plan_detail_seq', $data['plan_detail_seq']);
    $query = $this->db->update('scrum_plan', $data);

    return 1;
  }

  function modify_plan_info($data) {
    $this->db->where('plan_date', $data['plan_date']);
    $this->db->where('user_id', $data['user_id']);
    $query = $this->db->update('scrum_plan_info', $data);

    return;
  }

  function remove_plan($data) {
    $query = $this->db->delete('scrum_plan', $data);

    return 1;
  }

  function update_seq($data) {
    $this->db->set('plan_detail_seq', 'plan_detail_seq-1', FALSE);
    $this->db->where('plan_date', $data['plan_date']);
    $this->db->where('user_id', $data['user_id']);
    $this->db->where('plan_detail_seq >', $data['plan_detail_seq']);
    $this->db->update('scrum_plan');
    return;
  }

  function check_valid_plan($date, $user) {
    $sql = "SELECT *
            FROM scrum_plan
            WHERE user_id = '$user'
            AND plan_date = '$date'";
    $query = $this->db->query($sql);

    return $query->num_rows();
  }

  function get_max_seq($date, $user) {
    $this->db->where('plan_date', $date);
    $this->db->where('user_id', $user);
    $this->db->select_max('plan_detail_seq', 'max_seq');
    $query = $this->db->get('scrum_plan');
    $row = $query->row();

    return $row->max_seq;
  }
}
?>

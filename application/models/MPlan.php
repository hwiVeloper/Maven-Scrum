<?php
class MPlan extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function view_plan($date, $user) {
    $sql = "SELECT *
            FROM scrum_plan
            WHERE user_id = '$user'
            AND plan_date = '$date'";
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

  function check_valid_plan($date, $user) {
    $sql = "SELECT *
            FROM scrum_plan
            WHERE user_id = '$user'
            AND plan_date = '$date'";
    $query = $this->db->query($sql);

    return $query->num_rows();
  }
}
?>

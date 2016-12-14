<?php
class MPlan extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  function view_plan($data) {

  }

  function add_plan($data) {
    $query = $this->db->insert('scrum_plan', $data);
    return 1;
  }

  function add_plan_info($data) {
    $query = $this->db->insert('scrum_plan_info', $data);
    return;
  }
}
?>

<?php
class MPlan extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function add_plan($data) {
    $query = $this->db->insert('scrum_plan', $data);

    return 1;
  }
}
?>

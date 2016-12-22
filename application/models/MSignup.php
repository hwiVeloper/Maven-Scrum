<?php
class MSignup extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function register_user($data) {
    $query = $this->db->insert('scrum_user', $data);
    return 1;
  }

  function check_id($id) {
    $sql = "SELECT *
            FROM scrum_user
            WHERE user_id = '$id'
            ";
    $query = $this->db->query($sql);

    if($query->num_rows() > 0){
      return FALSE;
    }else{
      return TRUE;
    }
  }
}
?>

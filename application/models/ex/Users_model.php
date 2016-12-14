<?php
class Users_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function check_login($user, $pass) {
    // This model already created Object because it extends CI_Model
    // But not use '$this->' and use $ci = &get_instance()
    // to be able to get helper, library everywhere.

    // md5 encryption
    $md5_pass = $pass;

    // Make query
    $sql = "SELECT *
            FROM scrum_user
            WHERE user_name = '$user'
            AND user_password = '$md5_pass'";
    $query = $this->db->query($sql);

    if($query->num_rows()) {
      foreach($query->result() as $row)
        return $row;
    }
    return NULL;
  }
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MReply extends CI_Model{

  public function __construct() {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function add_reply($data) {
    $query = $this->db->insert('scrum_reply', $data);
    return 1;
  }

  function delete_reply($id) {
    $this->db->where('reply_id', $id);
    $this->db->delete('scrum_reply');
    return 1;
  }
}

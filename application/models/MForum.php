<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MForum extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_forum_list_by_ym($ym) {
    $sql = "SELECT *
                 , user_name
                 , user_img
            FROM scrum_forum_detail d
               , scrum_user u
            WHERE forum_ym = '$ym'
            AND u.user_id = d.forum_writer";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_max_ym() {
    $sql = "SELECT MAX(forum_ym) max_ym
            FROM scrum_forum";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->max_ym;
  }

  function get_ym_list() {
    $sql = "SELECT *
            FROM scrum_forum";
    $query = $this->db->query($sql);

    return $query->result_array();
  }
}

<?php
class tag_model extends MY_Model {

  public function __construct(){
    parent::__construct();
  }

  public function get_all_tags()
  {
    $query = $this->db->query('SELECT tag_name FROM tags');
    $this->result = $query->result();
    return $this->result;
  }

}

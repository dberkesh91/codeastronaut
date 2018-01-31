<?php
class about extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['content'] = 'about';
    $this->load->view('main', $data);
  }

}

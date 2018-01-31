<?php
class search extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('blog_model', 'blog');
  }

  public function index()
  {
    $searchedTags = $this->input->get('searchedTags');
    $result = $this->blog->get_by_tagName($searchedTags);

    print_r($result);
    die();

  }

}

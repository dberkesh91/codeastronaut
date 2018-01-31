<?php
class Article extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->model('tag_model', 'tags');
  }

  public function index($id)
  {

    $this->load->model('Blog_model', 'blog');
    $result = $this->blog->get_by_id($id);

    $data['content'] = 'article';
    $data['article'] = $result;
    $data['searchFormAttrs'] = $this->searchFormAttrs;
    $data['tags']            = $this->tagsToArray($this->tags->get_all_tags());

    $this->load->view('main', $data);

  }

}

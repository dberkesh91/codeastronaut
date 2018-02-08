<?php
class Article extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->model('tag_model', 'tags');
  }

  public function index($id = false, $title = false)
  {
    $this->load->helper('url');

    $this->load->model('Blog_model', 'blog');
    $result = $this->blog->get_by_id($id);

    if (!empty($result) && url_title($result[0]->title, 'dash', true) == $title){

      $data['content']          = 'article';
      $data['articles']         = $result;
      $data['searchFormAttrs']  = $this->searchFormAttrs;
      $data['tags']             = $this->tagsToArray($this->tags->get_all_tags());

      $this->load->view('main', $data);

    } else {

      $this->show_error();

    }
  }

}

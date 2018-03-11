<?php
class homepage extends MY_Controller {

  public function __construct()
  {
    parent::__construct();

    // Loading models needed for the page
    $this->load->model('blog_model', 'blog');
    $this->load->model('tag_model', 'tags');
    $this->load->helper('form');
  }

  public function index()
  {
    $data['title']           = 'Home';
    $data['content']         = 'home'; // View that loads in the main layout
    $data['searchFormAttrs'] = $this->searchFormAttrs;
    $data['articles']        = $this->blog->get_latest_articles();

    /* Used for populating the select2 search */
    $data['tags']            = $this->tagsToArray($this->tags->get_all_tags());

    $this->load->view('main', $data);

  }

}

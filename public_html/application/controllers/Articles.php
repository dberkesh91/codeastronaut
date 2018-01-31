<?php
class articles extends MY_Controller {

  public $searchedTags = array();

  public function __construct(){
    parent::__construct();

    $this->load->model('tag_model', 'tags');
    $this->load->helper('form');
  }

  public function index()
  {

    $data['title']           = 'Articles';
    $data['content']         = 'articles';
    $data['searchFormAttrs'] = $this->searchFormAttrs;
    $data['tags']            = $this->tagsToArray($this->tags->get_all_tags());

    /* Catch searched tags from get global */
    $this->searchedTags = $this->input->get('searchedTags');

    $data['prev_searched'] = $this->searchedTags;

    /* Load relevant model */
    $this->load->model('blog_model', 'blog');

    /* Catch the result of the query that executes within the model */
    $result = $this->blog->get_by_tagName($this->searchedTags);

    $data['articles']        = $result;

    /* Displays results on the articles page */
    $this->load->view('main', $data);
  }

}

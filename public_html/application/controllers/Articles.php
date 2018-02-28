<?php
class articles extends MY_Controller {

  public $searchedTags = array();

  public function __construct(){
    parent::__construct();

    $this->load->helper('form');
  }

  public function index()
  {
      /* Load relevant models */
      $this->load->model('blog_model', 'blog');

      /* Catch searched tags from get global */
      /*
      Since searchedTags is user input thats being returned back to the views
      use `urlencode` (in combination with xss clean in codeigniter) to prevent potential xss attacks.
       */
      $this->searchedTags = urlencode($this->input->get('searchedTags'));

      if (!$this->searchedTags){

        $result = $this->blog->get_latest_articles();

      } else {

        /* Catch the result of the query that executes within the model */
        $result = $this->blog->get_by_tagName($this->searchedTags);

      }


      if ($this->input->is_ajax_request()){

        /* Return results to javascript */
        $data = $result;
        echo json_encode($data);

      } else {

        /* Display results on the articles page */
        $this->load->model('tag_model', 'tags');

        $data['title']           = 'Articles';
        $data['content']         = 'articles';
        $data['searchFormAttrs'] = $this->searchFormAttrs;
        $data['tags']            = $this->tagsToArray($this->tags->get_all_tags());
        $data['articles']        = $result;
        $data['prev_searched']   = $this->searchedTags;

        $this->load->view('main', $data);

      }

  }

}

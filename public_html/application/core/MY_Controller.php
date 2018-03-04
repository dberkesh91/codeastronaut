<?php

class MY_Controller extends CI_Controller {

  public $searchFormAttrs = array();

  public function __construct()
  {
    parent::__construct();

    /* Should this code run every time any page loads? */
    /* Probably not! */
    $this->searchFormAttrs = array(
      'action' => 'http://' . SITE_HOST . '/articles',
      'form' => array(
        'method' => 'get',
        'class' => 'searchForm',
        'id'  => 'searchForm'
      ),
      'select' => array(
        'name' => 'searchedTags[]',
        'id' => 'searchDropdown',
        'class' => 'searchDropdown',
        'multiple' => 'multiple',
        'style' => 'width:100%'
      ),
      'input' => array(
        'type' => 'text',
        'class' => 'searchInput',
        'id' => 'searchTerm',
        'name' => 'searchTerm'
      ),
      'submit' => array(
        'class' => 'searchSubmit',
        /* Leave value empty when displaying magnifier glass */
        'value' => '',
        'name' => 'searchSubmit',
        'id' => 'searchSubmit'
      )
    );
  }

  // Converts array of tag objects to array of tags
  public function tagsToArray($tags)
  {
    $result = array();
    foreach ($tags as $tag)
    {
      $result[$tag->tag_name] = $tag->tag_name;
    }
    return $result;
  }

  public function show_error(){
    show_404("", false);
  }

}

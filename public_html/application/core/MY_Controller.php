<?php

class MY_Controller extends CI_Controller {

  public $searchFormAttrs = array();

  public function __construct()
  {
    parent::__construct();

    $this->searchFormAttrs = array(
      'action' => SITE_HOST . '/index.php/articles',
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
        'value' => 'Search',
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

}


// 'inputFieldAttrs' => array(
//   'type' => 'text',
//   'name' => 'searchTerm',
//   'id'   => 'searchTerm',
//   'class' => 'searchInput'
// )

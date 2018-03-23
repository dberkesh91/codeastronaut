<?php
class blog_model extends MY_Model
{
  /* Main table used in queries within this model */
  private $_tableName = 'articles';

  public function __construct()
  {
    parent::__construct();
  }

  /*
  I'm actually pulling limited amount of article data and
  calling this data 'articles' even though this data actually represents
  excerpts.
  */
  public function get_latest_articles()
  {
    $sql = "SELECT ar.article_id, ar.title, ar.description, ar.created, ar.img_url, firstname, lastname, tag_name
            FROM `articles` AS ar
            INNER JOIN `authors` AS au
               ON ar.author_id = au.author_id
            INNER JOIN tags_articles AS ta
               ON ar.article_id = ta.article_id
            INNER JOIN tags AS t
               ON t.tag_id = ta.tag_id";

    $query = $this->db->query($sql);
    $this->results = $query->result_array();

    $this->load->library('Structurizer');
    $structurizer = new CI_Structurizer
    (
      $this->results,
      'article_id',
      'tag_name',
      'tags'
    );

    $this->results = $structurizer->structure();
    $this->results = $this->toObject($this->results);

    return $this->results;
  }

  /*
  Where does the user have an option to use this and do a text search?
  since searches are done via tags; (eg. php, ubuntu, css).
  */
  public function get_by_searchTerm($searchTerm)
  {
    $sql = "SELECT title, description, created " .
           "FROM `{$this->_tableName}` " .
           "WHERE title " .
           "LIKE '%{$searchTerm}%'";

    $query = $this->db->query($sql);
    $this->results = $query->result();

    return $this->results;
  }

  public function get_by_tagName($searchedTags)
  {
    $sql = "SELECT DISTINCT(ar.article_id), ar.title, ar.description, ar.created " .
           "FROM `{$this->_tableName}` AS ar " .
           "INNER JOIN tags_articles AS ta " .
              "ON ar.article_id = ta.article_id " .
           "INNER JOIN tags AS t " .
              "ON ta.tag_id = t.tag_id " .
           "WHERE t.tag_name " .
           "IN('".implode("','", $searchedTags)."')";

    $query = $this->db->query($sql);
    $this->results = $query->result_array();

    $this->load->library('Structurizer');
    $structurizer = new CI_Structurizer
    (
      $this->results,
      'article_id',
      'tag_name',
      'tags'
    );

    $this->results = $structurizer->structure();
    $this->results = $this->toObject($this->results);

    return $this->results;

  }

  public function get_by_id($id)
  {
    $sql = "SELECT ar.title, ar.description, ar.created, ar.content, c.category_name, au.lastname, au.firstname " .
           "FROM `{$this->_tableName}` AS ar " .
           "INNER JOIN categories AS c " .
              "ON ar.category_id = c.category_id " .
           "INNER JOIN authors AS au " .
              "ON ar.author_id = au.author_id " .
           "WHERE ar.article_id = ?";

    $query = $this->db->query($sql, array($id));
    $this->results = $query->result();

    return $this->results;
  }

}

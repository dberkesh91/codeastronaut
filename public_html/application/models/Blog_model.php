<?php
class blog_model extends MY_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_latest_articles()
  {
    $sql = "SELECT * FROM articles";
    $query = $this->db->query($sql);
    $this->results = $query->result();
    return $this->results;
  }

  public function get_by_searchTerm($searchTerm)
  {
    $sql = "SELECT title, description, created " .
           "FROM articles " .
           "WHERE title " .
           "LIKE '%{$searchTerm}%'";

    $query = $this->db->query($sql);
    $this->results = $query->result();
    return $this->results;
  }

  public function get_by_tagName($searchedTags)
  {
    $sql = "SELECT DISTINCT(ar.article_id), ar.title, ar.description, ar.created " .
           "FROM articles AS ar " .
           "INNER JOIN tags_articles AS ta " .
              "ON ar.article_id = ta.article_id " .
           "INNER JOIN tags AS t " .
              "ON ta.tag_id = t.tag_id " .
           "WHERE t.tag_name " .
           "IN('".implode("','", $searchedTags)."')";

    $query = $this->db->query($sql);
    $this->results = $query->result();
    return $this->results;

  }

  public function get_by_id($id)
  {
    $sql = "SELECT ar.title, ar.description, ar.created, ar.content, c.category_name, au.lastname, au.firstname " .
           "FROM articles AS ar " .
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

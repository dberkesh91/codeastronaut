<?php
class blog_model extends MY_Model {

  public function __construct(){
    parent::__construct();
  }

  public function get_latest_articles()
  {
    $query = $this->db->query('SELECT * FROM  articles');
    $this->results = $query->result();
    return $this->results;
  }

  public function get_by_searchTerm($searchTerm)
  {
    $query = $this->db->query("SELECT title, description, created FROM articles WHERE title LIKE '%{$searchTerm}%'");
    $this->results = $query->result();
    return $this->results;
  }

  public function get_by_tagName($searchedTags)
  {
    $searchTagsString = implode($searchedTags);

    $sql = "SELECT articles.title, articles.description, articles.created FROM articles INNER JOIN tags_articles ON articles.article_id = tags_articles.article_id INNER JOIN tags ON tags_articles.tag_id = tags.tag_id WHERE tags.tag_name IN('".implode("','", $searchedTags)."')";
    $query = $this->db->query($sql);
    $this->results = $query->result();
    return $this->results;

  }

  public function get_by_id($id)
  {
    $sql = "SELECT articles.title, articles.description, articles.created, articles.content, categories.category_name, authors.lastname, authors.firstname FROM articles INNER JOIN categories ON articles.category_id = categories.category_id INNER JOIN authors ON articles.author_id = authors.author_id WHERE articles.article_id = ?";
    $query = $this->db->query($sql, array($id));
    $this->results = $query->result()[0];
    return $this->results;
  }

}

<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

$this->load->helper('url');

function create_article_link($article) {
  $result = '';

  $sluggedTitle = url_title($article->title, 'dash', true);

  $result = 'http://' . SITE_HOST . '/article/' . $article->article_id . '/' . $sluggedTitle;
  return $result;
}

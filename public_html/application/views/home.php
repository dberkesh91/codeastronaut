<?php

$this->load->view('partial/_search', $data);

foreach ($articles as $article)
{
  $data['article'] = $article;
  $this->load->view('partial/_excerpt', $data);
}

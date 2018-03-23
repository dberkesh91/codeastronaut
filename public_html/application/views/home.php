<?php
$this->load->view('partial/_search');
?>

<div class="excerpt-container">
<?php
foreach ($articles as $article)
{
  $data['article'] = $article;
  $this->load->view('partial/_excerpt', $data);
}
?>
</div>

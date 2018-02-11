<script type="text/javascript" src="assets/js/search.js"></script>

<?php
$this->load->view('partial/_search');
?>

<div id="search-result">

<?php
foreach ($articles as $article)
{
  $data['article'] = $article;
  $this->load->view('partial/_excerpt', $data);
}
?>
</div>

<?php
  /* Load helpers relevant to this page only */
  $this->load->helper('link');
  $this->load->helper('date');
  /* Load helpers relevant to this page only */
?>

<a href="<?= create_article_link($article) ?>" class="excerpt">
  <div class="excerpt">
    <h1><?= $article->title; ?></h1>
    <p><?= $article->description; ?></p>

    <?php
    /* Convert article `creation` date to `time ago` date */
    $article->created = strtolower(explode(",", timespan(strtotime($article->created)))[0]);
    /* Convert article `creation` date to `time ago` date */

    /* Note: should probably to this somewhere else (model or controller) */
    ?>

    <span><?= $article->created . ' ago'; ?></span>
  </div>
</a>

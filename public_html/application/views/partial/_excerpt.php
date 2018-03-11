<?php
  /* Load helpers relevant to this page only */
  $this->load->helper('link');
  $this->load->helper('date');
  /* Load helpers relevant to this page only */
?>

<a href="<?= create_article_link($article) ?>" class="excerpt">
  <div class="excerpt">
    <h1><?= $article->title; ?></h1>
    <?php
    foreach ($article->tags as $tag){

      ?><span class="tag"><?= $tag ?></span><?php

    }
    ?>
    <p><?= $article->description; ?></p>

    <?php
    /* Convert article `creation` date to `time ago` date */
    $article->created = strtolower(explode(",", timespan(strtotime($article->created)))[0]);
    /* Convert article `creation` date to `time ago` date */

    /* Note: should probably to this somewhere else (model or controller) */
    ?>

    <span class="launched">
      <span class="rocket"><img src="assets/images/icons/launched.svg" style="width:25px;height:25px"/></span>
      <span class="created"><?= 'launched ' . $article->created . ' ago'; ?></span>
    </span>
    <span class="author">
      <img src="assets/images/icons/astronaut.svg" style="width:25px;height:25px"/>
      <span class="astronaut"><?= $article->firstname . ' ' . $article->lastname; ?></span>
    </span>
  </div>
</a>

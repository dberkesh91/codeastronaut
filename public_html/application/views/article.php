<?php foreach ($articles as $article) {?>
  <div class="article-container">
    <div class="article-title"><?= $article->title; ?></div>
    <span class="article-author"><?= $article->firstname . ' ' . $article->lastname ?></span>
    <span>||</span>
    <span class="article-created"><?= $article->created; ?></span>
    <div class="article-description"><?= $article->description; ?></div>
    <div class="article-content"><?= htmlspecialchars_decode($article->content); ?></div>
  </div>
<?php }

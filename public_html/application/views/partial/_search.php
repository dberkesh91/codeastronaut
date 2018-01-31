<!-- SEARCH -->
<?php if (!isset($prev_searched)) { $prev_searched = array(); } ?>
<div id="search">
  <?= form_open($searchFormAttrs['action'], $searchFormAttrs['form']); ?>
    <?= form_dropdown('searchedTags[]', $tags, $prev_searched, $searchFormAttrs['select']); ?>
    <?= form_submit($searchFormAttrs['submit']); ?>
  <?= form_close(); ?>
</div>
<!-- SEARCH -->

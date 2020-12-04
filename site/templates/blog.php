<?php $article = $page->children()->visible()->flip()->first(); ?>
<?= go($article->url()) ?>
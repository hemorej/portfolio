<?php snippet('header', array('error' => true)) ?>

<div class="cf mt6 gold mw8 center ff-meta-serif">
  <div class="fl w-100 w-60-ns tr-ns f3-ns f4">
    <p class="bg-black-60 pa2"><?= $page->text() ?></p>
  </div>
  <nav class="fl w-40-ns w-100 ">
    <ul class="list f4 pl0 pl3-ns mt5-ns mt3">
      <?php foreach($pages->listed() as $p): ?>
        <li class="pb2"><a class="link gold hover-silver bg-black-60 pa2" href="<?= $p->url() ?>"><?= '/'.$p->title()->lower() ?></a></li>
      <?php endforeach ?>
    </ul>
  </nav>
</div>
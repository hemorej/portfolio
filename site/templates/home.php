<?php snippet('header') ?>

<section>
  <div class="cf mt6 mw8 center">
    <div class="fl w-100 w-60-ns">
      <article class="tr-ns lh-copy f17rem-ns mid-gray">
        <?= $site->intro() ?>
      </article>
    </div>
    <nav class="fl w-100 w-40-ns">
      <ul class="list f4-ns f5 pl0 pl3-ns mt5-ns mt3">
        <li class="pb2"><a class="link silver hover-gold hover-strike" href="http://github.com/hemorej/" target=_blank>github</a></li>
        <li class="pb2"><a class="link silver hover-gold hover-strike" href="/projects" target=_blank>projects</a></li>
        <li class="pb2"><a class="link silver hover-gold hover-strike" href="mailto:hello@jerome-arfouche.com" target=_blank>hello (a) jerome-arfouche</a></li>
      </ul>
    </nav>
  </div>
</section>

<?php snippet('footer', array('noCopyright' => true)) ?>
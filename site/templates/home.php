<?php snippet('header') ?>

<section>
  <div class="cf mt6 mw8 center">
    <div class="fl w-100 w-60-ns">
      <article class="tr-ns lh-copy f17rem-ns mid-gray">
        <?= $site->intro() ?>
      </article>
    </div>
    <nav class="fl w-100 w-40-ns">
      <ul class="list f4 pl0 pl3-ns mt5-ns mt3">
        <li class="pb2"><a class="link silver hover-gold hover-strike umami--click--instagram" href="http://instagram.com/jerome_a_" target=_blank>instagram/jerome_a_</a></li>
        <li class="pb2"><a class="link silver hover-gold hover-strike umami--click--codepen" href="http://codepen.io/jerome_a_/" target=_blank>codepen/jerome_a_</a></li>
        <li class="pb2"><a class="link silver hover-gold hover-strike umami--click--github" href="http://github.com/hemorej/" target=_blank>github/hemorej</a></li>
        <li class="pb2"><a class="link silver hover-gold hover-strike umami--click--email" href="mailto:hello@jerome-arfouche.com" target=_blank>hello (a) jerome-arfouche</a></li>
      </ul>
    </nav>
  </div>
</section>

<?php snippet('footer', array('noCopyright' => true)) ?>
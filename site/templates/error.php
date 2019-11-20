<?php snippet('header', array('error' => true)) ?>

<div class="row medium-space-top">
    <div class="small-12 medium-8 medium-text-right columns">
            <?php echo kirbytext($page->text()) ; ?>

        </div>
          <div class="medium-4 small-12 columns">
          <ul class="no-bullet side">
            <?php foreach($pages->listed() AS $p): ?>
            <li><a href="<?php echo $p->url() ?>"><?php echo '/'.$p->title()->lower() ?></a></li>
            <?php endforeach ?>
          </ul>
        </div>
    </div>  
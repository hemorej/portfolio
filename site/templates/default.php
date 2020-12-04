<?php snippet('header') ?>

<?php 
    if( $page->title() != $page->uid()){
        $headline = "_".$page->title()->lower();
    }else if("" !== $page->published()->toString()){
        $headline = date('F d, Y', strtotime($page->published()->toString()));
    }
?>
<div class="cf mt6">
    <div class="fl w-100 w-60-ns tr-ns">
        <a class="f3 meta-cd link silver hover-gold" href="<?= $page->url() ?>"><?= $headline ?></a>
        <?= kirbytext($page->text()); ?>
    </div>
    
    <div class="fl w-100 w-40-ns">
        <ul class="list f4 pl0 pl3-ns mt5-ns mt3">
            <?php foreach($pages->listed() as $p): ?>
                <li class="pb2"><a class="link silver hover-gold" href="<?= $p->url() ?>"><?= '/'.$p->title()->lower() ?></a></li>
            <?php endforeach ?>
            <li class="pb2"><a class="link silver hover-gold" href="./">/home</a></li>
        </ul>
    </div>
</div>  

<?php snippet('footer') ?>
<?php snippet('header') ?>
<?php
    $items = $page->titles()->toStructure()->paginate(15);
?>
<div class="cf mt6">
    <div class="fl w-60">
        <article class="f17rem-ns mid-gray tr-ns">
        <?php foreach($items as $item): ?>
            <div class="meta-cd black-60 f2 mb2"><?= $item->text()->lower() ?></div>
        <?php endforeach ?>
        </article>
    </div>

    <nav class="fl w-40-ns w-100">
        <ul class="list f4 pl0 pl3-ns mt5-ns mt3">
            <?php foreach($pages->listed() as $p): ?>
                <li class="pb2"><a class="link silver hover-gold" href="<?= $p->url() ?>"><?= '/'.$p->title()->lower() ?></a></li>
            <?php endforeach ?>
            <li class="pb2"><a class="link silver hover-gold" href="./">/home</a></li>
        </ul>
    </nav>
</div>

<?php if($items->pagination()->hasPages()): ?>
	<nav class="cf">		
		<div class="fl w-100 w-60-ns">
			<div class="tr">
    			<?php if($items->pagination()->hasPrevPage()): ?>
    				<a class="link silver hover-gold" href="<?= $items->pagination()->prevPageURL() ?>">&laquo; newer </a>
    			<?php endif ?>

    			<?php if($items->pagination()->hasNextPage() && $items->pagination()->hasPrevPage()): ?>
    				| 
    			<?php endif ?>
    			
    			<?php if($items->pagination()->hasNextPage()): ?>
    				<a class="link silver hover-gold" href="<?= $items->pagination()->nextPageURL() ?>">older  &raquo;</a>
    			<?php endif ?>	
			</div>
		</div>
	</nav>
<?php endif ?>

<?php snippet('footer') ?>
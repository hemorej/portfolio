<?php snippet('header') ?>

<?php	
    $articles = $page->children()->listed()->flip()->paginate(10);
?>

<div class="cf mt6">
    <div class="fl w-60-ns w-100">
        <article class="tr-ns mid-gray">
		  <?php foreach($articles as $article): ?>
            <div class="i"><?= html($article->published()->lower()) ?></div>
            <div class="mb3">
                <?php if($page->links() == 'true'): ?>
				    <a class="link meta-cd mid-gray hover-gold hover-strike f2" href="<?= $article->link() ?>"><?= html($article->title()->lower()) ?></a>
				<?php else: ?>
					<div class="i dn db-ns"><?= $article->new() ?></div>
					<a class="link meta-cd mid-gray hover-gold hover-strike f2" href="<?= $article->url() ?>"><?= html($article->title()->lower()) ?></a>
				<?php endif ?>
            </div>
			<?php endforeach ?>
        </article>
    </div>

    <div class="fl w-40-ns w-100">
        <ul class="list f4 pl0 pl3-ns mt5-ns mt3">
            <?php foreach($pages->listed() as $p): ?>
	           <li class="pb2"><a class="link silver hover-gold" href="<?= $p->url() ?>"><?= '/'.$p->title()->lower() ?></a></li>
            <?php endforeach ?>
                <li class="pb2"><a class="link silver hover-gold" href="./">/home</a></li>
        </ul>
    </div>
</div>

<?php if($articles->pagination()->hasPages()): ?>
	<div class="cf">
		<div class="fl w-60-ns w-100">
			<div class="tr">
			<?php if($articles->pagination()->hasPrevPage()): ?>
				<a class="link silver hover-gold" href="<?= $articles->pagination()->prevPageURL() ?>">&laquo; newer </a>
			<?php endif ?>

			<?php if($articles->pagination()->hasNextPage() && $articles->pagination()->hasPrevPage()): ?>
				| 
			<?php endif ?>
			
			<?php if($articles->pagination()->hasNextPage()): ?>
				<a class="link silver hover-gold" href="<?= $articles->pagination()->nextPageURL() ?>">older  &raquo;</a>
			<?php endif ?>
			</div>
		</div>
	</div>
<?php endif ?>

<?php snippet('footer') ?>
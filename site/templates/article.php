<?php snippet('header') ?>

<?php 

	if( $page->title() != $page->uid()){
		$headline = "_".$page->title()->lower();
	} else if("" !== $page->published()->toString()){
		$headline = date('F d, Y', strtotime($page->published()->toString()));
	}
?>

<div class="cf mt6">
	<div class="fl tj w-100 w-60-ns lh-copy">
		<a class="f2-ns f3 meta-cd link silver hover-gold hover-gold hover-strike" href="<?= $page->url() ?>"><?= $headline ?></a>
		<?= kirbytext($page->text()); ?>

		<?php if($page->parent()->title() != 'blog'):
			foreach($page->images() as $image): ?>
				<img srcset="<?= $image->srcset([300, 800, 1024]) ?>">
			<?php endforeach ?>
		<?php endif ?>

		<?php if($page->hasNextListed() || $page->hasPrevListed()): ?>
			<div class="cf mt6">
				<div class="fl w-100">
					<div class="tr">
					<?php if($page->hasNextListed()): ?>
						<a class="link silver hover-gold" href="<?= $page->next()->url()  ?>">&laquo; newer </a>
					<?php endif ?>

					<?php if($page->hasNextListed() && $page->hasPrevListed()): ?>
						| 
					<?php endif ?>
					
					<?php if($page->hasPrevListed()): ?>
						<a class="link silver hover-gold" href="<?= $page->prev()->url()  ?>">older  &raquo;</a>
					<?php endif ?>
					</div>
				</div>
			</div>
		<?php endif ?>
	</div>

	<div class="fl w-100 w-40-ns">
		<ul class="list f4 pl0 pl3-ns mt5-ns mt3">
				<?php foreach($pages->listed() as $p): ?>
				<li class="pb2"><a class="link silver hover-gold" href="<?= $p->url() ?>"><?= '/'.$p->title()->lower() ?></a></li>
				<?php endforeach ?>
				<li class="pb2"><a class="link silver hover-gold" href="../">/home</a></li>
			</ul>
		</div>

	</div>	
</div>
<?php snippet('footer') ?>
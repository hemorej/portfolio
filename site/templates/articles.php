<?php snippet('header') ?>

<?php	
	  $articles = $page->children()
	                    ->visible()
	                    ->flip()
	                    ->paginate(10);
?>

    <div class="row medium-space-top">
      <div class="medium-8 columns">
          <article class="intro medium-text-right">
			<?php foreach($articles as $article): ?>
				<h3><small><?php echo html($article->published()->lower()) ?></small></h3>
				<?php if($page->links() == 'true'): ?>
					<h3><a class="high-contrast" href="<?php echo $article->link() ?>"><?php echo html($article->title()->lower()) ?></a></h3>
				<?php else: ?>
					<h3>
						<span><small class="show-for-medium-up"><?php echo $article->new() ?> </small></span>
						<a class="high-contrast" href="<?php echo $article->url() ?>"><?php echo html($article->title()->lower()) ?></a>
						<span><small class="show-for-small-only"><?php echo $article->new() ?></small></span>
					</h3>
				<?php endif ?>
			<?php endforeach ?>

          </article>
    </div>

    <div class="medium-4 small-12 columns">
      <ul class="no-bullet side">
  	    <?php foreach($pages->visible() AS $p): ?>
	    <li><a href="<?php echo $p->url() ?>"><?php echo '/'.$p->title()->lower() ?></a></li>
	    <?php endforeach ?>
	    <li><a href="./">/home</a></li>
      </ul>
    </div>
</div>

	<?php if($articles->pagination()->hasPages()): ?>
	<div class="row">		
		<div class="small-12 medium-8 columns">
			<span class="right">
			<?php if($articles->pagination()->hasPrevPage()): ?>
				<a href="<?= $articles->pagination()->prevPageURL() ?>">&laquo; newer </a>
			<?php endif ?>

			<?php if($articles->pagination()->hasNextPage() && $articles->pagination()->hasPrevPage()): ?>
				| 
			<?php endif ?>
			
			<?php if($articles->pagination()->hasNextPage()): ?>
				<a href="<?= $articles->pagination()->nextPageURL() ?>">older  &raquo;</a>
			<?php endif ?>	
			</span>
		</div>
	</div>
	<?php endif ?>

<?php snippet('footer') ?>
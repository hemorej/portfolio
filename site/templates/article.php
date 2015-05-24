<?php snippet('header') ?>

<div class="row medium-space-top">
	<?php 
	if( $page->title() != $page->uid()){
		$headline = "_".$page->title()->lower();
	}
	else if("" !== $page->published()->toString()){
		$headline = date('F d, Y', strtotime($page->published()->toString()));
	}
	?>

</div>
<div class="row">

	<div class="small-12 medium-8 columns text-justify">	
		<h3><a href="<?php echo $page->url() ?>"><?php echo $headline ?></a></h3>
		<?php 
		echo kirbytext($page->text()) ;
		foreach($page->images() as $image): 
			snippet('interchange', array('image' => $image, 'alt' => $image->alt(), 'caption' => $image->caption()));
		endforeach ?>

		<p class="medium-space-top"></p>
		<span class="right">				
			<?php if($page->hasNextVisible()): ?>
				<a href="<?php echo $page->next()->url() ?>">&laquo; newer </a>
			<?php endif ?>

			<?php if($page->hasNextVisible() && $page->hasPrevVisible()): ?>
				| 
			<?php endif ?>

			<?php if($page->hasPrevVisible()): ?>
				<a href="<?php echo $page->prev()->url() ?>">older &raquo;</a>
			<?php endif ?>
		</span>

		</div>
		<div class="medium-4 small-12 columns">
			<ul class="no-bullet side">
				<?php foreach($pages->visible() AS $p): ?>
				<li><a href="<?php echo $p->url() ?>"><?php echo '/'.$p->title()->lower() ?></a></li>
				<?php endforeach ?>
				<li><a href="../">/home</a></li>
			</ul>
		</div>

	</div>	
</div>
<?php snippet('footer') ?>
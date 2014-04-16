<article class="col-sm-4">
	<h2><a href="" data-toggle="modal" data-target="#aa-news-modal-<?php echo $post->ID; ?>"><?php the_title(); ?></a></h2>
	<?php the_date('d/m/Y // H.i\h', '<span class="date">', '</span>'); ?>
	<?php the_excerpt(); ?>
</article>
<div id="aa-news-modal-<?php echo $post->ID; ?>" class="modal fade aa-news-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php the_title(); ?></h4>
			</div>
				<div class="modal-body text-justify">
					<?php the_content(); ?>
				</div>
		</div>
	</div>
</div>
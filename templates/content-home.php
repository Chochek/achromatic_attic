			<div id="news" class="row news-section section">

				<h1 class="section-title">NEWS</h1>

				<?php
					$args = array('posts_per_page' => 3, 'category' => 'news', 'orderby' => 'post_date', 'order' => 'DESC');
					query_posts($args);
				?>
				<div class="hidden num-of-posts">
					<?php echo $wp_query->found_posts ?>
				</div>
				<?php wp_reset_query(); ?>

				<div class="aa-news-list" data-path="<?php echo get_template_directory_uri(); ?>/ajax-load-more" data-post-type="post" data-category="news" data-taxonomy="" data-tag="" data-display-posts="3" data-scroll="false" data-button-text="...load more...">
					<!-- Load Ajax Posts Here -->
				</div>

			</div>

		</div>
	</div>
</div>

<div id="biography" class="biography-bg">
	<img class="biography-image visible-xs img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/img/band-image.png" />
	<div class="biography-text">
		<div class="wrap container">
			<div class="content row">
				<div class="main col-sm-12" role="main">
					<div class="row biography-section section">

						<article class="col-xs-12">
							<h1 class="section-title"><span>ACHROMATIC</span> <span><span class="flip-vertical">A</span><span>TTIC</span></span></h1>

							<?php
								$page = get_page_by_title( 'biography' );
								$biography = apply_filters('the_content', $page->post_content);
								echo $biography;
							?>
						</article>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="wrap container">
	<div class="content row">
		<div class="main col-sm-12" role="main">

			<div id="tour" class="row tour-section section">

				<h1 class="section-title">TOUR DATES</h1>
				<div class="concerts-wrapper">

					<?php
						$args = array('post_type' => 'concert', 'posts_per_page' => -1, 'meta_key' => 'date', 'orderby' => 'meta_value_num', 'order' => 'ASC');
						$concerts = get_posts( $args );
					?>

					<?php foreach ( $concerts as $post ) : setup_postdata( $post ); ?>
					<?php
						$doorsOpenAt = get_post_meta( $post->ID, 'doors_open_at', true );
						if ($doorsOpenAt) $doorsOpenAt = '// ' . $doorsOpenAt;

						$date = get_post_meta( $post->ID, 'date', true );
						$dateToday = date("m/d/Y");
						$arrDateToday = explode('/', $dateToday);
						$arrDate = explode('/', $date);
						$upcoming = (($arrDate[2] > $arrDateToday[2]) || (($arrDate[0] > $arrDateToday[0]) && ($arrDate[2] >= $arrDateToday[2])) || (($arrDate[1] > $arrDateToday[1]) && ($arrDate[0] >= $arrDateToday[0]) && ($arrDate[2] >= $arrDateToday[2]))) ? true : false;
						$counter = 0;
					?>

						<?php if ($upcoming): $counter++; ?>

						<article class="col-xs-12 col-sm-4 concert">
							<?php
								$venue = get_post_meta( $post->ID, 'venue', true );
								$location = get_post_meta( $post->ID, 'location', true );
								$website = get_post_meta( $post->ID, 'venue_website', true );
							?>
							<h3><?php echo $venue . ' // ' . $location ?></h3>
							<span class="date"><?php echo $arrDate[1] . '/' . $arrDate[0] . '/' . $arrDate[2] . ' ' . $doorsOpenAt . 'h';?></span>
							<a class="venue-website" href="<?php echo 'http://' . $website ?>" target="_blank"><?php echo $website ?></a>
						</article>

						<?php endif; ?>

					<?php endforeach; wp_reset_postdata(); ?>
				</div>

				<?php if ($counter == 0): ?>
					<div class="text-center col-xs-12">
						<h2>There are no upcoming concerts</h2>
						<h3>Contact us if you want to book one</h3>
					</div>
				<?php endif; ?>

			</div>

		</div>
	</div>
</div>

<div id="music" class="music-bg">

	<?php
		$args = array('post_type' => 'album', 'posts_per_page' => -1, 'orderby' => 'post_date', 'order' => 'DESC');
		$albums = get_posts( $args );
	?>

	<?php foreach ( $albums as $post ) : setup_postdata( $post ); ?>

	<div style="background-image: url(<?php echo get_field('featured_image') ?>);" class="album-cover">
		<div class="wrap container">
			<div class="content row">
				<div class="main col-sm-12" role="main">

					<div class="row music-section section">

						<article class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 album">
							<?php
								$frontCover = get_post_meta( $post->ID, 'front_cover', true );
								$featuredImage = get_post_meta( $post->ID, 'featured_image', true );
								$downloadLink = get_post_meta( $post->ID, 'download_link', true );
							?>
							<h2 class="section-title"><?php the_title(); ?></h2>
							<p><?php the_content(); ?></p>

							<div class="download-block">
								<a href="<?php echo $downloadLink; ?>" target="_blank">
									<i class="icon-arrow-down-alt arrow-download"></i>
									<h3>DOWNLOAD</h3>
								</a>
							</div>
						</article>

					</div>

				</div>
			</div>
		</div>
	</div>

	<?php endforeach; wp_reset_postdata(); ?>

</div>

<div id="contact" class="contact-bg">
	<div class="wrap container">
		<div class="content row">
			<div class="main col-sm-12" role="main">

				<div class="row contact-section section">

					<h1 class="section-title">CONTACT</h1>
					<div class="col-sm-4">
						<?php
							$page = get_page_by_title( 'contact' );
							$contact = apply_filters('the_content', $page->post_content);
							echo $contact;
						?>
					</div>
					<div class="col-sm-8">
						<?php echo do_shortcode( '[contact-form-7 id="4" title="Contact form"]' ); ?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<?php get_header(); ?>

							<div class="archive-title">
							<h1 class="h2">
							<?php if (is_category()) { ?>
								<span><?php _e( 'Category', 'bonestheme' ); ?></span> <?php single_cat_title(); ?>
							<?php } elseif (is_tag()) { ?>
								<span><?php _e( 'Tag', 'bonestheme' ); ?></span> <?php single_tag_title(); ?>
							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<span><?php _e( 'Author', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>
							<?php } elseif (is_day()) { ?>
								<span><?php _e( 'Day', 'bonestheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
							<?php } elseif (is_month()) { ?>
								<span><?php _e( 'Month', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
							<?php } elseif (is_year()) { ?>
								<span><?php _e( 'Year', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
							<?php } ?>
							</h1>
							</div>

							<?php bones_loop(); ?>

<?php get_footer(); ?>

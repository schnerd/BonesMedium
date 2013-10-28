<?php get_header(); ?>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

									<?php $post = get_post(); /*$excerpt = get_the_excerpt();*/ if ( $post->post_excerpt ) : ?>

									<h2 class="entry-subtitle"><?php echo $post->post_excerpt; ?></h2>

									<?php endif; ?>

								</header> <?php // end article header ?>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

								<footer class="article-footer">

									<p class="byline vcard"><?php bones_vcard(); ?></p>

								</footer> <?php // end article footer ?>

							</article> <?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<?php bones_no_results(); ?>

						<?php endif; ?>

<?php get_footer(); ?>

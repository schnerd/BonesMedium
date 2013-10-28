<?php get_header(); ?>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
									
									<p class="byline vcard"><?php bones_vcard(); ?></p>

								</header> <?php // end article header ?>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

							</article> <?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<?php bones_no_results(); ?>

						<?php endif; ?>

<?php get_footer(); ?>

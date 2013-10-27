				<div class="sidebar">

					<div class="blog-side">

						<p class="blog-author h1"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>

						<p class="blog-desc"><?php bloginfo('description'); ?></p>

						<nav role="navigation">
							<?php bones_main_nav(); ?>
						</nav>

						<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar1' ); ?>

						<?php endif; ?>

					</div>

				</div>
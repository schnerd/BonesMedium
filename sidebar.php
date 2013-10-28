				<div class="sidebar">

					<div class="blog-side clearfix">

						<p class="blog-img t02">
							<a href="<?php echo home_url(); ?>" rel="nofollow">
								<img src="<?php echo bones_blog_image(); ?>"/>
							</a>
						</p>

						<p class="blog-author h3"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>

						<p class="blog-desc"><?php bloginfo('description'); ?></p>

						<?php $main_nav = bones_main_nav(); ?>
						<?php if ( $main_nav ) : ?>
						<nav role="navigation">
							<?php echo $main_nav; ?>
						</nav>
						<?php endif; ?>

						<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar1' ); ?>

						<?php endif; ?>

					</div>

				</div>
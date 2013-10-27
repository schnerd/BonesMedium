			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">

					<?php $footer_links = bones_footer_links(); ?>
					<?php if ( $footer_links ) : ?>
					<nav role="navigation">
							<?php echo $footer_links; ?>
					</nav>
					<?php endif; ?>

				</div> <?php // end #inner-footer ?>

			</footer> <?php // end footer ?>

		</div> <?php // end #container ?>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <?php // end page. what a ride! ?>

<?php if( have_rows('icon_list') ): ?>

	<ul class="icon-list">

	<?php while( have_rows('icon_list') ): the_row();

		// vars
		$icon = get_sub_field('icon');
		$content = get_sub_field('content');
	?>

		<li>
			<img src="<?php echo get_template_directory_uri() . '/assets/' . $icon . '.png'; ?>"  />
    	    <?php echo $content; ?>
		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>
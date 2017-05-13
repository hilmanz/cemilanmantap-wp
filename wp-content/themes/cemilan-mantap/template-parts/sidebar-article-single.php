<?php
	$this_id = get_the_ID();
?>
<!-- related articles on sidebar position --> 
<div class="sidebar sidebar-right">
    <h3><span>Related Articles</span></h3>
	<?php
		$exclude = array( $this_id );
		$related_args = array(
			'post__not_in' => $exclude, 
			'post_type' => get_post_type(),
			'orderby' => 'rand',
			'posts_per_page' => 3,
		);
		$related_query = new WP_Query( $related_args );
		if( $related_query->have_posts() ):
			while ( $related_query->have_posts() ): $related_query->the_post();
				?>
				<div class="widget widget-posts">
                    <div class="post-media">
                        <?php echo get_the_post_thumbnail( '', 'full' );  ?>
                    </div>
                    <div class="post-content">
                    	<?php the_title( '<a href="' . esc_url( get_permalink() ) . '"><h3 class="post-title">', '</h3></a>' );?>
                       	<?php the_excerpt();?>
                        <a href="<?php echo esc_url( get_permalink() );?>" class="btn btn-sm btn-filled-orange right">Read more</a>
                    </div>
                </div>
				<?php
			endwhile;
			wp_reset_postdata();
		else:
			?>
			<div class="widget widget-posts">
				<h3 class="post-title">No Related Articles</h3>
			</div>
			<?php
		endif;
	?>
</div>
<!-- end of related articles --> 
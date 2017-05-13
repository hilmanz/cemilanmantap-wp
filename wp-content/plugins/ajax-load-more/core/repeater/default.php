<?php
$article_index = $alm_current;
$cm_class_post_inner = ( $article_index % 2 == 0 ) ? 'post-inner left clearfix' : 'post-inner right clearfix';
$cm_class_post_media = ( $article_index % 2 == 0 ) ? 'post-media right' : 'post-media left';

?>
<div class="post clearfix">
	<div class="<?php echo $cm_class_post_inner; ?> <?php echo $alm_current;?>">
		<div class="post-content">
		<?php 

	    	the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h3 class="post-title">', '</h3></a>' );
	    	the_excerpt();
			if( get_post_type() != 'video' ):
	    	?>
	
			<a href="<?php echo esc_url( get_permalink() );?>" class="btn btn-sm btn-filled-orange">Read more</a>
			<?php
			endif;
			?>
	    </div>
	</div>
	<div class="<?php echo $cm_class_post_media;?> ">
		<?php 
		if( get_post_type() == 'video' ):
		?>
			<div class="image-tile inner-title title-center text-center">
	            <?php echo get_the_post_thumbnail( '', 'full' );  ?>
	            <div class="title">
	                <div class="modal-container">
	                    <div class="play-button btn-play inline" data-video-id="<?php echo get_yt_id(get_field('video', get_the_ID() ));?>"></div>
	                    <div class="foundry_modal no-bg">
	                        <iframe data-provider="youtube" data-video-id="<?php echo get_yt_id(get_field('video', get_the_ID() ));?>" data-autoplay="1"></iframe>
	                    </div>
	                </div>
	            </div>
	        </div>
		<?php
		else:
			echo get_the_post_thumbnail( '', 'full' );
		endif;
	 ?>
	</div>
</div>
<?php
$article_index++;
?>
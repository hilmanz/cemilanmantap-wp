<?php
/**
 * Template part for displaying posts article single
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cemilanmantap
 */
?>

<div id="post-article-<?php the_ID(); ?>" class="post-single clearfix">
    <?php the_title( '<h2 class="post-title">', '</h2>' );?>
    <div class="post-content">
        <div class="post-media">
            <?php echo get_the_post_thumbnail( '', 'full' );  ?>
        </div>
		<?php the_content(); ?>
    </div>
</div>
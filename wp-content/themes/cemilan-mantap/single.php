<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cemilanmantap
 */

get_header(); ?>
	<section class="pt160">
        <div class="content-inner">
            <div class="blog-wrapper has-sidebar-right clearfix">
            	<?php
				while ( have_posts() ) : the_post();
					// get template part for single article
					get_template_part( 'template-parts/content', 'article-single' );

					get_template_part( 'template-parts/sidebar', 'article-single' );
					
					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) :
					// 	comments_template();
					// endif;
				endwhile; // End of the loop.
				?>
            </div>
        </div>
    </section>
<?php
// get_sidebar();
get_footer();
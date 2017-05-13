<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cemilanmantap
 */

get_header(); ?>
	<section class="page-title page-title-3 pt120">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="uppercase mb0">Archive</h2>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section>
		<div class="grid-row">
			<?php
			if ( have_posts() ) :
				?>
				<div class="content-inner clearfix">
					<div id="" class="posts-container-mini">
						<?php 
						/* Start the Loop */
						// while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'article' );
						// endwhile;
						?>
					</div><!-- end of posts-container-mini -->
				</div><!-- end of content-inner -->
				
				<!-- <div class="text-center mt48">
                    <a href="articles-single.html" class="btn btn-grey">Load more</a>
                </div> -->
				<?php
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; 
			?>
		</div><!-- end of grid-row -->
	</section>
<?php
// get_sidebar();
get_footer();

<?php
/**
 * The template for displaying single post type 'cemilan'
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cemilanmantap
 */

get_header(); ?>
	<section class="pt160">
       <div class="container">
       		<div class="row">
       			<?php
                $id_cemilan = '';
       			while(have_posts()) : the_post();
                    $id_cemilan = get_the_ID();
       				get_template_part( 'template-parts/content', 'cemilan-single');
       				get_template_part( 'template-parts/sidebar', 'cemilan-single'); 
       			endwhile;
                wp_reset_query();
       			?>	
       		</div>
       </div>
    </section>

	<section class="pb32 bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-6" id="pastimanis">
                    <!-- #PastiManis category of cemilan --> 
                    <div class="page-title ">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h3 class="pastimanis-header"><span>PastiManis</span></h3>
                            </div>
                        </div>
                    </div>
                    <?php
                        $exclude = array( $id_cemilan );
                        $args = array(
                            'post_type' => 'cemilan',
                            'meta_key' => 'category',
                            'meta_value' => '#PastiManis',
                            'posts_per_page' => '4',
                            'post__not_in' => $exclude,
                        );
                        query_posts( $args );
                        while( have_posts() ) : the_post();
                            ?>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <div class="food-thumbnail">
                                    <?php echo featured_image_cemilan( get_the_ID(), esc_attr(get_the_title()) ); ?>
                                    <div class="food-caption">
                                        <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
                                        <div class="food-location">
                                            <?php echo get_city_from_coords( get_field('map_location' ) ); ?>
                                        </div>
                                        <?php the_excerpt();?>
                                    </div>
                                    <div class="food-ratings">
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span>3/5</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_query();
                    ?>
                </div><!-- #pastimanis -->

                <div class="col-md-6" id="gurihmantap">
                    <!-- #GurihMantap category of cemilan -->
                    <div class="page-title ">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h3 class="gurihmantap-header"><span>GurihMantap</span></h3>
                            </div>
                        </div>
                    </div>
                    <?php
                        $exclude = array( $id_cemilan );
                        $args = array( 
                            'post_type' => 'cemilan',
                            'meta_key' => 'category', 
                            'meta_value' => '#GurihMantap',
                            'posts_per_page' => '4',
                            'post__not_in' => $exclude,
                        );
                        query_posts( $args );
                        while( have_posts() ) : the_post();
                            ?>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <div class="food-thumbnail">
                                    <?php echo featured_image_cemilan( get_the_ID(), esc_attr(get_the_title()) ); ?>
                                    <div class="food-caption">
                                        <?php the_title( '<h4><a href="' .esc_url( get_permalink() ). '" rel="bookmark">', '</a></h4>' ); ?>
                                        <div class="food-location">
                                            <?php echo get_city_from_coords( get_field('map_location' ) ); ?>
                                        </div>
                                        <?php the_excerpt();?>
                                    </div>
                                    <div class="food-ratings">
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span>3/5</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_query();
                    ?>
                </div><!-- end #gurihmantap -->
            </div><!-- row -->
        </div><!--end of container-->
    </section>
<?php
get_footer();
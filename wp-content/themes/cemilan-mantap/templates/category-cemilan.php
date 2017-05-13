<?php
    /**
     * Template Name: Category Cemilan
     *
     * @author      Willi <willi.ilmukomputer@gmail.com>
     * @package     cemilanmantap
     **/
    get_header();

    $category_cemilan = get_field('category');
    $tim              = ($category_cemilan == '#GurihMantap' ) ? 'TIM GADING' : 'TIM GISEL';
    $id_title         = ($category_cemilan == '#GurihMantap' ) ? 'gurihmantap' : 'pastimanis';
    $color_cat        = ($category_cemilan == '#GurihMantap' ) ? 'bg-red' : 'bg-orange';
    $alt_img          = ($category_cemilan == '#GurihMantap' ) ? 'Gading - Gurih Mantap' : 'Gisel - Pasti Manis';
    
    global $post;
    $featured_image   = ( $category_cemilan == '#GurihMantap' ) ? get_the_post_thumbnail( $post->ID, 'full', array('alt' => $alt_img ) ) : get_the_post_thumbnail( $post->ID, 'full', array('alt' => $alt_img, 'style' => 'height: auto'));

?>
    <section class="fullscreen image-bg">
        <div class="background-image-holder">
            <img alt="image" class="background-image" src="<?php echo get_template_directory_uri();?>/assets/img/ttg_header_bkg.jpg" />
        </div>
        <div class="align-bottom">
            <div class="image-square left">
                <div class="col-md-6 image">
                    <div class="background-image-holder">
                        <!-- <img alt="image" class="background-image" src="<?php //echo get_template_directory_uri();?>/assets/img/gisel_meja.png" /> -->
                        <?php echo $featured_image;?>
                    </div>
                </div>
                <div class="col-md-6 content">
                    <div class="row">
                        <div class="col-sm-6 col-sm-pull-3 col-xs-6 col-xs-offset-3">
                            <h3 class="text-center <?php echo esc_attr($color_cat);?> color-white"><?php echo $category_cemilan;?></h3>
                        </div>
                    </div>
                    <p class="color-body text-center-xs">
                        <!-- Pilihan <span class="bold color-body">#TemanMantap</span> yang lebih suka cemilan <span class="bold color-body">#PastiManis</span> untuk temani nikmatnya kopi ABC, serta mendukung dan menjadi <span class="bold color-body">TIM GISEL</span>. Submit #CemilanMantap mu sekaligus bantu dagangan mereka dengan hashtag wajib <span class="bold color-body">#CemilanMantap #PASTIMANIS</span> untuk memenangkan Roadshow.<br>Pilih Seleramu, Dukung Cemilanmu! -->
                        <?php echo $post->post_content; ?>
                    </p>
                    <a class="btn btn-grey mb32" href="<?php echo get_field('join_page_link', 'option'); ?>">PILIH</a>
                </div>
            </div>

        </div>
    </section>
    <section class="pb32 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="<?php echo esc_attr( $id_title );?>">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-5 col-xs-4 col-xs-offset-4 text-center">
                                <h3 class="<?php echo esc_attr( $color_cat );?> color-white"><?php echo substr( $category_cemilan, 1 ); ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php
                        $args = array(
                            'post_type' => 'cemilan',
                            'post_status' => 'publish',
                            'posts_per_page' => '8',
                            'meta_key' => 'category',
                            'meta_value' => $category_cemilan,
                        );
                        query_posts( $args );
                        while( have_posts() ): the_post();
                            ?>
                            <div class="col-sm-3 col-lg-3 col-md-3">
                                <div class="food-thumbnail">
                                    <?php echo featured_image_cemilan( get_the_ID(), esc_attr(get_the_title()) ); ?>
                                    <div class="food-caption">
                                        <?php the_title( '<h4><a href="'.esc_url( get_permalink() ) .'">', '</a></h4>');?>
                                        <div class="food-location">
                                            <?php echo get_city_from_coords(get_field('map_location')); ?>
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
                </div><!-- #gurihmantap OR #pastimanis -->

            </div><!-- row -->
        </div><!--end of container-->
    </section>

<?php
get_footer();
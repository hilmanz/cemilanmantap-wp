<!-- <h1>Halo</h1> -->
<div class="col-md-3 hidden-sm">
    <?php 
        $args = array(
            'post_type' => 'prod_recommendation',
            'meta_query'    => array(
                'relation'      => 'AND',
                array(
                    'key'       => 'category',
                    'value'     => get_field('category'),
                    'compare'   => '=',
                ),
                array(
                    'key'       => 'time',
                    'value'     => get_field('time'),
                    'compare'   => '=',
                ),
            )
        );
        query_posts($args);
        while(have_posts()): the_post();
        remove_filter ('the_content', 'wpautop');
    ?>
            <div class="widget">
                <div class="well">
                    <div class="text-center">
                        <?php echo get_the_post_thumbnail( '', 'full');  ?>
                    </div>
                    <p class="small bold">Recommended Coffee</p>
                    <?php the_title('<h3 class="color-orange">', '</h3>'); ?>
                    <p class="small"><?php the_content(); ?></p>
                </div>
            </div>
    <?php 
        endwhile; 
        wp_reset_query();
        
        // var_dump(get_field('map_location'));
        if(get_field('map_location')):
    ?>   
            <div class="widget">
                <div class="well">
                    <div class="map-location">
                        <span class="glyphicon glyphicon-map-marker"></span>
                        <span class="color-light-grey"><?php echo get_field('map_location')['address']; ?></span>
                    </div>
                    <iframe src="https://www.google.com/maps/embed/v1/place?q=<?php echo urlencode(get_field('map_location')['address']); ?>&key=AIzaSyCfDRm8SR3qOx2F94NH7vZZw65K_A81fNs" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
    <?php 
        endif;
        $args = array(
            'post_type' => 'banner',
            'post_status' => 'publish',
            'posts_per_page' => 1,
        );
        query_posts($args);
        while(have_posts()): the_post();
    ?>
            <div class="widget">
                <a href="<?php echo (get_field('banner_page_link') != "") ? get_field('banner_page_link') : get_field('banner_external_url'); ?>">
                    <img src="<?php echo get_field('banner_image'); ?>">
                </a>
            </div>
    <?php 
        endwhile; 
        wp_reset_query();
    ?>
</div>
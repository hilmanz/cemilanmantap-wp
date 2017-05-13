<section class="cover fullscreen image-slider parallax">
    <ul class="slides">
        <li class="image-bg">
            <div class="background-image-holder">
                <img alt="image" class="background-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/header-directory.jpg" />
            </div>
            <div class="container v-align-transform mt-xs-72">
                <div class="row">
                    <div class="cm-cemilan-message">
                    </div>
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
                        <form class="halves" method="get" action="">  
                            <!-- <div class="form-group form-icon-group"> -->
                                <!-- <i class="fa fa-map-marker"></i> -->
                                <!-- <i class="ti-angle-down"></i> -->
                                <!-- <select name="location" class="cm_nama_kota"> -->
                                    <?php //get_template_part('template-parts/content','location-dropdown'); ?>
                                <!-- </select> -->
                            <!-- </div> -->
                            <div class="form-group form-icon-group">
                                <input class="form-control" placeholder="Cari Cemilanmu" type="text" class="validate-required" name="cm_s" value="<?php echo get_query_var('s'); ?>">
                                <!-- <i class="fa fa-map-marker"></i> -->
                            </div>
                            <button type="submit" class="" id="cm-search-cemilan">Search</button>
                        </form>
                    </div>
                </div>
                <!--end of row-->
                <div class="v-align-children text-center mt56 mt-xs-0">
                    <div class="row text-center mt24">
                        <div class="col-md-6">
                            <label class="pilih-pastimanis">
                                <input type="radio" name="category_cemilan" id="category_pastimanis" value="#PastiManis">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/input-btn-pastimanis.png" alt="PastiManis">
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label class="pilih-gurihmantap">
                                <input type="radio" name="category_cemilan" id="category_gurihmantap" value="#GurihMantap">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/input-btn-gurihmantap.png" alt="GurihMantap">
                            </label>
                        </div>
                    </div>
                    <!-- <ul class="list-inline mb0">
                        <li>
                            <a class="btn btn-filled-orange" href="#">#PASTIMANIS</a>
                        </li>
                        <li>
                            <a class="btn btn-filled" href="#">#GURIHMANTAP</a>
                        </li>
                    </ul> -->
                </div>
            </div>
            <!--end of container-->
        </li>
    </ul>
</section>
<section class="pb32 bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
                            <h2 class="color-orange">WAKTU NYEMIL</h2>
                        </div>
                    </div>
                </div>
                <ul class="list-inline mb40 filters-time">
                    <li>
                        <label class="directory-waktu-nyemil">
                            <input type="radio" data-filter="*" checked name="time_cemilan" id="cemilan_waktu_all" value="All">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/dir-input-all.png" alt="Cemilan All">
                        </label>
                    </li>
                    <li>
                        <label class="directory-waktu-nyemil">
                            <input type="radio" data-filter=".filter-pagi" name="time_cemilan" id="cemilan_waktu_pagi" value="Pagi">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/dir-input-pagi.png" alt="Cemilan Pagi">
                        </label>
                    </li>
                    <li>
                        <label class="directory-waktu-nyemil">
                            <input type="radio" data-filter=".filter-siang" name="time_cemilan" id="cemilan_waktu_siang" value="Sore">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/dir-input-siang.png" alt="Cemilan Siang">
                        </label>
                    </li>
                    <li>
                        <label class="directory-waktu-nyemil">
                            <input type="radio" data-filter=".filter-sore" name="time_cemilan" id="cemilan_waktu_sore" value="Sore">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/dir-input-sore.png" alt="Cemilan Sore">
                        </label>
                    </li>
                    <li>
                        <label class="directory-waktu-nyemil">
                            <input type="radio" data-filter=".filter-malam" name="time_cemilan" id="cemilan_waktu_malam" value="Malam">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/dir-input-malam.png" alt="Cemilan Malam">
                        </label>
                    </li>
                </ul>

            </div>
        </div><!-- row -->
		
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 text-center">
                <form>
                    <div class="form-group form-icon-group">
                        <!-- <i class="fa fa-map-marker"></i> -->
                        <i class="ti-angle-down"></i>
                        <select style="border:1px solid #ccc;" class="filters-location">
                            <?php get_template_part('template-parts/content','location-dropdown-filter'); ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="grid-cemilan" >
        	<?php 
        	    $term = (isset($_GET['s'])) ? $_GET['s'] : ''; 
            	$args = array(
            		'post_type' => 'cemilan',
                    'post_status' => 'publish',
            		'posts_per_page' => '8'
            	);
            	query_posts($args);
            	while(have_posts()): the_post();
                    $locs = get_the_terms( get_the_ID(), 'location' );
                    // foreach ($locs as $loc) {
                        $loc_name = $locs[0]->name;    
                    // }
                    $category_cemilan = get_field('category');
                    $id_title         = ($category_cemilan == '#GurihMantap' ) ? 'gurihmantap' : 'pastimanis';
                ?>
                <div id="<?php echo $id_title;?>" class="col-xs-12 col-sm-3 col-lg-3 col-md-3 grid-cemilan-item filter-<?php echo strtolower(get_field('time'));?> filter-<?php echo strtolower($loc_name);?>">
                    <div class="food-thumbnail">
                        <?php echo featured_image_cemilan( get_the_ID(), esc_attr(get_the_title()) ); ?>
                        <div class="food-caption">
                            <?php the_title('<h4><a href="' . esc_url(get_permalink() ) . '" rel="bookmark">', '</a></h4>'); ?>
                            <div class="food-location">
                                <?php echo get_city_from_coords(get_field('map_location')); ?>
                            </div>
                            <?php the_excerpt(); ?>
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
            </div>
            <div id="cm-message-cemilan-noresult" class="col-md-8 col-md-offset-2 col-sm-12 text-center">
                <div class="alert alert-warning">No Result</div>
            </div>
        </div><!-- row -->
    </div><!--end of container-->
</section>
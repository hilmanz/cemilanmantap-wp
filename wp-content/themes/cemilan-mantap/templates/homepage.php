<?php
/**
 * Template Name: Homepage
 *
 * @author 		Sandi Andrian <sandi@kodrindonesia.com>
 * @package		cemilanmantap
 **/

get_header(); ?>

	<section class="fullscreen image-bg">
		<div class="background-image-holder">
		    <img alt="image" class="background-image" src="<?php echo get_template_directory_uri();?>/assets/img/background/bkg-geometric.png" />
		</div>
		<!-- DESKTOP ONLY -->
        <div class="hidden-md hidden-sm hidden-xs">
            <div class="align-bottom">
                <div class="row">
                    <div class="col-lg-3 col-lg-push-1 text-right mt120">
                        <a href="<?php echo get_field('join_page_link','option'); ?>" title="Pilih Seleramu">
                        	<img src="<?php echo get_template_directory_uri();?>/assets/img/pilih-seleramu.png" class="hvr-wobble-horizontal" alt="Pilih Seleramu">
                        </a>
                    </div>
					<div class="col-lg-5 ">
	                    <div class="v-align-children">
	                        <div class="versus">
	                            <img src="<?php echo get_template_directory_uri();?>/assets/img/versus.png">
	                        </div>
	                        <div class="gisel-animate">
	                            <a href="<?php echo get_field('pasti_manis_page_link','option'); ?>">
	                            	<img src="<?php echo get_template_directory_uri();?>/assets/img/gisel-cerai.png" class="hvr-grow" alt="Gisel - Cemilan Mantap">
	                            </a>
	                        </div>
	                        <div class="gading-animate">
	                            <a href="<?php echo get_field('gurih_mantap_page_link','option'); ?>">
	                            	<img src="<?php echo get_template_directory_uri();?>/assets/img/gading-cerai.png" class="hvr-grow" alt="Gading - Cemilan Mantap">
	                            </a>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-lg-3 col-md-4">
	                	<h6 class="uppercase lead mt80">
                            Welcome #TemanMantap, inilah layanan direktori
                            berbagai #CemilanMantap yang dapat dinikmati bareng kopi.
                            Kamu juga bisa tentukan lebih suka #PASTIMANIS
                            atau #GURIHMANTAP, dan segera dukung salah satunya!
                        </h6>
	                </div>
                    <div class="pick-mantap">
                        <div class="pick-pastimanis mb96">
                            <a href="<?php echo get_field('pasti_manis_page_link','option'); ?>">
                            	<img src="<?php echo get_template_directory_uri();?>/assets/img/btn-pastimanis.png" class="hvr-float" alt="Pasti Manis">
                            </a>
                        </div>
                        <div class="pick-gurihmantap">
                            <a href="<?php echo get_field('gurih_mantap_page_link','option'); ?>">
                            	<img src="<?php echo get_template_directory_uri();?>/assets/img/btn-gurihmantap.png" class="hvr-float" alt="Gurih Mantap">
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- END DESKTOP -->
	
		 <!-- MOBILE -->
        <div class="hidden-lg visible-sm visible-md visible-xs">
			<div class="row">
                <div class="col-md-3 col-md-offset-1 col-sm-6 col-sm-offset-4 col-xs-8 col-xs-offset-2 mt64 mt-xs-96">
                    <a href="<?php echo get_field('join_page_link','option'); ?>" title="Pilih Seleramu">
                    	<img src="<?php echo get_template_directory_uri();?>/assets/img/pilih-seleramu.png" class="hvr-wobble-horizontal" alt="Pilih Seleramu">
                    </a>
                </div>
            </div>
            <div class="align-bottom">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/gisel-vs-gading_map_02.png" id="gisel_gading_map" usemap="#gisel_gading_map" alt="Gisel vs Gading">
                        
                        <map name="gisel_gading_map" id="gisel_gading_map">
	                        <area shape="rect" coords="1278,935,1280,937" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
	                        <area id="pastiManis" alt="Tim Gisel #PASTIMANIS" title="Tim Gisel" href="<?php echo get_field('pasti_manis_page_link','option'); ?>" shape="poly" coords="378,479,6,538,6,691,355,637,373,594,371,553,389,521" style="outline:none;" target="_self" />
	                        <area id="TimGisel" alt="Tim Gisel" title="Tim Gisel" href="<?php echo get_field('pasti_manis_page_link','option'); ?>" shape="poly" coords="297,935,476,935,483,843,527,799,547,764,555,744,559,715,561,691,564,662,558,641,544,640,542,589,536,577,539,519,626,512,618,420,610,378,614,358,619,323,629,307,645,277,660,250,668,211,662,181,655,163,645,149,633,142,624,139,609,122,593,116,575,116,547,119,515,135,502,156,485,172,479,197,472,210,465,242,471,251,476,258,458,317,408,341,352,383,373,324,398,278,446,238,467,198,416,187,370,244,319,349,288,419,288,456,312,465,374,443,389,513,355,632,354,703,366,724,365,764" style="outline:none;" target="_self"     />
	                        <area id="TimGading" alt="Tim gading" title="Tim Gading" href="<?php echo get_field('gurih_mantap_page_link','option'); ?>" shape="poly" coords="619,93,669,189,664,259,627,321,625,375,612,396,626,479,637,517,687,508,704,515,704,545,680,547,680,561,700,574,691,616,680,627,635,635,625,666,648,753,677,876,674,921,851,922,859,898,862,713,860,657,851,612,855,511,848,466,846,395,869,384,940,381,944,348,968,320,971,303,940,295,908,236,877,162,852,130,800,149,785,97,771,49,708,8,633,37" style="outline:none;" target="_self"     />
	                        <area id="GurihMantap" alt="Gurih Mantap" title="Gurih Mantap" href="<?php echo get_field('gurih_mantap_page_link','option'); ?>" shape="poly" coords="859,506,865,562,856,621,860,655,1278,588,1279,435" style="outline:none;" target="_self" />
                        </map>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MOBILE ONLY -->
	
		<div class="align-bottom text-center mb48 mb-xs-8">
            <div class="container">
              <div class="row">
                <div class="col-md-2 col-md-offset-2 col-xs-4">
                  <div class="chart easyPieChart" data-track-color="#FFBB2C" data-bar-color="#CC9933" data-line-width="20" data-percent="55" data-size="130">
                      <span><?php echo get_meter_cemilan('#PastiManis'); ?></span>
                      <span class="percent"></span>
                      <i class="fa fa-circle"></i>
                  </div>
                </div>
                <div class="join-now">
                  <div class="col-md-3 col-xs-4">
                  	<a class="btn btn-filled mt48 mt-xs-24 hvr-grow" href="<?php echo get_field('join_page_link','option'); ?>">JOIN NOW</a>
                  </div>
                </div>
                <div class="col-md-2 col-xs-4">
                  <div class="chart easyPieChart" data-track-color="#FFBB2C" data-bar-color="#CC9933" data-line-width="20" data-percent="45" data-size="130">
                      <span><?php echo get_meter_cemilan('#GurihMantap'); ?></span>
                      <span class="percent"></span>
                      <i class="fa fa-circle"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
	</section>
	<section class="pb32 bg-white">
		<div class="container">
		    <div class="row">
		        <div class="col-md-6" id="pastimanis">
		            <div class="page-title ">
		                <div class="row">
		                    <div class="col-sm-12 text-center">
		                        <h3 class="pastimanis-header"><span>PastiManis</span></h3>
		                    </div>
		                </div>
		            </div>
		            <?php 
		            	$args = array(
		            		'post_type' => 'cemilan',
		            		'meta_key' => 'category',
		            		'meta_value' => '#PastiManis',
		            		'posts_per_page' => '4'
		            	);
		            	query_posts($args);
		            	while(have_posts()): the_post();
		            ?>
		            <div class="col-sm-6 col-lg-6 col-md-6">
		                <div class="food-thumbnail">
		                    <?php echo featured_image_cemilan( get_the_ID() ); ?>
		                    <div class="food-caption">
		                    	<?php the_title('<h4><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>'); ?>
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
		        </div><!-- #pastimanis -->

		        <div class="col-md-6" id="gurihmantap">
		            <div class="page-title ">
		                <div class="row">
		                    <div class="col-sm-12 text-center">
		                        <h3 class="gurihmantap-header"><span>GurihMantap</span></h3>
		                    </div>
		                </div>
		            </div>
		            <?php 
		            	$args = array(
		            		'post_type' => 'cemilan',
		            		'meta_key' => 'category',
		            		'meta_value' => '#GurihMantap',
		            		'posts_per_page' => '4'
		            	);
		            	query_posts($args);
		            	while(have_posts()): the_post();
		            ?>
		            <div class="col-sm-6 col-lg-6 col-md-6">
		                <div class="food-thumbnail">
		                    <?php echo featured_image_cemilan( get_the_ID() ); ?>
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
		        </div><!-- end #gurihmantap -->
		    </div><!-- row -->
		</div><!--end of container-->
	</section>

	<section class="pt32 pb32 bg-secondary">
		<div class="container video-grid">
		    <div class="row">
		    	<?php 
		    		$i = 1;
		    		//query posts
		    		query_posts(array("post_type" => "video", "posts_per_page" => 5));
		    		while(have_posts()): the_post();
		    			if($i == 1):
		    	?>
				        <div class="col-sm-6 col-xs-12">
				            <div class="image-tile inner-title title-center text-center">
				                <?php echo get_the_post_thumbnail('', 'homepage-video-spotlight-thumb');  ?>
				                <div class="title">
				                    <div class="modal-container">
				                        <div class="play-button btn-modal inline"></div>
				                        <div class="foundry_modal no-bg">
				                            <iframe data-provider="youtube" data-video-id="<?php echo get_yt_id(get_field('video')); ?>" data-autoplay="1"></iframe>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
				<?php 
						else:
				?>
				        <div class="col-sm-3 col-xs-6">
				            <div class="image-tile inner-title title-center text-center">
				                <?php echo get_the_post_thumbnail('', 'homepage-video-small-thumb');  ?>
				                <div class="title">
				                    <div class="modal-container">
				                        <div class="play-button btn-modal inline"></div>
				                        <div class="foundry_modal no-bg">
				                            <iframe data-provider="youtube" data-video-id="<?php echo get_yt_id(get_field('video')); ?>" data-autoplay="1"></iframe>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
		        <?php 
		        		endif;
		        		$i++;
		        	endwhile;
		        	wp_reset_query();
		        ?>
		    </div>

		    <div class="row">
		        <div class="col-md-12 text-center mt48">
		            <a href="<?php echo get_field('watch_more_link'); ?>" class="btn btn-grey">Watch More</a>
		        </div>
		    </div>
		</div>
	</section>
	<?php 
    	$args = array(
    		'post_type' => 'cemilan',
    		'meta_key' => 'is_featured',
    		'meta_value' => '1',
    		'posts_per_page' => '2'
    	);
    	query_posts($args);
    	$i = 1;
    	while(have_posts()): the_post();
    	if($i == 1) :
    ?>
	<section class="p0 bg-secondary">
		<div class="container">
		    <div class="row mb0">
		        <div class="col-sm-8 cast-shadow p0" style="height: 553px; background-size: cover; background-position: center; background-image: url('<?php echo get_featured_image_from_gallery(get_the_ID()); ?>');">
		            <!-- <img class="img-responsive" alt="Ropisbak" src="<?php //echo get_featured_image_from_gallery(get_the_ID()); ?>" /> -->
		        </div>
		        <div class="col-sm-4 p0">
		            <div class="feature feature-text-right boxed bordered mt120 mb0 mt-xs-0 mb-xs-8">
		                <?php the_title('<h1 class="color-orange mb0 mb-xs-24"><a href="' . esc_url(get_permalink() ) . '" rel="bookmark">', '</a></h1>'); ?>
		                <div class="food-location">
		                    <?php echo get_city_from_coords(get_field('map_location')); ?>
		                </div>
		                <?php the_excerpt(); ?>
		                <!-- <p class="mb-xs-24">
		                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
		                </p> -->
		                <div class="left">
		                    <!-- <i class="fa fa-mail-forward fa-2x fa-pull-left fa-border" aria-hidden="true"></i> -->
		                    <a href="#" class="show-pop-sharer" data-animation="pop" data-placement="auto-top"><i class="fa fa-mail-forward fa-2x fa-pull-left fa-border" aria-hidden="true"></i></a>
							<div id="sharerContent" style="display:none;">
								<div id="shareIconsCount"></div>
							</div>
		                    <!-- <i class="fa fa-star-o fa-2x fa-pull-left fa-border" aria-hidden="true"></i> -->
		                </div>
		            </div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
	<?php 
		else:
	?>
	<section class="pb32 pt0 bg-secondary">
		<div class="container">
		    <div class="row">
		        <div class="col-sm-4 p0">
		            <div class="feature boxed bordered mb0 mb-xs-0">
		                <!-- <h1 class="color-red mb0"><a href="directory-detail.html">CAKWE</a></h1> -->
		                <?php the_title('<h1 class="color-red mb0"><a href="' . esc_url(get_permalink() ) . '" rel="bookmark">', '</a></h1>'); ?>
		                <div class="food-location">
		                    <?php echo get_city_from_coords(get_field('map_location')); ?>
		                </div>
		                <?php the_excerpt(); ?>
		                <!-- <p class="mb-xs-24 mt-xs-0">
		                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
		                </p> -->
		                <div class="left">
		                    <a href="#" class="show-pop-sharer" data-animation="pop" data-placement="auto-top"><i class="fa fa-mail-forward fa-2x fa-pull-left fa-border" aria-hidden="true"></i></a>
							<div id="sharerContent" style="display:none;">
								<div id="shareIconsCount"></div>
							</div>
		                    <!-- <i class="fa fa-star-o fa-2x fa-pull-left fa-border" aria-hidden="true"></i> -->
		                </div>
		            </div>
		        </div>
		        <div class="col-sm-8 cast-shadow p0" style="height: 553px; background-size: cover; background-position: center; background-image: url('<?php echo get_featured_image_from_gallery(get_the_ID()); ?>');">
		            <!-- <img class="img-responsive" alt="Cakwe" src="<?php echo get_template_directory_uri();?>/assets/img/big-cakwe.jpg" /> -->
		        </div>
		    </div>
		</div>
	</section>
	<?php
		endif;
		$i++; 
		endwhile; 
get_footer();
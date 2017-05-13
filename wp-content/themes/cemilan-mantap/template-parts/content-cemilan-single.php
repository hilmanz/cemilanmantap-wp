<?php
/**
 * Template part for displaying posts cemilan (directory) single
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cemilanmantap
 */

// If comments are open or we have at least one comment, load up the comment template.
// if ( comments_open() || get_comments_number() ) :
// 	comments_template();
// endif;

$thumb_img = get_post( get_post_thumbnail_id() ); // Get post by ID
$image_caption = $thumb_img->post_excerpt; // Display Caption

$gallery = get_field( 'gallery' );

?>

<div class="col-md-9 mb-xs-24">
	<div id="post-type-cemilan-<?php the_ID(); ?>" class="post-snippet mb64">
    
        <div class="directory-detail-image mb-xs-32">
            <div id="directory-slider" class="flexslider">
               
                <div class="directory-caption">
                    <div class="review-title">
                        <?php the_title( '<h4 class="color-red"><strong>', '</strong></h4>' ); ?>
                    </div>
                    <div class="review-rating">
                        <a href="#" class="show-pop-sharer" data-animation="pop" data-placement="auto-top"><i class="fa fa-mail-forward fa-pull-left fa-border" aria-hidden="true"></i></a>
                        <div id="sharerContent" style="display:none;">
                            <div id="shareIconsCount"></div>
                        </div>
                        <!-- <i class="fa fa-star-o fa-pull-left fa-border" aria-hidden="true"></i> -->
                    </div>
                    <div class="icon-box-waktu">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/ico-pilih-<?php echo strtolower(get_field('time'));?>.png" alt="">
                        <div class="icon-box-data">
                            <p class="color-white"><?php echo strtoupper(get_field('time'));?></p>
                        </div>            
                    </div>

                    <div class="rating-input">
                        <!-- <form><input id="directory-star-rating" value="4" type="text" class="rating" data-min=0 data-max=5 data-step=0.2 data-size="xs"></form> -->
                        <form><div id="directory-star-detail"></div></form>
                    </div>
                </div>
                <ul class="slides">
                    <?php 
                        foreach( $gallery as $items => $item ){
                            $img = $item['sizes'];
                            ?>
                            <li>
                                <img src="<?php echo $img['cemilan-single-big']; ?>" />
                            </li>
                            <?php
                        }
                    ?>
                </ul>

            </div>
            <div id="directory-carousel" class="flexslider">
                <ul class="slides">
                    <?php
                        foreach ($gallery as $items => $item ) {
                            $img = $item['sizes'];
                            ?> 
                            <li>
                                <img src="<?php echo $img['cemilan-single-small'];?>" />
                            </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
            <!-- end of image slider -->
        </div>
        <div class="inner">
            <?php the_content();?>
        </div>
    </div>
    <!--end of post snippet-->

    <!-- reviews -->
    <div class="comments" style="margin-bottom: 64px;">
        <h3 class="uppercase">REVIEWS</h3>
        <div class="row p8" style="background-color: #F2B800">
            <div class="col-md-4 col-xs-4 text-left pt16">
                <h4>RATING</h4>
            </div>
            <div class="col-md-8 col-xs-8 text-right">
                <form>
                    <div id="directory-star-review"></div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt24">
                <form>
                    <textarea rows="5" placeholder="Add Your Review"></textarea>
                </form>
            </div>
        </div>
        <div class="photo-upload-container">
            <div class="row text-center center-block">
                <div class="cemilan-img-uploader">
                    <div class="col-md-3 col-xs-6 cm-uploader">
                        <div class="cm-uploader-preview">
                            <a href="#" class="cm-upload-del">
                                <img src="<?php echo get_template_directory_uri();?>/assets/vendor/orakuploader/images/delete.png" alt=""/>
                            </a>
                            <div class="cm-preview-wrapper">
                                <img src="" alt="" class="img-responsive preview">
                            </div>
                        </div>
                        <label for="cm-img-1">
                            <div class="cm-uploader-inner">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/ico-photo-upload.png" alt=""/>
                            </div>
                            <p>Add Photo</p>
                        </label>
                        <input type="file" name="images_cemilan[]" accept="image/*" class="files_data " id="cm-img-1">
                    </div>
                    <div class="col-md-3 col-xs-6 cm-uploader">
                        <div class="cm-uploader-preview">
                            <a href="#" class="cm-upload-del">
                                <img src="<?php echo get_template_directory_uri();?>/assets/vendor/orakuploader/images/delete.png" alt=""/>
                            </a>
                            <div class="cm-preview-wrapper">
                                <img src="" alt="" class="img-responsive preview">
                            </div>
                        </div>
                        <label for="cm-img-2">
                            <div class="cm-uploader-inner">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/ico-photo-upload.png" alt=""/>
                            </div>
                            <p>Add Photo</p>
                        </label>
                        <input type="file" name="images_cemilan[]" accept="image/*" class="files_data " id="cm-img-2">
                    </div>
                    <div class="col-md-3 col-xs-6 cm-uploader">
                        <div class="cm-uploader-preview">
                            <a href="#" class="cm-upload-del">
                                <img src="<?php echo get_template_directory_uri();?>/assets/vendor/orakuploader/images/delete.png" alt="">
                            </a>
                            <div class="cm-preview-wrapper">
                                <img src="" alt="" class="img-responsive preview">
                            </div>
                        </div>
                        <label for="cm-img-3">
                            <div class="cm-uploader-inner">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/ico-photo-upload.png" alt=""/>
                            </div>
                            <p>Add Photo</p>
                        </label>
                        <input type="file" name="images_cemilan[]" accept="image/*" class="files_data " id="cm-img-3">    
                    </div>
                    <div class="col-md-3 col-xs-6 cm-uploader">
                        <div class="cm-uploader-preview">
                            <a href="#" class="cm-upload-del">
                                <img src="<?php echo get_template_directory_uri();?>/assets/vendor/orakuploader/images/delete.png" alt=""/>
                            </a>
                            <div class="cm-preview-wrapper">
                                <img src="" alt="" class="img-responsive preview">
                            </div>
                        </div>
                        <label for="cm-img-4">
                            <div class="cm-uploader-inner">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/ico-photo-upload.png" alt=""/>
                            </div>
                            <p>Add Photo</p>
                        </label>
                        <input type="file" name="images_cemilan[]" accept="image/*" class="files_data " id="cm-img-4">    
                    </div>
                </div>
            </div>
        </div>
        
        <ul class="comments-list">
            <?php
            $id_cemilan = get_the_ID();
            $query_review = array(
                'post_type' => 'review',
                'post_status' => 'publish',
                // 'posts_per_page' => '10',
                'meta_key' => 'review_cemilan',
                'meta_value' => $id_cemilan,
            );
            $query_posts = new WP_Query( $query_review );
            if( $query_posts->have_posts() ):
                while( $query_posts->have_posts() ) : $query_posts->the_post();
                ?>
                <li>
                    <div class="comment">
                        <p>
                            <?php the_content();?>
                        </p>
                    </div>
                </li>
                <?php
                endwhile;
                wp_reset_query();
                wp_reset_postdata();
            else:
                ?>
                <li class="alert alert-info">
                    <div class="comment ">
                        Belum ada review untuk cemilan ini.
                    </div>
                </li>
            <?php
            endif;
            ?>
        </ul>
        <!-- <div class="mb24">
            <div id="photo_07" orakuploader="on"></div>
        </div> -->
    </div>
    <!--end of review -->

	
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
    <!--end of comments-->
</div>
<!-- end of nine col-->
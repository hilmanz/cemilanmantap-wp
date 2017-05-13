<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cemilanmantap
 */
?>
		<footer class="bg-dark">
	        <div class="row">
	            <div class="col-md-3 col-sm-6 text-left">
	                <div class="left bg-yellow p24">
	                    <ul class="list-inline social-list text-center-xs">
	                        <li>
	                            <a href="<?php echo get_field('social_media_facebook','option'); ?>" target="_blank">
	                                <i class="fa fa-facebook fa-2x"></i>
	                            </a>
	                        </li>
	                        <li>
	                            <a href="<?php echo get_field('social_media_instagram','option'); ?>" target="_blank">
	                                <i class="fa fa-instagram fa-2x"></i>
	                            </a>
	                        </li>
	                        <li>
	                            <a href="<?php echo get_field('social_media_twitter','option'); ?>" target="_blank">
	                                <i class="fa fa-twitter fa-2x"></i>
	                            </a>
	                        </li>
	                        <li>
	                            <a href="<?php echo get_field('social_media_youtube','option'); ?>" target="_blank">
	                                <i class="fa fa-youtube-play fa-2x"></i>
	                            </a>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	            <div class="col-md-4 col-md-offset-1 col-sm-6">
	                <div class="widget text-center">
	                    <span class="sub">
	                        <p class="mb0 p0">www.kopiabc.co.id</p>
	                        <p class="mt0 p0">&copy; 2017 Cemilan mantap, all rights reserved.</p>
	                    </span>
	                </div>
	                <!--end of widget-->
	            </div>
	            <div class="col-md-4 col-sm-12">
	                <div class="widget text-center">
	                    <img src="<?php echo get_template_directory_uri();?>/assets/img/logo-kopi-abc-bottom.png" alt="Kopi ABC">
	                </div>
	                <!--end of widget-->
	            </div>
	        </div>
	        <!--end of row-->
	        <a class="btn btn-sm fade-half back-to-top inner-link" href="#top">Top</a>
	    </footer>
	</div><!--  end of main container -->
<?php wp_footer(); ?>
</body>
</html>
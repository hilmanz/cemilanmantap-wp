<?php
/**
 * cemilanmantap functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cemilanmantap
 */

if ( ! function_exists( 'cemilanmantap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cemilanmantap_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cemilanmantap, use a find and replace
	 * to change 'cemilanmantap' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cemilanmantap', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'cemilanmantap' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cemilanmantap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'cemilanmantap_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cemilanmantap_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cemilanmantap_content_width', 640 );
}
add_action( 'after_setup_theme', 'cemilanmantap_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cemilanmantap_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cemilanmantap' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cemilanmantap' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cemilanmantap_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cemilanmantap_scripts() {
	wp_enqueue_style( 'cemilanmantap-style', get_stylesheet_uri() );

	wp_enqueue_script( 'cemilanmantap-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'cemilanmantap-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	cm_load_style();

	cm_load_script();

}
add_action( 'wp_enqueue_scripts', 'cemilanmantap_scripts' );

/**
 * cm_load_style();
 */
function cm_load_style(){
	/**
	 * load style for theme ( cemilan mantap )
	 */
	wp_enqueue_style( 'cm-bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.css' );
	wp_enqueue_style( 'cm-themify-icons', get_template_directory_uri() .'/assets/css/themify-icons.css' );
	wp_enqueue_style( 'cm-flexslider', get_template_directory_uri() .'/assets/css/flexslider.css' );
	wp_enqueue_style( 'cm-lightbox', get_template_directory_uri() .'/assets/css/lightbox.min.css' );
	wp_enqueue_style( 'cm-ytplayer', get_template_directory_uri() .'/assets/css/ytplayer.css' );
	wp_enqueue_style( 'cm-themes-style', get_template_directory_uri() .'/assets/css/theme.css' );
	wp_enqueue_style( 'cm-hover-style', get_template_directory_uri() . '/assets/css/hover.css' );
	wp_enqueue_style( 'cm-custom-style', get_template_directory_uri() .'/assets/css/custom.css' );
	wp_enqueue_style( 'cm-fonts-loader', get_template_directory_uri() .'/assets/css/cm-fonts.css' );
	wp_enqueue_style( 'cm-font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'cm-custom-style-wp', get_template_directory_uri() . '/assets/css/custom-wp.css' );

	// load star rating css
	wp_enqueue_style( 'cm-jrating-css', get_template_directory_uri() . '/assets/vendor/j-rating/j-rating.css' );
	wp_enqueue_style( 'cm-orakuploader-css', get_template_directory_uri() . '/assets/vendor/orakuploader/orakuploader.css' );

	// load css for autocomplete
	wp_enqueue_style( 'cm-autocomplete-css', get_template_directory_uri() . '/assets/vendor/pix-autocomplete/jquery.auto-complete.css' );

	// load custom alm css
	wp_enqueue_style( 'cm-alm-css', get_template_directory_uri() . '/assets/css/alm.css' );

	if( !is_singular('cemilan') ):
		wp_enqueue_style( 'cm-jquery-ui-custom-css', get_template_directory_uri() . '/assets/vendor/gmaps-autocomplete/styles/jquery-ui/jquery-ui-1.8.16.custom.css' );
	endif;

	wp_enqueue_style( 'cm-jquerywebui-style', get_template_directory_uri() .'/assets/css/jquery.webui-popover.min.css' );
	wp_enqueue_style( 'cm-jssocial-style', get_template_directory_uri() . '/assets/css/jssocials.css' );
	wp_enqueue_style( 'cm-jssocials-theme-flat', get_template_directory_uri() . '/assets/css/jssocials-theme-flat.css' );
}

/**
 * cm_load_script();
 */
function cm_load_script(){
	wp_enqueue_script( 'cm-jquery-orak-js', get_template_directory_uri() . '/assets/vendor/orakuploader/jquery.min.js', array(), '20151215', true );

	/**
	 * load script for theme ( cemilan mantap )
	 */
	wp_enqueue_script( 'cm-bootstrap-js' , get_template_directory_uri() .'/assets/js/bootstrap.min.js', array( 'jquery' ), '20151215', true );
	wp_enqueue_script( 'cm-flexslider-js' , get_template_directory_uri() .'/assets/js/flexslider.min.js', array(), '20151215', true );
	wp_enqueue_script( 'cm-lightbox-js', get_template_directory_uri() .'/assets/js/lightbox.min.js', array(), '20151215', true );
	wp_enqueue_script( 'cm-masonry-js', get_template_directory_uri() .'/assets/js/masonry.min.js', array(), '20151215', true );
	wp_enqueue_script( 'cm-isotope-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), '20151215', true );
	wp_enqueue_script( 'cm-imagesloaded-js', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array(), '20151215', true );
	wp_enqueue_script( 'cm-ytplayer-js', get_template_directory_uri() . '/assets/js/ytplayer.min.js', array(), '20151215', true );
	// wp_enqueue_script( 'cm-countdown-js', get_template_directory_uri() . '/assets/js/countdown.min.js' );
	wp_enqueue_script( 'cm-smoothscroll-js', get_template_directory_uri() . '/assets/js/smooth-scroll.min.js', array(), '20151215', true );
	wp_enqueue_script( 'cm-parallax-js', get_template_directory_uri() . '/assets/js/parallax.js', array(), '20151215', true );
	wp_enqueue_script( 'cm-rwdimage-js', get_template_directory_uri() . '/assets/js/jquery.rwdImageMaps.min.js', array(), '20151215', true );

	// handling no conflict beetwen bootstrap button & jquery ui
	wp_enqueue_script( 'cm-noconflict', get_template_directory_uri() . '/assets/js/cm-noconflict.js', array(), '20151215', true );

	// load star rating script
	wp_enqueue_script( 'cm-jrating-js', get_template_directory_uri() . '/assets/vendor/j-rating/j-rating.js', array(), '20151215', true );
	
	wp_enqueue_script( 'cm-autocomplete-js', get_template_directory_uri() . '/assets/vendor/pix-autocomplete/jquery.auto-complete.min.js', array(), '20151215', true );

	wp_enqueue_script( 'cm-scripts-js', get_template_directory_uri() . '/assets/js/scripts.js', array(), '20151215', true );
	wp_enqueue_script( 'cm-scripts-js-wp', get_template_directory_uri() . '/assets/js/scripts-wp.js', array(), '20151215', true );

	$array_url = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'themeDir' => get_template_directory_uri(),
		);
	wp_localize_script( 'cm-scripts-js-wp', 'cm_ajax', $array_url); 

	// wp_enqueue_script('google-maps', 'http://maps.google.com/maps/api/js?sensor=false', array(), '20151215', true );
	// wp_enqueue_script('gmaps', get_template_directory_uri() . '/assets/vendor/gmaps-autocomplete/js/gmaps.js', array(), '20151215', true );
	if( is_page_template('templates/pilih-seleramu.php')):
		wp_enqueue_script( 'gmaps-key', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCfDRm8SR3qOx2F94NH7vZZw65K_A81fNs&libraries=places&callback=initMap', array(), '20151215', true );
	endif;

	wp_enqueue_script( 'cm-jquerywebui-script' , get_template_directory_uri() . '/assets/js/jquery.webui-popover.min.js', array(), '20151215', true );
	wp_enqueue_script( 'cm-jssocial', get_template_directory_uri() . '/assets/js/jssocials.min.js', array(), '20151215', true );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Setup file.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Load Helpers file.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Load Cemilan Function.
 */
require get_template_directory() . '/inc/user.php';

/**
 * Load User Function.
 */
require get_template_directory() . '/inc/cemilan.php';

/** 
 * ACF Options Page
 **/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


/**
 * cm_cemilan_comment
 */
function cm_cemilan_comment( $comment, $args, $depth ){
	$_GLOBALS['comment'] = $comment;
	?>
		<li  id="li-comment-<?php comment_ID() ?>">
            <div <?php comment_class(); ?>>
            	<?php if ($comment->comment_approved == '0') : ?>
	                <p><?php _e('Your comment is awaiting moderation.') ?><br /></p>
	            <?php endif; ?>
              	<?php comment_text();?>
            </div>
        </li>
       
	<?php
}

/**
 * cm_remove_location_metabox
 * remove metabox of tax 'location' in post type 'cemilan'
 */
function cm_remove_location_metabox(){
	remove_meta_box( 'locationdiv', 'cemilan', 'side' );
	remove_meta_box( 'tagsdiv-location', 'cemilan', 'side' );
}
add_action('admin_menu', 'cm_remove_location_metabox' );


/**
 * cm_ajax_check_is_user_logged_in
 * desc: not use
 */
function cm_ajax_check_is_user_logged_in(){
	$response = array( 'is_logged_in' => 'yes' );
	echo json_encode( $response );
	die();
}
add_action( 'wp_ajax_is_user_logged_in', 'cm_ajax_check_is_user_logged_in' );
add_action( 'wp_ajax_nopriv_is_user_logged_in', 'cm_ajax_check_is_user_logged_in' );

/**
 * cm_get_title_cemilan
 */
function cm_get_title_cemilan(){
	global $wpdb;
	$name = $wpdb->esc_like( stripslashes( $_POST['nama_cemilan'] ) ).'%';
	$sql = "SELECT post_title, id
		from $wpdb->posts
		where post_title like %s
		AND post_type='cemilan' and post_status='publish'";
	$sql = $wpdb->prepare($sql, '%'.$name.'%');
	$results = $wpdb->get_results( $sql );

	$titles = array();
	foreach( $results as $r ){
		$titles[] = array( $r->id, addslashes($r->post_title) );
	}

	// $titles = array();
	// $args = array(
	// 	'post_type' => 'cemilan',
	// 	'post_status' => 'publish',
	// 	's' => $_POST['nama_cemilan'],
	// 	'posts_per_page' => -1,
	// 	'orderby' => 'title',
	// 	'order' => 'ASC'
	// );
	// $query_cemilan = new WP_Query( $args );
	// while( $query_cemilan->have_posts() ): $query_cemilan->the_post();
	// 	$titles[] = addslashes( get_the_title() );
	// endwhile;
	// wp_reset_query();
	// wp_reset_postdata();
	echo json_encode( $titles );
	die();
}
add_action( 'wp_ajax_cm_get_title_cemilan', 'cm_get_title_cemilan' );
add_action( 'wp_ajax_nopriv_cm_get_title_cemilan', 'cm_get_title_cemilan' );

/**
 * 	cm_login_member
 */
function cm_login_member() {
	$nonce = $_POST['login_security'];
	$user_login = $_POST['cm_email'];
	$user_pass = $_POST['cm_password'];
	// check_ajax_referer( 'ajax-login-nonce', 'login-security' );
	if( !wp_verify_nonce( $nonce, 'ajax-login-nonce' ) ){
		echo json_encode( array( 'error' => true, 'message' => '<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-warning">Session token has expired, please reload the page and try again</div></div></div>') );
	}elseif( empty( $user_login ) || empty( $user_pass ) ){ // check if input variables are empty
		echo json_encode( array( 'error' => true, 'message' => '<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-warning">Please fill all form fields</div></div></div>' ) );
	}else{ 
		$user = wp_signon( array('user_login' => $user_login, 'user_password' => $user_pass ), false );
		if( is_wp_error( $user ) ){
			echo json_encode( array( 'error' => true, 'message' => '<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-warning">'.$user->get_error_message().'</div></div></div>' ) );
		}else{
			wp_set_current_user($user->ID, $user_login);
			wp_set_auth_cookie($user->ID);
			do_action('set_current_user');
			echo json_encode( array( 'error' => false, 'message' => '<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-info">Login successful, reloading page...</div></div></div>') );
		}
	}
	die();
}
add_action( 'wp_ajax_nopriv_cm_login_member', 'cm_login_member' );

/**
 * cm_register_member
 */
function cm_register_member() {
	$nonce = $_POST['register_security'];
	$user_login = $_POST['cm_reg_username'];
	$user_phonenumber = $_POST['cm_reg_phonenumber'];
	$user_email = $_POST['cm_reg_email'];
	$user_pass = $_POST['cm_reg_password'];

	if( !wp_verify_nonce( $nonce, 'ajax-register-nonce' ) ){
		echo json_encode( array( 'error' => true, 'message' => '<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-warning">Session token has expired, please reload the page and try again</div></div></div>') );
		die();
	}elseif( empty( $user_login ) || empty( $user_phonenumber ) || empty( $user_email ) || empty( $user_pass ) ){
		echo json_encode( array( 'error' => true, 'message' => '<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-warning">Please fill all form fields</div></div></div>' ) );
	}else{
		// if( username_exists( $user_login ) == true ){
		// 	echo json_encode( array( 'error' => true, 'message' => '<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-warning">Username '.$user_login.' already exists</div></div></div>'));
		// 	die();
		// }
		if(email_exists( $user_email ) == true) {
			echo json_encode( array( 'error' => true, 'message' => '<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-warning">E-mail '.$user_email.' already exists</div></div></div>'));
			die();
		}
		$userdata = array(
			'first_name' => $user_login,
			'user_login' => $user_email,
			'user_pass' => $user_pass,
			'user_email' => $user_email,
			'role' => 'author',
			'show_admin_bar_front' => false,
		);
		$register = wp_insert_user( $userdata );
		if( is_wp_error( $register ) ){
			echo json_encode( array( 'error' => true, 'message' => '<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-warning">'.$register.'</div></div></div>'));
		}else{
			update_user_meta($register, 'phone_number', $user_phonenumber, '');
			// wp_mail( $user_email, 'Welcome! '.$user_login, 'Your password is: ' . $user_pass );
			
			// do autologin
			wp_set_current_user($register);
       		wp_set_auth_cookie($register);

			echo json_encode(array('error' => false, 'message' => '<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-info">Registration Complete</div></div></div>') );
		}
	}
	die();
}
add_action( 'wp_ajax_nopriv_cm_register_member', 'cm_register_member' );

/**
 * reArrayFiles
 * re-arrange array files uploaded
 */
if ( !function_exists( 'reArrayFiles' ) ) :
	function reArrayFiles(&$file_post) {
	    $file_ary = array();
	    $file_count = count($file_post['name']);
	    $file_keys = array_keys($file_post);
	    for ($i=0; $i<$file_count; $i++) {
	        foreach ($file_keys as $key) {
	            $file_ary[$i][$key] = $file_post[$key][$i];
	        }
	    }
	    return $file_ary;
	}
endif;

/**
 * upload_user_file
 * set upload user
 */
function upload_user_file( $file = array(), $title = false ){
	require_once ABSPATH . 'wp-admin/includes/admin.php';
	$file_return = wp_handle_upload( $file, array( 'test_form' => false ) );
	if( isset( $file_return['error']) || isset( $file_return['upload_error_handler'])){
		return false;
	}else{
		$file_name = $file_return['file'];
		$attachment = array(
			'post_mime_type' => $file_return['type'],
			'post_content' => '',
			'post_type' => 'attachment',
			'post_status' => 'inherit',
			'guid' => $file_return['url'],
		);
		if( $title ){
			$attachment['post_title'] = $title;
		}
		$attachment_id = wp_insert_attachment( $attachment, $file_name );
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		$attachment_data = wp_generate_attachment_metadata( $attachment_id, $file_name );
		wp_update_attachment_metadata( $attachment_id, $attachment_data );
		if( 0 < intval( $attachment_id ) ){
			return $attachment_id;
		}
	}
	return false;
}

/**
 * cm_insert_cemilan
 */
function cm_insert_cemilan(){
	$post_id_cemilan = $_POST['cm_id_cemilan'];
	$post_title_cemilan = $_POST['cm_nama_cemilan'];
	$post_nama_tempat = $_POST['cm_nama_tempat'];
	$post_alamat_cemilan = $_POST['cm_alamat_cemilan'];
	$post_alamat_lat = $_POST['cm_alamat_lat'];
	$post_alamat_long = $_POST['cm_alamat_long'];
	$post_tax_nama_kota = $_POST['cm_nama_kota'];
	$post_review_cemilan = $_POST['cm_review_cemilan'];
	$post_meta_category = $_POST['cm_category_cemilan'];
	$post_meta_time = $_POST['cm_time_cemilan'];

	$attachment_ids = array();
	$response = array();

	// if post id cemilan (not exist), insert new cemilan
	if( empty( $post_id_cemilan ) ):
		if( empty($post_title_cemilan) || empty( $post_nama_tempat ) || empty( $post_alamat_cemilan ) || $post_tax_nama_kota == 'Default' || empty( $post_review_cemilan ) || empty( $post_meta_category ) || empty( $post_meta_time ) ){
			$response = array(
				'error' => true,
				'message' => '<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1"><div class="alert alert-info">Please fill all form fields...</div></div>'
			);
		}else{
			$files = reArrayFiles( $_FILES['cm_files'] );
			if( empty( $_FILES['cm_files'] ) ){
				$response = array(
					'error' => true,
					'message' => '<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1"><div class="alert alert-info">Please select image for upload...</div></div>'
				);
			}else if( $files[0]['size'] > 5242880 ){ // max size upload : 5mb
				$response = array(
					'error' => true,
					'message' => '<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1"><div class="alert alert-info">Image is too large...</div></div>'
				);
			}else{
				$i = 0;
				foreach( $files as $file ){
					if( is_array( $file ) ){
						$attachment_id = upload_user_file( $file, false );
						if( is_numeric( $attachment_id ) ){
							$img_thumb = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
							$data['status'] = true;
							$attachment_ids[] = $attachment_id; 
						}
					}
					$i++;
				}
				if( !$attachment_ids ){
					$response = array(
						'error' => true,
						'message' => '<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1"><div class="alert alert-info">An Error Occured. Your Images was not added.</div></div>'
					);
				}else{
					$post_array = array(
						'post_type' => 'cemilan',
						'post_status' => 'pending',
						'post_title' => wp_strip_all_tags( $post_title_cemilan ),
						'post_content' => $post_nama_tempat,
						'meta_input' => array(
							'category' => $post_meta_category,
							'time' => $post_meta_time,
							'map_location' => array('address'=>$post_alamat_cemilan, 'lat' => $post_alamat_lat, 'lng' => $post_alamat_long, 'zoom' => 14 ),
						),
						'tax_input' => array(
							'location' => $post_tax_nama_kota
						),
					);
					$pid = wp_insert_post( $post_array );
					wp_set_object_terms( $pid, $post_tax_nama_kota, 'location', true );

					update_field( 'gallery', $attachment_ids , $pid );
					if( $pid == 0 ){
						$response = array( 
							'error' => true, 
							'message' => '<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1"><div class="alert alert-warning">Error</div></div>'
						);
					}else{

						$review_args = array(
							'post_type' => 'review',
							'post_status' => 'pending',
							'post_title' => '',
							'post_content' => $post_review_cemilan,
							'meta_input' => array(
								'review_cemilan' => $pid
							),
						);

						$pid_review = wp_insert_post( $review_args );

						if( $pid_review == 0 ){
							$response = array( 
								'error' => true, 
								'message' => '<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1"><div class="alert alert-warning">Error</div></div>'
							);
						}else{
							$response = array(
								'error' => false,
								// 'message' => '<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1"><div class="alert alert-info">Pilihan seleramu telah didaftarkan</div></div>'
								'message' => '',
							);
						}
					}
				}	
			}
		}
	else:
		$review_args = array(
			'post_type' => 'review',
			'post_status' => 'pending',
			'post_title' => '',
			'post_content' => $post_review_cemilan,
			'meta_input' => array(
				'review_cemilan' => $post_id_cemilan
			),
		);

		$pid_review = wp_insert_post( $review_args );
		if( $pid_review == 0 ){
			$response = array( 
				'error' => true, 
				'message' => '<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1"><div class="alert alert-warning">Error When inserting review</div></div>'
			);
		}else{
			$response = array(
				'error' => false,
				// 'message' => '<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1"><div class="alert alert-info">Pilihan seleramu telah didaftarkan</div></div>'
				'message' => '',
			);
		}
	endif;
	echo json_encode($response);
	die();
}
add_action( 'wp_ajax_cm_insert_cemilan', 'cm_insert_cemilan' );

/**
 * cm_search_cemilan
 */
function cm_search_cemilan(){
	$post_search_keyword = $_POST['cm_search_keyword'];
	// $post_search_kota = $_POST['cm_search_kota'];
	$post_search_category = $_POST['cm_search_category'];

	$response_search = array();

	// if( $post_search_kota == '' ){
	// 	$response_search = array(
	// 		'error' => true,
	// 		'message' => '<div class="col-md-10 col-md-offset-1 col-sm-12 text-center"><div class="alert alert-info">Pilih kota untuk mencari cemilan...</div></div>',
	// 	);
	// }else 
	if( empty( $post_search_keyword ) ){
		$response_search = array(
			'error' => true,
			'message' => '<div class="col-md-10 col-md-offset-1 col-sm-12 text-center"><div class="alert alert-info">Masukkan kata kunci cemilan yang ingin dicari...</div></div>',
		);
	}else if( empty( $post_search_category ) ){
		$response_search = array(
			'error' => true,
			'message' => '<div class="col-md-10 col-md-offset-1 col-sm-12 text-center"><div class="alert alert-info">Pilih kategori cemilan yang ingin dicari...</div></div>',
		);
	}else{
		$args = array(
			'post_type' => 'cemilan',
			's' => $post_search_keyword,
			'post_status' => 'publish',
			'posts_per_page' => 8,
			'meta_value' => $post_search_category,
			// 'tax_query' => array(
			// 	array(
			// 		'taxonomy' => 'location',
			// 		'field' => 'slug',
			// 		// 'terms' => $post_search_kota
			// 	),
			// ),
			// 'meta_key' => 'category',
			// 'meta_query' => array(
			// 	array(
			// 		'key' => 'category',
			// 		'value' => $post_search_category,
			// 		'compare' => '=',
			// 	),
			// ),
		);
		$query_search = new WP_Query( $args );
		$cemilan = array();
		if( $query_search->have_posts() ):
			while ( $query_search->have_posts() ) : 
				$query_search->the_post();
				$post_item = array();
				$featured = get_field('gallery', get_the_ID() );
				$post_item['featured_image'] = $featured[0]['sizes']['cemilan-thumb'];
				$post_item['city'] = get_city_from_coords( get_field( 'map_location' ) );
				$locs = get_the_terms( get_the_ID(), 'location' );
                $post_item['city_location'] = strtolower($locs[0]->name);
                $category_cemilan = get_field('category');
                $post_item['id_title'] = ($category_cemilan == '#GurihMantap' ) ? 'gurihmantap' : 'pastimanis';
				$post_item['time_filter'] = strtolower( get_field( 'time' ) );
				$post_item['title'] = get_the_title();
				$post_item['permalink'] = esc_url(get_permalink());
				$post_item['excerpt'] = get_the_excerpt();
				array_push( $cemilan, $post_item );
			endwhile;
			wp_reset_postdata();
			$response_search = array(
				'error' => false,
				'message' => 'result found',
				'response_data' => $cemilan,
			);
		else:
			$response_search = array(
				'error' => false,
				'message' => 'no result',
				'response_data' => 'Maaf, cemilan yang anda cari tidak ada...',
			);
		endif;
	}
	echo json_encode( $response_search );
	die();
}
add_action( 'wp_ajax_cm_search_cemilan', 'cm_search_cemilan' );
add_action( 'wp_ajax_nopriv_cm_search_cemilan', 'cm_search_cemilan' );

/**
 * cm_add_curator_role
 */
// function cm_add_curator_role(){
// 	remove_role( 'curator' );
// 	$capabilities = array(
// 		'create_cemilan' => true,
// 		'publish_cemilan' => true, 
// 		'edit_cemilan' => true,
// 		'read_cemilan'=> true,
// 		'read' => true,
//         // 'read'              => true, // Allows a user to read
//         // 'create_posts'      => true, // Allows user to create new posts
//         // 'edit_posts'        => true, // Allows user to edit their own posts
//         // 'publish_posts'     => true, // Allows the user to publish posts
// 	);
// 	add_role( 'curator', 'Curator', $capabilities );
// }
// add_action( 'init', 'cm_add_curator_role' );

// function cm_author_menu_remove(){
// 	if( is_user_logged_in() && current_user_can( 'author' ) ){
// 		global $menu;
// 		$restricted = array( __('Dashboard'), __('Posts'), __('Media'),__('Comments'), __('Videos'), __('Recommendations'), __('Tools'), __('social media') );
// 		end ($menu);
//         while (prev($menu)){
//             $value = explode(' ',$menu[key($menu)][0]);
//             if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
//         }
// 	}
// }
// add_action( 'admin_menu', 'cm_author_menu_remove' );

// function cm_author_menu_rm_sm() {
// 	if( is_user_logged_in() && current_user_can( 'author' ) ){
// 		remove_menu_page( 'social-media' );	
// 	}
// }
// add_action( 'admin_init', 'cm_author_menu_rm_sm' );


// function cm_remove_admin_bar() {
// 	if (!current_user_can('administrator') && !is_admin()) {
// 	  	show_admin_bar(false);
// 	}
// }
// add_action( 'after_setup_theme', 'cm_remove_admin_bar');


// add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );
function wpse_136058_debug_admin_menu() {
    echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
}

//block from user admin
add_action('init', 'blockusers_init');
function blockusers_init() {
    if (is_user_logged_in() && is_admin() && ! current_user_can('administrator') && !(defined('DOING_AJAX') && DOING_AJAX)) {
        wp_redirect(home_url());
        exit;
    }
}
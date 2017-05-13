<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cemilanmantap
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php if(get_field('facebook_id','options')): ?>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '<?php echo get_field('facebook_id','options'); ?>',
          xfbml      : true,
          version    : 'v2.9'
        });
        FB.AppEvents.logPageView();
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    <?php endif; ?>
	<div class="nav-container">
        <a id="top"></a>
        <nav class="navbar navbar-inverse nav-centered absolute transparent custom-navbar" role="navigation">
            <div class="container">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">MENU</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-header">
                    <a class="navbar-brand" rel="home" href="<?php echo site_url();?>" title="Cemilan Mantap">
                        <img alt="Cemilan Mantap" src="<?php echo get_template_directory_uri();?>/assets/img/brand/logo-cemilan-mantap.png">
                    </a>
                </div>
            
                <div class="navbar-right">
                  <img src="<?php echo get_template_directory_uri();?>/assets/img/cup-top-right.png" alt="Kopi ABC">
                </div>
                
                <!-- the collapsing menu -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <?php 
                        $args_menu = array(
                            'theme_location' => 'menu-1',
                            'menu_id' => 'cm-primary-menu',
                            'container' => 'ul',
                            'container_class' => '',
                            'menu_class' => 'navbar-nav nav',
                            'depth' => 1,
                        );
                        wp_nav_menu( $args_menu ); 
                    ?>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container -->
        </nav>
    </div>

	<!-- checking class bg-secondary, tidak disemua halaman, hanya di article, article detail -->
    <div class="main-container bg-secondary"> 
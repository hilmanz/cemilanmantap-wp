<?php
/**
 * Template Name: Tentang Cemilan
 *
 * @author 		Sandi Andrian <sandi@kodrindonesia.com>
 * @package		cemilanmantap
 **/
get_header(); 
    while (have_posts()) : the_post();
?>
    <section class="image-bg pt120 pb0 pb-xs-80">
        <div class="background-image-holder">
            <img alt="image" class="background-image" src="<?php echo get_template_directory_uri();?>/assets/img/ttg_header_bkg.jpg" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 text-center p0">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/ttg_gisel-gading_02.png" alt="Gisel + Gading">
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php the_content(); ?>
                    <ul class="list-inline tentang-hadiah">
                        <li class="text-center">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/ttg_hadiah_01.png" alt="Hadiah 01">
                            <p class="small color-body">1 Samsung<br>Galaxy S8</p>
                        </li>
                        <li class="text-center">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/ttg_hadiah_02.png" alt="Hadiah 01">
                            <p class="small color-body">1 Sony Mirroless<br>A6000</p>
                        </li>
                        <li class="text-center">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/ttg_hadiah_03.png" alt="Hadiah 01">
                            <p class="small color-body">1 GoPro<br>Hero 5</p>
                        </li>
                        <li class="text-center">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/ttg_hadiah_04.png" alt="Hadiah 01">
                            <p class="small color-body">50 Voucher<br>IDR 200.000</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end of row-->

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h1 class="color-red text-center mt40 mt-xs-32">ABOUT PROGRAM</h1>
                    <p class="color-body">
                        <span class="color-body bold lead">Where does it come from?</span><br>
                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                    </p>
                    <p class="color-body">
                        <span class="color-body bold lead">Where can I get some?</span><br>
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                    </p>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class=" bg-red">
        <div class="page-title ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="uppercase mb0 color-white">Mekanisme</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-xs-12 text-center">
                    <div class="local-video-container">
                        <div class="background-image-holder">
                            <img alt="Background Image" class="background-image" src="<?php echo get_template_directory_uri();?>/assets/img/vid-thumb-mekanisme.jpg">
                        </div>
                        <video controls="">
                            <!-- <source src="<?php echo get_template_directory_uri();?>/assets/video/video.webm" type="video/webm"> -->
                            <!-- <source src="<?php echo get_template_directory_uri();?>/assets/video/video.mp4" type="video/mp4"> -->
                            <source src="<?php echo get_field('mekanisme'); ?>" type="video/mp4">
                            <!-- <source src="<?php echo get_template_directory_uri();?>/assets/video/video.ogv" type="video/ogg"> -->
                        </video>
                        <div class="play-button"></div>
                    </div>
                    <a class="btn btn-filled-white mt32" href="<?php echo get_field('join_page_link','option'); ?>">Pilih</a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-xs-12 ">
                    <h4 class="color-red">Syarat dan Ketentuan ABC Camilan Mantap</h4>
                    <?php the_field('syarat_ketentuan'); ?>
                </div>
            </div><!-- row -->
        </div><!--end of container-->
    </section>
<?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    endwhile;
get_footer();
?>
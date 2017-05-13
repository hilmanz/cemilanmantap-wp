<?php
cm_check_twitter_login();
/**
 * Template Name: Pilih Seleramu
 *
 * @author 		Sandi Andrian <sandi@kodrindonesia.com>
 * @package		cemilanmantap
 **/
get_header(); 
?>
    <section class="image-bg">
        <div class="background-image-holder pilih-seleramu">
            <img alt="image" class="background-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/bkg-pilih-seleramu.jpg" />
        </div>
        <div class="container">
            <div class="page-title page-title-3">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h2 class="mb0">Pilih Seleramu</h2>
                        </div>
                    </div> 
                </div>
            </div>                
            <div class="row">
                <div class="cm-cemilan-message">
                </div>
                <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
                    <form id="pilih-seleramu" method="post" action="" enctype="multipart/form-data">
                        <div class="overflow-hidden">
                            <input type="hidden" name="id_cemilan" id="id_cemilan" value="">
                            <input type="text" name="nama_cemilan" class="validate-required" placeholder="Nama Cemilan*" id="nama_cemilan" />
                            <input type="text" name="nama_tempat" class="validate-required" placeholder="Nama Tempat*" />
                            <div id="gmaps-container">
                                <div id='input-gmaps'>
                                    <input class="gmaps" id="gmaps-input-address" class="validate-required" name="alamat_cemilan" placeholder='Alamat*' type='text' /><br/>
                                    <input type="hidden" name="cm_lat" id="cm-lat" value="">
                                    <input type="hidden" name="cm_long" id="cm-long" value="">
                                    <div id='gmaps-error'></div>
                                </div>
                                <div id="gmaps-canvas"></div>
                            </div>
                            <div class="select-option">
                                <i class="ti-angle-down"></i>
                                <select name="nama_kota" class="cm_nama_kota">
                                    <option selected value="Default">Nama Kota</option>
                                    <?php 
                                        $terms = get_terms([
                                            'taxonomy' => 'location',
                                            'hide_empty' => false,
                                        ]);
                                        foreach($terms as $term){
                                            ?>
                                            <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                                            <?php 
                                        }
                                        ?>
                                </select>
                            </div>
                            <textarea id="cemilan_review" name="review" placeholder="Review" rows="2"></textarea>

                            <div class="row p16 pt16" style="background-color: #F2B800">
                                <div class="col-md-4 col-xs-4 text-left">
                                    <h4>RATING</h4>
                                </div>
                                <div class="col-md-8 col-xs-8 text-right">
                                    <form><div id="pilihseleramu-rating"></div></form>
                                    <!-- <input id="pilihseleramu-rating" value="4" type="text" class="rating" required title="RATING"> -->
                                </div>
                            </div>

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

                            <div class="row text-center mt24">
                                <div class="col-md-3 col-xs-6">
                                    <label class="pilihseleramu">
                                        <input type="radio" name="time_cemilan" id="cemilan_pagi" value="pagi">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/input-pagi.png" alt="Pagi">
                                    </label>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <label class="pilihseleramu">
                                        <input type="radio" name="time_cemilan" id="cemilan_siang" value="Siang">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/input-siang.png" alt="Siang">
                                    </label>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <label class="pilihseleramu">
                                        <input type="radio" name="time_cemilan" id="cemilan_sore" value="Sore">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/input-sore.png" alt="Sore">
                                    </label>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <label class="pilihseleramu">
                                        <input type="radio" name="time_cemilan" id="cemilan_malam" value="Malam">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/input-malam.png" alt="Malam">
                                    </label>
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

                                    <div class="col-md-3 col-sm-6 col-xs-6 mb-xs-32">
                                        <div id="photo_01" orakuploader="on"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6 mb-xs-32">
                                        <div id="photo_02" orakuploader="on"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6 mb-xs-32">
                                        <div id="photo_03" orakuploader="on"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6 mb-xs-32">
                                        <div id="photo_04" orakuploader="on"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3 mt64">
                                <input type="hidden" name="insert_cemilan_action" class="cm-action-insert-cemilan" value="cm_insert_cemilan"/>
                                
                                <div class="modal-container">  
                                    <?php
                                        $class_user_logged = ( is_user_logged_in() ) ? 'btn-cemilan-user-login insert-cemilan': 'btn-cemilan-user-logout btn-modal';
                                    ?>
                                    <button type="submit" href="#" class="<?php echo $class_user_logged; ?>">Submit</button>
                                <?php

                                    if( !is_user_logged_in() ){
                                        ?>
                                        <div class="foundry_modal text-center image-bg">
                                            <div class="background-image-holder submit-pilihseleramu">
                                                <img alt="Background" class="background-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/background/bkg-modal.jpg" />
                                            </div>
                                            <div class="text-left">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/logo-cemilan-mantap.png" alt="cemilan mantap">
                                            </div>
                                            <div class="row v-align-children">
                                                <div class="cm-login-form-wrap col-md-12 col-sm-12 mb-xs-24">
                                                    <h3 class="color-body">DAFTAR CEMILANMANTAP</h3>
                                                    <div class="row">
                                                        <div class="col-sm-4 col-sm-offset-2">
                                                            <a href="#" class="btn btn-primary btn-lg btn-block btn-login-facebook">
                                                                <i class="fa fa-1x fa-facebook"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <button type="button" href="<?php echo cm_twitter_login(); ?>" class="btn btn-filled-blue btn-lg btn-block btn-login-twitter">
                                                                <i class="fa fa-1x fa-twitter"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <h4 class="bulat center-block">ATAU</h4>
                                                    <form class="cm-login-form" action="" method="POST" style="margin-bottom: 10px">
                                                        <div class="cm-login-message">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8 col-sm-offset-2">
                                                                <input type="text" name="cm_email" class="cm_email col-md-12 mb-xs-8" placeholder="Email Address" />
                                                                <input type="password" name="cm_password" class="cm_password col-md-12 mb-xs-8" placeholder="Password" />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 col-md-offset-4">
                                                                <input type="hidden" name="action" class="cm-action-login" value="cm_login_member"/>
                                                                <button type="submit" class="cm-login-submit col-md-4 text-center mb0">SUBMIT</button>
                                                            </div>
                                                        </div>
                                                        <?php wp_nonce_field( 'ajax-login-nonce', 'login-security' ); ?>
                                                    </form>
                                                    <a href="#" class="reg-form-link" style="color: #333;">Daftar</a>
                                                </div>
                                            
                                                <div class="cm-register-form-wrap col-md-12 col-sm-12 mb-xs-24">
                                                    <h3 class="color-body">DAFTAR CEMILANMANTAP</h3>
                                                    <form class="cm-register-form" action="" method="POST" style="margin-bottom: 10px">
                                                        <div class="cm-register-message">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8 col-sm-offset-2">
                                                                <input type="text" name="cm_reg_username" class="cm_reg_username col-md-12 mb-xs-8" placeholder="Name">
                                                                <input type="text" name="cm_reg_phonenumber" class="cm_reg_phonenumber col-md-12 mb-xs-8" placeholder="Phone Number">
                                                                <input type="text" name="cm_reg_email" class="cm_reg_email col-md-12 mb-xs-8" placeholder="Email Address" />
                                                                <input type="password" name="cm_reg_password" class="cm_reg_password col-md-12 mb-xs-8" placeholder="Password" />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 col-md-offset-4">
                                                                <input type="hidden" name="reg_action" class="cm-action-register" value="cm_register_member"/>
                                                                <button type="submit" class="cm-register-submit col-md-4 text-center mb0">SUBMIT</button>
                                                            </div>
                                                        </div>
                                                        <?php wp_nonce_field( 'ajax-register-nonce', 'register-security' ); ?>
                                                    </form>
                                                    <a href="#" class="login-form-link" style="color: #333;">Login</a>
                                                </div>

                                            </div>
                                        </div>
                                    <?php
                                    }else{
                                        ?>
                                           
                                        <?php
                                    }
            
                                ?>
                                </div>

                                <div class="modal-container">
                                     <!-- START MODAL PARTISIPASI -->
                                    <div class="foundry_modal text-center image-bg cm-modal-thanks-participate">
                                        <div class="background-image-holder submit-pilihseleramu">
                                            <img alt="Background" class="background-image" src="<?php echo get_template_directory_uri();?>/assets/img/background/bkg-modal.jpg" />
                                        </div>
                                        
                                        <div class="row hidden-sm hidden-xs">
                                            <div class="col-md-6">
                                                <div class="text-left">
                                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/brand/logo-cemilan-mantap.png" alt="cemilan mantap">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-right">
                                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/cup-top-right.png" alt="Kopi ABC" class="mt24">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row v-align-children">
                                            <div class="col-md-12 col-sm-12 mb-xs-24">
                                                <h2 class="color-body">TERIMA KASIH<br>TELAH BERPARTISIPASI<br>DI CEMILANMANTAP.COM</h2>

                                                <h4 class="color-red">CEMILAN YANG SUDAH KAMU SUBMIT AKAN MELALUI PROSES VERIFIKASI TERLEBIH DAHULU</h4>

                                                <h4 class="color-body">INFO LEBIH LANJUT IKUTI TERUS SOCIAL MEDIA KOPI ABC</h4>
                                                
                                                <div class="row">
                                                    <div class="col-sm-8 col-sm-offset-2">
                                                        <ul class="list-inline">
                                                            <li><i class="fa fa-sm fa-facebook color-fb"></i> <span class="h5 color-body bold">KOPIMANTAPABC</span></li>
                                                            <li><i class="fa fa-sm fa-instagram color-instagram"></i> <span class="h5 color-body bold">KOPIMANTAPABC</span></li>
                                                            <li><i class="fa fa-sm fa-twitter color-tw"></i> <span class="h5 color-body bold">KOPIMANTAPABC</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
                                                        <button type="submit" class="col-md-4 text-center mb0 cm-ok-thanks">OK</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END MODAL PARTISIPASI -->
                                </div>
                               
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
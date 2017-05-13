(function($) {

    $(document).ready(function() {
        'use strict';

        var win = null;

        jQuery('body').on('click', '.btn-play', function() {
            var videoId = jQuery(this).attr('data-video-id');
            jQuery(this).hide()
                        .parent()
                        .parent()
                        .parent()
                        .find('img')
                        .hide()
                        .parent()
                        .append('<iframe width="594" height="334" src="https://www.youtube.com/embed/' + videoId + '?showinfo=0&autoplay=1">');
            return false; 
        });

        window.addEventListener('message', function(e) {
            var data = e.data;
            if(data.indexOf('_TW') != -1) {
                //login via twitter done
                twitterLoginCallback(data);
            }
        } , false);
        
        cmSwitchLoginReg();
        cmLoginSubmit();
        cmRegisterSubmit();
        // cmOrakuploader();
        cmInsertCemilan();
        cmSearchCemilan();
        filterCemilanByTime();
        facebookLogin();
        twitterLogin();
        cmAutoCompleteCemilan();

        function cmAutoCompleteCemilan(){
            $('#nama_cemilan').autoComplete({
                source: function( name, response ){
                     $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: cm_ajax.ajaxurl,
                        data: {
                            action: 'cm_get_title_cemilan',
                            nama_cemilan: $('input[name="nama_cemilan"]').val(),
                        },
                        success: function( dataResponse ){
                            if( dataResponse.length != 0 ){
                                // console.log( 'data response: ' + dataResponse );
                                response( dataResponse );    
                            }else{
                                // console.log( 'data response: ' + dataResponse );
                                $('input[name="id_cemilan"]').val('');
                            }
                            
                        },
                     })
                }, 
                renderItem: function(item, search){
                    console.log(item);
                    search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                    var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
                    return '<div class="autocomplete-suggestion" data-id="'+item[0]+'" data-val="' + item[1] + '">'  + item[1].replace(re, "<b>$1</b>") + '</div>';
                }, 
                onSelect: function( e, term, item ){
                    $('input[name="id_cemilan"]').val( item.data('id') );
                    // alert('Item "'+item.data('id')+' ('+item.data('id')+')" selected by '+(e.type == 'keydown' ? 'pressing enter' : 'mouse click')+'.');
                }
            });
        }   

        /*
         * readURLimg
         * read url of input file image
         * for previewing image 
         */
        function readURLimg( input, eq ){
            // console.log( eq );
            if( input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('.cm-uploader-preview img.preview').eq(eq).attr('src', e.target.result );
                    $('.cm-upload-del').eq(eq).show();
                    $('.cm-uploader label').eq(eq).hide();
                    $('.cm-preview-wrapper').eq(eq).css('min-height', 100+'px');
                    $('.cm-preview-wrapper').eq(eq).css('height', 100+'px');
                }
                reader.readAsDataURL( input.files[0] );
            }
        }

        $('.files_data').change( function(){
            readURLimg( this, $('.files_data').index(this) );
        })

        /*
         * click remove preview image when upload
         */
        $('.cm-upload-del').on('click', function( e ){
            e.preventDefault();
            var indexOf =  $('.cm-upload-del').index(this);
            $(this).hide();
            $('.cm-uploader-preview img.preview').eq( $('.cm-upload-del').index(this) ).attr('src', '');
            $('.files_data').eq( indexOf ).val('');
            $('.cm-uploader label').eq( indexOf ).show();
            $('.cm-preview-wrapper').eq(indexOf).css('min-height', 0+'px');
            $('.cm-preview-wrapper').eq(indexOf).css('height', 0+'px');
        })

        /*
         * cmSwitchLoginReg
         */
        function cmSwitchLoginReg() {
            $('#pilih-seleramu .btn-modal').on('click', function() {
                var regWrap = $('.foundry_modal.reveal-modal .cm-register-form-wrap');
                var loginWrap = $('.foundry_modal.reveal-modal .cm-login-form-wrap');
                loginWrap.show();
                regWrap.hide();

                $('.reg-form-link').on('click', function(e){
                    e.preventDefault();
                    regWrap.show();
                    loginWrap.hide();
                })

                $('.login-form-link').on('click', function(e){
                    e.preventDefault();
                    loginWrap.show();
                    regWrap.hide();
                })
            })
        }

        /**
         * Login Facebook
         *
         * @author      Sandi Andrian <sandi@kodrindonesia.com>
         * @since       Apr 30, 2017
         **/
        function facebookLogin() {
            $('.btn-login-facebook').on('click', function(e) {
                e.preventDefault();

                FB.login(function(response) {
                    if (response.authResponse) {
                        console.log('Welcome!  Fetching your information.... ');
                        FB.api('/me?fields=id,name,email', function(response) {
                            var name = response.name;
                            var email = response.email;
                            console.log('Good to see you, ' + response.name + '. Your email: ' + email);

                            var contents = {
                                action: 'cm_social_login',
                                cm_reg_email: email
                            }

                            $.post(cm_ajax.ajaxurl, contents, function(data) {
                                var obj = $.parseJSON(data);
                                // alert(obj.message);
                                // $('.cm-cemilan-message').html(obj.message);
                                if(obj.error == false) {
                                    $('.foundry_modal').removeClass('reveal-modal');
                                    $('.modal-screen').removeClass('reveal-modal');
                                    $('#pilih-seleramu button[type="submit"]').removeClass('btn-cemilan-user-logout btn-modal')
                                                                              .addClass('btn-cemilan-user-login insert-cemilan')
                                                                              .removeAttr('modal-link');
                                    $('#pilih-seleramu .foundry_modal').remove();
                                    // $('.modal-screen').remove();
                                    // $('body .foundry_modal').remove();
                                    cmInsertCemilan();
                                } else {
                                    if(obj.message != "" && obj.message == 'not registered') {
                                        $('.cm-login-message').html('<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-warning">Please complete registration below</div></div></div>');
                                        $('.foundry_modal.reveal-modal .cm-login-form-wrap').hide();

                                        //autofill 
                                        $('.foundry_modal.reveal-modal input[name="cm_reg_username"]').val(name);
                                        $('.foundry_modal.reveal-modal input[name="cm_reg_email"]').val(email);

                                        //show the form
                                        $('.foundry_modal.reveal-modal .cm-register-form-wrap').show();
                                    }
                                }
                                $('.cm-login-submit').bootstrapBtn('reset');
                            });
                        });

                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                }, {scope: 'email'});
            });
        }

        /*
         * cmLoginSubmit
         */
        function cmLoginSubmit() {
            $('.cm-login-submit').on('click', function(e) {
                e.preventDefault();
                var contents = {
                    action  : $('input[name="action"]').val(),
                    cm_email : $('.foundry_modal.reveal-modal input[name="cm_email"]').val(),
                    cm_password : $('.foundry_modal.reveal-modal input[name="cm_password"]').val(),
                    login_security: $('input[name="login-security"]').val(),
                    referer: $('input[name="_wp_http_referer"]').val(),
                };
                var button = $(this);
                button.bootstrapBtn('loading');
                
                $.post(cm_ajax.ajaxurl, contents, function(data) {
                    var obj = $.parseJSON(data);
                    $('.cm-login-message').html(obj.message);
                    if(obj.error == false) {
                        $('.foundry_modal').removeClass('reveal-modal');
                        $('.modal-screen').removeClass('reveal-modal');
                        $('#pilih-seleramu button[type="submit"]').removeClass('btn-cemilan-user-logout btn-modal')
                                                                  .addClass('btn-cemilan-user-login insert-cemilan')
                                                                  .removeAttr('modal-link');
                        $('#pilih-seleramu .foundry_modal').remove();
                        // $('.modal-screen').remove();
                        // $('body .foundry_modal').remove();
                        cmInsertCemilan();
                    }
                    button.bootstrapBtn('reset');
                });
            });
        }

        /*
         * cmRegisterSubmit
         */
        function cmRegisterSubmit() {
            $('.cm-register-submit').on('click', function( e ){
                e.preventDefault();
                e.stopImmediatePropagation();
                
                var contents = {
                    action: $('input[name="reg_action"]').val(),
                    cm_reg_username: $('.foundry_modal.reveal-modal input[name="cm_reg_username"]').val(),
                    cm_reg_phonenumber: $('.foundry_modal.reveal-modal input[name="cm_reg_phonenumber"]').val(),
                    cm_reg_email: $( '.foundry_modal.reveal-modal input[name="cm_reg_email"]').val(),
                    cm_reg_password: $( '.foundry_modal.reveal-modal input[name="cm_reg_password"]').val(),
                    register_security: $('input[name="register-security"]').val(),
                    referer: $('input[name="_wp_http_referer"]').val(),
                }
                var button = $(this);
                button.bootstrapBtn('loading');
                $.post( cm_ajax.ajaxurl, contents, function(data) {
                    var obj = $.parseJSON( data );
                    $('.cm-register-message').html(obj.message);
                    if(obj.error == false) {
                        $('.foundry_modal').removeClass('reveal-modal');
                        $('.modal-screen').removeClass('reveal-modal');
                        $('#pilih-seleramu button[type="submit"]').removeClass('btn-cemilan-user-logout btn-modal')
                                                                  .addClass('btn-cemilan-user-login insert-cemilan')
                                                                  .removeAttr('modal-link');
                    }

                    button.bootstrapBtn('reset');
                });
            });
        }

        // function checkCemilan( postTitle ){
        //     var resultCheck = {'id': '', 'post_title': postTitle, 'status': 'new'};
        //     $.ajax({
        //         url: cm_ajax.ajaxurl,
        //         type: 'POST',
        //         data: { action: 'cm_check_cemilan', post_title: postTitle },
        //         success: function(responseCheck){
        //             resultCheck['post_id'] = responseCheck.post_id;
        //             resultCheck['status'] = responseCheck.post_status;
        //         }
        //     });
        //     return resultCheck;
        // }

        /*
         * cmInsertCemilan
         */
        function cmInsertCemilan(){
            $( '.btn-cemilan-user-login.insert-cemilan' ).unbind().on( 'click', function( e ){
                e.preventDefault();
                var img = $('.files_data');
                var formData;
                // var newCemilan = $('input[name="new_cemilan"]').val();
                var idCemilan = $('input[name="id_cemilan"]').val();
                if( window.FormData ){
                    formData = new FormData();
                }

                formData.append('action', $('input[name="insert_cemilan_action"]').val());
                formData.append('cm_nama_cemilan',  $('input[name="nama_cemilan"]').val());
                formData.append('cm_nama_tempat', $('input[name="nama_tempat"]').val());
                formData.append('cm_alamat_cemilan', $('input[name="alamat_cemilan"]').val());
                formData.append('cm_alamat_lat',  $('input[name="cm_lat"]').val());
                formData.append('cm_alamat_long', $('input[name="cm_long"]').val());
                formData.append('cm_nama_kota', $('.cm_nama_kota').val());
                formData.append('cm_review_cemilan', $('textarea[name="review"]').val() );
                formData.append('cm_category_cemilan',$('input[name="category_cemilan"]:checked').val());
                formData.append('cm_time_cemilan', $('input[name="time_cemilan"]:checked').val());
                formData.append('cm_id_cemilan', idCemilan );
                // for add image / photo data
                $.each( img, function( i, obj ){
                    formData.append('cm_files['+i+']', obj.files[0]);
                })

                var button = $(this);
                button.bootstrapBtn('loading');
                $.ajax({
                    url: cm_ajax.ajaxurl,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function( response ){
                        $('.cm-cemilan-message').html( response.message );
                        $('html, body').animate({
                            scrollTop: 0
                        }, 800 );
                        if( response.error == false ){
                            $('#pilih-seleramu').trigger('reset');

                            var cmModalThanks = $('.cm-modal-thanks-participate'),
                                modalScreen = $('.modal-screen');
                            cmModalThanks.addClass('reveal-modal');
                            modalScreen.addClass('reveal-modal');
                            $('.cm-upload-del').hide();
                            $('.cm-uploader-preview img.preview').attr('src', '');
                            $('.files_data').val('');
                            $('.cm-uploader label').show();
                            $('.cm-preview-wrapper').css('min-height', 0+'px');
                            $('.cm-preview-wrapper').css('height', 0+'px');
                            cmOkModalThanks();
                        }   
                        button.bootstrapBtn('reset');
                    }
                })
                
                // var contents_insert = {
                //     action: $('input[name="insert_cemilan_action"]').val(),
                //     cm_nama_cemilan: $('input[name="nama_cemilan"]').val(),
                //     cm_nama_tempat: $('input[name="nama_tempat"]').val(),
                //     cm_alamat_cemilan: $('input[name="alamat_cemilan"]').val(),
                //     cm_alamat_lat: $('input[name="cm_lat"]').val(),
                //     cm_alamat_long: $('input[name="cm_long"]').val(),
                //     cm_nama_kota: $('.cm_nama_kota').val(),
                //     cm_category_cemilan: $('input[name="category_cemilan"]:checked').val(),
                //     cm_time_cemilan: $('input[name="time_cemilan"]:checked').val(),
                // }
                // $.each( img, function( i, obj ){
                    // contents_insert['cm_files[' +i+ ']'] = obj.files[0];
                // })
                // $.post( cm_ajax.ajaxurl, contents_insert, function( data ){
                //     var obj = $.parseJSON(data);
                //     $('.cm-cemilan-message').html(obj.message);
                //     $('html, body').animate({
                //         scrollTop: 0
                //     }, 800 );
                //     if( obj.error == false ){
                //         $('#pilih-seleramu').trigger('reset');
                //     }   
                //     button.bootstrapBtn('reset');
                // })
            });
        }

        /*
         * cmOkModalThanks
         */
        function cmOkModalThanks(){
            // ok button in participate modal
            $('body').on('click', '.cm-ok-thanks, .close-modal', function(){
                $('.cm-modal-thanks-participate').removeClass('reveal-modal');
                $('.modal-screen').removeClass('reveal-modal');
            });
        }
        
        /*
         * cmSearchCemilan
         */
        function cmSearchCemilan(){
            $( '#cm-search-cemilan' ).on( 'click', function( e ){
                e.preventDefault();
                $('.cm-cemilan-message').empty();
                var content_search = {
                    action: 'cm_search_cemilan',
                    // cm_search_kota: $( '.cm_nama_kota' ).val(),
                    cm_search_keyword: $( 'input[name="cm_s"]' ).val(),
                    cm_search_category: $( 'input[name="category_cemilan"]:checked' ).val(),
                };
                var button = $(this);
                button.bootstrapBtn('loading');
                $.post(cm_ajax.ajaxurl, content_search, function( data ) {
                    var obj = $.parseJSON( data );
                    if( obj.error == true ){
                        $('.cm-cemilan-message').html( obj.message );
                        // console.log( obj.message );
                    }else{
                        // console.log( obj.response_data );
                         $('html, body').animate({
                            scrollTop: $(window).height()
                        }, 800 );
                        var strHtml = '';
                        if( obj.message !== 'no result' ){
                            var resp = obj.response_data;
                            for( var i = 0; i < resp.length; i++ ){
                                strHtml += '<div id="'+resp[i].id_title+'" class="col-xs-12 col-sm-3 col-lg-3 col-md-3 grid-cemilan-item filter-'+resp[i].time_filter+' filter-'+resp[i].city_location+'">'+
                                                '<div class="food-thumbnail">'+
                                                    '<img src="'+ resp[i].featured_image +'" alt="">'+
                                                    '<div class="food-caption">'+
                                                    '<h4><a href="' + resp[i].permalink + '" rel="bookmark">'+ resp[i].title +'</a></h4>'+
                                                    '<div class="food-location">'+
                                                        resp[i].city +
                                                    '</div>'+
                                                        resp[i].excerpt +
                                                    '</div>'+
                                                    '<div class="food-ratings">'+
                                                        '<span class="glyphicon glyphicon-star"></span>'+
                                                        '<span>3/5</span>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';
                            }
                        }else{
                            strHtml += '<div class="col-md-10 col-md-offset-1 col-sm-12 text-center"><div class="alert alert-info">'+obj.response_data+'</div></div>';
                        }
                        var $strHtml = $( strHtml );

                        $('.grid-cemilan').empty().append( $strHtml ).isotope('insert', $strHtml);
                        
                    }
                    button.bootstrapBtn('reset');
                    console.log( location.href + '?cemilan=' + $( 'input[name="cm_s"]' ).val() + '&category=' + $( 'input[name="category_cemilan"]:checked' ).val() );
                    var newURLquery = location.protocol + '?cemilan=' + $( 'input[name="cm_s"]' ).val() + '&category=' + $( 'input[name="category_cemilan"]:checked' ).val();
                    window.history.pushState( null, '', newURLquery );
                });
            });
        }

        

        function filterCemilanByTime(){
           $('#cm-message-cemilan-noresult').hide();
            var $grid = $('.grid-cemilan');

            $grid.imagesLoaded( function(){
                $grid.isotope({
                    itemSelector: '.grid-cemilan-item',
                    layoutMode: 'fitRows',
                    masonry:{
                        columnWidth: '.col-xs-12',
                    },
                })
                // if ( !$grid.data('isotope').filteredItems.length ) {
                //     $('#cm-message-cemilan-noresult').show();
                // }else{
                //     $('#cm-message-cemilan-noresult').hide();
                // }
                $('.filters-time').on('click', 'input', function(){
                    var filterValue = $(this).attr('data-filter');
                    var filterSelect = $('.filters-location').val();
                    var filterUse = filterValue;
                    if( filterSelect != '*' ){
                        filterUse = filterValue + filterSelect; 
                    }
                    // console.log( filterUse );
                    $grid.isotope({ filter: filterUse });
                    if ( !$grid.data('isotope').filteredItems.length ) {
                        $('#cm-message-cemilan-noresult').show();

                    }else{
                        $('#cm-message-cemilan-noresult').hide();
                    }
                })

                $('.filters-location').on('change', function(){
                    var filterValueSelected = $(this).val();
                    var filterValueTime = $('.filters-time input[name="time_cemilan"]:checked').attr('data-filter');
                    var filterBySelect = filterValueSelected;
                    if( filterValueTime != '*' ){
                        var filterBySelect = filterValueSelected + filterValueTime;
                    }
                    // console.log( filterBySelect );
                    $grid.isotope({filter: filterBySelect });
                    if ( !$grid.data('isotope').filteredItems.length ) {
                        $('#cm-message-cemilan-noresult').show();
                    }else{
                        $('#cm-message-cemilan-noresult').hide();
                    }
                });
                
            });

            // var $grid = $('.grid-cemilan').isotope({
            //     itemSelector: '.grid-cemilan-item',
            //     layoutMode: 'fitRows'
            // });

            // $('.filters-time').on('click', 'input', function(){
            //     var filterValue = $(this).attr('data-filter');
            //     var filterSelect = $('.filters-location').val();
            //     var filterUse = filterValue;
            //     if( filterSelect != '*' ){
            //         filterUse = filterValue + filterSelect; 
            //     }
            //     // console.log( filterUse );
            //     $grid.isotope({ filter: filterUse });
            //     if ( !$grid.data('isotope').filteredItems.length ) {
            //         $('#cm-message-cemilan-noresult').show();
            //     }else{
            //         $('#cm-message-cemilan-noresult').hide();
            //     }
            // })

            // $('.filters-location').on('change', function(){
            //     var filterValueSelected = $(this).val();
            //     var filterValueTime = $('.filters-time input[name="time_cemilan"]:checked').attr('data-filter');
            //     var filterBySelect = filterValueSelected;
            //     if( filterValueTime != '*' ){
            //         var filterBySelect = filterValueSelected + filterValueTime;
            //     }
            //     // console.log( filterBySelect );
            //     $grid.isotope({filter: filterBySelect });
            //     if ( !$grid.data('isotope').filteredItems.length ) {
            //         $('#cm-message-cemilan-noresult').fadeIn();
            //     }else{
            //         $('#cm-message-cemilan-noresult').hide();
            //     }
            // });


            // var $grid = $('.grid-cemilan');

            // $grid.imagesLoaded( function(){
            //     $grid.isotope({
            //         itemSelector: '.grid-cemilan-item',
            //         // layoutMode: 'fitRows',
            //         // masonry:{
            //         //     columnWidth: '.col-sm-3'
            //         // }
            //     });

            //     $('.filters-time').on('click', 'input', function(){
            //         var filterValue = $(this).attr('data-filter');
            //         $grid.isotope({ filter: filterValue });
            //         return false;
            //     })
            // }).progress( function(){
            //     $grid.isotope('reLayout');
            // })
           
            // $grid.imagesLoaded().progress( function() {
            //     $grid.isotope('layout');
            // });

            
        }

        /**
         * Login Twitter
         *
         * @author      Sandi Andrian <sandi@kodrindonesia.com>
         * @since       May 1, 2017
         **/
        function twitterLogin() {
            var win;
            $('.btn-login-twitter').on('click', function(e) {
                e.preventDefault();
                $(this).attr('disabled','disabled');
                var $url = $(this).attr('href');

                win = window.open($url, "_blank", "location=yes,height=570,width=520,scrollbars=yes,status=yes");
                
                // $.get(cm_ajax.ajaxurl, { action: 'cm_twitter_login' }, function(data) {
                //     alert(data.error);
                //     if(data.error == false) {
                //         // top.location.href = data.login_url;
                //         window.open(data.login_url, "_blank", "location=yes,height=570,width=520,scrollbars=yes,status=yes");
                //     }
                    
                // });
            });
        }

        function twitterLoginCallback(data) {
            var str = data.split('|');
            console.log("EMAIL: " + str[2]);

            var contents = {
                action: 'cm_social_login',
                cm_reg_email: str[2]
            }

            $.post(cm_ajax.ajaxurl, contents, function(data) {
                var obj = $.parseJSON(data);
                $('.cm-login-message').html('');
                if(obj.error == false) {
                    $('.foundry_modal').removeClass('reveal-modal');
                    $('.modal-screen').removeClass('reveal-modal');
                    $('#pilih-seleramu button[type="submit"]').removeClass('btn-cemilan-user-logout btn-modal')
                                                              .addClass('btn-cemilan-user-login insert-cemilan')
                                                              .removeAttr('modal-link');
                    $('#pilih-seleramu .foundry_modal').remove();
                    // $('.modal-screen').remove();
                    // $('body .foundry_modal').remove();
                    cmInsertCemilan();
                } else {
                    if(obj.message != "" && obj.message == 'not registered') {
                        $('.cm-login-message').html('<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-warning">Please complete registration below</div></div></div>');
                        $('.foundry_modal.reveal-modal .cm-login-form-wrap').hide();

                        //autofill 
                        $('.foundry_modal.reveal-modal input[name="cm_reg_username"]').val(str[1]);
                        $('.foundry_modal.reveal-modal input[name="cm_reg_email"]').val(str[2]);

                        //show the form
                        $('.foundry_modal.reveal-modal .cm-register-form-wrap').show();
                    }
                }
                $('.cm-login-submit').bootstrapBtn('reset');
            });
        }

        // PIE Charts
        // ======================
        $('.chart').each( function() {
            var $chart = $(this);
            $chart.waypoint(function() {
                var $waypoint = $(this);
                $waypoint.easyPieChart({
                    barColor: $waypoint.attr('data-bar-color'),
                    trackColor: $waypoint.attr('data-track-color'),
                    lineWidth: $waypoint.attr('data-line-width'),
                    scaleColor: false,
                    animate: 1000,
                    size: $waypoint.attr('data-size'),
                    lineCap: 'square'
                });
            },{
                triggerOnce: true,
                offset: 'bottom-in-view'
            });

            $chart.css('left', '50%');
            $chart.css('margin-left', - $chart.attr('data-size') / 2 );
        });

        var idPilihSelera = 'pilihseleramu-rating';
        var idDirectory = 'directory-star-detail';
        var idDirectoryReview = 'directory-star-review';
        var configRating = {};
        var idRating = '';
        if( $('#'+idPilihSelera ).length != 0 ){
            idRating = idPilihSelera;
            configRating = {
                stars: 5,
                size: "24px",
                button_color: "red",
                active_color: "white",
                text: false,
            };
        }
        if( $('#'+idDirectory).length != 0 ){
            idRating = idDirectory;
            configRating = {
                stars: 5,
                size: "20px",
                buttons_color: "red",
                active_color: "white",
                text: true
            };
        }
        $( '#'+idRating ).jRating( configRating );
        if( $('#'+idDirectoryReview ).length != 0 ){
            idRating = idDirectoryReview;
            configRating = {
                stars: 5,
                size: "24px",
                buttons_color: "red",
                active_color: "white",
                text: false
            }
            $( '#'+idRating ).jRating( configRating );
        }

        

        // $("div.navbar-fixed-top").autoHidingNavbar();

        // Image Map
        $('img[usemap]').rwdImageMaps();

        $("#shareIconsCount").jsSocials({
            //url: "http://www.cemilanmantap.com",
            //text: "Cemilan Mantap",
            showLabel: false,
            showCount: true,
            shares: ["facebook"]
        });

        (function(){
            function initPopover(){                 
                var sharerContent = $('#sharerContent').html(),
                    sharerSettings = {content:sharerContent,
                                        width:150,
                                        height:85,
                                        padding:true,
                                        delay:{show:300,hide:1000},
                                        closeable:true
                                    };
                var popSharer = $('a.show-pop-sharer').webuiPopover('destroy').webuiPopover($.extend({},sharerSettings));
            }
            initPopover();
        })();

    });

    window.initMap = function() {
        // var map = new google.maps.Map(document.getElementById('map'), {
        var map = new google.maps.Map( document.getElementById('gmaps-canvas'), {
            center: {lat: -6.21462, lng: 106.84513},
            zoom: 13
        });
        // var card = document.getElementById('pac-card');
        var input = document.getElementById('gmaps-input-address');
        // var types = document.getElementById('type-selector');
        // var strictBounds = document.getElementById('strict-bounds-selector');

        // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        // select place manual by clicking map and enter address manually
        google.maps.event.addListener(map, 'click', function( event ){
            marker.setPosition( event.latLng );
            map.panTo( event.latLng );
            // document.getElementById('gmaps-input-address').value = '';
            document.getElementById('cm-lat').value = event.latLng.lat();
            document.getElementById('cm-long').value = event.latLng.lng();
        })

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            document.getElementById('cm-lat').value = place.geometry.location.lat();
            document.getElementById('cm-long').value = place.geometry.location.lng();

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            // infowindowContent.children['place-icon'].src = place.icon;
            // infowindowContent.children['place-name'].textContent = place.name;
            // infowindowContent.children['place-address'].textContent = address;
            // infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        // function setupClickListener(id, types) {
        //     var radioButton = document.getElementById(id);
        //     radioButton.addEventListener('click', function() {
        //         autocomplete.setTypes(types);
        //     });
        // }

        // setupClickListener('changetype-all', []);
        // setupClickListener('changetype-address', ['address']);
        // setupClickListener('changetype-establishment', ['establishment']);
        // setupClickListener('changetype-geocode', ['geocode']);

        // document.getElementById('use-strict-bounds')
        //     .addEventListener('click', function() {
        //       console.log('Checkbox clicked! New state=' + this.checked);
        //       autocomplete.setOptions({strictBounds: this.checked});
        //     });
    
    }
})(jQuery);
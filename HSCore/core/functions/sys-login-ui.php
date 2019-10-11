<?php
/**
 * 
 * Customize Login
 * 
 */

// Login Font
add_action( 'login_head', function(){
    if(stripos($_SERVER["SCRIPT_NAME"], strrchr(wp_login_url(), '/')) !== false) {
        echo "<style>
        @font-face {
            font-family: Vazir;
            src: url(".MODIRAN_CORE_URL."assets/fonts/Vazir.eot');
            src: url('".MODIRAN_CORE_URL."assets/fonts/Vazir.eot?#iefix') format('embedded-opentype'),
                 url(".MODIRAN_CORE_URL."assets/fonts/Vazir.woff2') format('woff2'),
                 url(".MODIRAN_CORE_URL."assets/fonts/Vazir.woff') format('woff'),
                 url(".MODIRAN_CORE_URL."assets/fonts/Vazir.ttf') format('truetype');
            font-weight: normal;
          }
          body{font-family:'Vazir',sans-serif !important;}
          .aiowps-captcha-equation{color:#fff;}</style>" . PHP_EOL;
    }
});


// Login Style
add_action( 'login_enqueue_scripts', function(){
    echo "
    <style type='text/css'>
        body{background-image: url(".MODIRAN_CORE_URL."assets/images/login-background.jpg) !important}
        .login form {background: #444242 !important;}
        .login form label{color: #BEBEBE}
        #wp-submit{background: #BEBEBE !important;border-color:initial;box-shadow:none;text-shadow:none;color: #444242}
        #login h1 a, .login h1 a {background-image: url(".MODIRAN_CORE_URL."assets/images/banana.png) !important;height:200px;width:200px;background-size: 200px 200px;background-repeat: no-repeat;padding-bottom: 10px;}
        .login h1 a{-webkit-animation: rotation 10s infinite linear;height: 30px;width: 30px}@-webkit-keyframes rotation {from {-webkit-transform: rotate(0deg);}to {-webkit-transform: rotate(359deg);}} */
        #login #user_login {background : red !important;}
    </style>
    
    ";
});


// $aio_wp_security->captcha_obj->display_captcha_form();
?>
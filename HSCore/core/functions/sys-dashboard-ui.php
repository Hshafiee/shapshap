<?php
/**
 * 
 * Customize Dashboard
 * 
 */

// Dashboard Fonts

add_action( 'wp_head', function(){
    if(current_user_can('administrator')) {
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
          #wpadminbar *:not([class='ab-icon']){font-family:'Vazir',sans-serif !important;}</style>" . PHP_EOL;
    }
});


add_action( 'admin_head', function(){
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
    body,h1 , h2 , h3 ,#wpadminbar *:not([class='ab-icon']), .wp-core-ui, .media-menu, .media-frame *, .media-modal *{font-family:'Vazir',sans-serif !important;} #adminmenu li.wp-menu-separator {margin: 10px 20px !important;border-bottom: 1px solid #666;width: 70%;}.rtl h1, .rtl h2, .rtl h3, .rtl h4, .rtl h5, .rtl h6 {font-family: inherit;}.tr-tabbed-box .contextual-help-tabs{float: right;}.tr-tabbed-box .contextual-help-sidebar {float: left;}
    .tr-tabbed-box .contextual-help-tabs .active {border-right: 2px solid #00a0d2;border-left:none}
    .help-tab-content {margin: 0 22px 12px 22px;}
    .tr-tabbed-box .tr-contextual-help-back {right: 150px;left: 170px;}
    .tabbed-sections{background-color:#fff;margin-top:50px;}
    div.tr-tabbed-top.cf > div.tr-sections{background-color:#e8e5e5;padding:20px;}
    #side-sortables .cmb-th, .inner-sidebar .cmb-th{padding-bottom:0!important}
    #side-sortables .cmb-th label, .inner-sidebar .cmb-th label {margin-bottom: .5em;font-size: 13px;font-weight: normal;line-height: 0;}
    #side-sortables .cmb2-wrap>.cmb-field-list>.cmb-row, .inner-sidebar .cmb2-wrap>.cmb-field-list>.cmb-row {padding: .8em 0;}
    </style>" . PHP_EOL;
} );

// Change Footer
add_filter('admin_footer_text', function(){
    echo '<em >توسعه داده شده توسط <a style="text-decoration: none;font-style: initial;" href="http://www.moidranart.com">آژانس مشاوره و تبلیغات مدیران</a></em>';    
});

// Reorder Menu
add_filter( 'custom_menu_order', 'mod_admin_reorder', 10, 1 );
add_filter( 'menu_order', 'mod_admin_reorder', 10, 1 );
    function mod_admin_reorder( $menu_ord ) {
        if ( !$menu_ord ) return true;
        return array(
            'index.php', // Dashboard
            'separator1', // separator
            'edit.php', // Posts
            'edit.php?post_type=page', // Pages
            'upload.php', // Media
            'separator2', // separator
            'edit.php?post_type=courses', // courses
            'edit.php?post_type=engineering_course', // engineering_course
            'edit.php?post_type=das_course', // das_course
            'edit.php?post_type=seminar', // seminar
            'students_forms', // seminar
            'edit.php?post_type=comments', // comments
            'mod_content_option', // Content Control
            'mod_header_settings', // Theme Setting
            'separator-last',
            
        );
    }
?>
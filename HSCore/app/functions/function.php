<?php 
    function the_breadcrumb() {
        $post_type=get_post_type( get_the_ID() );
        if(!is_home()){
            if(is_page()){
                echo '
                <ul class="uk-breadcrumb uk-flex uk-flex-center">
                <li><a href="';
                echo get_option('home');
                echo '">صفحه اصلی</a></li>
                    <li><a href="">';
                 echo the_title();   
                echo '</a></li>
                </ul>';
            }elseif(is_single()){
                if($post_type=='post'){
                    echo '
                    <ul class="uk-breadcrumb uk-flex uk-flex-center">
                        <li><a href="';
                        echo get_option('home');
                        echo '">صفحه اصلی</a></li>
                        <li><a href="/blog">وبلاگ</a></li>
                        <li><a href="">';
                     echo the_title();   
                    echo '</a></li>
                    </ul>';
                }
                if($post_type=='project'){
                    echo '
                    <ul class="uk-breadcrumb uk-flex uk-flex-center">
                        <li><a href="';
                        echo get_option('home');
                        echo '">صفحه اصلی</a></li>
                        <li><a href="/project">پروژه ها</a></li>
                        <li><a href="">';
                     echo the_title();   
                    echo '</a></li>
                    </ul>';
                }
                // if($post_type=='gallery'){
                //     echo '
                //     <ul class="uk-breadcrumb uk-flex uk-flex-center">
                //         <li><a href="';
                //         echo get_option('home');
                //         echo '">صفحه اصلی</a></li>
                //         <li><a href="'.get_post_type_archive_link( 'gallery' ).'">گالری</a></li>
                //         <li><a href="">';
                //      echo the_title();   
                //     echo '</a></li>
                //     </ul>';
                // }
            }
        }
    }
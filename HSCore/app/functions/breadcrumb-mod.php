<?php

function hs_breadcrumb($info,$ispage) {
    $home_URL = home_url();
    switch (get_locale()) {
        case 'fa_IR':
            $homename = "صفحه اصلی";
            break;
        case 'en_US':
            $homename = "Home";
            break;
    }

    if ($ispage){
        echo "
            <div class='uk-padding-small uk-padding-remove-horizontal mod-white-bg'>
                <div class='uk-container uk-container-large'>
                    <ul class='uk-breadcrumb'>
                        <li><a href='{$home_URL}' rel='nofollow'>{$homename}</a></li>
                        <li><a href=''>{$info}</a></li>
                    </ul>
                </div>
            </div>
        ";
    }else{
        $info = get_queried_object()->post_title;
        $cat = get_the_category()[0]->name;
        echo "
        <div class='uk-padding-small uk-padding-remove-horizontal mod-white-bg'>
            <div class='uk-container uk-container-large'>
                <ul class='uk-breadcrumb'>
                    <li><a href='{$home_URL}' rel='nofollow'>{$homename}</a></li>
                    <li>{$cat}</li>
                    <li><a href=''>{$info}</a></li>
                </ul>
            </div>
        </div>
    ";

    }


}

    ?>
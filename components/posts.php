<div class="uk-container">
    <div uk-slider="center: true;autoplay:true">
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
            <ul class="uk-slider-items uk-child-width-1-2@s uk-grid">
                <?php
                    $posts = new WP_Query( 
                        array(
                            'posts_per_page' => 12,
                            'order' => 'DESC',
                            'orderby' => 'date',
                        )
                    );
                    if ( $posts->have_posts() ) {
                        while ( $posts->have_posts() ) {
                            $posts->the_post();
                            $id = get_the_id();
                            $img = get_the_post_thumbnail_url();
                            $title = get_the_title();
                            $content = wp_trim_words(get_the_content(),120,'...');
                            $link = get_the_permalink();
                            echo "<li class='hs-justify'>
                                    <a href='{$link}'>
                                        <div class='uk-card uk-card-default'>
                                            <div class='uk-card-media-top'>
                                                <img src='{$img}' alt='{$title}'>
                                            </div>
                                            <div class='uk-card-body'>
                                                <h3 class='uk-card-title'>{$title}</h3>
                                                <p>{$content}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>";
                            
                        }
                    }
                    wp_reset_postdata();
                ?>
            </ul>

            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

        </div>

        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

    </div>
</div>
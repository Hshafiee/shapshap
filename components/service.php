<div class="uk-container">
    <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match uk-flex-center" data-uk-grid>
        <?php
        $services = new WP_Query(
            array(
                'post_type' => array('services'),
                'order' => 'DESC',
                'meta_key' => 'service_status',
                'meta_value' => 'active',
        ) );

        if ( $services->have_posts() ) {
            while ( $services->have_posts() ) {
                $services->the_post();
                $img = get_the_post_thumbnail_url();
                $title = get_the_title();
                $content = get_post_meta( get_the_ID(), 'service_info', TRUE );
                echo "
                <div>
                    <div class='uk-card uk-card-default uk-card-body uk-text-center uk-padding-remove'>
                        <div class='uk-padding-small'>    
                            <img src='{$img}' data-uk-img>
                            <h3 class='uk-card-title uk-margin-remove-top'>{$title}</h3>
                            <p class='hs-justify'>{$content}</p>
                        </div>
                    </div>
                </div>
                ";
            }
        } 
        wp_reset_postdata();

        ?>
    </div>
</div>

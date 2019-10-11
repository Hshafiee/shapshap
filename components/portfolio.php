<div class="uk-container-expand">
    <div class="uk-grid-collapse uk-child-width-1-4@m  uk-flex-center hs-portfolio" data-uk-grid>
    <?php
            $portfolio = new WP_Query( 
                array(
                    'post_type' => array('portfolio'),
                    'order' => 'DESC',
                    'orderby' => 'rand',
                    'meta_key' => 'portfolio_status',
                    'meta_value' => 'active',
                    'posts_per_page' => 12,
                )
             );

            if ( $portfolio->have_posts() ) {
                while ( $portfolio->have_posts() ) {
                    $portfolio->the_post();
                    $id = get_the_id();
                    $img = get_the_post_thumbnail_url();
                    $title = get_the_title();
                    $content = get_the_content();
                    echo "
                    <div>
                        <div class='uk-inline-clip uk-transition-toggle uk-light' tabindex='0'>
                            <a href='#modal-{$id}'  data-uk-toggle>
                                <img src='{$img}' alt='{$title}' data-uk-image>
                                <div class='uk-position-center'>
                                    <span class='uk-transition-fade' uk-icon='icon: plus; ratio: 2'></span>
                                </div>
                            </a>
                            <div id='modal-{$id}' class='uk-modal-full' data-uk-modal>
                                <div class='uk-modal-dialog'>
                                    <button class='uk-modal-close-full uk-close-large' type='button' data-uk-close></button>
                                    <div class='uk-grid-collapse uk-child-width-1-2@s uk-flex-middle' data-uk-grid>
                                        <div class='uk-background-cover' style='background-image: url(\"{$img}\");' data-uk-height-viewport data-uk-image></div>
                                        <div class='uk-padding-large hs-justify'>
                                            <h1>{$title}</h1>
                                            <p>{$content}</p>
                                        </div>
                                    </div>
                                </div>
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
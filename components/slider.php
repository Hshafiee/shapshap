<!-- <div class="uk-container uk-container-expand"> -->

<main>
<section class="slides"> 
  
  <section class="slides-nav">
    <nav class="slides-nav__nav">
      <button class="slides-nav__prev js-prev">قبلی</button>
      <button class="slides-nav__next js-next">بعدی</button>
    </nav>
  </section>

  <?php

  // Custom WP query slider
  $slider = new WP_Query( 
    array(
      'post_type' => array('mod_slider'),
      'order' => 'DESC',
      'meta_key' => 'slider_status',
      'meta_value' => 'active',
  ) );

  if ( $slider->have_posts() ) {
    $first = true;
    while ( $slider->have_posts() ) {
      $slider->the_post();
      $img = get_the_post_thumbnail_url();
      $title = get_the_title();
      $link = get_post_meta( get_the_ID(), 'slider_link', TRUE );
      $color = get_post_meta( get_the_ID(), 'slider_color', TRUE );
      echo "  <section class='slide  " . ($first ? 'is-active' : ' ') ." '>
      <div class='slide__content'>
        <figure class='slide__figure'><div class='slide__img' style='background-image: url({$img})'></div></figure>
        <header class='slide__header'>
          <h2 class='slide__title'>
          <a href='{$link}'><span class='title-line'><span style='color:{$color}'>{$title}</span></span></a>
          </h2>
        </header>
      </div>
    </section>";
    $first = false;
    }
  }

  wp_reset_postdata();
?>
</section>
</main>

<!-- </div> -->
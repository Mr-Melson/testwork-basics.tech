<?php

/**
 *
 * @package Understrapchild\News-Template
 */

the_post();
get_header();
$type = wp_get_post_terms( get_the_ID(), 'type' );
?>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">

                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper gallery_swiper">
                    <div class="swiper-wrapper">
                        <?php
                        $gallery = get_field('gallery');
                        if( $gallery ){
                            foreach ($gallery as $item) {
                                ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $item; ?>" />
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <div thumbsSlider="gallery_swiper" class="swiper gallery_thumb_swiper">
                    <div class="swiper-wrapper">
                    <?php
                        if( $gallery ){
                            foreach ($gallery as $item) {
                                ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $item; ?>" />
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="col-md">
                <h1><?php the_title(); ?></h1>

                <?php if ( $town = wp_get_post_parent_id(get_the_ID()) ) : ?>
                    <p>Город: 
                        <a href="<?php echo get_the_permalink($town) ?>" rel="bookmark"><?php echo get_the_title($town); ?></a>
                    </p>
                <?php endif; ?>

                <?php if( $type ): ?>
                    <p>Тип недвижимости: 
                        <?php foreach ($type as $item) { ?>
                            <a href="/?<?php echo $item->slug; ?>"><?php echo $item->name; ?></a>
                        <?php }; ?>
                    </p>
                <?php endif; ?>

                <?php include(THEME_DIR . '/template-parts/common/realty-info.php'); ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();

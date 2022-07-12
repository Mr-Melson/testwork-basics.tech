<?php

/**
 *
 * @package Understrapchild\Realty-Template
 */

the_post();
get_header();
?>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
            </div>
            <div class="col-md">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
<?php
$childrens = get_children([
    'post_parent' => get_the_ID(),
    'post_type'   => 'realty',
    'numberposts' => 10,
]);
if ($childrens) {
?>
<section>
    <div class="container mt-5">
        <h2>Недвижимость города <?php the_title(); ?></h2>
        <div class="row mt-3">
            <div class="col">

                <div class="swiper realty_swiper">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($childrens as $children) {
                            ?>
                            <div class="swiper-slide">
                                <div class="card">
                                    <a href="<?php echo get_the_permalink($children->ID); ?>" class="card-link card-img-top">
                                        <?php echo get_the_post_thumbnail($children->ID, 'full'); ?>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="<?php echo get_the_permalink(); ?>">
                                                <?php echo get_the_title($children->ID); ?>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php
get_footer();

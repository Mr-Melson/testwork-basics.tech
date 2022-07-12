<div class="col-md-4">
    <div class="card">
        <a href="<?php the_permalink(); ?>" class="card-link card-img-top">
            <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
        </a>
        <div class="card-body">
            <h5 class="card-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h5>
        </div>
        <?php include(THEME_DIR . '/template-parts/common/realty-info.php'); ?>
    </div>
</div>
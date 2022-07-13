<div class="col-lg-3 mt-4">
    <div class="card">
        <a href="<?php the_permalink(); ?>" class="card-link card-img-top">
            <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
        </a>
        <div class="card-body">
            <h5 class="card-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h5>
            <p class="card-text">
                <?php echo wp_trim_words( strip_tags( get_the_content('Читать далее...') ), 10, '...<a href="'.get_the_permalink().'">Читать далее</a>' ); ?>
            </p>
        </div>
    </div>
</div>
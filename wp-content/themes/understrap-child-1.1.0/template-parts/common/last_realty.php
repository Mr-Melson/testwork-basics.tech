<section>
    <div class="container mt-5">
        <div class="row">

            <div class="col-6">
                <h2>Недвижимость</h2>
            </div>
            <div class="col-6">
                <h4 class="text-right"><a href="/realty/">Смотреть все</a></h4>
            </div>

            <?php
            $args = array(
                'post_type' => 'realty',
            );
            
            $realty_query = new WP_Query( $args );

            if ( $realty_query->have_posts() ) {
                while ( $realty_query->have_posts() ) {
                    $realty_query->the_post();
                    include(THEME_DIR . '/template-parts/loop/realty-item.php');
                }
            }
            else {
                echo 'Недвижимости не найдено...';
            }

            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>
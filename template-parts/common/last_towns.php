<section>
    <div class="container mt-5">
        <div class="row">

            <div class="col-12">
                <h2>Города</h2>
            </div>

            <?php
            $args = array(
                'post_type' => 'town',
            );
            
            $town_query = new WP_Query( $args );

            if ( $town_query->have_posts() ) {
                while ( $town_query->have_posts() ) {
                    $town_query->the_post();
                    include(THEME_DIR . '/template-parts/loop/town-item.php');
                }
            }
            else {
                echo 'Городов не найдено...';
            }

            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>
<?php

get_header();

?>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Тестовое задание</h1>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container mt-5">
        <div class="row">

            <div class="col-12">
                <h2>Недвижимость</h2>
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

            if( $realty_query->max_num_pages > 1 ){
                $id_button_more = 'realty_show_more';
                include(THEME_DIR . '/template-parts/button_more.php');
            }

            wp_reset_postdata();
            ?>

            <script>
                var realty_page = 1;
                var realty_max_num_pages = '<?php echo $realty_query->max_num_pages; ?>';
            </script>

        </div>
    </div>
</section>
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

            if( $town_query->max_num_pages > 1 ){
                $id_button_more = 'town_show_more';
                include(THEME_DIR . '/template-parts/button_more.php');
            }

            wp_reset_postdata();
            ?>

            <script>
                var town_page = 1;
                var town_max_num_pages = '<?php echo $town_query->max_num_pages; ?>';
            </script>

        </div>
    </div>
</section>
<?php

get_footer();

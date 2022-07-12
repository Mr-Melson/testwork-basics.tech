<?php

/**
 * Search template file.
 *
 * @package Understrapchild\Template
 */

get_header();

?>
<section>
    <div class="container mt-5">
        <div class="row">

            <div class="col-12">
                <h1>Поиск: <?php echo get_search_query() ?></h1>
            </div>

            <?php
            if( have_posts() ):
                while (have_posts()) {
                    the_post();
                    
                    include(THEME_DIR . '/template-parts/loop/search-item.php');
                }
            else:
                echo '<div class="col-12"><h2>Записей не найдено...</h2></div>';
            endif;
            ?>

            <div class="col-12 mt-5">
                <div class="pagination">
                    <?php echo paginate_links(); ?>
                </div>
            </div>

        </div>
    </div>
</section>
<?php

get_footer();

<?php
/*
 * Archive Page
*/

get_header();

$type = get_post_type();
$type_label = get_post_type_object($type)->label;
?>
<section>
    <div class="container mt-5">
        <div class="row">

            <div class="col-12">
                <h1><?php echo $type_label; ?></h1>
            </div>

            <?php
            if( have_posts() ):
                while (have_posts()) {
                    the_post();
                    
                    include(THEME_DIR . '/template-parts/loop/'.$type.'-item.php');
                }
            else:
                echo '<h2>Записей не найдено...</h2>';
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
get_footer(); ?>
<?php
get_header();
?>
<section>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col text-center">
                <h1>404</h1>
                <h2>Страница не найдена</h2>
                <?php echo get_field('desc_404', 'options'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
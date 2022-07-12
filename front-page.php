<?php

get_header();

if( have_rows('tempates') ):
    while ( have_rows('tempates') ) : the_row();
  
      switch ( get_row_layout() ) {

        case 'promo':
            include(THEME_DIR . '/template-parts/common/promo.php');
            break;

        case 'last_realty':
            include(THEME_DIR . '/template-parts/common/last_realty.php');
            break;

        case 'last_towns':
            include(THEME_DIR . '/template-parts/common/last_towns.php');
            break;

        case 'wpide':
            include(THEME_DIR . '/template-parts/common/wpide.php');
            break;
      }
  
    endwhile;
endif;

get_footer();

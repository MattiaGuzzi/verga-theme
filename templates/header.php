<header class="header">
  <a class="header__logo icon icon-pittogramma" href="<?= esc_url(home_url('/')); ?>">
  </a>
  <nav class="header__nav">
      <div class="header__catalog">
          <a class="catalog_btn" href="#"><?php _e('Catalogo','verga') ?></a>
          </div>
    <?php
    if (has_nav_menu('primary_navigation')) :
     /* wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'walker' => 'walker_texas_ranger']);*/
   bem_menu('primary_navigation', 'menu');
    endif;
    ?>
  </nav>
  <div class="header__preventivi">
    <a href="#"  class="button">
     <?php _e('Preventivo', 'verga') ?>
    </a>
  </div>
</header>

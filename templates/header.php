<header class="header">
  <div class="header__logo">

  </div>
  <nav class="header__nav">
    <?php
    bem_menu('menu_header', 'primary-menu', 'my-menu--active');
  /*  if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
    endif;*/
    ?>
  </nav>
  <div class="header__preventivi">
    <a href="#"  class="button">
     <?php _e('Preventivo', 'verga') ?>
    </a>
  </div>
</header>

<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
  <?php
  if (has_nav_menu('Footer menu')) :
    /* wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'walker' => 'walker_texas_ranger']);*/
    bem_menu('Footer menu', 'menu');
  endif;
  ?>
</footer>

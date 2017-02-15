<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
  <?php
  if (has_nav_menu('footer_navigation')) :
    bem_menu('footer_navigation', 'menu menu__footer');
  endif;
  ?>
</footer>

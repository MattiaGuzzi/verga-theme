<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
  <?php
  if (has_nav_menu('footer')) :
    bem_menu('footer', 'menu');
  endif;
  ?>
</footer>

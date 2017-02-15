<footer class="footer">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
  <?php
  if (has_nav_menu('footer_navigation')) :
    bem_menu('footer_navigation', 'footer__menu');
  endif;
  ?>
</footer>

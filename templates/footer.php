<footer>
    <div class="footer footer--shrink footer--grow-md">
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer left")) : ?>
    <?php endif; ?>
    <?php /*dynamic_sidebar('sidebar-footer'); */ ?>
    <?php
    if (has_nav_menu('footer_navigation')) :
        bem_menu('footer_navigation', 'menu');
    endif;
    ?>
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer right")) : ?>
    <?php endif; ?>
    </div>
    <div class="subfooter">
        <p><?php _e('Credits','verga')?></p>
        <a class="icon icon-bspkn" href="#"></a>
    </div>
</footer>


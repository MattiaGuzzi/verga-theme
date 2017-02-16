<header class="header header--shrink">
    <a class="header__logo icon icon-pittogramma" href="<?= esc_url(home_url('/')); ?>">
    </a>
    <nav class="header__nav">

        <?php
        if (has_nav_menu('primary_navigation')) :
            /* wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'walker' => 'walker_texas_ranger']);*/
            bem_menu('primary_navigation', 'menu');
        endif;
        ?>
    </nav>
    <div class="header__preventivi">
        <a href="#" class="button">
            <label class="button__label"><?php _e('Preventivo', 'verga') ?></label>
        </a>
    </div>
</header>

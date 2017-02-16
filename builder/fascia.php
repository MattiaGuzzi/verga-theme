<section class="divider">
    <h2><?php the_sub_field('titolo'); ?></h2>
    <p><?php the_sub_field('paragrafo'); ?></p>
    <a href="<?php the_sub_field('link_pagina') ?>" class="<?php  echo (get_sub_field('colore_sfondo')=='red') ? 'button' : 'button--reverse' ?>"><?php the_sub_field('testo_bottone') ?></a>
</section>
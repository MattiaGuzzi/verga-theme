<section class="divider<?php  echo (get_sub_field('colore_sfondo')=='red') ? ' divider--enphasis' : '' ?> divider--full divider--shrink divider--grow-lg">
    <h2 class="divider__title"><?php the_sub_field('titolo'); ?></h2>
    <div class="divider__paragraph divider__paragraph--grow-lg"><?php the_sub_field('paragrafo'); ?></div>
    <a href="<?php the_sub_field('link_pagina') ?>" class="<?php  echo (get_sub_field('colore_sfondo')=='red') ? ' button--reverse' : ' button' ?>"><label class="button__label"><?php the_sub_field('testo_bottone') ?></label></a>
</section>
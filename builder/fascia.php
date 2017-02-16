<section class="divider<?php  echo (get_sub_field('colore_sfondo')=='red') ? ' divider--red' : '' ?>">
    <h2 class="divider__title title--shrink title--grow-md"><?php the_sub_field('titolo'); ?></h2>
    <p class="divider__paragraph paragraph--shrink paragraph--grow-md"><?php the_sub_field('paragrafo'); ?></p>
    <a href="<?php the_sub_field('link_pagina') ?>" class="<?php  echo (get_sub_field('colore_sfondo')=='red') ? ' button' : ' button--reverse' ?>"><?php the_sub_field('testo_bottone') ?></a>
</section>
<?php $wcols = 12/get_sub_field('n_cols') ?>
<section class="section section--grid">
    <?php while (have_rows('cols')) : the_row(); ?>
    <div class="section__cell section__cell-s<?php echo $wcols?>  section__cell--shrink section__cell--grow-lg">
        <?php if(get_sub_field('immagine') != '') :?>
            <div class="section__cell--background" style="background-image: url('<?php the_sub_field('immagine') ?>')"></div>
        <?php endif ?>
        <?php if(get_sub_field('titolo') != '') :?>
            <h2 class="section__cell--title"><?php the_sub_field('titolo') ?></h2>
        <?php endif ?>
        <?php if(get_sub_field('paragrafo') != '') :?>
            <div class="section__cell--paragraph section__cell--paragraph--grow-lg"><?php the_sub_field('paragrafo') ?></div>
        <?php endif ?>
        <?php if(get_sub_field('link') != '') :?>
            <div class="section__cell--button"><a href="<?php the_sub_field('link') ?>" class="button"><span class="button__label"><?php the_sub_field('testo_bottone') ?></span></a></div>
        <?php endif ?>
    </div>
    <?php endwhile; ?>
</section>

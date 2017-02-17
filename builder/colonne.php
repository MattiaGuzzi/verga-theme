<?php $wcols = 12/get_sub_field('n_cols') ?>
<section class="section section--grid">
    <?php while (have_rows('cols')) : the_row(); ?>
    <div class="section__cell section__cell-s<?php echo $wcols?>">
        <?php if(get_sub_field('immagine') != '') :?>
            <div class="section__cell--background" style="background-image: url('<?php the_sub_field('immagine') ?>')"></div>
        <?php endif ?>
        <?php if(get_sub_field('titolo') != '') :?>
            <h2 class="section__cell--title"><?php the_sub_field('titolo') ?></h2>
        <?php endif ?>
        <?php if(get_sub_field('paragrafo') != '') :?>
            <p class="section__cell--paragraph"><?php the_sub_field('paragrafo') ?></p>
        <?php endif ?>
        <?php if(get_sub_field('link') != '') :?>
            <a href="<?php the_sub_field('link') ?>" class="button section__cell--button"><span class="button__label"><?php the_sub_field('testo_bottone') ?></span></a>
        <?php endif ?>
    </div>
    <?php endwhile; ?>
</section>

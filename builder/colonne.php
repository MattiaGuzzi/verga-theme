<?php $wcols = 12/get_sub_field('n_cols') ?>
<section class="section section--grid">
    <?php while (have_rows('cols')) : the_row(); ?>
    <div class="section__cell section__cell-s<?php echo $wcols?>"></div>
    <?php endwhile; ?>
</section>

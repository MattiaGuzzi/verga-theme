<?php $file =  get_sub_field('fascia_full') ? 'full.php':'normal.php';
include(locate_template('builder/'.get_row_layout().'-'.$file, false, false)) ?>


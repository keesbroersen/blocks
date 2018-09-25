<?php
if (have_rows('contentblocks')) {
    while (have_rows('contentblocks')) {
        the_row();

        if (get_row_layout() == 'content-block') {
            get_template_part('_contentblocks/content-block');
        }elseif(get_row_layout() == 'image-block') {
            get_template_part('_contentblocks/image-block');
        }
    }
}

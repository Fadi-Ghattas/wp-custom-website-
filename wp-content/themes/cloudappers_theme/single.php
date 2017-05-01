<?php

if (have_posts()) : while (have_posts()) : the_post();

    get_template_part('single-templates/single-' . get_post_type(), get_post_format());

endwhile;

else:

    get_404_template();

endif;

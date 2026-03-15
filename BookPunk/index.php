<?php get_header(); ?>

<div class="container">

<h1>Последние записи</h1>

<?php

if(have_posts()):

while(have_posts()):
the_post();

get_template_part('template-parts/content','book');

endwhile;

endif;

?>

</div>

<?php get_footer(); ?>
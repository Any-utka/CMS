<?php get_header(); ?>

<section class="hero">

<div class="hero-bg"
style="background-image:url('<?php echo get_template_directory_uri();?>/assets/image/library.png')">
</div>

<div class="hero-overlay"></div>

<div class="hero-text-wrapper">
    <div class="hero-text">
        <h2>Добро пожаловать в библиотеку</h2>
        <p>Лучшие книги и статьи</p>
    </div>
</div>

</section>


<section class="container">

<h2>Последние книги</h2>

<?php

$query = new WP_Query([
'post_type'=>'post',
'posts_per_page'=>6
]);

if($query->have_posts()):

while($query->have_posts()):
$query->the_post();

get_template_part('template-parts/content','book');

endwhile;

endif;

wp_reset_postdata();

?>

</section>

<?php get_footer(); ?>
<article class="book-card">

<a href="<?php the_permalink();?>">

<?php if(has_post_thumbnail()): ?>

<div class="book-image">

<?php the_post_thumbnail('medium');?>

</div>

<?php endif; ?>

<h3><?php the_title();?></h3>

<p class="book-author">
Автор: <?php the_author(); ?>
</p>

<p>

<?php the_excerpt(); ?>

</p>

</a>

</article>
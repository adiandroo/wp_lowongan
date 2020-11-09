<?php
/* 
Template Name: Contact Us
*/
?>

<?php get_header(); ?>
<section class="page-wrap">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <br />
        <div class="card">
            <div class="card bg-light text-dark">
                <div class="card-body"><?php get_template_part('includes/section', 'content'); ?></div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
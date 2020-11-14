<?php
$args = [
    'post_type' => 'jobs',
];
$query = new WP_Query($args);
?>
<?php if ($query->have_posts()) : ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="card">
            <div class="card-body">
                <a href="<?php the_post_thumbnail_url('blog-large'); ?>">
                    <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="img_fluid mb-3 img-thumbnail">
                </a>
                <h3><?php the_title(); ?></h3>
                <?php the_field('registration'); ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
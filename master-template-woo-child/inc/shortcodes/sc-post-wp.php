<?php

if(!function_exists('show_post_wp_func')){
    function show_post_wp_func($atts){
        $atts = shortcode_atts(
            array(
                'post_type' => 'post',
                'posts_per_page' => '3'
            ), 
            $atts, 
            'show_post_wp'
        );

        $query = new WP_Query($atts);

        if($query->have_posts()):
        ?>
        <div class="row">
            <?php while($query->have_posts()): $query->the_post(); ?>
                <div class="col-12 col-md-4 p-3">
                    <div class="cont-card-post">
                        <div class="cont-card-img-post">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                        <div class="cont-card-desc-post">
                        <span class="date-post">
                            <?php the_date( 'd M, Y'); ?>
                        </span>
                        <a href="<?php the_permalink(); ?>">
                            <p class="title-post mt-3"><?php the_title(); ?></p>
                        </a>
                        <p class="desc-post"><?php echo excerpt('20'); ?></p>
                        <a href="<?php the_permalink(); ?>" class="button-master btn-primary btn-card mt-3">
                            LEER MÁS
                        </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
        endif;

        wp_reset_query();
    }

    add_shortcode( 'show_post_wp', 'show_post_wp_func' );
}
<?php

if(!function_exists('cats_slider_func')){
    function cats_slider_func($atts){
        $atts = shortcode_atts( array(
            'id_excl' => ''
        ),
        $atts, 
        'cats_slider');

        $terms = get_terms(array(
            'taxonomy' => 'product_cat',
            'exclude' => array($atts['id_excl'])
        ));
        ?>
        <div class="slick-theme slick-cats">
			<?php 
                foreach($terms as $term):
                $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );

                if(strlen($thumbnail_id) > 0){
                    $image = "<img src=".wp_get_attachment_url( $thumbnail_id )." />";
                } else {
                    $image = "<img src='".get_stylesheet_directory_uri()."/assets/img/image-myv-default.png' />";
                }
            ?>
                
                <a href="<?php  echo get_term_link($term->term_id, "product_cat"); ?>" class="item-cat">
                    <figure>
                        <?php echo $image; ?>
                        <figcaption>
                            <h4><?php echo $term->name ?></h4>
                            <div class="cont-arrow">
                                <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30.1147 46.1145L33.8853 49.8852L51.7707 31.9998L33.8853 14.1145L30.1147 17.8852L41.5627 29.3332H16V34.6665H41.5627L30.1147 46.1145Z" fill="white"/>
                                </svg>
                            </div>
                        </figcaption>
                    </figure>                   
                </a>
            <?php endforeach; ?> 
		</div>

        <?php
    }

    add_shortcode( 'cats_slider', 'cats_slider_func' );
}
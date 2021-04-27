<div class="box-buttons-wc">
    <ul class="nav">
        <li class="nav-item item-search"><?php echo do_shortcode('[fibosearch]'); ?></li>
        <li class="nav-item"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="nav-link button-icon"><i class="fas fa-user-circle"></i></a></li>
        <li class="nav-item"><a href="<?php echo wc_get_cart_url(); ?>" class="nav-link button-icon"><i class="fas fa-shopping-cart"></i></a></li>
    </ul>
</div>
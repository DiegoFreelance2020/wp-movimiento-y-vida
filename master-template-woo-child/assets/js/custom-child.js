console.log('El custom js funciona')

jQuery(function ($) {
	$('.product-category .woocommerce-loop-category__title .count').after(`<div class="cont-arrow"><svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M30.1147 46.1145L33.8853 49.8852L51.7707 31.9998L33.8853 14.1145L30.1147 17.8852L41.5627 29.3332H16V34.6665H41.5627L30.1147 46.1145Z" fill="white"/>
    </svg>
    </div>`)
});
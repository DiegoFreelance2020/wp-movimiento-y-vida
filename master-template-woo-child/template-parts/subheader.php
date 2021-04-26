<?php
/**
 * Template part for displaying subheaders
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Master_Template
 */

global $geniorama;


?>

<?php if(!is_product()): 
    $bg_image_url = "";

    if(is_product_category()){
        $term = get_queried_object();
        $bg_image = get_field('background', $term);
        $bg_image_url = $bg_image['url'];

    } else {
        $bg_image_url = add_banner_subheader();
    }

    ?>


    <section class="sub-heading-section <?php echo add_class_subheader('banner');?> mb-5"<?php if($geniorama['opt-bg-subheaders'] === '1'):?> style="background-image: url('<?php echo $bg_image_url; ?>')" <?php endif; ?>>
        <div class="container">
            <div class="position-relative content-box <?php echo add_class_subheader('alignment'); ?>">
                <h1><?php  
                    if (is_archive()) {
                        the_archive_title();
                    } else {
                        the_title();
                    }
                ?></h1>
                <?php if($geniorama['breadcrumbs-on-off']): ?>
                    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                        <?php 
                            if (function_exists('bcn_display')) {
                                bcn_display();
                            }
                        ?>
                    </div>
                <?php endif; ?>
                
                <?php 
                    if(is_product_category()):
                        $term = get_queried_object();
                        $video= get_field('video', $term);

                        $yt_video = explode("=", $video);
                        $yt_pre = "https://www.youtube.com/embed/";
                        $yt_embed = $yt_pre . $yt_video[1];
                ?>

                <button class="cont-button-play mt-4" data-toggle="modal" data-target="#modalVideoCat" data-video="<?php echo $yt_embed; ?>">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="40" cy="40" r="40" fill="#F68B3D"/>
                        <path d="M39.5 18.4167C27.3232 18.4167 17.4166 28.3233 17.4166 40.5C17.4166 52.6768 27.3232 62.5833 39.5 62.5833C51.6767 62.5833 61.5833 52.6768 61.5833 40.5C61.5833 28.3233 51.6767 18.4167 39.5 18.4167ZM39.5 58.1667C29.759 58.1667 21.8333 50.241 21.8333 40.5C21.8333 30.759 29.759 22.8333 39.5 22.8333C49.2409 22.8333 57.1666 30.759 57.1666 40.5C57.1666 50.241 49.2409 58.1667 39.5 58.1667Z" fill="white"/>
                        <path d="M32.875 51.5417L50.5417 40.5L32.875 29.4583V51.5417Z" fill="white"/>
                    </svg>
                </button>

                <?php endif; ?>
            </div>
        </div>
    </section>

<!-- Modal -->
<div class="modal fade modal-video-cat" id="modalVideoCat" tabindex="-1" aria-labelledby="modalVideoCat" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
     <div class="modal-content">
        <iframe src="<?php echo $yt_embed; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
     </div>
  </div>
</div>
<?php else: ?>
<div class="sub-heading-product text-center p-3 mb-4">
    <div class="container">
        <?php if($geniorama['breadcrumbs-on-off']): ?>
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                <?php 
                    if (function_exists('bcn_display')) {
                        bcn_display();
                    }
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php endif; ?>
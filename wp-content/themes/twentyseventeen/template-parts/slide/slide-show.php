<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 3,
    'meta_key'        => 'slider',
    'order' => 'desc'
);
$the_query = new WP_Query($args);
?>
<div class="splide">
    <div class="splide__track">
        <ul class="splide__list">
            <?php
                while($the_query->have_posts()):
                    $the_query->the_post();
            ?>
            <li class="splide__slide">
                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="slider">
                <div class="text-content">
                    <h2 class="display-4">New Arrilvals</h2>
                    <ul class="type-item">
                        <li class="product-item">
                            <a href="#women-collection" class="shop-now">
                                Women Collection
                            </a>
                        </li>
                        <li class="product-item">
                            <a href="#men-collection" class="shop-now">
                                Men Collection
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php
                endwhile;
            ?>
            
            <!-- <li class="splide__slide">
                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/S2.jpg" alt="slide2">
                <div class="text-content">
                    <h2 class="display-4">White Sneakers</h2>
                    <a href="#shop-now" class="shop-now">Show now</a>
                </div>
            </li>
            <li class="splide__slide">
                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/S3.jpg" alt="slide3">
                <div class="text-content">
                    <h2 class="display-4">Linen Collection</h2>
                    <a href="#shop-now" class="shop-now">Show now</a>
                </div>
            </li> -->
        </ul>
    </div>
</div>
<?php
wp_reset_query();
?>
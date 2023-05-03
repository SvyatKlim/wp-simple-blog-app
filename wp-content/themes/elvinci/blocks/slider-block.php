<?php
/**
 * Block template file: slider-block.php
 *
 * Slider Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
?>
<?php if (have_rows('slides')) : ?>
    <section class="slider-with-text pt-90 pb-90">
        <div class="swiper-container js-slider-with-text">
            <div class="swiper-wrapper">
                <?php
                while (have_rows('slides')) : the_row();
                ?>
                    <div class="swiper-slide">
                        <div class="slider-with-text__img">
                        <?php webp_picture(get_sub_field('image')['url'], get_sub_field('image')['alt'] ?? __('Slide Image','elvinci')); ?>
                         </div>
                        <div class="slider-with-text__info">
                        <h2 class="title title-decor mr-10"><?php the_sub_field('title'); ?></h2>
                        <p class="description"><?php the_sub_field('description'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons-wrapper">
            <div class="swiper-button-next swiper-custom-button swiper-button-black">
                <?= file_get_contents(get_template_directory_uri() . '/assets/img/slider-arrow.svg')?>
            </div>
            <div class="swiper-button-prev swiper-custom-button swiper-button-black">
                <?= file_get_contents(get_template_directory_uri() . '/assets/img/slider-arrow.svg')?>
            </div>
            </div>
    </section>
<?php endif; ?>


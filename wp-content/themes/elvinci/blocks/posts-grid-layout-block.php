<?php
/**
 * Block template file: posts-grid-layout-block.php
 *
 * Posts Grid Block Template.
 *
 */
?>
<?php if (have_rows('posts') && !empty(get_field('title'))) :
    $title = get_field('title');
    $featured_posts = get_field('posts');
    $button_name = get_field('cta_button_name');
    ?>
    <section class="posts-grid-layout d-flex-column pt-90 pb-90">
        <h2 class="h1"><?= $title; ?></h2>
        <?php if ($featured_posts): ?>
            <div class="posts-grid-layout__wrapper">
                <?php foreach ($featured_posts as $featured_post):
                    $permalink = get_permalink($featured_post->ID);
                    $title = get_the_title($featured_post->ID);
                    ?>
                    <div class="posts-grid-layout__item">
                        <a href="<?php echo esc_url($permalink); ?>" class="posts-grid-layout__item__img">
                            <?php webp_picture(get_the_post_thumbnail_url($featured_post->ID), $title); ?>
                            <span class="posts-grid-layout__item__tag">
                                <?php
                                $posttags = get_the_tags($featured_post->ID);
                                if ($posttags) {
                                    foreach ($posttags as $tag) {
                                        echo $tag->name . ' ';
                                    }
                                }
                                ?>
                            </span>
                        </a>
                        <div class="posts-grid-layout__item__info">
                            <div class="posts-grid-layout__item__info--date small-text"><?= get_the_date('d.m.Y', $featured_post->ID); ?></div>
                            <div class="posts-grid-layout__item__info--author small-text"><?= get_the_author($featured_post->ID); ?></div>
                        </div>
                        <a class="posts-grid-layout__item__title h2 title-decor"
                           href="<?= esc_url($permalink); ?>"><?= esc_html($title); ?></a>
                        <p class="posts-grid-layout__item__description <?php echo empty($featured_post->post_excerpt) ? 'mb-0' : ''; ?>"><?php echo esc_html($featured_post->post_excerpt); ?></p>
                        <a class="cta-button link"
                           href="<?= esc_url($permalink); ?>"><?= esc_html($button_name) ?? __('Ansehen', 'elvinci'); ?>
                            <span class="cta-button__arrow"> <?= file_get_contents(get_stylesheet_directory_uri() . '/assets/img/cta-arrow.svg'); ?> </span>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>

<?php
/**
 * The template for displaying the footer
 *
 * Contains footer section and the closing of the .main__inner div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elvinci
 */

$footer_excerpt = get_field('footer_excerpt', 'option');
$socials_title = get_field('socials_title', 'option');
$socials = get_field('socials', 'option');
?>


</main>
<footer class="footer">
    <div class="container">
        <?php if (!empty($footer_excerpt)) : ?>
            <div class="footer__info"><?= esc_html($footer_excerpt); ?></div>
        <?php endif; ?>
        <ul class="footer__categories">
            <?php
            $args = array(
                'taxonomy' => 'category',
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => false,
            );
            $the_query = new WP_Term_Query($args);
            foreach ($the_query->get_terms() as $term) {
                ?>
                <a href="<?= get_term_link($term); ?>" class="footer__categories__item">
                    <?php echo $term->name; ?>
                </a>
                <?php
            }
            ?>
        </ul>
        <ul class="footer__tags">
            <?php
            $args = array(
                'taxonomy' => 'post_tag',
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => false,
            );
            $the_query = new WP_Term_Query($args);
            foreach ($the_query->get_terms() as $term) {
                ?>
                <a href="<?= get_term_link($term); ?>" class="footer__tags__item">
                    <?php echo $term->name ; ?>
                </a>
                <?php
            }
            ?>
        </ul>
    <?php if (!empty($socials)) : ?>
        <div class="social">
            <h4 class="social__title"> <?= !empty(esc_html($socials_title)) ? esc_html($socials_title) : __('Follow us:', 'elvinci') ?></h4>
            <div class="social__items">
                <?php foreach ($socials as $social) : ?>
                    <a href="<?= esc_attr($social['link']['url']); ?>" class="social__item"
                       target="<?= esc_html($social['link']['target']); ?>">
                        <?= file_get_contents($social['icon']['url']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
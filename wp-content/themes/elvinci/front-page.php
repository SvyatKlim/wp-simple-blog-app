<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package elvinci
 */

get_header();
?>
    <div class="purple-bg">
        <div class="container pt-after-header d-flex-column">
            <?php while (have_posts()) :
                the_post();
                the_content();
            endwhile; ?>
        </div>
    </div>
<?php
get_footer();
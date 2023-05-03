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
    <section class="section pt-after-header">
        <h1> 404 :( </h1>
        <br>
        <h2>Page not found.</h2>
    </section>
<?php
get_footer();
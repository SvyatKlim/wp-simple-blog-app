<?php
/*
 * A custom nav walker to create navigation menus in plain <a> tags. 
 * That is the <ul> and <li> tags are not present. Very useful if you want to create 
 * simple links that can be centered with a simple text-align:center on the containing element.
 *
 * @link https://gist.github.com/kosinix/5544535
 *
 */

class Basic_Walker extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. May be used for padding.
     * @param array $args Additional strings.
     * @return void
     */

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $menu_items = wp_get_nav_menu_items($args->menu->term_id);
        $count = ceil(count($menu_items) / 2);
        $middle_element = $menu_items[$count]->ID;
        $is_active = '';
        $classes_default = empty($item->classes) ? array() : (array)$item->classes;
        if (in_array('current-menu-item', $classes_default)) {
            $is_active = 'active';
        }

        $classes = [];
        array_push($classes, 'header-nav__item','item-' . $item->menu_order);
        $class_names = ' class="' . implode(' ', $classes) . '"';
        $output .= "<li id='menu-item-$item->ID' $class_names>";

        $attributes = '';
        !empty($item->attr_title)
        and $attributes .= ' title="' . esc_attr($item->attr_title) . '"';
        !empty($item->target)
        and $attributes .= ' target="' . esc_attr($item->target) . '"';
        !empty($item->xfn)
        and $attributes .= ' rel="' . esc_attr($item->xfn) . '"';
        !empty($item->url)
        and $attributes .= ' href="' . esc_attr($item->url) . '"';

        $title = apply_filters('the_title', $item->title, $item->ID);


        if ($item->url && $item->url != '#') {
            $item_output = '<a class="header-nav__link js-link-hash ' . $is_active . '" ' . $attributes . '>'
                . $title
                . '</a> ';

        } else {
            $item_output = '<span class="header-nav__link disabled">'
                . $title
                . '</span>';

        }

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
            , $item_output
            , $item
            , $depth
            , $args
        );
    }
}
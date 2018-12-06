<?php

register_nav_menu('main-menu', __('Main menu'));

register_nav_menu('footer-menu', __('Footer menu'));


/*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items */
/*-----------------------------------------------------------------------------------*/

/*function remove_admin_menu_items() {
    $remove_menu_items = array(__('Comments'));//array( __('Comments'), __('Tools'), __('Posts'));
    global $menu;
    end ($menu);
    while (prev($menu)){
        $item = explode(' ',$menu[key($menu)][0]);
        if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
        unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'remove_admin_menu_items');*/


add_action('init', 'remove_tags');
function remove_tags(){
    register_taxonomy('post_tag', array());
}

function register_custom_taxonomies() {
    $labels = array (
        'search_items' => 'autor', 
        'edit_item' =>  __('Editar Autor', 'viaro'), 
        'update_item' =>  __('Actualizar Autor', 'viaro'), 
        'add_new_item' =>  __('Añadir nuevo Autor', 'viaro'), 
        'new_item_name' =>  __('Nuevo Autor', 'viaro')
    );
    $args = array( 
        'hierarchical' => true,
        'show_ui' => true,
        'query_var' => true,
        'show_admin_column' => false,
        'label' => __('Autores', 'viaro'),
        'singular_label' => __( 'Autor', 'viaro' ),
        'labels' => $labels
    ); 
    register_taxonomy( 'autor', array ( 'post'), $args);    
}
add_action('init', 'register_custom_taxonomies');

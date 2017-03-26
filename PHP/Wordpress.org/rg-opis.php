<?php
/*
Plugin Name: Opiniones
Description: Posteas opiniones.
Version: Falcata
Author: Raul Gimenez Cortes
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: telwp
Domain Path: /languages
*/
add_action( 'init', 'cpf_register_custom_post_types' );
function cpf_register_custom_post_types() {
register_post_type(
   'opiniones',
   array('public' => true,
        'labels' => array(
        'name' => 'Opinion',
        'add_new_item' => 'Nombre del cliente',
        'add_new' => 'Nueva Opinion'),
        'menu-icon' => 'dashicons-groups',
        'supports' => array(
        'title',
        'editor',
        'excerpt',
        'thumbnail',
        'page-attributes',
        'has_archive'=> true)));
}
//Crear las taxonomias ("Categorias")
add_action( 'init', 'cp1_define_taxonomy' );
function cp1_define_taxonomy() {
   register_taxonomy(
       'info',
       'opiniones',
           array(
           'hierarchical' => true,
           'label' => 'Ocupacion',
           'query_var' => true,
           'rewrite' => true
           )
   );
}
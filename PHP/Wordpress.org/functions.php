<?php

add_filter(
	'body_class',
	'myplugin_add_body_class'
);

function myplugin_add_body_class(
		$classes){
	$classes[] = "weekday" . date("w");
 return $classes;
};

// add_action(
//     'init',
//     'telwp_register_custom_post_types'
// );

// function telwp_register_custom_post_types() {
//     register_post_type( 'personas',array(
//         'public' => true,
//         'labels' => array(
//             'name' => 'Personas',
//             ),
//         )
//     );
// };

add_action( 'init', 'telwp_register_custom_post_types' );
function telwp_register_custom_post_types() {
register_post_type(
   'jugadores',
   array('public' => true,
        'labels' => array(
        'name' => 'Jugadores',
        'add_new_item' => 'Nombre',
        'add_new' => 'Nuevo Jugadores'),
        'menu-icon' => 'dashicons-groups',
        'supports' => array(
        'title',
        'editor',
        'excerpt',
        'thumbnail',
        'page-attributes')));
}
//Crear las taxonomias ("Categorias")
add_action( 'init', 'telwp_define_department_taxonomy' );
function telwp_define_department_taxonomy() {
   register_taxonomy(
       'posicion',
       'jugadores',
           array(
           'hierarchical' => true,
           'label' => 'Posicion',
           'query_var' => true,
           'rewrite' => true
           )
   );
}
// Caja 1
add_action( 'init', 'telwp_register_meta_fields' );
function telwp_register_meta_fields() {
   register_meta( 'jugadores', 'telwp_position', [
       'description' => 'Equipo',
       'single' => true,
       'sanitize_callback' => 'sanitize_text_field',
       'auth_callback' => 'telwp_custom_fields_auth_callback',
       'show_in_rest' => true
       ]);
}

function telwp_custom_fields_auth_callback($allowed, $meta_key, $post_id, $user_id, $cap,$caps ) {
   if( 'jugadores' == get_post_type( $post_id ) && current_user_can( 'edit_jugadores', $post_id ) ) {
       $allowed = true;
   } else {
       $allowed = false;
   }
return $allowed;
}

add_action( 'add_meta_boxes', 'telwp_meta_boxes' );
function telwp_meta_boxes() {
   add_meta_box( 'telwp-rrss-box', 'Equipo', 'telwp_rrss_box_callback', 'jugadores','side', 'high' );
}

function telwp_rrss_box_callback( $post ) {
   wp_nonce_field( 'telwp_rrss_box', 'telwp_rrss_box_noncename' );
   $post_meta = get_post_custom( $post->ID ); ?>
<p>
<label class="label" for="telwp_position">Equipo</label>
<input name="telwp_position" id="telwp_position" type="text" value="<?php echo esc_attr( get_post_meta( $post->ID, 'telwp_position', true) ); ?>">
</p><?php
}

add_action( 'save_post_jugadores', 'telwp_save_custom_fields' );
function telwp_save_custom_fields( $post_id ){
 if (! isset( $_POST['telwp_rrss_box_noncename']) || ! wp_verify_nonce( $_POST['telwp_rrss_box_noncename'], 'telwp_rrss_box' ) ) {
 return;
 }
 if ( isset( $_POST['telwp_position'] ) && $_POST['telwp_position'] != "" ) {
 update_post_meta( $post_id, 'telwp_position',
$_POST['telwp_position'] );
 } else {
 delete_post_meta( $post_id, 'telwp_position' );
 }
}
// Fin caja 1


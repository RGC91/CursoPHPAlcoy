<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Ejemplo de hacer una pagina "tipo" para mostrar un custom post type
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 * Template Name: Equipo
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

		<?php
            //creamos una instancia
                   $query = new WP_Query(
                               array(
                                   'post_type' => 'jugadores'
                                   ));
                   //si query (pagina actual) tiene post, ejecutara lo de dentro del if
                       if ( $query->have_posts() ) {
                   //hacemos un bucle mientras haya post
                       while ( $query->have_posts() ) {
                   //por cada post
                           echo "<div class='post-136 page type-page status-publish hentry'><h1>";
                       $query->the_post();
                       echo "</h1>";
                   //mostramos el titulo
                       echo "<h2>";
                       the_title();
                       echo "</h2>";
                       echo "<p>Equipo: ";
                       echo get_post_meta(get_the_ID(),'telwp_position', true );
                       echo "</p>";
                   //y el contenido
                       echo "<div>";
                       the_content();
                       echo "</div>";


                       echo "<div>";

                       the_post_thumbnail([200,200]);
                       echo "</div></div>";
                       }
                       } else {
                       // Añadir en caso de que no haya nada que mostrar.
                       }

                       wp_reset_postdata();

            ?>

		<?php
			/**
			 * rock_star_comment_section hook
			 *
			 * @hooked rock_star_get_comment_section - 10
			 */
			do_action( 'rock_star_comment_section' );
		?>

	<?php endwhile; // end of the loop. ?>

<?php
get_sidebar();
get_footer(); ?>
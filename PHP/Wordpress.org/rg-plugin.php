<?php
/*
Plugin Name: hola_holita_widget Example Plugin
Version: Katana
Author: Raul Gimenez
Description: Este plugin activa un widget
*/
// La nueva clase debe heredar de WP_Widget
class hola_holita_widget extends WP_Widget
{
    // Constructor del Widget
    public function __construct()
    {
        $widget_details = array(
        'classname' => 'hola_holita_widget',
        'description' => 'Frases de Futurama'
        );
    parent::__construct( 'hola_holita_widget', 'Futurama Quotes', $widget_details );
    }
    // Construye el código para mostrar el widget públicamente
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo "<p>Futurama Quotes</p><br>";
        function hello_dolly_get_lyric() {
        /** These are the lyrics to Hello Dolly */
         $lyrics = "Leela Futurama Quotes: (Amy After Bender destroys Fry's tent) Bender, wasn't that Fry's Tent?
         (Bender Responds Scoffing) Bender, Mominey mum meh.
         (Leela) Bender Raises a good point. Where is Fry?
        (Zoidberg) Did you see me escaping? I was all like, 'WOO WOO WOO WOO!'
        (Zap) If we can hit the bullseye, the rest of the dominoes will fall like a house of cards. Checkmate!
        (Zap) I'm the man with no name... Zapp Brannigan.
        (Fry after Lurh refuses to give his nose back) Alright, I give up, I guess I'll just go home and marry a skunk.
        (bender) professor, make a woman out of me (professer) oh, i think we should just be friends
        (Zap) We don't know anything about their race, history, or culture, but one thing's for sure. They stand for everything we stand against.
        (Bender) There we were in the park when suddenly some old lady says I stole her purse. I chucked the professor at her but she kept coming. So I had to hit her with this purse I found.
        (Zap) If we can hit the bullseye, the rest of the dominoes will fall like a house of cards. Checkmate!
        (bender) professor, make a woman out of me (professer) oh, i think we should just be friends
        (Zap) You win again, gravity!
        (Hedonism Bot) Ah, Fry, congratulations. Your latest performance was as delectable as dipping my bottom over and over into a bath of the silkiest oils and creams. (Fry) Thank you, sir. That's exactly what I was going for.
        (Fry) Of course I've been up all night! Not because of caffeine, it was insomnia. I couldn't stop thinking about coffee. I need a nap. Zzzzz Coffee time!
        (Zap) You'd sacrifice this beautiful woman for a moderately attractive ape? You've been smoking some bad granola.
        (Zap) You'd sacrifice this beautiful woman for a moderately attractive ape? You've been smoking some bad granola.
        (Lucy Liu-bot) You're cute! (Fry) No, you are! (Lucy Liu-bot) No, you! (Fry) No, you! (Lucy Liu-bot) No, you! (Fry) No, you! (Professor Hubert Farnsworth) Oh dear, she's stuck in an infinite loop and he's an idiot!
        (Zap) What makes a good man go neutral? Lust for gold? Power? Or were you just born with a heart full of neutrality?
        (Leela after asked by Hermes to sign a waiver) Look, I don't know about your previous captains, but I intend to do as little dying as possible. (Hermes) Oh ho ho ho ha ha...Sign the paper.
        Leela Futurama Quotes: (Amy After Bender destroys Fry's tent) Bender, wasn't that Fry's Tent? (Bender Responds Scoffing) Bender, Mominey mum meh. (Leela) Bender Raises a good point. Where is Fry?
        (Zoidberg to Fry) Now open your mouth and lets have a look at that brain. No, no, not that mouth! (Fry) Well I only have one. (Zoidberg) Really??! (Fry) Uh, is there a human Doctor around? (Zoidberg) Young lady, I'm an expert on humans. Now pick a mouth, open it and say 'Yuh da da da DAAA' (Fry attempting to mimic zoidberg's language) 'Yuh duh da da duh da da da' (Zoidberg) What?! My mother was a Saint! Get out!
        (Zap) The spirit is willing, but the flesh is spongy and bruised.
        (Zoidberg) As for me, I design mansions, and then live in them. Oh I'm lying! I'm an appalling failure!
        (Zap) I'm the man with no name... Zapp Brannigan.
        (Zap) As you all know the key to victory is the element of surprise. Surprise!
        (Bender) There we were in the park when suddenly some old lady says I stole her purse. I chucked the professor at her but she kept coming. So I had to hit her with this purse I found.
        (Zoidberg) Friends, help! A guinea pig tricked me!
        (Zap) I'm the man with no name... Zapp Brannigan.
        (Fry after Lurh refuses to give his nose back) Alright, I give up, I guess I'll just go home and marry a skunk.
        (President Truman) Bush-wah! Now, what's your mission? Are you here to make some sort of alien-human hybrid? (Zoidberg) Are you coming on to me? President Truman: Hot Crackers! I take exception to that! (Zoidberg) (leering) I'm not hearing a no...
        (professor)ah to be young again...and also a robot";

        // Here we split it into lines
        $lyrics = explode( "\n", $lyrics );

        // And then randomly choose a line
        return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
    }

    // This just echoes the chosen line, we'll position it later
    function hello_dolly() {
        $chosen = hello_dolly_get_lyric();
        echo "<p>$chosen</p>";
    }
    hello_dolly();
    echo $args['after_widget'];
    }
    // Construye el formulario de administración
    public function form($instance) {
        // Valores por defecto
        $defaults = array('titulo' => 'Futurama', 'descripcion'=> '', 'url' => '');
        // Se hace un merge, en $instance quedan los valores actualizados
        $instance = wp_parse_args((array)$instance, $defaults);
        // Cogemos los valores
        $titulo = $instance['titulo'];
        $descripcion = $instance['descripcion'];
        $url = $instance['url'];
        // Mostramos el formulario
        ?>
        <p>
            Titulo
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('titulo');?>"
                   value="<?php echo esc_attr($titulo);?>"/>
        </p>
        <p>
            Descripcion
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('descripcion');?>"
                   value="<?php echo esc_attr($descripcion);?>"/>
        </p>
        <p>
            URL
            <input class="widefat" type="text" name="<?php echo $this->get_field_name('url');?>"
                   value="<?php echo esc_attr($url);?>"/>
        </p>
        <?php

   }
   public function update($new_instance, $old_instance) {
       // Guarda las opciones del Widget
   }
}
//Tras la creación de la clase debemos usar el conector widgets_init asociado a una acción que llame a la función register_widget().
add_action( 'widgets_init', 'registra_mis_widgets');
function registra_mis_widgets() {
    register_widget( 'hola_holita_widget' );
};
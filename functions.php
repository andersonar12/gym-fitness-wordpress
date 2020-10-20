<?php

//Cuando el tema es activado
function gymfitness_setup(){

    //habilitar imagenes destacadas
    add_theme_support('post-thumbnails');

    //Titulos SEO
    add_theme_support('title-tag');


    // Agregar imagenes de tamaño personalizado

    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('cajas', 400, 375, true);
    add_image_size('mediano', 700, 400, true);
    add_image_size('blog', 966, 644, true);
}
add_action( 'after_setup_theme', 'gymfitness_setup', );

//Menus de nav, agregar mas utilizando el arreglo
function gymfitness_menus() {
    register_nav_menus( array(
        'menu-principal' => __( 'Menu Principal', 'gymfitness' )
    ));
}
add_action('init','gymfitness_menus');


//Scripts y Styles
function gymfitness_scripts_styles() {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.4.1 ');

    if(is_page('galeria') || is_single()):
    wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/css/lightbox.min.css', array(), '1.0.0 ');
    endif;

    //hoja de estilos principal
    wp_enqueue_style( 'style', get_stylesheet_uri(), array('bootstrap'), '1.0.1');
  
   /* Fuentes */
   wp_enqueue_style( 'googlefonts','https://fonts.googleapis.com/css2?family=Staatliches&display=swap' , array('bootstrap'), '1.0.1');
   
   if(is_page('contacto')):
   wp_enqueue_style( 'leaflet-css','https://unpkg.com/leaflet@1.7.1/dist/leaflet.css' , array(), '1.7.1');
   endif;

    //Scripts
    wp_enqueue_script('jquery',get_template_directory_uri() . '/js/jquery.js', array(), '3.4.1 ',true);
    wp_enqueue_script('bootstrap.js',get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.4.1 ',true);
    wp_enqueue_script('popper',get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '4.4.1 ',true);

    if(is_page('galeria') || is_single()):
    wp_enqueue_script('lightbox',get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.2',true);
    endif;

    if(is_page('contacto')):
    wp_enqueue_script('leaflet','https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', array(), '1.7.1',true);
    endif;
    

    wp_enqueue_script('scripts',get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0 ',true);

}
add_action( 'wp_enqueue_scripts', 'gymfitness_scripts_styles' );

//Agrega las clases nav-item de bootstrap al <li> del menu

function gymfitness_li_class($classes,$item,$args) {
    
    $classes[] = 'nav-item';
    
    return $classes;

}
add_filter( 'nav_menu_css_class', 'gymfitness_li_class', 1, 3 );


//Agrega las clases nav-link de bootstrap al <a> del menu

function gymfitness_a_class($atts,$item,$args) {
    
   $atts['class'] = 'nav-link pl-3 pr-3';
    
   return $atts;
};
add_filter( 'nav_menu_link_attributes', 'gymfitness_a_class', 10, 3 );

/* Consultas reutilizables */
require get_template_directory() . '/inc/queries.php';


/* Zona de widgets definidas */
function gymfitness_widgets(){

    register_sidebar(array(
        'name' => 'Sidebar 1', 
        'id'   => 'sidebar_1',
        'before_widget' => '<div class="">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
        ));
  register_sidebar(array(
        'name' => 'Sidebar 2', 
        'id'   => 'sidebar_2',
        'before_widget' => '<div class="">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
                ));

}
add_action('widgets_init','gymfitness_widgets');


/* Imagen hero */

function gymfitness_hero_image()
{
    /* obtener id pagina principal */
    $front_page_id = get_option('page_on_front');
    /* obtener id imagen */
    $id_imagen = get_field('imagen_hero',$front_page_id);
    /* obtener la image */
    $imagen = wp_get_attachment_image_src( $id_imagen, 'full')[0];

    /* Style CSS */
    wp_register_style('custom',false);
    wp_enqueue_style('custom');

    /* Se almacena el CSS como string en una variable */
    $imagen_destacada_css = "
    .home .site-header{ 
        background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75) ) , url( $imagen ) };";
    
      /* se pasa el nombre del estilo y los datos del CSS a aplicar */  
    wp_add_inline_style( 'custom', $imagen_destacada_css );
}

add_action( 'init', 'gymfitness_hero_image');
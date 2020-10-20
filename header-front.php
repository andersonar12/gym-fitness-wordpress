<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>

    <header class="site-header">
   
    <div class="container ">
                <nav class="navbar navbar-dark  justify-content-between navbar-expand-lg fondo bg-transparent">
    
                    <a class="navbar-brand" href="<?php echo get_site_url() ?>"><img src="<?php echo get_template_directory_uri();?>/img/logo.svg" class="img-fluid" alt="img-logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="container-fluid">
                    <?php 
                        $args = array(
                            'menu_class' => 'navbar-nav w-100 justify-content-around',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id' => 'navbarNavDropdown',
                            'theme_location' => 'menu-principal',
                        );
                        wp_nav_menu($args);
                    ?> 
                    </div>
                    
                </nav><!-- barra de navegacion -->

            </div>
       

            <div class="container texto-hero d-flex align-items-center justify-content-center">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                       <div class="text-center text-white">
                        <h1 class="text-white"><?php echo $var=the_field('encabezado_hero') ?></h1>
                        <p><strong><?php echo the_field('contenido_hero')  ?></strong></p>
                        </div> 
                    </div>
                </div>
            </div>
    </header>
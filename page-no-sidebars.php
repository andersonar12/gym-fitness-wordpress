<?php 
/* 
* Template Name: Contenido sin Sidebars
*/
get_header()?>
<input type="hidden" name="" value="<?php echo $var=$template;?>">
<div class="container">
    <div class="row">
        <div class="col">
            <?php  while (have_posts()) : the_post(); ?>
            <div class="container pt-5 pb-5">
            <div class="row pb-5">
                <div class="col">
                <h1 class="text-center text-uppercase"><?php the_title(); ?></h1>
                </div>
            </div>

                <?php if(has_post_thumbnail()):
                echo '<div class="row d-flex justify-content-center pb-5">
                  <div class="col-md-8">' .
                    the_post_thumbnail('full',array('class'=>'img-fluid')) . '</div></div>';
                else:
                    ;
                endif;
                ?>

            <div class="row d-flex justify-content-center">

            <?php if(is_page('contacto')) :?>
                <div class="col-md-8">
            <!-- Codigo PHP para llamar al mapa -->
            <?php  $ubicacion = get_field('ubicacion'); ?>
            <div class="ubicacion">
                <input type="hidden" id="lat" value="<?php echo $ubicacion['lat']; ?>" />
                <input type="hidden" id="lng" value="<?php echo $ubicacion['lng']; ?>" />
                <input type="hidden" id="direccion" value="<?php echo $ubicacion['address']; ?>" />
            </div>
            <div id="map"></div>
                <?php the_content()?>
                </div> 
                <?php else :
                    
                    echo '<div class="col">' . the_content() . '</div>';

                    ?>

            <?php endif;  ?>  
            </div>
            </div>
            <?php endwhile ?>
        </div>

        
    </div>


</div>


<?php get_footer() ?>
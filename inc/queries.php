<?php 

/* Funcion para traer data de un post_type */

function gymfitness_lista_clases() { ?>
   

    <?php 
        $args = array(
            'post_type' => 'gymfitness_clases',
             'post_per_page' => 10,
             'orderby' => 'title',
             'order'=> 'ASC'
        );
        $clases = new WP_Query($args);

        while ($clases->have_posts()): $clases->the_post();?>

           <div class="col-md-5 pl-0 pr-0 m-4 gradient">
               <?php the_post_thumbnail('large', array('class' => 'img-fluid' )) ?>
               <div class="contenido">
                <a href="<?php the_permalink(); ?>" class="titulo" ><h2><?php the_title(); ?></h2></a>
                

                <?php 
                    $hora_inicio = get_field('hora_inicio'); 
                    $hora_fin = get_field('hora_fin');
                ?>

                <p class="parrafo"><?php the_field('dias_clase') ?> - <?php echo $hora_inicio . ' - ' . $hora_fin; ?>  </p>
               </div>
            </div>
          
            
        <?php endwhile; wp_reset_postdata();?>
    
<?php
}






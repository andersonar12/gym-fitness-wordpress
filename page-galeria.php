<?php 
/* 
* Template Name: Template para galerias
*/
get_header()?>

<input type="hidden" name="" value="<?php echo $var=$template?>">
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

                 <div class="col">
                    <div style="display:none"><?php the_content(); ?></div> <div class="row oculto">
                  
                    
                <?php if(!empty($_POST['area_ids'])) {

                    echo '<p id="galeria_id" style="display:none">' . $_POST['area_ids'] . '</p>' ; } ; ?>

                      <form style="display:none" name="miformulario" action="<?php $galeria_id = $_POST['area_ids']; ?>" method="POST">
                        <input type="text" name="area_ids" id="area_ids">
                        <input type="submit" value="Guardar">
                                    </form> 
                    
                    <ul class="pl-0 galeria-imagenes">
                            <?php 

                        $args = array(
                            'post_type' => 'page',
                             'post_per_page' => 10,
                             'orderby' => 'title',
                             'order'=> 'ASC'
                        );

                        /*Una forma de obtener algun WP_Post  */
                        $query = new WP_Query($args);

                        $id_post = $query->posts[2]->ID;
                         /*Una forma de obtener algun WP_Post  */       
                      ;      
                            /* obtener ids de la galerias de pagina actual */
                                $ids = explode(',', $galeria_id);

                                $i = 1;

                                foreach ($ids as $id) :
                                    $size = ($i == 4 || $i == 6) ? 'portrait': 'square';
                                    $imagen = wp_get_attachment_image_src( $id, $size )[0];
                                    $imagenGrande = wp_get_attachment_image_src( $id, 'full' )[0];
                                
                            ?>

                            <li>
                                <a href="<?php echo $imagenGrande ?>" data-lightbox="galeria">
                                <?php if(!empty($imagen)): ?>
                                    <img src="<?php echo $imagen ?>" alt="imagen" class="img-fluid" >
                                <?php endif ?>
                                </a>
                            </li>

                            <?php $i++; endforeach ?>
                    </ul>         
                    </div>


                </div>
            </div>
<?php endwhile; ?>
        </div>

    </div>

</div>

<?php get_footer() ?>
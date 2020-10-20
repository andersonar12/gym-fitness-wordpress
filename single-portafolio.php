<?php get_header()?>
<input type="hidden" name="" value="<?php echo $var=$template?>">
<div class="container">
    <div class="row">
        <div class="col">
            <?php  while (have_posts()) : the_post(); ?>
            <div class="container pt-5 pb-5">
            <div class="row pb-5">
                <div class="col">
                <h1 class="text-center text-uppercase"><?php echo the_title(); ?></h1>
                </div>
            </div>

            <div class="row d-flex justify-content-center pb-5">
                <div class="col">
                <?php if(has_post_thumbnail()):
                        the_post_thumbnail('full',array('class'=>'img-fluid'));
                else:
                    echo '';
                    endif;
                ?>
                </div>
            </div>
            <div class="row">
                    <div class="col">
                    <div style="display:none"><?php the_content(); ?></div>
                    
                <?php  if(!empty($_POST['area_ids'])){

                    echo '<p id="galeria_id" style="display:none">' . $_POST['area_ids'] . '</p>' ; } ; ?>

                      <form style="display:none" name="miformulario" action="<?php $galeria_id = $_POST['area_ids']; ?>" method="POST">
                        <input type="text" name="area_ids" id="area_ids">
                        <input type="submit" value="Guardar">
                      </form> 
                      
                    <ul class="pl-0 galeria-imagenes">
                            <?php 
                              
                            /* obtener ids de la galerias de pagina actual */
                                $ids = explode(',', $galeria_id);

                                $i = 1;

                                foreach ($ids as $id) :
                                    $imagen = wp_get_attachment_image_src( $id, 'square' )[0];
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
            <?php endwhile ?>
        </div>

    </div>

    </div>


<?php get_footer() ?>
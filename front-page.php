<?php  get_header('front') ?>

<section class="container pt-5 pb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 text-center">
            <h1><?php echo the_field('encabezado_bienvenida') ?></h1>
            <p><?php echo the_field('descripcion_bienvienida') ?></p>
        </div>
    </div>
</section>

<section class="seccion-areas">

    <div class="container-fluid">
        <div class="row contenedor-areas">
        <div class="col-md-3 col-sm-6 p-0 area d-flex justify-content-center align-items-center">
            <?php $area1 = get_field('area_1');
                $imagen = wp_get_attachment_image_src( $area1['imagen'], 'mediano' )[0];
                ?>
                <img src="<?php echo esc_attr($imagen) ?>" class="img-fluid" alt="" srcset="">
                <p><?php echo esc_html($area1['area_texto']) ?></p>
        </div>
        <div class="col-md-3 col-sm-6 p-0 area d-flex justify-content-center align-items-center">
            <?php $area2 = get_field('area_2');
                $imagen = wp_get_attachment_image_src( $area2['imagen'], 'mediano' )[0];
                ?>
                <img src="<?php echo esc_attr($imagen) ?>" class="img-fluid" alt="" srcset="">
                <p><?php echo esc_html($area2['area_texto']) ?></p>
        </div>
        <div class="col-md-3 col-sm-6 p-0 area d-flex justify-content-center align-items-center">
            <?php $area3 = get_field('area_3');
                $imagen = wp_get_attachment_image_src( $area3['imagen'], 'mediano' )[0];
                ?>
                <img src="<?php echo esc_attr($imagen) ?>" class="img-fluid" alt="" srcset="">
                <p><?php echo esc_html($area3['area_texto']) ?></p>
        </div>
        <div class="col-md-3 col-sm-6 p-0 area d-flex justify-content-center align-items-center">
            <?php $area4 = get_field('area_4');
                $imagen = wp_get_attachment_image_src( $area4['imagen'], 'mediano' )[0];
                ?>
                <img src="<?php echo esc_attr($imagen) ?>" class="img-fluid" alt="" srcset="">
                <p><?php echo esc_html($area4['area_texto']) ?></p>
        </div>
            
        </div>
    </div>

</section>

<section class="seccion-clases">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col text-center">
                <h1>Nuestras clases</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center clases">
            <?php gymfitness_lista_clases()  ?>
        </div>
        <div class="row ">
            <div class="col d-flex justify-content-end">
                <a href="<?php $pages = get_pages();

                $arregloNuevo =[];

                foreach ($pages as $key => $value) {

                    if ($value->post_name == "nuestras-clases") {
                        $id_pagina = $value->ID; 

                    }else{

                      array_push($arregloNuevo,$value);  
                       
                    };
                } 
                $arregloNuevo;
                 echo $var=get_the_permalink( $id_pagina)?>" class="btn btn-success p-3">Todas las Clases</a>
            </div>
        </div>
    </div>
</section>

<section class="instructores pb-5">
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Nuestros Instructores
            </h1>
            <p>Instructores profesionales que te ayudaran a lograr tus objetivos</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <ul class="listado-instructores pl-0">
            <?php 
            $args = array(
                'post_type' => 'instructores',
                'posts_per_page' => 30
            );

            $instructores = new WP_Query($args);

            while($instructores->have_posts()){ $instructores->the_post();
            ?>
            <li class="instructor ">
                <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                <div class="contenido text-center">
                    <h2><?php the_title() ?></h2>
                    <?php the_content() ?>
                    <div class="especialidad">
                        <?php 

                            $esp = get_field('especialidad');

                            foreach ($esp as $e) {?>
                            
                                <span class="etiqueta">
                                <?php echo esc_html( $e ) ?>
                                </span>
                           
                           <?php }?>
                    </div>
                </div>
            </li>

            <?php }; wp_reset_postdata(); ?>
            </ul>
            
        </div>
    </div>
</div>

</section>

<section class="testimoniales">

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    <?php  
            $args = array(
                'post_type' => 'testimoniales',
                'post_per_page' => 10,
                'order'=> 'ASC'
            ); 
            
            $query = new WP_Query($args);
            $i = 1;
            ?>
  
        <?php  while ($query->have_posts()) : $query->the_post();?>
            
            <div class="carousel-item 
            <?php if($i == 1){ echo 'active';} ?> ">
                <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 text-center text-white testimonial">
                        <blockquote><?php the_content() ?></blockquote>
                        <div class="row">
                            <div class="col d-flex align-items-center justify-content-end">
                                <?php the_post_thumbnail('thumbnail', array('class'=>'img-fluid m-4')) ?>
                                <p><strong><?php the_title() ?></strong></p>
                            </div>
                        </div>
                        
                    </div>                    
                </div>
                </div>
            </div>
        <?php $i++; endwhile; wp_reset_postdata();?>
          
    </div>
    
  </div>
</section>
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col text-center">
            <h1>Nuestro Blog</h1>
            <p>Aprende Tips de nuestros instructores expertos.</p>
        </div>
    </div>
    <div class="row ">
         <div class="col">   
            <?php $args = array(
        
                'post_type' => 'post',
                'post_per_page' => 4
            ); 
            
            $query = new WP_Query($args); ?>
  
            <ul class="pl-0 listado-blog">
                 <?php  while ($query->have_posts()) : $query->the_post();?>
                    <?php get_template_part('template-parts/loop', 'blog');?>
                <?php endwhile; ?>   
            </ul>
        </div>
    </div>

</div>

<input type="hidden" name="" value="<?php echo $template ?>">

<?php get_footer() ?>
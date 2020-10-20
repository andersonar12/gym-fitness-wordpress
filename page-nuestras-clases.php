<?php 
/* 
* Template Name: Clases Template
*/
get_header() ?>
<input type="hidden" name="" value="<?php echo $var=$template?>">
<div class="container clases">
    <div class="row">
        <div class="col">
            <?php  while (have_posts()) : the_post(); ?>
            <div class="container pt-5 pb-5">
            <div class="row pb-5">
                <div class="col">
                <h1 class="text-center text-uppercase"><?php the_title(); ?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col">

                <?php the_content()?>

                <div class="row d-flex justify-content-center">
                    <?php gymfitness_lista_clases(); ?>
                </div>
                
                </div>
            </div>
            </div>
            <?php endwhile ?>
        </div>

        
    </div>


</div>

           
           

<?php get_footer() ?>
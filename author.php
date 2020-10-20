<?php get_header() ?>

<div class="container">
    <div class="row pt-5">
         <div class="col">  
            <h1 class="text-center">AUTOR: 
                <?php 
                $categoria = get_queried_object();
                
                echo $categoria->display_name;
                
                ?></h1>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 text-center">
                        <?php $author = get_the_author_meta('description',$categoria->ID);
                        $prueba = get_the_author_description();
                        ?>
                        <p class="text-center mb-0">
                           <?php echo $author;
                           $url = get_site_url(); ?>
                        </p>

                        <img src="<?php echo get_site_url() ?>/wp-content/uploads/2020/10/86498837_10218998038634308_3958510321219403776_o.jpg" class="img-fluid mt-4 mb-5" srcset="">
                    </div>
                </div>
            
        </div>
    </div>
    <input type="hidden" name="" value="<?php echo $var=$template?>">
</div>

<?php get_footer() ?>
<?php get_header() ?>

<div class="container">
    <div class="row pt-5">
         <div class="col">   

            <ul class="pl-0 listado-blog">
            <?php  while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/loop', 'blog');?>
            <?php endwhile ?>
            </ul>

            
        </div>
    </div>

</div>
<input type="hidden" name="" value="<?php echo $var=$template?>">
<?php get_footer() ?>
<?php get_header()?>
<input type="hidden" name="" value="<?php echo $var=$template?>">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php  while (have_posts()) : the_post(); ?>
            <div class="container pt-5 pb-5">
                <div class="row pb-5">
                    <div class="col">
                    <h1 class="text-center text-uppercase"><?php the_title(); ?></h1>
                    </div>
                </div>

                <div class="row d-flex justify-content-center pb-5">
                    <div class="col">
                    <?php if(has_post_thumbnail()):
                            the_post_thumbnail('full',array('class'=>'img-fluid'));
                    else:
                        echo '';
                        endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <?php the_content()?>
                    </div>
                </div>
            </div>
            <?php endwhile ?>
        </div>

        <div class="col-md-4">
        <?php get_sidebar();?>

        </div>
    </div>

</div>

<?php get_footer() ?>
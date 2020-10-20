
                <li class="card gradient">

                <?php the_category() ?>


                    <?php if(has_post_thumbnail()):
                            the_post_thumbnail('mediano',array('class'=>'img-fluid'));
                    else:
                        echo 'No hay imagen asociada';
                        endif; ?>
                    <div class="contenido">
                        <a href="<?php the_permalink()?>">
                        <h3><?php the_title() ?></h3>
                        </a>

                        <p class="meta">
                            <span>Por:</span>
                                <a href="<?php echo $var = get_author_posts_url(get_the_author_meta('ID'));?>">
                                    <?php echo get_the_author_meta('display_name') ?>
                                </a>
                                
                            <?php echo the_time(get_option('date_format')); ?>
                            
                        </p>
                        
                    </div>
                </li>
              
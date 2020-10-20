<hr>
<footer class="container-fluid">
    <div class="row">
        <div class="col">
        <?php 
                        $args = array(
                            'container' => 'nav',
                            'container_class' => 'menu-principal',
                            'theme_location' => 'menu-principal',
                        );
                        wp_nav_menu($args);
                    ?> 
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong><p class="copyright"> <?php the_author() ?> <?php echo get_bloginfo('name') . " " . date('Y') ."."?></p>
            </strong>
        </div>
    </div>
</footer> 

    <?php wp_footer(); ?>
</body>
</html>
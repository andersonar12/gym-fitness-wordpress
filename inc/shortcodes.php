<?php

add_shortcode( 'ubicacion', function (){
    $ubicacion = get_field('ubicacion');
    $ubicacion["lng"]
    ?>
    <div class="ubicacion">
        <input type="hidden" id="lat" value="<?php echo $ubicacion['lat']; ?>" />
        <input type="hidden" id="lng" value="<?php echo $ubicacion['lng']; ?>" />
        <input type="hidden" id="direccion" value="<?php echo $ubicacion['address']; ?>" />
        <div id="map"></div>
    </div>
    <?php
}
);


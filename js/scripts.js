var $ = jQuery;

$( document ).ready(function() {


    var path = window.location.pathname.split('/')[1];

     /* header fijo haciendo scroll */
     window.onscroll = () =>{

        const scroll = window.scrollY;
       
        const headerNav = document.querySelector('.navbar');
        const documentBody = document.querySelector('body');

        if ( scroll > 300){

            headerNav.classList.add('fixed-top');
            headerNav.classList.remove('bg-transparent');
            documentBody.classList.add('.ft-activo');
        } else {

            documentBody.classList.remove('.ft-activo');
            headerNav.classList.add('bg-transparent');
            headerNav.classList.remove('fixed-top');
            
        }

    }
   /* header fijo haciendo scroll */


  

    /* funcion para obtener los valores del input del DOM y extraer el termino del page.php */
  $('input').each(function (index, element) {

      // element == this
      array = element.value.split('/');
      
        $.each(array,function (index, element) {
            
            if ( element.search('.php') > 0) {
                console.log(element);
            }

        });
      
  });

     if (path == 'contacto') {
        map_leafleft();
    }

    if (path == 'galeria' || 'portafolio'){
        galeria_ids() ;
    }

  
        
        /* Para la seccion de la galeria */
     function galeria_ids() {
            
            var galeria_ids = $('img[data-id]');
            var array_ids = [];
            
            /* console.log(galeria_ids); */
            
            $.each(galeria_ids,function (index, value) {
                
                array_ids.push(value.getAttribute("data-id"));

            } )
            
            /* console.log(array_ids); */
            
            var text_area = document.getElementById('area_ids')
            text_area.value = array_ids;
            
            //Para que un formulario envie data de forma automatica al cargar la pagina
            window.onload=function(){
                
                if (document.getElementById('galeria_id')) {
                    return;
                    
                } else {
                    // Una vez cargada la página, el formulario se enviara automáticamente.
                    document.forms["miformulario"].submit(); 
                }
                  
          };
    }
        /* Mapa de Leafleft */
    function map_leafleft() {


        const lat = document.querySelector('#lat').value,
        lng = document.querySelector('#lng').value,
        direccion = document.querySelector('#direccion').value;


            if(lat && lng && direccion) {
                var map = L.map('map').setView([lat, lng], 15);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
            
                L.marker([lat, lng]).addTo(map)
                    .bindPopup(direccion)
                    .openPopup();
  }    
    }
      
   

})

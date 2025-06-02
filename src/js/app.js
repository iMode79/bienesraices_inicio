document.addEventListener('DOMContentLoaded', function() {
    eventListeners();

    darkMode();
});

    function darkMode(){

        const prefiereDarkMode = window.matchMedia('(prefers-color-scheme-dark)');
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
            
        prefiereDarkMode.addEventListener('change', function() {
            if (prefiereDarkMode.matches) {
                document.body.classList.add('dark-mode');
            } else {
                document.body.classList.remove('dark-mode');
            }
        });
    
        //Mantener el modo seleccionado en todo el sitio dentro del body
        //console.log(prefiereDarkMode.matches);
            //Boton DarkMode
        const botonDarkMode = document.querySelector('.dark-mode-boton');
        botonDarkMode.addEventListener('click', function(){
            document.body.classList.toggle('dark-mode'); 
    
            //Para que el modo elegido se quede guardado en local-storage
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('modo-oscuro','true');
            } else {
                localStorage.setItem('modo-oscuro','false');
            }
        });
    
        /*Obtenemos el modo del color actual - esta validación es necesaria para mantener el darck mode ya que lo que tenga almacenado 
        el locatstorage es lo que carga, si no esta esta validación no mantiene nada aun que el local tenga valor deseado*/
        if (localStorage.getItem('modo-oscuro') === 'true') {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    }


//Funciones para el menú
function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    
    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive () {    
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
    /*   if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    }   else {
        navegacion.classList.add('mostrar');
    } */
    

}

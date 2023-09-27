document.addEventListener("DOMContentLoaded", function(event) {
    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        // Validar que todas las variables existan
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                // Mostrar/ocultar navbar
                nav.classList.toggle('show')
                // Cambiar ícono
                toggle.classList.toggle('bx-x')
                // Agregar relleno al cuerpo
                bodypd.classList.toggle('body-pd')
                // Agregar relleno al encabezado
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

    // Función para resaltar el enlace activo
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }

    linkColor.forEach(l => l.addEventListener('click', colorLink))


    $("#btnPregunta").on("click", function(){
        $("#contenidoPricipal").hide();
        $("#quienesSomos").fadeIn(1000);
    })

    $("#home").on("click", function(){
        $("#quienesSomos").hide();
        $("#contenidoPricipal").fadeIn(1000);
    })
});
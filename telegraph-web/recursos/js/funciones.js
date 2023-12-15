$(document).ready(function () {

    var curPage = 1;
    var numOfPages = $(".skw-page").length;
    var animTime = 1000;
    var scrolling = false;
    var pgPrefix = ".skw-page-";

    function pagination() {
        scrolling = true;

        $(pgPrefix + curPage).removeClass("inactive").addClass("active");
        $(pgPrefix + (curPage - 1)).addClass("inactive");
        $(pgPrefix + (curPage + 1)).removeClass("active");

        setTimeout(function () {
            scrolling = false;
        }, animTime);
    };

    function navigateUp() {
        if (curPage === 1) return;
        curPage--;
        pagination();
    };

    function navigateDown() {
        if (curPage === numOfPages) return;
        curPage++;
        pagination();
    };

    $(document).on("mousewheel DOMMouseScroll", function (e) {
        if (scrolling) return;
        if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
            navigateUp();
        } else {
            navigateDown();
        }
    });

    $(document).on("keydown", function (e) {
        if (scrolling) return;
        if (e.which === 38) {
            navigateUp();
        } else if (e.which === 40) {
            navigateDown();
        }
    });

});

// Función para mostrar mensajes CRUD con efecto de fundido

function mostrarMensaje(tipo, texto) {
    const mensajeElemento = document.getElementById('mensaje');
    mensajeElemento.textContent = texto;

    if (tipo === 'success') {
        mensajeElemento.classList.add('success');

        // Mostrar el mensaje con efecto de fundido entrante (fadeIn)
        mensajeElemento.style.display = 'block';

        // Esperar un poco antes de aplicar el efecto de fundido
        setTimeout(function () {
            mensajeElemento.style.opacity = 1;
        }, 10); // 10ms de espera

        // Ocultar el mensaje después de 3 segundos con efecto de fundido saliente (fadeOut)
        setTimeout(function () {
            mensajeElemento.style.opacity = 0;
            setTimeout(function () {
                mensajeElemento.style.display = 'none';
            }, 300); // 300ms (duración de la transición en CSS)
        }, 3000); // 3000ms (tiempo de visualización del mensaje -> 3 segundos)
    }
}
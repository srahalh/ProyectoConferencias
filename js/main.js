(function() {
    "use strict"; //JS en uso estricto una vez
    var regalo = document.getElementById('regalo');
    document.addEventListener('DOMContentLoaded', function() { //Escucha los eventos que ocurren en nuestro HTML

        if (document.getElementById('mapa')) { //Mapa 

            var map = L.map('mapa').setView([20.674678, -103.38683], 17);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            L.marker([20.674678, -103.38683]).addTo(map)
                .bindPopup('GDLWEBCAMP 2020 <br> boletos ya disponibles')
                .openPopup();


        }


        //Campos Datos Usuario
        var nombre = document.getElementById('nombre'); //Puedes ir introduciendo las variables en la consola para verificar que este bien.
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');


        //Campos Pases
        var pase_dia = document.getElementById('pase_dia');
        var pase_dosdias = document.getElementById('pase_dosdias');
        var pase_completo = document.getElementById('pase_completo');

        //Botones y Divs

        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var botonRegisto = document.getElementById('btnRegistro');
        var lista_productos = document.getElementById('lista-productos');
        var suma = document.getElementById('suma-total');

        //EXTRAS
        var etiquetas = document.getElementById('etiquetas');
        var camisas = document.getElementById('camisa_evento');


        //Eventos
        botonRegisto.disabled = true;

        //PARA MONTOS
        calcular.addEventListener('click', calcularMontos);

        //PARA MOSTRAR TALLERES
        pase_dia.addEventListener('blur', mostrarDias);
        pase_dosdias.addEventListener('blur', mostrarDias);
        pase_completo.addEventListener('blur', mostrarDias);
        //Datos usuarios

        nombre.addEventListener('blur', validarCampos);
        apellido.addEventListener('blur', validarCampos);
        email.addEventListener('blur', validarCampos);
        email.addEventListener('blur', validarMail);

        function validarCampos() {
            if (this.value == '') {
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = "Este campo es obligatorio";
                this.style.border = '1px solid red';
            } else {
                errorDiv.style.display = 'none';
                this.style.border = '1px solid #cccccc';
            }
        }

        function validarMail() {
            if (this.value.indexOf("@") > -1) { //Busca en la cadena y devuelve -1 si es falso. 
                errorDiv.style.display = 'none';
                this.style.border = '1px solid #cccccc';
            } else {
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = "debe tener al menos una @";
                this.style.border = '1px solid red';
                errorDiv.style.border = '1px solid red';
            }
        }


        function calcularMontos(event) {
            if (regalo.value === '') { //Para que no se deje vacio
                alert("Debes Elegir un regalo"); //Alerta
                regalo.focus();
            } else {

                var boletosDia = parseInt(pase_dia.value, 10) || 0; //Cantidad de boletos y asegurarte que no pasen datos raros
                var boletos2Dias = parseInt(pase_dosdias.value, 10) || 0;
                var boletoCompleto = parseInt(pase_completo.value, 10) || 0;
                var cantCamisas = parseInt(camisas.value, 10) || 0;
                var cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

                var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) + (cantCamisas * 10 * (.93)) + (cantEtiquetas * 2);


                var listadoProductos = [];

                if (boletosDia >= 1) {
                    listadoProductos.push(`${boletosDia} Pases por dia`);
                }
                if (boletos2Dias >= 1) {
                    listadoProductos.push(`${boletos2Dias} Boletos por 2 dias`);
                }
                if (boletoCompleto >= 1) {
                    listadoProductos.push(`${boletoCompleto} Boletos Completos`);
                }
                if (cantCamisas >= 1) {
                    listadoProductos.push(`${cantCamisas} Camisas`);
                }
                if (cantEtiquetas >= 1) {
                    listadoProductos.push(`${cantEtiquetas} Etiquetas`);
                }

                //Trayendo lista producto
                lista_productos.style.display = "block";
                lista_productos.innerHTML = ''; //Blanquea el espacio para cuando se le de a calcular pro segunda vez no aparezca el texto anterior
                //El innerHTML lo que hace es impirmir lo que tienes en java al HTML
                for (var i = 0; i < listadoProductos.length; i++) {
                    lista_productos.innerHTML += listadoProductos[i] + '<br/>'; //Se le agrega el += para que cuando asigne el valor en lista producto e imprima no borre el resultado anterior
                }

                //Imprimir el total
                suma.innerHTML = `$ ${totalPagar.toFixed(2)}`;

                botonRegisto.disabled = false; //Para activar el boton
                document.getElementById('total_pedido').value = totalPagar;

            }
        }

        function mostrarDias() {
            var boletosDia = parseInt(pase_dia.value, 10) || 0, //Se vuelven a crear las variables
                boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                boletoCompleto = parseInt(pase_completo.value, 10) || 0;
            if (boletosDia > 0) { //Agrega el dia al arreglo si el valor es mayor que 1
                viernes.style.display = "block";
            } else {
                viernes.style.display = "none";
            }
            if (boletos2Dias > 0) { //Agrega el dia al arreglo si el valor es mayor que 1
                viernes.style.display = "block";
                sabado.style.display = "block";
            } else {
                sabado.style.display = "none";
            }
            if (boletoCompleto > 0) { //Agrega el dia al arreglo si el valor es mayor que 1
                viernes.style.display = "block";
                sabado.style.display = "block";
                domingo.style.display = "block";
            } else {
                domingo.style.display = "none";
            }
        }



    }); //DOM CONTENT LOADED
})();

$(function() {

    //Lettering

    // $('.nombre-sitio').lettering();

    //Menu fijocon jquery, remplazado con position: sticky en css
    // // var alturaVentana = $(window).height(); //Para obtener la altura de la ventanda
    // // var barraAltura = $('.barra').innerHeight(); //Nos da la medicion de la barra 

    // // $(window).scroll(function() {
    // //     var scroll = $(window).scrollTop(); //Mide la cantidad de pixeles 
    // //     if (scroll > alturaVentana) {
    // //         $('.barra').addClass('fixed');
    // //         $('body').css({ 'margin-top': `${barraAltura}px` });
    // //     } else {
    // //         $('.barra').removeClass('fixed');
    // //         $('body').css({ 'margin-top': '0px' });
    // //     }
    // // })

    //menu de hambuerguesa

    $('.menu-movil').on('click', function() {
        $('.navegacion-movil').slideToggle();
    })



    //Programa de conferencias
    $('.programa-evento .info-curso:first').show(); //Mostrar solo el primer elemento por eso el first
    $('.programa-evento a:first').addClass('activo'); //añadir la clase activo
    $('.menu-programa a').on('click', function() { //evento de click
        $('.menu-programa a').removeClass('activo'); //remover la clase activo al todos los que la tengan
        $(this).addClass('activo'); // añadir activo al elemento click
        $('.ocultar').hide(); // ocultar los que tengan esta clase
        var enlace = $(this).attr('href'); //tomando el valor href del elemento selecionado
        $(enlace).fadeIn(500); // mostrando el elemento selccionado
        return false; // evitando los saltos
    });



    //Animaciones para los numeros

    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 /*Numero a animar*/ }, 1200 /*velocidad*/ ); //Selecciona los li y les da un numero index a sus hijos
    $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 /*Numero a animar*/ }, 1200 /*velocidad*/ );
    $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 /*Numero a animar*/ }, 1200 /*velocidad*/ );
    $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9 /*Numero a animar*/ }, 1200 /*velocidad*/ );

    //Animacion contador atras

    $('.cuenta-regresiva').countdown('2020/12/10 09:00:00' /**Fecha del evento */ , function(event) /*Asi es la sintaxis del plugins*/ {

        $('#dias').html(event.strftime('%D' /*Solo muestra el dia*/ ));
        $('#horas').html(event.strftime('%H' /*Solo muestra LA HORA*/ ));
        $('#minutos').html(event.strftime('%M' /*Solo muestra LOS MINUTOS*/ ));
        $('#segundos').html(event.strftime('%S' /*Solo muestra LOS SEGUNDOS*/ ));

    })

    //Colorbox para desplegar la descripcion de los invitados

    $('.invitado-info').colorbox({ inline: true, width: '50%' });
})
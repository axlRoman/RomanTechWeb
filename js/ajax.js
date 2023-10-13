
//var table_products = document.getElementsByClassName('productos-list');
//var no_products = document.getElementsByClassName('no-productos');
var formulario = document.getElementById('agregar-carrito');
var tableBody = document.getElementsByTagName('tbody');
var buttons_add = document.getElementById('btnAnadir');


$(document).ready(function() {

    buttons_add.addEventListener('click', function (event) {
        event.preventDefault();
        var data = new FormData(event.formulario);
    });
    $('#borrar-carrito').on('submit', function(e) {

        e.preventDefault();

        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;
                console.log(data);
                eliminarHTML(data.id_eliminado);
                if(data.cantidad_productos = "0"){
                    $('.productos-list').hide();
                    $('.no-productos').show();
                }
            }
        });
    });


    // Carrito
    function eliminarHTML(id_borrado) {
        console.log(id_borrado);
        var elementoBorrar = document.getElementById(id_borrado);
        tableBody[0].removeChild(elementoBorrar);
    }
    
});
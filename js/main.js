$(function(){
    "use strict";
    document.addEventListener('DOMContentLoaded', function(){        
    });

    $('.informacion div:first').show();
    $('.producto-informacion nav a:first').addClass('tab-activo');

    $('.producto-informacion nav a').click(mostrarTabs);

    function mostrarTabs() {
        $('.producto-informacion nav a').removeClass('tab-activo');
        $(this).addClass('tab-activo');
        var enlace = $(this).attr('href');
        $('.informacion div').fadeOut(100);
        $(enlace).fadeIn();
        return false;
    }
});

$(function(){
    
    // Menú Activo
    $('body.Index .navegador-principal a:contains("Inicio")').addClass('activo');
    $('body.Catalogo .navegador-principal a:contains("Catálogo")').addClass('activo');
    $('body.Nosotros .navegador-principal a:contains("Nosotros")').addClass('activo');
    $('body.Contacto .navegador-principal a:contains("Contacto")').addClass('activo');
    
    // Show Navigation Menu Movil
    $('.menu-movil > i').addClass('bars-menu');
    var state_menu = 1;
    $('.menu-movil').on('click', function(){
        if(state_menu == 1){
            $('.menu-movil > i').removeClass('bars-menu');
            $('.menu-movil > i').addClass('close-menu');
            state_menu = 0;
        }else{
            $('.menu-movil > i').addClass('bars-menu');
            $('.menu-movil > i').removeClass('close-menu');
            state_menu = 1;
        }
        $('.navegador-movil').slideToggle();
    });
    
    // Menu fijo
    var windowH = $(window).height();
    var windowW = $(window).width();

    $(window).resize(function() {
        delay(function(){
            onResize();
        },100)
    });

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        scrollMenuTop(scroll);
    });

    /* Functions */ 
    var delay = (function() {
        var timer = 0;
        return function(callback, ms){
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        }
    })();

    var onResize = function() {
        windowH = $(window).height();
        windowW = $(window).width();
    }
    function scrollMenuTop(var_scroll){
        if(windowW > 992){
            var barraH = $('.content-header').innerHeight()- $('.navegador-principal').innerHeight();
            if (var_scroll > barraH) {
                //console.log("ya rebasaste la altura de la window");
                $('.navegador-principal').addClass('fixed');
                $('body').css({'margin-top': (40)+'px'});
            } else {
                //console.log("aun no");
                $('.navegador-principal').removeClass('fixed');
                $('body').css({'margin-top': '0px'});
            }
        }
        if(windowW < 990){
            var barraH = $('.logo-movil').innerHeight();
            if (var_scroll > 40) {
                //console.log("ya rebasaste la altura de la window" + barraH);
                $('.content-header-movil').addClass('fixed-movil');
                $('body').css({'margin-top': (50)+'px!important'});
            } else {
                //console.log("aun no");
                $('.content-header-movil').removeClass('fixed-movil');
                $('body').css({'margin-top': '0px'});
            }
        }
    }

    // Colorbox
    $('.boton_newsletter').colorbox({inline:true, width: "60%", height:"50%"});

});
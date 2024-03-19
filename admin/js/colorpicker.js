jQuery(document).ready(function($){ 

    var primario = jscolorprimario;
    var primarioClaro = obtenerColorMasClaro(primario, .6);
    $('.qc').css({
        'background': primario,
        'background': '-moz-linear-gradient(45deg, ' + primario + ' 0%, ' + primarioClaro + ' 100%)',
        'background': '-webkit-linear-gradient(45deg, ' + primario + ' 0%,' + primarioClaro + ' 100%)',
        'background': 'linear-gradient(45deg, ' + primario + ' 0%,' + primarioClaro + ' 100%)'
    });

    $('#qcprimario').wpColorPicker({
    defaultColor: true, 
    hide: true,
    change:function(event, ui) {
    var nuevoPrimario = ui.color.toString();
    var nuevoprimarioClaro = obtenerColorMasClaro(nuevoPrimario, .6);
    $('.qc').css({
        'background': nuevoPrimario,
        'background': '-moz-linear-gradient(45deg, ' + nuevoPrimario + ' 0%, ' + nuevoprimarioClaro + ' 100%)',
        'background': '-webkit-linear-gradient(45deg, ' + nuevoPrimario + ' 0%,' + nuevoprimarioClaro + ' 100%)',
        'background': 'linear-gradient(45deg, ' + nuevoPrimario + ' 0%,' + nuevoprimarioClaro + ' 100%)'
    });

  }
});

function obtenerColorMasClaro(color, ajuste) {
    // Convierte el color hexadecimal a RGB
    var r = parseInt(color.substring(1, 3), 16);
    var g = parseInt(color.substring(3, 5), 16);
    var b = parseInt(color.substring(5, 7), 16);

    // Ajusta la intensidad (puedes experimentar con este valor)
    var factor = 1 + ajuste;
    r = Math.floor(r * factor);
    g = Math.floor(g * factor);
    b = Math.floor(b * factor);

    // Asegura que los valores estén en el rango [0, 255]
    r = Math.min(255, r);
    g = Math.min(255, g);
    b = Math.min(255, b);

    // Convierte el nuevo color RGB a hexadecimal
    var nuevoColor = "#" +
        ("0" + r.toString(16)).slice(-2) +
        ("0" + g.toString(16)).slice(-2) +
        ("0" + b.toString(16)).slice(-2);

    return nuevoColor;
}

});





 
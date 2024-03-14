<?php 

/* La parte pública del plugin*/

defined( 'ABSPATH' ) || die();

function add_eqconnect_code()
{ 

// Obtener las opciones de configuración guardadas

    $links;
    $icons;
    $watexts;
    for ($i=1; $i < 5 ; $i++) { 
        $link=get_option('eqconnect_linkcta'.$i);
        if ($link!='') {
         $links[]=$link;
         if (get_option('eqconnect_icocta'.$i)!='') {
             $icons[]=get_option('eqconnect_icocta'.$i);
         }
         else{$icons[]='link';}

         $watext=get_option('eqconnect_watext'.$i);
         $watext = str_replace(' ', '%20', $watext);
         $watexts[]=$watext;   
     }
 }
 
 if (isset($links)): ?>

    <div class="qcsupport_button">
        <input id="qcCheckbox" type="checkbox" class="qc-checkbox" />
        <label class="qc" for="qcCheckbox">
            <i class="gicon-soporte"></i>
        </label>

        <div class="qc-wheel">

            <?php 
            for ($i=0; $i < count($links)  ; $i++) { 
             if ($links[$i]): 

                if ($icons[$i]=='phone'){
                    $href="tel:".$links[$i];
                }
                elseif ($icons[$i]=='mail'){
                    $href="mailto:".$links[$i];
                }
                elseif ($icons[$i]=='whatsapp'){
                    $href="https://wa.me/".$links[$i]."/?text=".$watexts[$i];
                    
                }
                else {$href=$links[$i];}

                ?>
                
                <a class="qc-action qc-action-<?php echo $i+1; ?>" href="<?php echo $href; ?>">
                    <i class="gicon-<?php echo $icons[$i]; ?>"></i>
                </a>
            <?php endif ; 
        }
        ?>

    </div>
</div>
<?php endif ; 
}


// Inyectamos el código en el footer
add_action('wp_footer', 'add_eqconnect_code');


// personalizamos la burbuja
function eqconnect_customize_css()
{
    $primario = get_option('qcprimario');
    $primarioClaro = obtenerColorMasClaro($primario,0.6);
    
    $primarioOscuro = obtenerColorMasOscuro($primario,0.2);

    ?>
    <style type="text/css">
    .qc {
       --Primario: <?php echo $primario; ?>;
       --Primario-claro: <?php echo $primarioClaro; ?>;
       --Primario-oscuro:<?php echo $primarioOscuro; ?>;

       background: var(--Primario);
       background: -moz-linear-gradient(45deg, var(--Primario) 0%, var(--Primario-claro) 100%); /* FF3.6-15 */
       background: -webkit-linear-gradient(45deg, var(--Primario)0%,var(--Primario-claro) 100%); /* Chrome10-25,Safari5.1-6 */
       background: linear-gradient(45deg, var(--Primario) 0%,var(--Primario-claro) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
   }
   .qc-action {
       --Primario: <?php echo $primario; ?>;
       background: var(--Primario);

   }
   .qc-action:hover {
       --Primario-oscuro:<?php echo $primarioOscuro; ?>;
       background: var(--Primario-oscuro);

   }
</style>
<?php
}

add_action('wp_head', 'eqconnect_customize_css');

function eqconnect_public_scripts() {

   $phpmpurl= EQCONNECT_PLUGIN_URL; 
   wp_register_style(
    'gicon',
    EQCONNECT_PLUGIN_URL . '/include/gicon/style.css'
);
   wp_enqueue_style( 'gicon' );

   wp_register_style(
    'mybchat-public-css',
    EQCONNECT_PLUGIN_URL . '/public/css/public.css'
);
   wp_enqueue_style( 'mybchat-public-css' );
}



add_action( 'wp_enqueue_scripts', 'eqconnect_public_scripts' );

function obtenerColorMasClaro($color, $ajuste) {
    // Verifica si el color comienza con #
    if ($color[0] === '#') {
        // Convierte el color hexadecimal a RGB
        $r = hexdec(substr($color, 1, 2));
        $g = hexdec(substr($color, 3, 2));
        $b = hexdec(substr($color, 5, 2));

        // Ajusta la intensidad (puedes experimentar con este valor)
        $factor = 1 + $ajuste;
        $r = floor($r * $factor);
        $g = floor($g * $factor);
        $b = floor($b * $factor);

        // Asegura que los valores estén en el rango [0, 255]
        $r = min(255, $r);
        $g = min(255, $g);
        $b = min(255, $b);

        // Convierte el nuevo color RGB a hexadecimal
        $nuevoColor = "#" .
        str_pad(dechex($r), 2, '0', STR_PAD_LEFT) .
        str_pad(dechex($g), 2, '0', STR_PAD_LEFT) .
        str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

        return $nuevoColor;
    }

    // Si el color no comienza con #, devuelve el mismo color
    return $color;
}

function obtenerColorMasOscuro($color, $ajuste) {
    // Verifica si el color comienza con #
    if ($color[0] === '#') {
        // Convierte el color hexadecimal a RGB
        $r = hexdec(substr($color, 1, 2));
        $g = hexdec(substr($color, 3, 2));
        $b = hexdec(substr($color, 5, 2));

        // Ajusta la intensidad (puedes experimentar con este valor)
        $factor = 1 - $ajuste;
        $r = floor($r * $factor);
        $g = floor($g * $factor);
        $b = floor($b * $factor);

        // Asegura que los valores estén en el rango [0, 255]
        $r = max(0, $r);
        $g = max(0, $g);
        $b = max(0, $b);

        // Convierte el nuevo color RGB a hexadecimal
        $nuevoColor = "#" .
        str_pad(dechex($r), 2, '0', STR_PAD_LEFT) .
        str_pad(dechex($g), 2, '0', STR_PAD_LEFT) .
        str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

        return $nuevoColor;
    }

    // Si el color no comienza con #, devuelve el mismo color
    return $color;
}
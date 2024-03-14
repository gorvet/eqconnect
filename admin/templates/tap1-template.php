<!-- Tap 1  -->
<div id="tab1" class="tab-pane active"> 	
	<div class=""> 
		<p class="mb-1 mt-0">Seleccione el icono de la llamada de acción y añada su link correspondiente.</p> 
		<p class="mb-1 mt-0"><span class="fw-bold">*Nota: </span>Si no se intruduce el link no se mostrará su burbuja.</p>  
	</div>
	<div class="mt-2">
		<label class="d-block fw-bold">Seleccione el icono e introduzca el link del CTA. </label>		 

		<div class="mt-1 d-flex">
			<div class="dropdown">
				<button class="bbutton button-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">
					<?php _e('Icono', 'eqconnect'); ?>
					<i id="giconCta1" class="mx-2 <?php if (get_option('eqconnect_icocta1')): echo "gicon-" . get_option('eqconnect_icocta1')?>
					<?php else:  echo "gicon-chat2"?>
					<?php endif ?>
					"></i>
					<span class="caret"></span>
				</button>
				
				
				<ul id="selectIcon1" class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<?php
					foreach ($cta_options as $value => $unicode) {
						$option = '<li><a class="dropdown-item" href="#" value="' . $value . '" ><i class="gicon-'.$value .'"></i></a></li>';
						echo $option;
					}
					?>
				</ul>
			</div>

			<input  class="" type="hidden"  name="eqconnect_icocta1" id="eqconnect_icocta1" value="<?php echo esc_attr(get_option('eqconnect_icocta1'))  ?> ">


			<input  class="ms-2 w-100" type="text"  name="eqconnect_linkcta1" id="eqconnect_linkcta1" value="<?php echo esc_attr(get_option('eqconnect_linkcta1'))  ?>" placeholder="https://link.com">

		</div>
		
		<div id="eqconnect_wa1" class="my-2  ">
			<label class="fw-bold">Texto del CTA</label>
			<input  class=" w-100 mt-1 " type="text"  name="eqconnect_watext1" id="eqconnect_watext1" value="<?php echo esc_attr(get_option('eqconnect_watext1'))  ?>" placeholder="Hola quiero saber...">
		</div>
	</div>

	<div class="mt-4"> 
		<span>Usa estos ejemplos como referencia para crear tus enlaces:</span><br>
		<span><strong>Link: </strong>"https://www.esteesmilink.com"</span><br>
		<span><strong>Correo: </strong>"micorreo@ejemplo.com"</span><br> 
		<span><strong>Teléfono y WhatsApp: </strong>Colocar el número de teléfono con el código del país delante sin el signo "+" ej: 5353000000</span> 
		

	</div>


</div>
<!-- Tap 1  -->
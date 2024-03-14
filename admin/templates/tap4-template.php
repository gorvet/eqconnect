<!-- Tap 1  -->
<div id="tab4" class="tab-pane active"> 	
	<div class=""> 
		<p class="mb-1 mt-0">Seleccione el icono de la llamada de acción y añada su link correspondiente.</p> 
		<p class="mb-1 mt-0"><span class="fw-bold">*Nota: </span>Si no se intruduce el link no se mostrará su burbuja.</p>  
	</div>
	<div class="mt-2">
		<label class="d-block fw-bold">Seleccione el icono e introduzca el link del CTA. </label>		 

		<div class="mt-1 d-flex">
			<div class="dropdown">
				<button class="bbutton button-secondary dropdown-toggle" type="button" id="dropdownMenu4" data-bs-toggle="dropdown" aria-expanded="false">
					<?php _e('Icono', 'eqconnect'); ?>
					<i id="giconCta4" class="mx-2 <?php if (get_option('eqconnect_icocta4')): echo "gicon-" . get_option('eqconnect_icocta4')?>
					<?php else:  echo "gicon-chat2"?>
					<?php endif ?>
					"></i>
					<span class="caret"></span>
				</button>
				
				
				<ul id="selectIcon4" class="dropdown-menu" aria-labelledby="dropdownMenu4">
					<?php
					foreach ($cta_options as $value => $unicode) {
						$option = '<li><a class="dropdown-item" href="#" value="' . $value . '" ><i class="gicon-'.$value .'"></i></a></li>';
						echo $option;
					}
					?>
				</ul>
			</div>

			<input  class="" type="hidden"  name="eqconnect_icocta4" id="eqconnect_icocta4" value="<?php echo esc_attr(get_option('eqconnect_icocta4'))  ?> ">


			<input  class="ms-2 w-100" type="text"  name="eqconnect_linkcta4" id="eqconnect_linkcta4" value="<?php echo esc_attr(get_option('eqconnect_linkcta4'))  ?>" placeholder="https://link.com">

		</div>
		
		<div id="eqconnect_wa4" class="my-2  ">
			<label class="fw-bold">Texto del CTA</label>
			<input  class=" w-100 mt-1 " type="text"  name="eqconnect_watext4" id="eqconnect_watext4" value="<?php echo esc_attr(get_option('eqconnect_watext4'))  ?>" placeholder="Hola quiero saber...">
		</div>
	</div>

	<div class="mt-4"> 
		<span>Usa estos ejemplos como referencia para crear tus enlaces:</span><br>
		<span><strong>Link: </strong>"https://www.esteesmilink.com"</span><br>
		<span><strong>Correo: </strong>"micorreo@ejemplo.com"</span><br> 
		<span><strong>Teléfono y WhatsApp: </strong>Colocar el número de teléfono con el código del país delante sin el signo "+" ej: 5353000000</span> 
		

	</div>


</div>
<!-- Tap 4  -->
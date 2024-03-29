<?php defined( 'ABSPATH' ) || die(); ?>
<!-- Tap 2  -->
<div id="tab2" class="tab-pane hide"> 	
	<div class=""> 
		<p class="mb-1 mt-0"><?php esc_html_e('Seleccione el icono de la llamada de acción y añada su link correspondiente.','eqconnect'); ?></p> 
		<p class="mb-1 mt-0"><span class="fw-bold"><?php esc_html_e('*Nota: ','eqconnect'); ?> </span><?php esc_html_e('Si no se intruduce el link no se mostrará su burbuja.','eqconnect'); ?></p>  
	</div>
	<div class="mt-2">
		<label class="d-block fw-bold"><?php esc_html_e('Seleccione el icono e introduzca el link del CTA. ','eqconnect'); ?> </label>		 

		<div class="mt-1 d-flex">
			<div class="dropdown">
				<button class="bbutton button-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
					<?php esc_html_e('Icono', 'eqconnect'); ?>
					<i id="giconCta2" class="mx-2 gicon-<?php if (get_option('eqcn_icocta2')): echo esc_attr(get_option('eqcn_icocta2'))?>
					<?php else:  echo "chat2"?>
					<?php endif ?>
					"></i>
					<span class="caret"></span>
				</button>
				
				
				<ul id="selectIcon2" class="dropdown-menu" aria-labelledby="dropdownMenu2">
					<?php
					foreach ($cta_options as $value => $unicode) {?>
						<li>
							<a class="dropdown-item" href="#" value="<?php esc_attr_e($value) ?>">
						<i class="gicon-<?php esc_attr_e($value)  ?>"></i>
							</a>
						</li>
						<?php
					}
					?>
				</ul>
			</div>

			<input  class="" type="hidden"  name="eqcn_icocta2" id="eqcn_icocta2" value="<?php echo sanitize_text_field(esc_attr(get_option('eqcn_icocta2')))  ?> ">


			<input  class="ms-2 w-100" type="text"  name="eqcn_linkcta2" id="eqcn_linkcta2" value="<?php echo sanitize_text_field(esc_attr(get_option('eqcn_linkcta2')) ) ?>" placeholder="https://link.com">

		</div>
		
		<div id="eqcn_wa2" class="my-2  ">
			<label class="fw-bold d-none"><?php esc_html_e('Texto del CTA','eqconnect'); ?></label>
			<input  class=" w-100 mt-1 " type="hidden"  name="eqcn_watext2" id="eqcn_watext2" value="<?php echo sanitize_text_field(esc_attr(get_option('eqcn_watext2')))  ?>" placeholder="<?php esc_html_e('Hola quiero saber...','eqconnect'); ?>">
		</div>
	</div>

	<div class="mt-4"> 
		<span><?php esc_html_e('Usa estos ejemplos como referencia para crear tus enlaces: ','eqconnect'); ?></span><br>
		<span><strong>Link: </strong><?php esc_html_e('"https://www.esteesmilink.com"','eqconnect'); ?></span><br>
		<span><strong><?php esc_html_e('Correo:','eqconnect'); ?></strong> <?php esc_html_e('"micorreo@ejemplo.com"','eqconnect'); ?></span><br> 
		<span><strong><?php esc_html_e('Teléfono y WhatsApp:','eqconnect'); ?></strong> <?php esc_html_e('Colocar el número de teléfono con el código del país delante sin el signo "+" ej: 5353000000','eqconnect'); ?></span> 
	
	</div>

</div>
<!-- Tap 2  -->
<?php defined( 'ABSPATH' ) || die(); ?>
<!-- Tap 6 -->
<div id="tab6" class="tab-pane hide"> 	
	<div class=""> 
		<span><?php esc_html_e('Ajuste lo colores a tu Identidad Visual.','eqconnect'); ?></span><br>
		<span><strong><?php esc_html_e('*Nota:','eqconnect'); ?></strong> <?php esc_html_e('Este color será usado en la burbuja flotante y los CTAs.','eqconnect'); ?></span>
	</div>
	<div class="mt-3 d-flex">

		<div id="color" >

			<input type="text" name="eqcn_primario" id="eqcn_primario" class="eqcn_primario" data-default-color="#4A85FE"   
			value="<?php 
			if (esc_attr(get_option('eqcn_primario')))
			{ echo esc_attr(get_option('eqcn_primario'));}
			else{ echo '#4A85FE';}  ?>"/>

		</div>
		<div class="w-100 d-flex justify-content-center">
			<label class="qc" for="qcCheckbox">
				<i class="qcgicon gicon-soporte"></i>
			</label>
		</div>
	</div>
</div>
<!-- Tap 6  -->
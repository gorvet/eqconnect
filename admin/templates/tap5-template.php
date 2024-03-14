<!-- Tap 5  -->
<div id="tab5" class="tab-pane hide"> 	
	<div class=""> 
		<span>Defina la imagen que desea para la Burbuja.</span> <Br> 
		<span><strong>*Nota: </strong>Si no se define una imagen se usará el icono de <strong>GConnect</strong> por defecto.</span> 
	</div>
	<div class="center">
		<div class="qconnect_ico_fcontainer">
			<div class="qconnect_ico_container">
				<?php if (esc_attr(get_option('eqconnect_ico_url'))): ?>
					<img  class="qconnect_ico" id="eqconnect_ico" src="<?php echo esc_attr(get_option('eqconnect_ico_url'))  ?>">
				<?php else: ?>
					<img  class="qconnect_ico" id="eqconnect_ico" src=" <?php echo
					EQCONNECT_PLUGIN_URL . 'admin/img/qconnect.png' ?>"> 
				<?php endif ?>
			</div> 
		</div>
		<label class="sb" for="sbCheckbox">
        <div class="qconnect_ico_container">
				<?php if (esc_attr(get_option('eqconnect_ico_url'))): ?>
					<img  class="qconnect_ico" id="eqconnect_ico" src="<?php echo esc_attr(get_option('eqconnect_ico_url'))  ?>">
				<?php else: ?>
					<img  class="qconnect_ico" id="qconnect_ico" src=" <?php echo
					EQCONNECT_PLUGIN_URL . 'admin/img/qconnect.png' ?>"> 
				<?php endif ?>
			</div>
      </label>
		<div>
			<input type="text"  name="qconnect_ico_url" id="qconnect_ico_url" value="<?php echo esc_attr(get_option('qconnect_ico_url'))  ?>">

			<div class="button-group">
				<input  id="boton_add_image" class="button button-secondary button-large" type="button" value="<?php	echo esc_html__( 'Añadir imagen', 'qconnect' )  ?>	" >
				<input id="boton_elim_image" class="button button-secondary button-large"  type="button" value="<?php  echo esc_html__( 'Eliminar Imagen', 'qconnect' ) ?>" >
			</div>

		</div>
	</div>
</div>
<!-- Tap 5  -->
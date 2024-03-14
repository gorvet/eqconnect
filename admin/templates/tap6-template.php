<!-- Tap 6 -->
<div id="tab6" class="tab-pane hide"> 	
	<div class=""> 
		<span>Ajuste lo colores de <strong>QuickConnect</strong> a tu Identidad Visual.</span><Br>
		<span><strong>*Nota: </strong>Este color será usado en la burbuja flotante y los CTAs.</span>
	</div>
	<div class="mt-3 d-flex">

		<div id="color" >

			<input type="text" name="qcprimario" id="eqcprimario" class="qcprimario" data-default-color="#4A85FE"   
			value="<?php 
			if (esc_attr(get_option('eqcprimario')))
			{ echo esc_attr(get_option('eqcprimario'));}
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
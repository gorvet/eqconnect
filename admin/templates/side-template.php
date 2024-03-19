<?php defined( 'ABSPATH' ) || die(); ?>
<div  class="contact-container">
	<h2><?php esc_html_e('¿Cómo podemos ayudarte?','eqconnect'); ?></h2>  
	<ul class="feedback-types">
		<li>
			<a id="feedback-link-1" href="#" >
				<span ><?php esc_html_e('Tengo ideas para mejorar este plugin','eqconnect'); ?></span>
			</a>
		</li>
		<li>
			<a id="feedback-link-2"  href="#" >
				<span><?php esc_html_e('Necesito ayuda con este plugin','eqconnect'); ?></span>
			</a>
		</li>
		<li>
			<a id="feedback-link-3" href="#" >
				<span id="feedback-link-3" ><?php esc_html_e('Quiero hacer una donación a los desarrolladores','eqconnect'); ?></span>
			</a>
		</li>
	</ul>

	<form  role="form" method="POST"    class="feedback-form hidden simple_form form form-vertical" id="eqcn_sendmail"  method="POST" name="feedback">
		<div class=" ">
			<input placeholder="<?php esc_html_e('Nombre','eqconnect'); ?>" type="text"  name="subscriber_name" id="subscriber_name" required  class="field">
		</div>
		<div class=" ">
			<input placeholder="<?php esc_html_e('Correo','eqconnect'); ?>" type="email" name="subscriber_email" id="subscriber_email"   required   class="field">
		</div>
		<div class=" ">
			<textarea rows="3" id="subscriber_message" name="subscriber_message" class="field"   required minlength="20"></textarea>
		</div>
		<div class="mt-2 ">
			<label for="feedback-terms">
				<input type="checkbox" class="feedback-terms" id="feedback-terms" checked="checked" required><?php esc_html_e('Estoy de acuerdo en que, rellenando el formulario de contacto con mis datos, autorizo a Easy Quick Connect a usar mi correo para responder a mis solicitudes de información.','eqconnect'); ?>
				
			</label>
		</div>
		<div class="buttons">
			<a class="feedback-cancel     " id="feedback-cancel" href="#" ><?php esc_html_e('Cancelar','eqconnect'); ?></a>
			<button id="feedback-submit"  class="button-send button button-primary hidden"><?php esc_html_e('Enviar','eqconnect'); ?></button>
		</div>
		<div class="">
			<span id="alerta" class="alerta  hide">Validación</span>
		</div>
	</form>

	<div class="feedback-donate hidden" id="feedback-donate">
		<h3><?php esc_html_e('Agradecemos su contribución para seguir desarrollando este plugin:','eqconnect'); ?></h3>
		<div class="center my-2">
			<span><strong><?php esc_html_e('Escanee el código para donar desde Cuba por TransferMóvil (CUP)','eqconnect'); ?></strong></span>
		</div>
		<div class="center">
			<img  class="donate"  src=" <?php echo esc_url (EQCONNECT_PLUGIN_URL . '/admin/img/donatecup.png' ) ?>">
		</div>
		<div class="center mt-2">
			<span><strong><?php esc_html_e('Escanee el código para donar desde Cuba por TransferMóvil (MLC)','eqconnect'); ?></strong></span>
		</div>
		<div class="center">
			<img  class="donate"  src=" <?php echo esc_url (EQCONNECT_PLUGIN_URL . '/admin/img/donatemlc.png' ) ?>">
		</div>
		 
		<div class="center mt-2">
			<span>
				<a class="" href="https://wa.me/5353779424?text=<?php esc_html_e('Hola ¿Cómo puedo hacerte una donación?','eqconnect'); ?>" target="_blanc"><strong><?php esc_html_e('Usar otro método','eqconnect'); ?></strong></a>
			</span>
		</div>
	</div>
</div>


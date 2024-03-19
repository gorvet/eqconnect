<?php defined( 'ABSPATH' ) || die(); ?>
<div  class="contact-container">
	<h2>¿Cómo podemos ayudarte?</h2>  
	<ul class="feedback-types">
		<li>
			<a id="feedback-link-1" href="#" >
				<span >Tengo ideas para mejorar este plugin</span>
			</a>
		</li>
		<li>
			<a id="feedback-link-2"  href="#" >
				<span>Necesito ayuda con este plugin</span>
			</a>
		</li>
		<li>
			<a id="feedback-link-3" href="#" >
				<span id="feedback-link-3" >Quiero hacer una donación a los desarrolladores</span>
			</a>
		</li>
	</ul>

	<form  role="form" method="POST" action="<?php echo esc_url (QCONNECT_PLUGIN_URL.'/include/sendmail/sendmail.php' ) ?>"   class="feedback-form hidden simple_form form form-vertical" id="qcsendmail"  method="POST" name="feedback">
		<div class=" ">
			<input placeholder="Nombre" type="text"  name="subscriber_name" id="subscriber_name" required  class="field">
		</div>
		<div class=" ">
			<input placeholder="Correo electrónico" type="email" name="subscriber_email" id="subscriber_email"   required   class="field">
		</div>
		<div class=" ">
			<textarea rows="3" id="subscriber_message" name="subscriber_message" class="field"   required minlength="20"></textarea>
		</div>
		<div class="mt-2 ">
			<label for="feedback-terms">
				<input type="checkbox" class="feedback-terms" id="feedback-terms" checked="checked" required>
				Estoy de acuerdo en que, rellenando el formulario de contacto con mis datos, autorizo a QuickConnect a usar mi <strong>Correo</strong> para responder a mis solicitudes de información.  
			</label>
		</div>
		<div class="buttons">
			<a class="feedback-cancel     " id="feedback-cancel" href="#" >Cancelar</a>
			<button id="feedback-submit"  class="button-send button button-primary hidden">Enviar</button>
		</div>
		<div class="">
			<span id="alerta" class="alerta  hide">Validación</span>
		</div>
	</form>

	<div class="feedback-donate hidden" id="feedback-donate">
		<span>Agradecemos su contribución para seguir desarrollando este plugin:</span>
		<div class="center my-2">
			<span><strong>Escanee el código para donar desde Cuba por TransferMóvil (CUP)</strong></span>
		</div>
		<div class="center">
			<img  class="donate"  src=" <?php echo esc_url (QCONNECT_PLUGIN_URL . '/admin/img/donatecup.png' ) ?>">
		</div>
		<div class="center mt-2">
			<span><strong>Escanee el código para donar desde Cuba por TransferMóvil (MLC)</strong></span>
		</div>
		<div class="center">
			<img  class="donate"  src=" <?php echo esc_url (QCONNECT_PLUGIN_URL . '/admin/img/donatemlc.png' ) ?>">
		</div>
		 
		 
		<div class="center mt-2">
			<span>
				<a class="" href="https://wa.me/5353779424?text=Hola ¿Cómo puedo hacerte una donación?"><strong>Usar otro método</strong></a>
			</span>
		</div>
	</div>
</div>



jQuery(document).ready(function($){
	var meta_gallery_frame;

	$('#boton_add_image').click(function(e) {
		e.preventDefault();
		// Si el frame existe abre la modal
		if (meta_gallery_frame) {
			meta_gallery_frame.open();
			return;
		}
		// Crea un nuevo frame
		meta_gallery_frame = wp.media.frames.file_frame = wp.media({
			title: 'Selecciona la Imagen',
			library: {
					type: 'image'
				},
			button: {
				text: 'Añadir Imagen'
			},
			multiple: false
		});
		// Cuando se selecciona un fichero, captura la URL y asígnala al input
		meta_gallery_frame.on('select', function() {
			attachment = meta_gallery_frame.state().get('selection').first().toJSON();
			$('#eqconnect_ico_url').val(attachment.url);
				$( '#eqconnect_ico' ).attr('src', attachment.url);
		});
		// Abre la modal con el frame 
		meta_gallery_frame.open();
	});

	$('#boton_elim_image').click(function(e) {
		e.preventDefault();
		// Elimina los ids del input.
		/*$( '#mybchat-ico-url' ).val( '' ).trigger( 'change' );*/
		// Elimina las miniaturas.
		$( '#eqconnect_ico_url' ).attr('value', jsmpurl + '/admin/img/qconnect.png');
		$( '#eqconnect_ico' ).attr('src', jsmpurl + '/admin/img/qconnect.png');
		$('#eqconnect_ico_url').val(" ");
		return;
	});

});


<?php defined( 'ABSPATH' ) || die(); ?>
<?php
$cta_options = array(//nonbre de los iconos en mi tipografia de iconos
	'chat2'=>'&#xe92d;',
	'mail'=>'&#xe921;',
	'phone'=>'&#xe922;',
	'link'=>'&#xe97e;',
	'whatsapp'=>'&#xe912;',
	'telegram'=>'&#xe91b;',
	'twitter'=>'&#xe911;',
	'instagram'=>'&#xe915;',
	'facebook'=>'&#xe90f;',
	'utilities'=>'&#xe93c;',
	'admin'=>'&#xe928;',
);

?>
<div class="qcheader" >
	<img class="qconnectlogo" src="<?php echo  esc_url(EQCONNECT_PLUGIN_URL .  'admin/img/eqconnectlogo.png')?>">
	<p><?php esc_html_e('Gracias por usar','eqconnect'); ?><strong> Easy Quick Connect</strong>, <?php esc_html_e('Comencemos a configurarlo para su mejor funcionamiento. No te olvides de guardar los cambios al finalizar ;-)','eqconnect') ?></p>

</div>

<div id="wizard-container" class="tabbable-container">
	<form action="options.php" method="post" class=" ">
		<div class="d-flex">
			<!-- Listado de los taps  -->

			<div class="tabs-left">
				<ul class="tabs-container">
					<li class="">
						<a data-toggle="tab" href="#tab1" aria-expanded="true">CTA 1</a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#tab2" aria-expanded="true">CTA 2</a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#tab3" aria-expanded="true">CTA 3</a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#tab4" aria-expanded="true">CTA 4</a>
					</li>

					<li class="">
						<a data-toggle="tab" href="#tab6" aria-expanded="true">Color</a>
					</li>
				</ul>
			</div>

			<!-- Listado de los taps  -->

			<div class="tab-content">
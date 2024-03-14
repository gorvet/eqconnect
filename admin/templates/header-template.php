<?php
            $cta_options = array(//nonbre de los iconos en mi tipografia de iconos
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
	<img class="qconnectlogo"style="max-height:50px;" src=" <?php echo  EQCONNECT_PLUGIN_URL .  '/admin/img/qconnectlogo.png'?>">
	<p><strong>Gracias por usar QuickConnect</strong>, Comencemos a configurarlo para su mejor funcionamiento. No te olvides de guardar los cambios al finalizar ;-)</p>
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
		<!-- <li class="">
			<a data-toggle="tab" href="#tab5" aria-expanded="true">Foto</a>
		</li> -->
		<li class="">
			<a data-toggle="tab" href="#tab6" aria-expanded="true">Identidad</a>
		</li>
	</ul>
</div>

<!-- Listado de los taps  -->
	
			<div class="tab-content">
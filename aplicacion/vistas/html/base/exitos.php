<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">
			<strong>Exito</strong>
		</h3>
	</div>
	<div class="panel-body">
	   <ul>
<?php foreach ($datos['mensajes_exito'] as $exito) { ?>
        <li><?php echo $exito; ?></li>
<?php } ?>
        </ul>
	</div>
</div>
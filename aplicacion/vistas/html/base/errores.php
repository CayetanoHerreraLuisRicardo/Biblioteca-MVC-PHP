<div class="panel panel-danger">
	<div class="panel-heading">
		<h3 class="panel-title">
			<strong>Error</strong>
		</h3>
	</div>
	<div class="panel-body">
	   <ul>
<?php foreach ($datos['mensajes_error'] as $error) { ?>
        <li><?php echo $error; ?></li>
<?php } ?>
        </ul>
	</div>
</div>
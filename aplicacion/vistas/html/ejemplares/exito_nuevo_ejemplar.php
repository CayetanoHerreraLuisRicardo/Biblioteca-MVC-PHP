<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">
			<strong>Exito</strong>
		</h3>
	</div>
	<div class="panel-body">
		<ul>
			<li>El ejemplar <strong><?php echo @$datos['ejemplar']['observaciones_ejemplar']; ?></strong>
				ha sido guardado.
			</li>
		</ul>
	</div>
	<div class="panel-footer clearfix">
		<div class="pull-right">
			<a href="biblioteca.php?c=ejemplares&a=ver_ejemplar&id_ejemplar=<?php echo @$datos['ejemplar']['id_ejemplar']; ?>"
				class="btn btn-primary">Información</a> <a
				href="biblioteca.php?c=ejemplares&a=editar_ejemplar&id_ejemplar=<?php echo @$datos['ejemplar']['id_ejemplar']; ?>"
				class="btn btn-default">Editar</a> <a
				href="biblioteca.php?c=ejemplares&a=borrar_ejemplar&id_ejemplar=<?php echo @$datos['ejemplar']['id_ejemplar']; ?>"
				class="btn btn-warning">Borrar</a>
		</div>
	</div>
</div>
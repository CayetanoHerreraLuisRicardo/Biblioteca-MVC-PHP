<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">
			<strong>Exito</strong>
		</h3>
	</div>
	<div class="panel-body">
		<ul>
			<li>El libro <strong><?php echo @$datos['libro']['titulo_libro']; ?></strong>
				ha sido guardado.
			</li>
		</ul>
	</div>
	<div class="panel-footer clearfix">
		<div class="pull-right">
			<a href="biblioteca.php?c=libros&a=ver_libro&id_libro=<?php echo @$datos['libro']['id_libro']; ?>"
				class="btn btn-primary">Información</a> <a
				href="biblioteca.php?c=libros&a=editar_libro&id_libro=<?php echo @$datos['libro']['id_libro']; ?>"
				class="btn btn-default">Editar</a> <a
				href="biblioteca.php?c=libros&a=borrar_libro&id_libro=<?php echo @$datos['libro']['id_libro']; ?>"
				class="btn btn-warning">Borrar</a>
		</div>
	</div>
</div>
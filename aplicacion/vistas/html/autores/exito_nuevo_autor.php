<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">
			<strong>Exito</strong>
		</h3>
	</div>
	<div class="panel-body">
		<ul>
			<li>El autor <strong><?php echo @$datos['autor']['nombre_autor']; ?></strong>
				ha sido guardado.
			</li>
		</ul>
	</div>
	<div class="panel-footer clearfix">
		<div class="pull-right">
			<a href="biblioteca.php?c=autores&a=ver_autor&id_autor=<?php echo @$datos['autor']['id_autor']; ?>"
				class="btn btn-primary">Información</a> <a
				href="biblioteca.php?c=autores&a=editar_autor&id_autor=<?php echo @$datos['autor']['id_autor']; ?>"
				class="btn btn-default">Editar</a> <a
				href="biblioteca.php?c=autores&a=borrar_autor&id_autor=<?php echo @$datos['autor']['id_autor']; ?>"
				class="btn btn-warning">Borrar</a>
		</div>
	</div>
</div>
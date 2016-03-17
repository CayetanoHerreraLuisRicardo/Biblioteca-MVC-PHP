<?php foreach ($datos['autores'] as $autor) { ?>
<div class="panel panel-primary">
	<div class="panel-heading">
		ID AUTOR: <strong><?php echo $autor['id_autor']; ?></strong>
	</div>
	<div class="panel-body">
		<ul>
			<li><strong>NOMBRE:</strong> <?php echo $autor['nombre_autor']; ?></li>
			<li><strong>NACIONALIDAD:</strong> <?php echo $autor['nacionalidad_autor']; ?></li>
		</ul>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<a href="biblioteca.php?c=autores&a=editar_autor&id_autor=<?php echo $autor['id_autor']; ?>" class="btn btn-default">Editar</a>
			<a href="biblioteca.php?c=autores&a=borrar_autor&id_autor=<?php echo $autor['id_autor']; ?>" class="btn btn-danger">Borrar</a>
			<a href="biblioteca.php?c=autores&a=ver_lista&v=tabla" class="btn btn-primary">Regresar</a>
		</div>
	</div>
</div>
<?php } ?>
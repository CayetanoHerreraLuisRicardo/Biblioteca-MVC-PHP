<?php foreach ($datos['libros'] as $libro) { ?>
<div class="panel panel-primary">
	<div class="panel-heading">
		ID DEL LIBRO: <strong><?php echo $libro['id_libro']; ?></strong>
	</div>
	<div class="panel-body">
		<ul>
					<li><strong>ISBN:</strong> <?php echo $libro['isbn_libro']; ?></li>
					<li><strong>EDITORIAL:</strong> <?php echo $libro['editorial_libro']; ?></li>
					<li><strong>AÑO DE PUBLICACION:</strong> <?php echo $libro['anio_publicacion_libro']; ?></li>
		</ul>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<a href="biblioteca.php?c=libros&a=editar_libro&id_libro=<?php echo $libro['id_libro']; ?>" class="btn btn-default">Editar</a>
			<a href="biblioteca.php?c=libros&a=borrar_libro&id_libro=<?php echo $libro['id_libro']; ?>" class="btn btn-warning">Borrar</a>
			<a href="biblioteca.php?c=libros&a=ver_lista&v=tabla" class="btn btn-primary">Regresar</a>
		</div>
	</div>
</div>
<?php } ?>
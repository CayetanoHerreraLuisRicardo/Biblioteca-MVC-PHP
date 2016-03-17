<div class="row">
	<div class="col-md-2">
		<a href="biblioteca.php?c=libros&a=ver_lista&v=excel"
			class="btn btn-success btn-xs boton_exportar"> <span
			class="glyphicon glyphicon-export"></span> Exportar a Excel
		</a>
	</div>
	<div class="col-md-2">
		<a href="biblioteca.php?c=libros&a=ver_lista&v=pdf"
			class="btn btn-success btn-xs boton_exportar"> <span
			class="glyphicon glyphicon-export"></span> Exportar a PDF
		</a>
	</div>
</div>

<?php foreach ($datos['libros'] as $libro) { ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				libro: <strong><?php echo $libro['titulo_libro']; ?></strong>
			</div>
			<div class="panel-body">
				<ul>
					<li><strong>Editorial:</strong> <?php echo $libro['editorial_libro']; ?></li>
					<li><strong>Año de publicación:</strong> <?php echo $libro['anio_publicacion_libro']; ?></li>
				</ul>
			</div>

			<div class="panel-footer clearfix">
				<div class="pull-right">
					<a
						href="biblioteca.php?c=libros&a=ver_libro&id_libro=<?php echo $libro['id_libro']; ?>"
						class="btn btn-primary">Información</a> <a
						href="biblioteca.php?c=libros&a=editar_libro&id_libro=<?php echo $libro['id_libro']; ?>"
						class="btn btn-default">Editar</a> <a
						href="biblioteca.php?c=libros&a=borrar_libro&id_libro=<?php echo $libro['id_libro']; ?>"
						class="btn btn-warning">Borrar</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>
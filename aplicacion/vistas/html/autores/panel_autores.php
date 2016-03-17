<div class="row">
	<div class="col-md-2">
		<a href="biblioteca.php?c=autores&a=ver_lista&v=excel"
			class="btn btn-success btn-xs boton_exportar"> <span
			class="glyphicon glyphicon-export"></span> Exportar a Excel
		</a>
	</div>
	<div class="col-md-2">
		<a href="biblioteca.php?c=autores&a=ver_lista&v=pdf"
			class="btn btn-success btn-xs boton_exportar"> <span
			class="glyphicon glyphicon-export"></span> Exportar a PDF
		</a>
	</div>
</div>

<?php foreach ($datos['autores'] as $autor) { ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Autor: <strong><?php echo $autor['nombre_autor']; ?></strong>
			</div>
			<div class="panel-body">
				<ul>
					<li><strong>Nacionalidad:</strong> <?php echo $autor['nacionalidad_autor']; ?></li>
				</ul>
			</div>

			<div class="panel-footer clearfix">
				<div class="pull-right">
					<a
						href="biblioteca.php?c=autores&a=ver_autor&id_autor=<?php echo $autor['id_autor']; ?>"
						class="btn btn-primary">Información</a> <a
						href="biblioteca.php?c=autores&a=editar_autor&id_autor=<?php echo $autor['id_autor']; ?>"
						class="btn btn-default">Editar</a> <a
						href="biblioteca.php?c=autores&a=borrar_autor&id_autor=<?php echo $autor['id_autor']; ?>"
						class="btn btn-warning">Borrar</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>
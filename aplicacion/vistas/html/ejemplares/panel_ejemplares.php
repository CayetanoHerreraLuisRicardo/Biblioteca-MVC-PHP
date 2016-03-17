<div class="row">
	<div class="col-md-2">
		<a href="biblioteca.php?c=ejemplares&a=ver_lista&v=excel"
			class="btn btn-success btn-xs boton_exportar"> <span
			class="glyphicon glyphicon-export"></span> Exportar a Excel
		</a>
	</div>
	<div class="col-md-2">
		<a href="biblioteca.php?c=ejemplares&a=ver_lista&v=pdf"
			class="btn btn-success btn-xs boton_exportar"> <span
			class="glyphicon glyphicon-export"></span> Exportar a PDF
		</a>
	</div>
</div>

<?php foreach ($datos['ejemplares'] as $ejemplar) { ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Ejemplar: <strong><?php echo $ejemplar['observaciones_ejemplar']; ?></strong>
			</div>
			<div class="panel-body">
				<ul>
					<li><strong>Nacionalidad:</strong> <?php echo $ejemplar['isbn']; ?></li>
				</ul>
			</div>

			<div class="panel-footer clearfix">
				<div class="pull-right">
					<a
						href="biblioteca.php?c=ejemplares&a=ver_ejemplar&id_ejemplar=<?php echo $ejemplar['id_ejemplar']; ?>"
						class="btn btn-primary">Información</a> <a
						href="biblioteca.php?c=ejemplares&a=editar_ejemplar&id_ejemplar=<?php echo $ejemplar['id_ejemplar']; ?>"
						class="btn btn-default">Editar</a> <a
						href="biblioteca.php?c=ejemplares&a=borrar_ejemplar&id_ejemplar=<?php echo $ejemplar['id_ejemplar']; ?>"
						class="btn btn-warning">Borrar</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>
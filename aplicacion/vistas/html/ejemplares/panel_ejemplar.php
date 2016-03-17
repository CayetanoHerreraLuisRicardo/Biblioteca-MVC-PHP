<?php foreach ($datos['ejemplares'] as $ejemplar) { ?>
<div class="panel panel-primary">
	<div class="panel-heading">
		jemplar: <strong><?php echo $ejemplar['observaciones_ejemplar']; ?></strong>
	</div>
	<div class="panel-body">
		<ul>
			<li><strong>Nacionalidad:</strong> <?php echo $ejemplar['isbn']; ?></li>
		</ul>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<a href="biblioteca.php?c=ejemplares&a=editar_ejemplar&id_ejemplar=<?php echo $ejemplar['id_ejemplar']; ?>" class="btn btn-default">Editar</a>
			<a href="biblioteca.php?c=ejemplares&a=borrar_ejemplar&id_ejemplar=<?php echo $ejemplar['id_ejemplar']; ?>" class="btn btn-danger">Borrar</a>
			<a href="biblioteca.php?c=ejemplares&a=ver_lista&v=tabla" class="btn btn-primary">Regresar</a>
		</div>
	</div>
</div>
<?php } ?>
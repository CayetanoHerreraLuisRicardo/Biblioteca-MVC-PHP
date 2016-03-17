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

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered1" align="center">
  			<tr class="info">
    			<td>
    				<h3 class="text-info"><img src="img/ejemplares.jpg" class="img-circle" width="50" height="50"> EJEMPLARES</h3>
    			</td>
  			</tr>	
		</table>
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
					<th>EJEMPLAR</th>
					<th>ISBN</th>
					<th>OPCIONES</th>
				</tr>
			</thead>
			<tbody>
  <?php foreach ($datos['ejemplares'] as $ejemplar) { ?>
    <tr>
					<td><?php echo $ejemplar['observaciones_ejemplar']; ?></td>
					<td><?php echo $ejemplar['isbn']; ?></td>
					<td><a
						href="biblioteca.php?c=ejemplares&a=ver_ejemplar&id_ejemplar=<?php echo $ejemplar['id_ejemplar']; ?>"
						class="btn btn-primary btn-xs">Información</a> <a
						href="biblioteca.php?c=ejemplares&a=editar_ejemplar&id_ejemplar=<?php echo $ejemplar['id_ejemplar']; ?>"
						class="btn btn-default btn-xs">Editar</a> <a
						href="biblioteca.php?c=ejemplares&a=borrar_ejemplar&id_ejemplar=<?php echo $ejemplar['id_ejemplar']; ?>"
						class="btn btn-danger btn-xs">Borrar</a></td>
				</tr>
  <?php } ?>
    </tbody>
		</table>
	</div>
</div>
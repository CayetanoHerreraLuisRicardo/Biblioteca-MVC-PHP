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

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered1" align="center">
  			<tr class="info">
    			<td>
    				<h3 class="text-info"><img src="img/autores.jpg" class="img-circle" width="50" height="50"> AUTORES</h3>
    			</td>
  			</tr>	
		</table>
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
					<th>AUTOR</th>
					<th>NACIONALIDAD</th>
					<th>OPCIONES</th>
				</tr>
			</thead>
			<tbody>
  <?php foreach ($datos['autores'] as $autor) { ?>
    <tr>
					<td><?php echo $autor['nombre_autor']; ?></td>
					<td><?php echo $autor['nacionalidad_autor']; ?></td>
					<td><a
						href="biblioteca.php?c=autores&a=ver_autor&id_autor=<?php echo $autor['id_autor']; ?>"
						class="btn btn-primary btn-xs">Información</a> <a
						href="biblioteca.php?c=autores&a=editar_autor&id_autor=<?php echo $autor['id_autor']; ?>"
						class="btn btn-default btn-xs">Editar</a> <a
						href="biblioteca.php?c=autores&a=borrar_autor&id_autor=<?php echo $autor['id_autor']; ?>"
						class="btn btn-danger btn-xs">Borrar</a></td>
				</tr>
  <?php } ?>
    </tbody>
		</table>
	</div>
</div>
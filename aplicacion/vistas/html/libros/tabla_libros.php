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

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered1" align="center">
  			<tr class="info">
    			<td>
    				<h3 class="text-info"><img src="img/libros.jpg" class="img-circle" width="50" height="50"> LIBROS</h3>
    			</td>
  			</tr>	
		</table>
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
					<th>LIBRO</th>
					<th>EDITORIAL</th>
					<th>AÑO DE PUBLICACION</th>
					<th>OPCIONES</th>
				</tr>
			</thead>
			<tbody>
  <?php foreach ($datos['libros'] as $libro) { ?>
    <tr>
					<td><?php echo $libro['titulo_libro']; ?></td>
					<td><?php echo $libro['editorial_libro']; ?></td>
					<td><?php echo $libro['anio_publicacion_libro']; ?></td>
					<td><a
						href="biblioteca.php?c=libros&a=ver_libro&id_libro=<?php echo $libro['id_libro']; ?>"
						class="btn btn-primary btn-xs">Información</a> <a
						href="biblioteca.php?c=libros&a=editar_libro&id_libro=<?php echo $libro['id_libro']; ?>"
						class="btn btn-default btn-xs">Editar</a> <a
						href="biblioteca.php?c=libros&a=borrar_libro&id_libro=<?php echo $libro['id_libro']; ?>"
						class="btn btn-danger btn-xs">Borrar</a></td>
				</tr>
  <?php } ?>
    </tbody>
		</table>
	</div>
</div>
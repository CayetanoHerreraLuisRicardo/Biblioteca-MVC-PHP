
<form method="post" action="biblioteca.php?c=libros&a=guardar_libro"
	class="form-horizontal" role="form">

	<div class="form-group">
		<label for="isbn_libro" class="col-md-4">ISBN del libro:
            <input type="text" placeholder="Ingresa el ISBN del libro"
            class="form-control col-md-8"
			name="libro[isbn_libro]"
			value="<?php echo @$datos[libro]['isbn_libro']; ?>"
			id="isbn_libro" />
		</label>
	</div>

	<div class="form-group">
		<label for="titulo_libro" class="col-md-4">Titulo del libro:
            <input type="text" placeholder="Ingresa el titulo del libro"
            class="form-control col-md-8"
			name="libro[titulo_libro]"
			value="<?php echo @$datos[libro]['titulo_libro']; ?>"
			id="tiulo_libro" />
		</label>
	</div>

	<div class="form-group">
		<label for="editorial_libro" class="col-md-4">Editorial del libro:
            <input type="text" placeholder="Ingresa el editorial del libro"
            class="form-control col-md-8"
			name="libro[editorial_libro]"
			value="<?php echo @$datos[libro]['editorial_libro']; ?>"
			id="editorial_libro" />
		</label>
	</div>

	<div class="form-group">
		<label for="anio_publicacion_libro" class="col-md-4">Año de publicacion::
            <input type="text" placeholder="Ingresa el año de publicacion "
			class="form-control col-md-8"
			name="libro[anio_publicacion_libro]"
			value="<?php echo @$datos[libro]['anio_publicacion_libro']; ?>"
			id="anio_publicacion_libro" />
		</label>
	</div>

	<div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
	</div>

</form>

<?php if (@$datos['error'] == true) { ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger">
			<div class="panel-heading">Errores</div>
			<div class="panel-body">
			<ul>
                <?php foreach (@$datos['mensajes_error'] as $error) { ?>
                <li><?php echo $error; ?></li>
                <?php } ?>
			</ul>
			</div>
		</div>
	</div>
</div>
<?php } ?>

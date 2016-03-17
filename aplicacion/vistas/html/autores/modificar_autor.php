<?php foreach ($datos['autores'] as $autor) { ?>
<form method="post" action="biblioteca.php?c=autores&a=modificar_autor&id_autor=<?php echo $autor['id_autor']; ?>"
	class="form-horizontal" role="form">

	<div class="form-group">
		<label for="nombre_autor" class="col-md-4">Nombre del autor:
            <input type="text" placeholder="Ingresa el nombre"
            class="form-control col-md-8"
			name="autor[nombre_autor]"
			value="<?php echo $autor['nombre_autor']; ?>"
			id="nombre_autor" />
		</label>
	</div>

	<div class="form-group">
		<label for="nacionalidad_autor" class="col-md-4">Nacionalidad del autor:
            <input type="text" placeholder="ingresa la nacionalidad"
			class="form-control col-md-8"
			name="autor[nacionalidad_autor]"
			value="<?php echo $autor['nacionalidad_autor']; ?>"
			id="nacionalidad_autor" />
		</label>
	</div>

	<div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="biblioteca.php?c=autores&a=ver_lista&v=tabla" class="btn btn-default">Cancelar</a>
        </div>
	</div>

</form>
<?php } ?>

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

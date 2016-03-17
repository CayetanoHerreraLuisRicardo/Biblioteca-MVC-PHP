<?php foreach ($datos['ejemplares'] as $ejemplar) { ?>
<form method="post" action="biblioteca.php?c=ejemplares&a=modificar_ejemplar&id_ejemplar=<?php echo $ejemplar['id_ejemplar']; ?>"
	class="form-horizontal" role="form">

	<div class="form-group">
		<label for="ejemplar" class="col-md-4">Observaciones del ejemplar:
            <input type="text" placeholder="Ingresa ejemplar"
            class="form-control col-md-8"
			name="ejemplar[observaciones_ejemplar]"
			value="<?php echo $ejemplar['observaciones_ejemplar']; ?>"
			id="observaciones_ejemplar" />
		</label>
	</div>

	<div class="form-group">
		<label for="isbnn" class="col-md-4">ISBN del ejemplar:
            <input type="text" placeholder="ingresa el ISBN del ejemplar"
			class="form-control col-md-8"
			name="ejemplar[isbn]"
			value="<?php echo $ejemplar['isbn']; ?>"
			id="isbn" />
		</label>
	</div>

	<div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="biblioteca.php?c=ejemplares&a=ver_lista&v=tabla" class="btn btn-default">Cancelar</a>
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

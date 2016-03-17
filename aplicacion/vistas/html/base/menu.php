
<div class="navbar navbar-inverse" role="navigation" >
	<div class="container-fluid">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-collapse">
				<span class="sr-only">Biblioteca</span>
				<span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="biblioteca.php">Biblioteca</a>
		</div>

		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">Autores<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="biblioteca.php?c=autores&a=ver_lista&v=tabla">Tabla</a></li>
						<li><a href="biblioteca.php?c=autores&a=ver_lista&v=panel">Paneles</a></li>
						<li><a href="biblioteca.php?c=autores&a=nuevo_autor">Nuevo autor</a></li>
					</ul>
				</li>

				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">Ejemplares<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="biblioteca.php?c=ejemplares&a=ver_lista&v=tabla">Tabla</a></li>
						<li><a href="biblioteca.php?c=ejemplares&a=ver_lista&v=panel">Paneles</a></li>
						<li><a href="biblioteca.php?c=ejemplares&a=nuevo_ejemplar">Nuevo ejemplar</a></li>
					</ul>
				</li>

				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">Libros<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="biblioteca.php?c=libros&a=ver_lista&v=tabla">Tabla</a></li>
						<li><a href="biblioteca.php?c=libros&a=ver_lista&v=panel">Paneles</a></li>
						<li><a href="biblioteca.php?c=libros&a=nuevo_libro">Nuevo libro</a></li>
					</ul>
				</li>

				<li class="dropdown"><a href="#" class="dropdown-toggle" 
					data-toggle="dropdown">Cuenta<b class="caret"></b></a>
					<ul class="dropdown-menu" >
						<li><a href="sesion/salir.php"><strong>Cerrar Sesion</strong></a></li>
					</ul>
				</li>


			</ul>
			
		</div>
	</div>
</div>

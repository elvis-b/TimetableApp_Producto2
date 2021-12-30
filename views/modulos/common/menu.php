<?php
if (!isset($_SESSION["nombre"])) {
    ?>
    <!-- Menu usuario no logueado -->
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="inicio">App Time Table</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="vistaLogin">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="vistaRegistro">Registro</a>
        </li>
    </ul>
    <?php

} else if ($_SESSION["tipo"] == "ESTUDIANTE") {
    ?>
    <!-- Menu alumno -->
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="inicio">App Time Table</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="vistaMisCursos">Mis Cursos</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="vistaCalendario">Ver horarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="vistaPerfil">Modificar Perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="views/modulos/logout.php">Cerrar sesion <?php echo $_SESSION["username"] ?></a>
        </li>
    </ul>

    <?php
} else if ($_SESSION["tipo"] == "PROFESOR") {
    ?>

    <!-- Menu profesor -->
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="inicio">App Time Table</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="vistaMisCursos">Mis cursos</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="vistaCalendario">Ver horarios</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="vistaPerfil">Modificar Perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="views/modulos/logout.php">Cerrar sesion <?php echo $_SESSION["username"] ?></a>
        </li>
    </ul>
    <?php
} else if ($_SESSION["tipo"] == "ADMIN") {
    ?>
    <!-- Menu admin -->
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="inicio">App Time Table</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="vistaCursosAdmin">Cursos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="vistaAsignaturaAdmin">Asignaturas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="userlist">Students</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="teacherlist">Teachers</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="views/modulos/logout.php">Cerrar sesion <?php echo $_SESSION["username"] ?></a>
        </li>
    </ul>

    <?php
}
?>


<!-- Menu alumno -->


<!-- Menu administrador -->


<!-- Wrap all page content here
<		<div id="wrap">
			
			<div class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="row">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">Timetable APP</a>
						</div>
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav">
	                                                    <li class="active"><a href="inicio">Home</a></li>
								<li><a href="#about">About</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Acciones <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="vistaLogin">Login</a></li>
										<li><a href="vistaRegistro">Registro</a></li>
										<li class="divider"></li>
										<li class="dropdown-header">Nav header</li>
										<li><a href="#">Separated link</a></li>
										<li><a href="#">One more separated link</a></li>
									</ul>
								</li>
							</ul>
							

						</div>
                
					
			        </div>
			    </div>
			

				</div>
			
			</div>
                        <div style="clear:both">&nbsp;</div>

 -->
 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/bot.png"   alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['nombre']; ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['nombre_rol']; ?></p>
        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="lista_usuarios.php"><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label">Usuarios</span></a></li>
      <li><a class="app-menu__item" href="lista_profesores.php"><i class="app-menu__icon fas fa-chalkboard-teacher"></i><span class="app-menu__label">Profesores</span></a></li>
    <!--  <li><a class="app-menu__item" href="lista_alumnos.php"><i class="app-menu__icon fa fa-graduation-cap"></i><span class="app-menu__label">Inscripciones</span></a></li> -->
	  
     <!-- <li><a class="app-menu__item" href="lista_grados.php"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Grados</span></a></li> -->

      <li><a class="app-menu__item" href="lista_aulas.php"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Aulas</span></a></li>
      <li><a class="app-menu__item" href="lista_materias.php"><i class="app-menu__icon fas fa-list-alt"></i><span class="app-menu__label">Materias</span></a></li>
      <li><a class="app-menu__item" href="lista_periodos.php"><i class="app-menu__icon fa fa-share-alt-square"></i><span class="app-menu__label">Periodos</span></a></li>
      <!-- <li><a class="app-menu__item" href="lista_actividad.php"><i class="app-menu__icon fas fa-check-circle"></i><span class="app-menu__label">Actividad</span></a></li> -->
	<!--  <li><a class="app-menu__item" href="lista_admisiones.php"><i class="app-menu__icon fas fa-user-graduate"></i><span class="app-menu__label">Admisiones</span></a></li> -->
      <!-- <li><a class="app-menu__item" href="lista_profesor_materia.php"><i class="app-menu__icon fa fa-cog fa-lg"></i></i><span class="app-menu__label"> Profesor Materia</span></a></li>--> 
      <li><a class="app-menu__item" href="lista_alumno_profesor.php"><i class="app-menu__icon fa fa-th-large"></i><span class="app-menu__label">Horarios Profesor</span></a></li>
      <li><a class="app-menu__item" href="lista_fecha_hora.php"><i class="app-menu__icon fa fa-cog fa-lg"></i></i><span class="app-menu__label">Control de aulas </span></a></li>
	 <!--   <li><a class="app-menu__item" href="./facturacion2/src/salir.php"><i class="app-menu__icon fa fa-credit-card"></i><span class="app-menu__label">Facturacion</span></a></li>--> 
        <li><a class="app-menu__item" href="../logout.php"><i class="app-menu__icon fas fa-sign-out-alt"></i><span class="app-menu__label">Logout</span></a></li>
      </ul>
    </aside> 
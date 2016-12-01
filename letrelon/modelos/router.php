<?php 

# El router se encargará de cargar las vistas (Código HTML) necesarias dependiendo
# de lo que el usuario pida.

	class Router {

		function cargarVista($vista){

			switch ($vista) {
				case 'inicio':
					include_once './vistas/inicio.html';
					break;
				
				case 'productos':
					include_once './vistas/productos.php';
					break;

				case 'administrar-productos':
					include_once './vistas/adminproductos.php';
					break;

				case 'signup':
					include_once './vistas/signup.php';
					break;

				case 'login':
					include_once './vistas/login.php';
					break;

				default:
					include_once './vistas/error.html';
					break;
			}

		}

	}

 ?>
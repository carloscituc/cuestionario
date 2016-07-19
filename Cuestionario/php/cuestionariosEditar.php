<?php 
	class cuestionariosEditar{

		//Cada función sirve para incluir los archivos necesarios
		//para hacer funcionar la vista en la cual se llama
		//Cada función tiene el nombre de la página en la que se utiliza
		public static function cuestionarioEditarAsignar(){
			include("conexion/conexion.php");
			include("models/cuestionariosEditar_models.php");
		}
		public static function cuestionarioEditarAsignarBuscar(){
			include("conexion/conexion.php");
			include("models/cuestionariosEditar_models.php");
		}
	}
?>
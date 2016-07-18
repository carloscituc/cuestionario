<?php 
	class cuestionariosResueltos{

		//Cada función sirve para incluir los archivos necesarios
		//para hacer funcionar la vista en la cual se llama
		//Cada función tiene el nombre de la página en la que se utiliza
		public static function cuestionarioListar(){
			include("conexion/conexion.php");
			include("models/cuestionariosResueltos_models.php");
		}

		public static function cuestionarioListarIntentos(){
			include("conexion/conexion.php");
			include("models/cuestionariosResueltos_models.php");
		}

		public static function cuestionarioListarBuscarRP(){
			include("conexion/conexion.php");
			include("models/cuestionariosResueltos_models.php");
		}

		public static function cuestionarioListarBuscarANP(){
			include("conexion/conexion.php");
			include("models/cuestionariosResueltos_models.php");
		}

		public static function detalleRP(){
			include("conexion/conexion.php");
			include("models/cuestionariosResueltos_models.php");
		}

		public static function detalleANP(){
			include("conexion/conexion.php");
			include("models/cuestionariosResueltos_models.php");
		}
	}
?>
<?php 
	class cuestionariosResueltos{

		public static function cuestionarioListar(){
			include("conexion/conexion.php");
			include("models/cuestionariosResueltos_models.php");
		}

		public static function cuestionarioListarIntentos(){
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
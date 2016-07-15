<?php 
	class cuestionariosResueltos{

		public static function index(){
			include("conexion/conexion.php");
			include("models/cuestionariosResueltos_models.php");
		}

		public static function detalleRP(){
			include("conexion/conexion.php");
			include("models/cuestionariosResueltos_models.php");
		}
	}
?>
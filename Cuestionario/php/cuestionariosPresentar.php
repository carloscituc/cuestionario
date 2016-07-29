<?php 

	class cuestionariosPresentar{

			//Cada función sirve para incluir los archivos necesarios
		//para hacer funcionar la vista en la cual se llama
		//Cada función tiene el nombre de la página en la que se utiliza
		public static function cuestionarioPresentar(){
			include("conexion/conexion.php");
			include("models/cuestionariosPresentar_models.php");
		}

		public static function cuestionariosAsignados(){
			include("conexion/conexion.php");
			include("models/cuestionariosPresentar_models.php");
		}

		public static function presentarCuestionario(){
			include("conexion/conexion.php");
			include("models/cuestionariosPresentar_models.php");
		}
	}
?>
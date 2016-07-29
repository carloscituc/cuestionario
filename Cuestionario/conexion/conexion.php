<?php
	class Conexion{

		public static function conectar(){

		    $server = "localhost";
		    $user = "root";
		    $pass = "";
		    $bd = "cuestionario";

		    $conexion = mysqli_connect($server, $user, $pass,$bd);
		    return $conexion;
		}

		public static function consultaId($sql){
			//Creamos la conexión
			$conexion = Conexion::conectar();

			mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
	    	
	    	//Ejecutamos la consulta
		    mysqli_query($conexion,$sql);

		    $id = mysqli_insert_id($conexion); //Recuperamos el último id ingresado

		    //Cerramos la conexion
		    Conexion::desconectar($conexion);

		    //Devolvemos el resultado
		    return $id;
		}
		
		public static function desconectar($conexion){
		    $close = mysqli_close($conexion);
		}

		public static function consultaSimple($sql){
			//Creamos la conexión
			$conexion = Conexion::conectar();
	    	
		    mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

		    //Ejecutamos la consulta
		    $resultado = mysqli_query($conexion,$sql);

		    //Cerramos la conexion
		    Conexion::desconectar($conexion);
		    
		}

		public static function consultaDevolver($sql){
			//Creamos la conexión
			$conexion = Conexion::conectar();
	    
		    mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

		    //Ejecutamos la consulta
		    $resultado = mysqli_query($conexion,$sql);

		    //Cerramos la conexion
		    Conexion::desconectar($conexion);

		    //Devolvemos el resultado
		    return $resultado;
		}
		/*
		function __construct(){
			$server = "localhost";
		    $user = "root";
		    $pass = "";
		    $bd = "cuestionario";

		   	$this->$conexion = mysqli_connect($server, $user, $pass,$bd);

		   	if($this->$conexion){
		   		echo "Conexion exitosa";
		   	}else{
		   		echo "Conexion fallida";
		   	}
		   	echo "<h1>HOLAAAA</h1>";
		}

		public static function consultaSimple($sql){
	    
		    mysqli_set_charset($this->conexion, "utf8"); //formato de datos utf8

		    //Ejecutamos la consulta
		    $resultado = mysqli_query($this->conexion,$sql);
		}

		public static function consultaDevolver($sql){
	    	$conexion = $this->conexion;
		    mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

		    //Ejecutamos la consulta
		    $resultado = mysqli_query($this->conexion,$sql);

		    //Devolvemos el resultado
		    return $resultado;
		}

		function __destruct(){
			$close = mysqli_close($this->conexion); 
			if($close){
				echo "Desconexión exitosa";
			}else{
				echo "Desconexión fallida";
			}
		}*/

	}
?>
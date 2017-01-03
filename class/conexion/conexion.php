<?php
class Conexion
{
	private $servidor = "localhost";
	private $usuario = "root";
	private $password = "";
	private $database = "invequipo";
	private $conn;
	public $respuesta;
	//ABRIR LA CONEXION CON LA BASE DE DATOS
	public function conectar(){
		try{
		$this->conn = new mysqli($this->servidor,$this->usuario,$this->password,$this->database);
		}
		catch (Exception $e){
			echo "ERROR DE CONEXION CON BASE DE DATOS: $e";
		}
		return $this->conn;
	}
	//LLAMAR PROCEDIMIENTOS ALMACENADOS DE CONSULTAS
	public function query($query){
		try{
		$this->respuesta=$this->conn->query($query);
		return $this->respuesta;
		}
		catch (Exception $e){
			echo "ERROR al ejecutar query: $e";
		}
	}
	//LLAMAR PROCEDIMIENTOS ALMACENADOS PARA INSERT, DELETE, UPDATE
	public function insert_delete_update($query){
		try{
		$this->respuesta=$this->conn->query($query);
		return $this->respuesta;
		}
		catch (Exception $e){
			echo "ERROR al ejecutar procedimiento almacenado:".$e->getMessage;
		}
	}
	//DESCONECTAR DE BASE DE DATOS
	public function desconectar(){
		try{
		$this->conn->close();
		}
		catch (Exception $e){
			echo "ERROR al desconectar: $e";
		}
	}
}
?>
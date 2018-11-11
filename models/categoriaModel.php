<?php  
class CategoriaModel extends AppModel
{
	public function __construct(){
		parent::__construct();
	}

	public function getCategorias(){
		$tareas = $this->_db->query("SELECT * FROM categorias");
		$tareas->execute();
		return $tareas->fetchall();				
	}

	public function agregar($datos = array()){
		$consulta=$this->_db->prepare(
			"INSERT INTO categorias (nombre) VALUES (:nombre)"
		);
		$consulta->bindParam(":nombre",$datos["nombre"]);

		if($consulta->execute()){
			return true;
		}
		else{
			return false;
		}
	}

	public function actualizar($datos = array()){
		$consulta=$this->_db->prepare(
			"UPDATE categorias SET nombre=:nombre WHERE id=:id"
		);
		$consulta->bindParam(":nombre",$datos["nombre"]);
		$consulta->bindParam(":id",$datos["id"]);
		if($consulta->execute()){
			return true;
		}else
		{
			return false;
		}
	}

	public function buscarPorId($id){
		$categoria = $this->_db->prepare("SELECT * FROM categorias WHERE id=:id");
		$categoria->bindParam(":id",$id);
		$categoria->execute();
		$registro = $categoria->fetch();

		if ($registro) {
			return $registro;
		}
		else{
			return false;
		}
	}
	public function eliminarPorId($id){
		$consulta = $this->_db->prepare("DELETE FROM categorias WHERE id=:id");
		$consulta->bindParam(":id",$id);
		if ($consulta->execute())
			return true;
		else
			return false;
	}
}
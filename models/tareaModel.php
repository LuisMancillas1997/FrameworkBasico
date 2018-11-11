<?php  
	class TareaModel extends AppModel
	{

		public function __construct(){
			parent::__construct();
		}

		public function getTareas(){
			$tareas = $this->_db->query("SELECT T.*,C.nombre as Categoria FROM tareas T INNER JOIN categorias C ON C.id=T.categoria_ID");

			foreach (range(0, $tareas->columnCount()-1) as $column_index) {
				$meta[] = $tareas->getColumnMeta($column_index);
			}

			$resultado = $tareas->fetchall(PDO::FETCH_NUM);
			for ($i=0; $i < count($resultado); $i++) { 
				$j=0;
				foreach ($meta as $value) {
					$rows[$i][$value["table"]][$value["name"]] =
					$resultado[$i][$j];
					$j++;
				}
			}
			return $rows;	
		}

		public function agregar($datos = array()){
			$consulta=$this->_db->prepare(
				"INSERT INTO tareas(categoria_id,nombre,descripcion,fecha,prioridad,status)
				VALUES (:categoria_id,:nombre,:descripcion,:fecha,:prioridad,0)"
			);

			$consulta->bindParam(":categoria_id",$datos["categoria"]);
			$consulta->bindParam(":nombre",$datos["nombre"]);
			$consulta->bindParam(":descripcion",$datos["descripcion"]);
			$consulta->bindParam(":fecha",$datos["fecha"]);
			$consulta->bindParam(":prioridad",$datos["prioridad"]);			

			if($consulta->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function actualizar($datos = array()){
			$consulta=$this->_db->prepare(
				"UPDATE tareas SET categoria_id=:categoria_id, nombre=:nombre, descripcion=:descripcion,fecha=:fecha,prioridad = :prioridad	WHERE id=:id"
			);

			$consulta->bindParam(":categoria_id",$datos["categoria"]);
			$consulta->bindParam(":nombre",$datos["nombre"]);
			$consulta->bindParam(":descripcion",$datos["descripcion"]);
			$consulta->bindParam(":fecha",$datos["fecha"]);
			$consulta->bindParam(":prioridad",$datos["prioridad"]);	
			$consulta->bindParam(":id",$datos["id"]);		

			if($consulta->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function buscarPorId($id){
			$tarea = $this->_db->prepare("SELECT * FROM tareas WHERE id=:id");
			$tarea->bindParam(":id",$id);
			$tarea->execute();
			$registro = $tarea->fetch();

			if ($registro) 
			{
				return $registro;
			}
			else
			{
				return false;
			}
		}

		public function eliminarPorId($id){
			$consulta = $this->_db->prepare("DELETE FROM tareas WHERE id=:id");
			$consulta->bindParam(":id",$id);
			if ($consulta->execute())
				return true;
			else
				return false;
		}
		public function status ($id, $status){
			$consulta=$this->_db->prepare(
				"UPDATE tareas SET status=:status WHERE id=:id"
			);

			$consulta->bindParam(":id",$id);
			$consulta->bindParam(":status",$status);
			if ($consulta->execute())
				return true;
			else
				return false;
		}
	}
?>
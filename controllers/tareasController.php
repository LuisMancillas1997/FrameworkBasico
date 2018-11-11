<?php  
	class tareasController extends AppController{
	
		public function __construct(){
			parent::__construct();
		}
		
		public function index()
		{
			$tareas = $this->loadModel("tarea");
			$categorias = $this->loadModel("categoria");
			$this->_view->tareas=$tareas->getTareas();
			$this->_view->categorias=$categorias->getCategorias();
			$this->_view->titulo="Pagina principal";
			$this->_view->renderizar("index");
		}
		
		public function agregar(){
			if($_POST)
			{
				$tareas = $this->loadModel("tarea");
				$this->_view->tareas = $tareas->agregar($_POST);
				$this->redirect(array("controller"=>"tareas"));
			}
			$categorias = $this->loadModel("categoria");
			$this->_view->categorias=$categorias->getCategorias();
			$this->_view->titulo="Agregar tarea";
			$this->_view->renderizar("agregar");
		}
	
		public function editar($id){
			if($_POST)
			{
				$tareas = $this->loadModel("tarea");
				$tareas->actualizar($_POST);
				$this->redirect(array("controller"=>"tareas"));

			}
			$tareas = $this->loadModel("tarea");
			$this->_view->tarea = $tareas->buscarPorId($id);

			$categorias = $this->loadModel("categoria");
			$this->_view->categorias=$categorias->getCategorias();

			$this->_view->titulo="Editar Tarea";
			$this->_view->renderizar("editar");
		}
	
		public function eliminar($id){
			$tarea = $this->loadModel("tarea");
			$registro=$tarea->buscarPorId($id);
			if (!empty($registro)) {
				$tarea->eliminarPorId($id);
				$this->redirect(array("controller"=>"tareas"));
			}
		}
		
	

	public function cambiarEstado($id=null,$status=null)
		{
			$tarea = $this->loadModel("tarea");
			$registro = $tarea->buscarPorId($id);
			if(!empty($registro)){
				if($status==0){
					$status=1;
				}
				else{
					$status=0;
				}
				$tarea->status($id,$status);
				$this->redirect(array("controller"=>"tareas"));
			}	
		}
	}
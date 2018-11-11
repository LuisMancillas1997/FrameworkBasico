<?php  
	class categoriasController extends AppController
	{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$categorias = $this->loadModel("categoria");
			$this->_view->categorias=$categorias->getCategorias();
			$this->_view->titulo="Pagina principal";
			$this->_view->renderizar("index");
		}

		public function agregar(){
			if($_POST)
			{
				$categorias = $this->loadModel("categoria");
				$this->_view->categorias = $categorias->agregar($_POST);
				$this->redirect(array("controller"=>"categorias"));
			}
			$this->_view->titulo="Agregar categorias";
			$this->_view->renderizar("agregar");

		}

		public function editar($id){
			if($_POST){
				$categorias = $this->loadModel("categoria");
				$categorias->actualizar($_POST);
				$this->redirect(array("controller"=>"categorias"));
			}
			$categorias = $this->loadModel("categoria");
			$this->_view->categoria = $categorias->buscarPorId($id);

			$this->_view->titulo="Editar categoria";
			$this->_view->renderizar("editar");
		}

		public function eliminar($id){
			$categoria = $this->loadModel("categoria");
			$registro=$categoria->buscarPorId($id);
			if (!empty($registro)) {
				$categoria->eliminarPorId($id);
				$this->redirect(array("controller"=>"categorias"));
			}
		}

	}
<?php

	require_once "./view/UsuarioView.php";
	require_once "./model/UsuarioModel.php";
	require_once "SecuredController.php";

	class UsuariosAdminController extends SecuredController {

		private $rol;
		private $script;
		private $view;
	  private $model;

		function __construct(){
				parent::__construct();

				$this->rol         = $_SESSION['rol'];
				if ( $this->rol == "Administrador" ){
					$this->script = "";
				}

				$this->view        = new UsuarioView("Game of Thrones", "temporadasUser", $this->script, "oculto", "visible", "oculto", true, $this->rol);
				$this->model       = new UsuarioModel();
		}

		function GetUsuarios(){

	    $usuarios = $this->model->getUsers();
	    $this->view->MostrarUsuarios($usuarios);

	  }

		function GuardarAdminUsuarios(){

			$usuariosPOST   = array();
			$id_usuariosMOD = [];
			$id_usuariosDEL = [];
			$array          = array();

			// var_dump($_POST);
			// die();

			if ( !empty($_POST) ){
				$usuariosPOST = $_POST;
				// var_dump($usuariosPOST);
				// die();
				foreach ($usuariosPOST as $key => $value) {
					// echo "<br>KEY: ".$key."<br>";
					if ( $key != "DEL" ){
						$id_user      = explode('-', $key);
						$array['id']  = $id_user[0];
						$array['rol'] =  $value;
						array_push($id_usuariosMOD, $array);
						$array = [];
						unset($array);
					}else{
						$array['id'] = $value;
						array_push($id_usuariosDEL, $array);
						$array = [];
						unset($array);
					}
				}
			}

			// var_dump($id_usuariosDEL);
			// die();

			for ($i=0; $i < count($id_usuariosMOD); $i++) {
				$usuarios = $this->model->setUsers($id_usuariosMOD[$i]['id'], $id_usuariosMOD[$i]['rol']);
			}

			for ($i=0; $i < count($id_usuariosDEL); $i++) {
				$usuarios = $this->model->delUsers($id_usuariosDEL[$i]['id']);
			}

			// var_dump($id_usuariosMod);
			// die();

			header(USERS);

		}

	} // ENDCLASS

?>
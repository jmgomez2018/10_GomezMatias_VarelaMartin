<?php

require_once "./view/UsuarioView.php";
require_once "./model/UsuarioModel.php";
require_once "SecuredController.php";
require_once "LoginController.php";

class UsuariosAdminController extends SecuredController
{

    private $rol;
    private $script;
    private $view;
    private $model;
    private $login;

    public function __construct()
    {
        parent::__construct();

        $this->rol         = $_SESSION['rol'];
        if ($this->rol == "Administrador") {
            $this->script = "";
        } else {
            header(LOGIN."/userFail");
            exit();
        }

        $this->login       = new LoginController();
        $this->view        = new UsuarioView("Game of Thrones", "temporadasUser", $this->script, "oculto", "visible", "oculto", "visible", true, $this->rol);
        $this->model       = new UsuarioModel();
    }

    public function getUsuarios()
    {

        $usuarios = $this->model->getUsers();
        $user = $this->login->getUser();
        $this->view->mostrarUsuarios($usuarios, $user);
    }

    public function guardarAdminUsuarios()
    {

        $usuariosPOST   = array();
        $id_usuariosMOD = [];
        $id_usuariosDEL = [];
        $array          = array();

        if (!empty($_POST)) {
            $usuariosPOST = $_POST;

            foreach ($usuariosPOST as $key => $value) {
                if ($key != "DEL") {
                    $id_user      = explode('-', $key);
                    $array['id']  = $id_user[0];
                    $array['rol'] =  $value;
                    array_push($id_usuariosMOD, $array);
                    $array = [];
                    unset($array);
                } else {
                    $array['id'] = $value;
                    array_push($id_usuariosDEL, $array);
                    $array = [];
                    unset($array);
                }
            }
        }

        for ($i=0; $i < count($id_usuariosMOD); $i++) {
            $usuarios = $this->model->setUsers($id_usuariosMOD[$i]['id'], $id_usuariosMOD[$i]['rol']);
        }

        for ($i=0; $i < count($id_usuariosDEL); $i++) {
            $usuarios = $this->model->delUsers($id_usuariosDEL[$i]['id']);
        }

        header(USERS);
    }
} // ENDCLASS

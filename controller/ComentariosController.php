<?php

  require_once "./view/ComentariosView.php";
  require_once "LoginController.php";

  class ComentariosController{

    private $view;
    private $login;
    private $link;
    private $script;
    private $claseLogin;
    private $claseLogout;
    private $claseReg;
    private $claseAdminUser;
    private $logueado;
    private $rol;

    function __construct(){

      $this->login  = new LoginController();

      $arrayReg = $this->login->isLogueado();
      if (  (!empty($arrayReg)) && $arrayReg['logueado'] ){
        $this->claseLogin  = "oculto";
        $this->claseLogout = "visible";
        $this->claseReg    = "oculto";
        if ( $arrayReg['rol'] == "Administrador"){
          $this->claseAdminUser = "visible";
        }else{
          $this->claseAdminUser = "oculto";
        }
        $this->link        = "temporadasUser";
        $this->logueado    = true;
        $this->rol         = $arrayReg['rol'];
      }
      else{
        $this->claseLogin     = "visible";
        $this->claseLogout    = "oculto";
        $this->claseReg       = "visible";
        $this->claseAdminUser = "oculto";
        $this->link           = "temporadas";
        $this->logueado       = false;
        $this->rol = "";
      }

      $this->script      = "js/main.js";

      $this->view   = new ComentariosView("Game of Thrones", $this->link, $this->script, $this->claseLogin, $this->claseLogout, $this->claseReg, $this->claseReg, $this->claseAdminUser, $this->logueado, $this->rol);

    }

    function getComentarios($params=[]){

      $id_temporada = '';
      $id_episodio  = '';

      if ( !empty($params) ){
        if (isset($params[1]) && isset($params[3]) ){
          $id_temporada = $params[1];
          $id_episodio  = $params[3];
        }
      }

      $this->view->getComentarios($id_temporada, $id_episodio);
    }

    function agregarComentarioForm($params=[]){

      if ( $this->logueado && $this->rol == "Limitado"){
        // var_dump($_POST);
        // die();
        if ( isset($_POST["idTemp"]) && isset($_POST["idEpis"]) ){
          $id_temporada  = $_POST["idTemp"];
          $id_episodio   = $_POST["idEpis"];

          $user_name     = $this->login->getUser();
          $id_user       = $this->login->getUserID($user_name);

          $this->view->addComment($id_temporada, $id_episodio, $id_user[0]['id_user'], $this->script);
        }else{
          header(TEMPUSER);
        }
      }else{
        $this->login->logout();
        // header(LOGIN);
      }

    }

  } //END CLASS

 ?>

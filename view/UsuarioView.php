<?php

  require_once('libs/Smarty.class.php');

class UsuarioView
{
    private $Smarty;

    public function __construct($titulo, $link, $script, $claseLogin, $claseLogout, $claseReg, $claseAdminUser, $logueado, $rol)
    {
        $this->Smarty = new Smarty();
        $this->Smarty->assign('titulo', $titulo);
        $this->Smarty->assign('link', $link);
        $this->Smarty->assign('script', $script);
        $this->Smarty->assign('claseLogin', $claseLogin);
        $this->Smarty->assign('claseLogout', $claseLogout);
        $this->Smarty->assign('claseReg', $claseReg);
        $this->Smarty->assign('claseAdminUser', $claseAdminUser);
        $this->Smarty->assign('logueado', $logueado);
        $this->Smarty->assign('rol', $rol);
    }

    public function mostrarUsuarios($usuarios, $user)
    {
        $this->Smarty->assign('usuarios', $usuarios);
        $this->Smarty->assign('usrReg', $user);
        $this->Smarty->display('templates/usuarios.tpl');
    }
} //ENDCLASS

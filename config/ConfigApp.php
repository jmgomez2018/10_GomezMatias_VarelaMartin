<?php

    define('TEMPUSER', 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/temporadasUser');
    define('TEMPO', 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/temporadas');
    define('LOGIN', 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/login');
    define('LOGOUT', 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/logout');
    define('HOME', 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/home');
    define('USERS', 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/Usuarios');

    class ConfigApp{
        public static $ACTION = 'action';
        public static $PARAMS = 'params';
        public static $ACTIONS = [
                                    ''                     => 'GotController#Home',
                                    'home'                 => 'GotController#Home',
                                    'map'                  => 'GotController#Map',
                                    'casasGOT'             => 'GotController#Casas',
                                    'casas'                => 'CasasController#Casas',
                                    'temporadas'           => 'TemporadasController#Temporadas',
                                    'temporadasUser'       => 'TemporadasUserController#TemporadasUser',
                                    'editarT'              => 'TemporadasUserController#EditarTemporada',
                                    'guardarEditarT'       => 'TemporadasUserController#GuardarEditarTemporada',
                                    'temporada'            => 'TemporadasController#Episodios',
                                    'temporadaE'           => 'TemporadasController#Episodios',
                                    'editarE'              => 'TemporadasUserController#EditarEpisodio',
                                    'guardarEditarE'       => 'TemporadasUserController#GuardarEditarEpisodio',
                                    'eliminarE'            => 'TemporadasUserController#EliminarEpisodio',
                                    'agregarE'             => 'TemporadasUserController#AgregarEpisodio',
                                    'guardarAgregarE'      => 'TemporadasUserController#GuardarAgregarEpisodio',
                                    'agregarT'             => 'TemporadasUserController#AgregarTemporada',
                                    'guardarAgregarT'      => 'TemporadasUserController#GuardarAgregarTemporada',
                                    'eliminarT'            => 'TemporadasUserController#EliminarTemporada',
                                    'login'                => 'LoginController#login',
                                    'logout'               => 'LoginController#logout',
                                    'verificarLogin'       => 'LoginController#verifyLogin',
                                    'registro'             => 'RegistroController#Registro',
                                    'Registrar'            => 'RegistroController#Registrar',
                                    'comentarios'          => 'ComentariosController#getComentarios',
                                    'agregarComentario'    => 'ComentariosController#agregarComentarioForm',
                                    'validarCaptcha'       => 'ComentariosController#validarCaptcha',
                                    'MostrarImagenes'      => 'TemporadasUserController#MostrarImagenes',
                                    'EliminarImagen'       => 'TemporadasUserController#EliminarImagen',
                                    'Usuarios'             => 'UsuariosAdminController#GetUsuarios',
                                    'GuardarAdminUsuarios' => 'UsuariosAdminController#GuardarAdminUsuarios'
                                ];
        }

 /*
 		.../temporadas                (lista de todas las temporadas de la serie)
 		.../temporada/1               (lista de todos los episodios de la temporada 1)
 		.../temporada/episodio/1/2    (lista de la temporada 1 y episodio 2)
 		.../episodios                 (lista de todos los episodios de la serie)
 		.../episodio/1                (lista de todos los episodios 1)
 */

?>

<?php

namespace Controllers;

use Models\User as User;
use DAO\DAOUser as Dao;

use Controllers\ViewController as C_View;

class UserController
{
    protected $dao;
    private $viewController;

    function __construct(){
        
        // $this->dao = Dao::getInstance();
        $this->dao = new Dao;
        $this->viewController = new C_View;
    }
    /*
        *
        */

        public function createByAdmin ($name, $lastname, $username, $email, $password, $level)
        {
    
            if ($level == 0) {
                //crea el objeto user para luego agregarlo a la base de datos
    
                $user = new User(0, $name, $lastname, $username, $email, $password, $level);
    
                //llama al metodo del dao para guardarlo en la base de datos
    
                $this->dao->create($user);
    
                //una vez guardado en la BD se muestra el home para administradores.
                $this->viewController->listUsers();
            } else {
                //crea el objeto user para luego agregarlo a la base de datos
    
                $user = new User(0, $name, $lastname, $username, $email, $password, $level);
    
                //llama al metodo del dao para guardarlo en la base de datos
                $userVerifica = false;
                $userVerifica = $this->dao->read($email);

                if($userVerifica == false){

                    $this->dao->create($user);
                    
                    //luego de guardarlo en la base de datos se muetra el inicio de la pagina
                    echo '<p class="alert alert-success agileits" role="alert"> Usuario registrado correctamente.';

                    $this->viewController->home();

                }else{

                    echo '<p class="alert alert-success agileits" role="alert"> Este email ya esta en uso.';

                    $this->viewController->singUp();
                }
            }
        }

    public function create($name, $lastname, $username, $email, $password, $level = 1)
    {

        if ($level == 0) {
            //crea el objeto user para luego agregarlo a la base de datos

            $user = new User(0, $name, $lastname, $username, $email, $password, $level);

            //llama al metodo del dao para guardarlo en la base de datos

            $this->dao->create($user);

            //una vez guardado en la BD se muestra el home para administradores.
            $this->viewController->viewsAdminHome();
        } else {
            //crea el objeto user para luego agregarlo a la base de datos

            $user = new User(0, $name, $lastname, $username, $email, $password, $level);

            //llama al metodo del dao para guardarlo en la base de datos
            $userVerifica = false;
            $userVerifica = $this->dao->read($email);

            if($userVerifica == false){

                $this->dao->create($user);
                
                //luego de guardarlo en la base de datos se muetra el inicio de la pagina
            
                echo '<p class="alert alert-success agileits" role="alert"> Usuario registrado correctamente.!p>';
               
                $this->viewController->home();

            }else{

                echo '<p class="alert alert-success agileits" role="alert"> Este email ya esta en uso.!p>';

                $this->viewController->singUp();
            }
        }
    }

    
    public function readAll()
    {
        //guarda todos los user de la base de datos en la variable list

        $list = $this->dao->readAll();

        if (!is_array($list) && $list != false) { // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
        }

        return $list;
    }


    public function readUser($email)
    {
        //DEVUELVE EL user CON ESE EMAIL EN CASO DE EXSISTIR
        $user = $this->dao->read($email);
        
    }

    public function delete($email)
    {

        $user = $this->dao->read($email);

        if ($_SESSION['user']->getLevel() == 0 && $user->getId() != 1) {      // Solo borra si el usuario en sesion es admin(El user con id=1 no se pude eliminar)

            $this->dao->delete($email);

            $this->viewController->listUsers();
        } else {

            echo "<script> alert('Accion no disponible');</script>";

            $this->viewController->home();
        }
    }

    public function login($email = '', $pass = '')
    {
        $pos = strpos($email, '@');

        if ( $pos == true )
            $user = $this->dao->read($email);
        else
            $user = $this->dao->readUser($email);   // lee nombre user

        if ($user) {
            if ($user->getPassword() == $pass) {
                $this->setSession($user);
                $this->viewController->home();
            } else {
                $this->viewController->login();
                echo "<script> alert('Contraseña Incorrecta');</script>";
            }
        } else {
            $this->viewController->login();
            echo "<script> alert('Usuario Incorrecto');</script>";
        }
    }

    public function checkSession(){

        if (session_status() == PHP_SESSION_NONE){
            session_start();
        }

        if (isset($_SESSION['user'])) {

            $user = $this->dao->read($_SESSION['user']->getEmail());

            if ($user->getPassword() == $_SESSION['user']->getPassword()){
                return $user;
            }
            
        }else {
            return false;
        }
    }

    public function setSession($user)
    {
        $_SESSION['user'] = $user;
    }


    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();

        unset($_SESSION['user']);
        $this->viewController->home();
    }
}
?>
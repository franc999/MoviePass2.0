<?php namespace Controllers;

use Controllers\UserController as C_User;
use Controllers\MovieController as C_Movie;
use Controllers\TheatherController as C_theather;
use Controllers\SessionController as C_Session;
use Controllers\RoomController as C_Room;

use models\User as M_User;
use models\Movie as M_Movie;
use models\Room as M_Room;

class ViewController
{

    private $userController;
    private $movieController;
    private $theatherController;
    private $sessionController;
    private $roomController;

    public function __construct()
    { }

    public function home(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();
        
        
        require(VIEWS_PATH . "home.php");
    }


    public function userHome(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        require(VIEWS_PATH . "userHome.php");
    }


    public function login()
    {
        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        require(VIEWS_PATH . 'login.php');
    }


    public function singUp(){


        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        require(VIEWS_PATH . 'singup.php');
    }


    public function viewCartelera()
    {

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->sessionController = new C_Session;
        $SC_list = $this->sessionController->readAllByDate();

        if (isset($_GET['category']) && $_GET['category'] != 'all') {

            $category = $_GET['category'];
            $this->movieController = new C_Movie;
            $M_list = $this->movieController->readForCategory($category);
        } elseif (isset($_GET['date'])) {
            $date = $_GET['date'];

            $this->sessionController = new C_Session;
            $S_list = $this->sessionController->readForDate($date);
        } else {
            $this->movieController = new C_Movie;
            $M_list = $this->movieController->readAll();
        }


        require(VIEWS_PATH . "viewCartelera.php");
    }


    public function viewList_sessions(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->theatherController = new C_theather;
        $T_list = $this->theatherController->readAll();

        if (isset($_GET["id_theather"])) {

            $id_theather = $_GET["id_theather"];


            $this->sessionController = new C_Session;
            $S_list = $this->sessionController->readFor_theather($id_theather);
        }

        // comparar si el user es admin o no para mostrar las sesiones.
        require(VIEWS_PATH . "adminViewSession.php");
    }


    
    public function viewBuyTicket(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        if(isset ($_POST["id"])){

            $id = $_POST["id"];

            $this->sessionController = new C_Session;
            $S_list = $this->sessionController->getmovie_schedules($id);
        }

        require(VIEWS_PATH . "viewSchedule.php");
    }

    public function viewPurchase(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        if(isset ($_POST["id"]) && ($_POST['tickets']) && ($_POST['name_room']) && ($_POST['id_theather']) ){
            
            $tickets = $_POST["tickets"];
            $name_room =   $_POST['name_room'];
            $id_theather = $_POST['id_theather'];

            if($tickets > 0){

                $id = $_POST["id"];
                $precioTicket = 100;

                $this->sessionController = new C_Session;
                $S_list = $this->sessionController->getSession_purchase($id);

                $this->roomController = new C_Room;
                $totalSeats = $this->roomController->readTotalSeats($name_room, $id_theather);
                echo "$totalSeats";

                require(VIEWS_PATH . "viewPurchase.php");

            }else{

                echo '<p class="alert alert-success agileits" role="alert"> Has ingresado un numero negativo.!p>';
                $this->viewCartelera();
            }

        }else{

            echo '<p class="alert alert-success agileits" role="alert"> No has ingresado el numero de entradas.!p>';
            $this->viewCartelera();
        }
    }

    public function viewShoppingCart(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        if(isset ($_POST["id"]) && ($_POST['tickets'])){    /** mandar ticket id calse ticket y de ahi QR, ETC. */

            $id = $_POST["id"];
            $tickets = $_POST["tickets"];
            
            $this->sessionController = new C_Session;
            //$S_list = $this->sessionController->getmovie_schedules($id);

            require(VIEWS_PATH . "viewShoppingCart.php");

        }else{

            echo '<p class="alert alert-success agileits" role="alert"> ee .!p>';
            require(VIEWS_PATH . "home.php");
        }
    }

    /**Metodos Administrador */

    public function viewAddUser()
    {

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        require(VIEWS_PATH . "addUser.php");
    }


    public function viewAddMovie(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        require(VIEWS_PATH . "addMovie.php");
    }


    public function viewAddSession(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->theatherController = new C_theather;
        $T_list = $this->theatherController->readAll();

        $this->movieController = new C_Movie;
        $M_list = $this->movieController->readAll();

        require(VIEWS_PATH . "addSession.php");
    }


    public function adminCartelera()
    {

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        if (isset($_GET["category"])) {

            $category = $_GET["category"];

            $this->movieController = new C_Movie;
            $M_list = $this->movieController->readForCategory($category);
        } else {
            $this->movieController = new C_Movie;
            $M_list = $this->movieController->readAll();
        }

        require(VIEWS_PATH . "adminCartelera.php");
    }

    public function listUsers()
    {

        //funcion para mostrar los datos del usuario: detalles, boletos comprados;
        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $list = $this->userController->readAll();

        require(VIEWS_PATH . "userlist.php"); //cambiar por pagina de admin para ver a todos los usuarios

    }


    public function viewsAdminSettings()            //  por definir
    {

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        if ($user && $user->getLevel() == 0) {
            require(FRONT_ROOT . "adminHome.php");
        } else {

            require(VIEWS_PATH . "Home.php");
        }
    }
}

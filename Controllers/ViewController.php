<?php namespace Controllers;

use Controllers\UserController as C_User;
use Controllers\MovieController as C_Movie;
use Controllers\TheatherController as C_theather;
use Controllers\SessionController as C_Session;
use Controllers\RoomController as C_Room;
use Controllers\GenreController as C_Genre;

use models\User as M_User;
use models\Genre as M_Genre;
use models\Movie as M_Movie;
use models\Room as M_Room;

class ViewController
{

    private $userController;
    private $movieController;
    private $theatherController;
    private $sessionController;
    private $roomController;
    private $genreController;

    public function __construct()
    {
  
     }

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
        $SC_list = $this->sessionController->readAll();

        $this->genreController = new C_Genre;
        $G_list = $this->genreController->readAll();

        /*if (isset($_POST["category"])) {

            $category = $_POST["category"];

            //$this->movieController = new C_Movie;
            //$M_list = $this->movieController->readForCategory($category);
        }*/

        if (isset($_POST['category']) && $_POST['category'] != 'all') {     // PARA LOS SELECT MOSTRAR CON AJAX

            $id_genre = $_POST['category'];
            $this->movieController = new C_Movie;
            $M_list = $this->movieController->readForCategory($id_genre);

            if(!is_array($M_list)){

                $movie = $M_list;
            }

        } elseif (isset($_POST['date'])) {
            $date = $_POST['date'];

            $this->sessionController = new C_Session;
            $S_list = $this->sessionController->readForDate($date); /// CAMBIAR METODO
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

        if (isset($_POST["id_theather"])) {

            $id_theather = $_POST["id_theather"];


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

            $id_session = $_POST["id"];

            $this->sessionController = new C_Session;
            $S_list = $this->sessionController->readForMovie($id_session);

            if($S_list != null){
                
                foreach($S_list as $key => $session){
                    $id_room=$session->getRoom();
                    echo "$id_room";
                    $id_theather=$session->getTheather();
                    //echo "$id_theather\n";
                    $id_movie=$session->getMovie();
                    //echo "$id_movie\n";
                }

                $this->roomController = new C_Room;
                $R_list = $this->roomController->read($id_room);
    
                $this->theatherController = new C_theather;
                $T_list = $this->theatherController->read($id_theather);
    
                $this->movieController = new C_Movie;
                $M_list = $this->movieController->read($id_theather);

            }else{

                echo 'LISTA NULL';
            }
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


    // ADDS ///

    public function viewAddUser()
    {

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        require(VIEWS_PATH . "addUser.php");
    }

    public function viewAddGenre(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        require(VIEWS_PATH . "addGenre.php");
    }

    public function viewAddMovie(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->genreController = new C_Genre;
        $G_list = $this->genreController->readAll();

        require(VIEWS_PATH . "addMovie.php");
    }

    public function viewAddTheather(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        require(VIEWS_PATH . "addTheather.php");
    }


    public function viewAddRoom(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->theatherController = new C_theather;
        $T_list = $this->theatherController->readAll();

        require(VIEWS_PATH . "addRoom.php");
    }

    ////////////////*************************** AGREGANDO SESSION ***************************////////////////

    public function viewAddSession(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();  ////// PASAR ID USER PAR EL TICKET ////////// EN CREAR TICKET

        $this->theatherController = new C_theather;
        $T_list = $this->theatherController->readAll();

        $this->movieController = new C_Movie;
        $M_list = $this->movieController->readAll();

        $this->roomController = new C_Room;
        $R_list = $this->roomController->readAll();

        require(VIEWS_PATH . "addSession.php");
    }


     public function checkAddMovieToSession($id_theather, $id_movie, $date, $time, $timeEnd){   
        
        $this->sessionController = new C_Session;

        if($time < $timeEnd){
            
            $flag = $this->sessionController->readMovieDate($id_movie, $date);  /// verifica si la pelicula no esta agregada en otra cartelera el dia seleccionado

            if($flag == false){
                
                /*$flag = $this->sessionController->checkTimeStart($date, $time);
                
                if ($flag == false)   /// el horario esta disponible y la pelicula fue leida, procedemos a mostrar las salas disponibles //
                
                    
                    $this->roomController = new C_Room;
                    $R_list = $this->roomController->readAllAvailable($id_theather);

                    if(!empty($R_list)){
                        
                        $this->viewCheckedSession($id_theather, $id_movie, $date, $time, $timeEnd);
                        //require(VIEWS_PATH . "addSession2.php");
                    }else{

                        echo '<p class="alert alert-success agileits" role="alert"> No hay salas disponibles p>';
                    }*/
                        

            }else{

                echo '<p class="alert alert-success agileits" role="alert"> La pelicula se encuentra en cartelera el dia ingresado, intente otro p>';

                $this->viewAddSession();
            }

        }else{

            echo '<p class="alert alert-success agileits" role="alert"> Horario ingresado mal p>';

            $this->viewAddSession();
        }    
         // primero chequear que esa pelicula no este el mismo dia en otro cine

          // despues chequear que la hora de comienzo sea 15 minutos despues que la pelicula anterior

          // mostrar que salas estan disponibles para colocar la pelicula en el horario y fechas y cine indicados.
    }

    public function readRooms(){

        //if (isset($_POST['id_theather'])){

            //$id_theather = $_POST['id_theather'];
            $this->roomController = new C_Room;
            //$R_list = $this->roomController->readAllAvailable($id_theather);
            $R_list = $this->roomController->readAll();
            return $R_list;

        //}else{

            //echo 'no llega el id';
            //return null;
        //}
    }

    public function viewCheckedSession($id_theather, $id_movie, $date, $time, $timeEnd, $id_room=1){    /// muestra las salas disponibles para la funcion a crear 

        $this->sessionController->create($id_theather, $id_room ,$id_movie, $date, $time, $timeEnd);
    }



    ///////////********** EDITS *****************///


    public function editTheather(){

        
    }

    ///////////********** LISTADOS **************///


    public function viewListTheather(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->theatherController = new C_theather;
        $T_list = $this->theatherController->readAll();

        require(VIEWS_PATH . "viewListTheathers.php");
    }

    public function viewListRoom(){

        $this->theatherController = new C_theather;
        $T_list = $this->theatherController->readAll();

        $this->roomController = new C_room;
        $R_list = $this->roomController->readAll();

        require(VIEWS_PATH . "viewListRooms.php");
    }

    public function adminCartelera()
    {

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->movieController = new C_Movie;
        $M_list = $this->movieController->readAll();
        
        $this->genreController = new C_Genre;
        $G_list = $this->genreController->readAll();

        if (isset($_POST["category"])) {

            $category = $_POST["category"];

            //$this->movieController = new C_Movie;
            //$M_list = $this->movieController->readForCategory($category);
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


    /// ADMIN SETTINGS ///

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

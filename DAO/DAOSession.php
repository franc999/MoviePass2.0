<?php

namespace DAO;

use Models\Session as M_Session;
use Models\Room as M_Room;
use DAO\connection as Connection;

use PDOException;

/**
 *
 */
class DAOSession
{
     private $connection;

     function __construct()
     {

          $this->connection = null;
     }

     /**
      *
      */

     /*public function createTicket ($_session, $price){

          $sql = "INSERT INTO ticket (id_rm, date, time, price, id_theather, id_movie) VALUES (:id_rm, :date, :time, :price, :id_theather, :id_movie)";

          $parameters['id_rm'] = $_session->getId_session();
          $parameters['id_movie'] = $_session->getId_movie();         //PASAR NOMBRE PELICULA
          $parameters['date'] = $_session->getDate();
          $parameters['time'] = $_session->getTime();
          $parameters['price'] = $_session->getPrice();
          $parameters['id_theather'] = $_session->getId_theather();     //PASAR NOMBRE TEATRO

          try {
               // creo la instancia connection
               $this->connection = Connection::getInstance();
               // Ejecuto la sentencia.
               return $this->connection->ExecuteNonQuery($sql, $parameters);
          } catch (PDOException $ex) {
               throw $ex;
          }
     }*/

     public function create($_session){

          // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
          $sql = "INSERT INTO room_x_movie (id_theather, id_room,id_movie,date,time, timeEnd) VALUES (:id_theather, :id_room, :id_movie, :date, :time, :timeEnd)";

          $parameters['id_theather'] = $_session->getTheather()->getId();
          $parameters['id_room'] = $_session->getRoom()->getId_room();
          $parameters['id_movie'] = $_session->getMovie()->getId();
          $parameters['date'] = $_session->getDate();
          $parameters['time'] = $_session->getTime();
          $parameters['timeEnd'] = $_session->getTimeEnd();

          try {
               // creo la instancia connection
               $this->connection = Connection::getInstance();
               // Ejecuto la sentencia.
               return $this->connection->ExecuteNonQuery($sql, $parameters);
          } catch (PDOException $ex) {
               throw $ex;
          }
     }

     /*******Reads **********/
     public function read($_id)
     {

          $sql = "SELECT * FROM room_x_movie where id_rm = :id";


          $parameters['id'] = $_id;

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql, $parameters);
          } catch (Exception $ex) {
               throw $ex;
          }
          if (!empty($resultSet)) {

               return $this->mapear($resultSet);
          } else
               return false;
     }
     /*
     public function readForTicket($id_movie, $id_theather, $id_room, $date, $time, $timeEnd){

          $sql = "SELECT * FROM room_x_movie 
          where id_theather = :id_theather
          and id_room = :id_room
          and id_movie = :id_movie
          and date = :date
          and time = :time
          and timeEnd = :timeEnd
          limit 1";

          $parameters['id_theather'] = $id_theather;
          $parameters['id_room'] = $id_room;
          $parameters['id_movie'] = $id_movie;
          $parameters['date'] = $date;
          $parameters['time'] = $time;
          $parameters['timeEnd'] = $timeEnd;

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql, $parameters);
          } catch (Exception $ex) {
               throw $ex;
          }
          if (!empty($resultSet)) {

               return $this->mapear($resultSet);
          } else
               return false;
     }



     public function readMax(){

          $sql = "SELECT id_rm FROM blahblah ORDER BY id_rm DESC LIMIT 1";

          try {
               $this->connection = Connection::getInstance();
               $resultSet = $this->connection->execute($sql);

          } catch (Exception $ex) {
               throw $ex;
          }
          
          return $resultSet;
     }*/

     public function readLastId(){
          try {
              $query = 'SELECT max(id_rm) as maximo FROM room_x_movie;';
              $con = Connection::getInstance();
              $showtimeId = $con->execute($query);
              //var_dump($cinemaId);
              return (!empty($showtimeId)) ? (int)$showtimeId[0]['maximo'] : -1;
          } catch (PDOException $e) {
              echo $e->getMessage();
          }
     }

     public function readMovieDate($id_movie, $date){

          
          $sql = "SELECT *FROM room_x_movie where id_movie = :id_movie and date = :date";

          $parameters['id_movie'] = $id_movie;
          $parameters['date'] = $date;

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql, $parameters);
          } catch (Exception $ex) {
               throw $ex;
          }
          if (!empty($resultSet)) {

               return true;
          } else
               return false;
     }

     public function checkTime($time, $id){

         
     }

     /*public function readForTickets($time, $date, $id_theather, $id_movie, $id_room, $price){
            
       /*$sql = "SELECT *FROM room_x_movie
               where id_room = id_room and
               id_theather = id_theather and
               id_movie = id_movie and
               price = 'price' and
               date like 'date' and 
               time like 'time' ";

          $sql = "SELECT * FROM `room_x_movie` WHERE `id_room` = id_room AND `id_movie` = id_movie AND `date` = 'date' AND `time` = 'time' AND `id_theather` = id_theather AND `price` = price";

            $parameters['time'] = $time;
            $parameters['date'] = $date;
            $parameters['id_theather']= $id_theather;
            $parameters['id_movie']= $id_movie;
            $parameters['id_room']= $id_room;
            $parameters['price']= $price;

            try {
                 $this->connection = Connection::getInstance();
                 $resultSet = $this->connection->execute($sql, $parameters);

            } catch(Exception $ex) {
                throw $ex;
            }

            if(!empty($resultSet)){
                 
             return $this->mapear($resultSet);
            }else
                 return false;
               
    }*/

     public function readAll()
     {
          $sql = "SELECT * FROM room_x_movie";

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql);
          } catch (Exception $ex) {

               throw $ex;
          }

          if (!empty($resultSet))
               return $this->mapear($resultSet);
          else
               return false;
     }

     public function readAll_sessions()
     {
          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time
                  FROM room_x_movie rm INNER JOIN  rooms r ON rm.id_room = r.id_room 
                  INNER JOIN theathers t ON t.id_theather = r.id_theather 
                  INNER JOIN movies m ON rm.id_movie = m.id_movie ;";

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql);
          } catch (Exception $ex) {

               throw $ex;
          }

          if (!empty($resultSet))
               return $this->mapear($resultSet);
          else
               return false;
     }

     public function readAll_sessionsByDate()
     {
          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time, m.id_movie AS id_movie
                  FROM room_x_movie rm INNER JOIN  rooms r ON rm.id_room = r.id_room 
                  INNER JOIN theathers t ON t.id_theather = r.id_theather 
                  INNER JOIN movies m ON rm.id_movie = m.id_movie 
                  group by rm.date ;";

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql);
          } catch (Exception $ex) {

               throw $ex;
          }

          if (!empty($resultSet))
               return $this->mapear($resultSet);
          else
               return false;
     }

     public function readSessionsByDate($date)    // MODIFICAR
     {
          $sql = "SELECT *FROM room_x_movie where date =:date";
          
          $parameters['date'] = $date;

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql,$parameters);
          } catch (Exception $ex) {

               throw $ex;
          }

          if (!empty($resultSet))
               return $this->mapear($resultSet);
          else
               return false;
     }

     public function readSessionsByMovie($idMovie)     // MODIFICAR
     {
          $sql = "SELECT *FROM room_x_movie
                  where id_movie =:id";
          
          $parameters['id'] = $idMovie;

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql,$parameters);
          } catch (Exception $ex) {

               throw $ex;
          }

          if (!empty($resultSet))
               return $this->mapear($resultSet);
          else
               return false;
     }

     public function readForTheather($theather)   // MODIFICAR
     {
          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time, m.id_movie AS id_movie
                  FROM room_x_movie rm INNER JOIN  rooms r ON rm.id_room = r.id_room 
                  INNER JOIN theathers t ON t.id_theather = r.id_theather 
                  INNER JOIN movies m ON rm.id_movie = m.id_movie
                  where t.id_theather = :theather;";

          $parameters['theather'] = $theather;

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql, $parameters);
          } catch (Exception $ex) {

               throw $ex;
          }

          if (!empty($resultSet))
               return $this->mapear($resultSet);
          else
               return false;
     }

     public function readForMovieTheather($theather)   // MODIFICAR
     {
          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time, m.id_movie AS id_movie
                  FROM room_x_movie rm INNER JOIN  rooms r ON rm.id_room = r.id_room 
                  INNER JOIN theathers t ON t.id_theather = r.id_theather 
                  INNER JOIN movies m ON rm.id_movie = m.id_movie
                  where t.id_theather = :theather;";

          $parameters['theather'] = $theather;

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql, $parameters);
          } catch (Exception $ex) {

               throw $ex;
          }

          if (!empty($resultSet))
               return $this->mapear($resultSet);
          else
               return false;
     }

     public function readForCateghory($category)  // MODIFICAR
     { 

          $sql = "SELECT m.title AS title,rm.date AS date ,rm.id_ticket AS id_ticket, m.id_movie AS id_movie
                 FROM room_x_movie rm INNER JOIN rooms r  ON rm.id_room = r.id_room 
                 INNER JOIN theathers t ON t.id_theather = r.id_theather 
                 INNER JOIN movies m ON rm.id_movie = m.id_movie where m.category 
                 LIKE ':category' 
                 order by rm.date ;";

          $parameters['category'] = $category;

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql, $parameters);
          } catch (Exception $ex) {

               throw $ex;
          }

          if (!empty($resultSet))
               return $this->mapearForCategory($resultSet);
          else
               return false;
     }

     public function readSessionsForPurchase($id_session){       // MODIFICAR

          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time, m.id_movie AS id_movie
          FROM room_x_movie rm 
          INNER JOIN  rooms r ON rm.id_room = r.id_room 
          INNER JOIN theathers t ON t.id_theather = r.id_theather 
          INNER JOIN movies m ON rm.id_movie = m.id_movie
          where rm.id_rm =:id";
          
          $parameters['id'] = $id_session;

          try {
               $this->connection = Connection::getInstance();

               $resultSet = $this->connection->execute($sql,$parameters);
          } catch (Exception $ex) {

               throw $ex;
          }

          if (!empty($resultSet))
               return $this->mapear($resultSet);
          else
               return false;
     }


     /** */
     public function edit($_movie)
     { //modificar//////////////////////////////////////////

          $sql = "UPDATE movies SET title = :title, category = :category, age = :age, id_tmbd = :id_tmbd";

          $parameters['title'] = $_movie->getTitle();
          $parameters['category'] = $_movie->getCategory();
          $parameters['age'] = $_movie->getAge();
          $parameters['id_tmdb'] = $_movie->getId_tmbd();

          try {
               // creo la instancia connection
               $this->connection = Connection::getInstance();
               // Ejecuto la sentencia.
               return $this->connection->ExecuteNonQuery($sql, $parameters);
          } catch (\PDOException $ex) {
               throw $ex;
          }
     }


     public function delete($_id)
     {

          $sql = "DELETE FROM room_x_movie WHERE id_rm = :id";
          $parameters['id'] = $_id;

          try {

               $this->connection = Connection::getInstance();
               return $this->connection->ExecuteNonQuery($sql, $parameters);
          } catch (PDOException $Exception) {

               throw new MyDatabaseException($Exception->getMessage(), $Exception->getCode());
          }
     }

     /**
      * Transforma el listado de peliculas en
      * objetos de la clase Movie
      */
     protected function mapear($value){

          $value = is_array($value) ? $value : [];

          $resp = array_map(function ($p) {

               return new M_Session($p['id_theather'], $p['id_room'], $p['id_movie'], $p['id_rm'], $p['date'], $p['time'], $p['timeEnd'], $p['availableSeats']);
          }, $value);

          return count($resp) > 1 ? $resp : $resp['0'];
     }

}



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

     public function createTicket ($_session, $_price){

          $sql = "INSERT INTO ticket (id_rm, movie, date, time, price, theather) VALUES (:id_rm, :movie, :date, :time, :price, :theather)";

          $parameters['id_rm'] = $_session->getId();
          $parameters['movie'] = $_session->getMovie();
          $parameters['date'] = $_session->getDate();
          $parameters['time'] = $_session->getTime();
          $parameters['price'] = $_price;
          $parameters['theather'] = $_session->getTheather();

          try {
               // creo la instancia connection
               $this->connection = Connection::getInstance();
               // Ejecuto la sentencia.
               return $this->connection->ExecuteNonQuery($sql, $parameters);
          } catch (PDOException $ex) {
               throw $ex;
          }
     }

     public function create($_session)
     {

          // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
          $sql = "INSERT INTO room_x_movie (id_room,id_movie,date,time, id_ticket) VALUES (:id_room,:id_movie,:date,:time, :id_ticket)";

          $parameters['id_room'] = $_session->getRoom();
          $parameters['id_movie'] = $_session->getMovie();
          $parameters['date'] = $_session->getDate();
          $parameters['time'] = $_session->getTime();
          $parameters['id_ticket'] = 0;

          try {
               // creo la instancia connection
               $this->connection = Connection::getInstance();
               // Ejecuto la sentencia.
               return $this->connection->ExecuteNonQuery($sql, $parameters);
          } catch (PDOException $ex) {
               throw $ex;
          }
     }

     public function addTicketInfo($movie, $date, $time, $theather){

          $sql = "SELECT *FROM ticket where movie = :movie and date = :date and theather = :theather";

          try {
               // creo la instancia connection
               $this->connection = Connection::getInstance();
               // Ejecuto la sentencia.
               return $this->connection->ExecuteNonQuery($sql, $parameters);
          } catch (PDOException $ex) {
               throw $ex;
          }
          if (!empty($resultSet)) {

               return $this->mapear($resultSet);
          } else
               return false;
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
          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time, rm.id_ticket
               FROM room_x_movie rm INNER JOIN  rooms r ON rm.id_room = r.id_room INNER JOIN theathers t ON t.id_theather = r.id_theather INNER JOIN movies m ON rm.id_movie = m.id ;";

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
          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time,m.id as id_movie, rm.id_ticket
               FROM room_x_movie rm INNER JOIN  rooms r ON rm.id_room = r.id_room INNER JOIN theathers t ON t.id_theather = r.id_theather INNER JOIN movies m ON rm.id_movie = m.id group by rm.date ;";

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

     public function readSessionsByDate($date)
     {
          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time, m.id as id_movie, rm.id_ticket
          FROM room_x_movie rm INNER JOIN  rooms r ON rm.id_room = r.id_room INNER JOIN theathers t ON t.id_theather = r.id_theather INNER JOIN movies m ON rm.id_movie = m.id
           where rm.date =:date group by m.title;";
          
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

     public function readSessionsByMovie($idMovie)
     {
          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time, m.id as id_movie, rm.id_ticket
          FROM room_x_movie rm INNER JOIN  rooms r ON rm.id_room = r.id_room INNER JOIN theathers t ON t.id_theather = r.id_theather INNER JOIN movies m ON rm.id_movie = m.id
          where m.id =:id";
          
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

     public function readForTheather($theather)
     {
          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time,m.id as id_movie, rm.id_ticket
               FROM room_x_movie rm INNER JOIN  rooms r ON rm.id_room = r.id_room INNER JOIN theathers t ON t.id_theather = r.id_theather INNER JOIN movies m ON rm.id_movie = m.id
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

     public function readForMovieTheather($theather)
     {
          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time,m.id as id_movie, rm.id_ticket
               FROM room_x_movie rm INNER JOIN  rooms r ON rm.id_room = r.id_room INNER JOIN theathers t ON t.id_theather = r.id_theather INNER JOIN movies m ON rm.id_movie = m.id
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

     public function readForCateghory($category)
     { 

          $sql = "SELECT m.title as title,rm.date as date ,rm.id_ticket as id_ticket,m.id as id_movie
          from room_x_movie rm inner join rooms r  ON rm.id_room = r.id_room INNER JOIN theathers t ON t.id_theather = r.id_theather INNER JOIN movies m 
          ON rm.id_movie = m.id where m.category 
          LIKE ':category' order by rm.date ;";

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

     public function readSessionsForPurchase($id_session){

          $sql = "SELECT rm.id_rm, t.name AS theather , r.name AS room, m.title AS film, rm.date, rm.time, m.id as id_movie, rm.id_ticket
          FROM room_x_movie rm 
          INNER JOIN  rooms r ON rm.id_room = r.id_room 
          INNER JOIN theathers t ON t.id_theather = r.id_theather 
          INNER JOIN movies m ON rm.id_movie = m.id
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
     protected function mapear($value)
     {

          $value = is_array($value) ? $value : [];

          $resp = array_map(function ($p) {

               return new M_Session($p["theather"], $p['room'], $p['film'], $p['date'], $p['time'], $p['id_movie'], $p['id_rm'], $p['id_ticket'], $p['price']);
          }, $value);

          return count($resp) > 1 ? $resp : $resp['0'];
     }

}

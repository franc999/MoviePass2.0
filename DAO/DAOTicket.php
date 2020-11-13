<?php namespace DAO;

    use Models\Ticket as M_Ticket;
    use DAO\connection as Connection;
    use PDOException;
         /**
          *
          */

         class DAOTicket
         {
              private $connection;

              function __construct() {

               $this->connection = null;
              }

            public function create($ticket) {           //id_rm, id_user, id_movie, date, time, timeEnd, price, code, id_theather

                // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
                //$totalSeats = $ticket->getId_session()->getRoom()->getTotalSeats();
                  $totalSeats = $ticket->getId_Room()->getTotalSeats(); 

                try {

                    for($i=1; $i < $totalSeats; $i++){

                        $sql = "INSERT INTO ticket (id_rm, id_movie, id_theather, price, date, time, timeEnd) VALUES (:id_rm, :id_movie, :id_theather, :price, :date, :time, :timeEnd)";

                        $parameters['id_rm'] = $ticket->getId_session();
                        $parameters['id_movie'] = $ticket->getId_movie();
                        $parameters['id_theather'] = $ticket->getId_theather();
                        $parameters['date'] = $ticket->getDate();
                        $parameters['time'] = $ticket->getTime();
                        $parameters['timeEnd'] = $ticket->getTimeEnd();
                        $parameters['price'] = $ticket->getPrice();

                                                                 // creo la instancia connection
                      $this->connection = Connection::getInstance();
                      $this->connection->ExecuteNonQuery($sql, $parameters);
                      // Ejecuto la sentencia.
                    }

                 return $this->connection->ExecuteNonQuery($sql, $parameters);

             } catch(PDOException $ex) {
                 
                    throw $ex;
               }
           }
 
            public function readId($id) {
                
                $sql = "SELECT *FROM ticket where id_rm =:id";
          
                $parameters['id'] = $id;

                try {
                    $this->connection = Connection::getInstance();
   
                    $resultSet = $this->connection->execute($sql, $parameters);
                    
               } catch(Exception $ex) {
                   throw $ex;
               }
   
               if(!empty($resultSet)){
                    
                return $this->mapear($resultSet);
               }
                   
               else
                    return false;   
                         
            }

            public function readAll() {

                $sql = "SELECT * FROM ticket";

                try {
                     $this->connection = Connection::getInstance();

                     $resultSet = $this->connection->execute($sql);

                     
                 } catch(Exception $ex) {

                    throw $ex;
                 }

                if(!empty($resultSet))
                     return $this->mapear($resultSet); 
                else
                     return false;

           }

            public function readAllForSession($id_rm) {

                $sql = "SELECT * FROM ticket 
                        where id_rm = :id_rm";

                $parameters['id_rm'] = $id_rm;

                try {
                    $this->connection = Connection::getInstance();

                    $resultSet = $this->connection->execute($sql, $parameters);

                        
                } catch(Exception $ex) {

                    throw $ex;
                }

                if(!empty($resultSet))
                     return $this->mapear($resultSet); 
                else
                     return false;
            }
    

            public function readAllWhitoutUser($id_rm) {

                $sql = "SELECT * FROM ticket 
                        where id_rm   = :id_rm and id_user = 0";

                $parameters['id_rm'] = $id_rm;

                try {

                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql, $parameters);

                        
                } catch(Exception $ex) {

                    throw $ex;
                }

                if(!empty($resultSet))
                     return $this->mapear($resultSet); 
                else
                     return false;
            }

            public function asignUser($id_ticket, $id_user){ // id del user

                $sql = "UPDATE ticket 
                        SET id_user = :id_user
                        where id_ticket =:id_ticket";
          
                $parameters['id_ticket'] = $id_ticket;
                $parameters['id_user'] = $id_user;

                try {
                    // creo la instancia connection
                    $this->connection = Connection::getInstance();
                    // Ejecuto la sentencia.
                     return $this->connection->ExecuteNonQuery($sql, $parameters);
                     
                } catch(\PDOException $ex) {
                    throw $ex;
                }
            }

            protected function mapear($value) {

                $value = is_array($value) ? $value : [];

                $resp = array_map(function($p){ //$id_user='', $id_ticket='', $id_room='', $id_movie='',  $id_session='', $id_theather='', $date='', $time='', $timeEnd='', $price=''
                    
                    return new M_Ticket($p['id_user'], $p['id_ticket'], $p['id_room'], $p['id_movie'], $p['id_rm'], $p['id_theather'], $p['date'], $p['time'], $p['timeEnd'], $p['price']);  
                }, $value);
                    
                   return count($resp) > 1 ? $resp : $resp['0'];
            }
        }
?>

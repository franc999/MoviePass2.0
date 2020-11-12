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
                $totalSeats = $ticket->getId_session()->getRoom()->getTotalSeats();

                try {

                    for($i=1; $i < $totalSeats; $i++){

                        $sql = "INSERT INTO ticket (id_rm, id_movie, id_theather, price, date, time, timeEnd) VALUES (:id_rm, :id_movie, :id_theather, :price, :date, :time, :timeEnd)";

                        $parameters['id_rm'] = $ticket->getId_session()->getId_session();
                        $parameters['id_movie'] = $ticket->getId_session()->getMovie()->getId();
                        $parameters['id_theather'] = $ticket->getId_session()->getTheather()->getId();
                        $parameters['date'] = $ticket->getId_session()->getDate();
                        $parameters['time'] = $ticket->getId_session()->getTime();
                        $parameters['timeEnd'] = $ticket->getId_session()->getTimeEnd();
                        $parameters['price'] = $ticket->getId_session()->getRoom()->getTicketPrice();

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

            public function readId($_session) {
                
                $sql = "SELECT *FROM ticket where name_movie = :name_movie and date = :date and name_theather = :name_theather and time = :time";
          
                $parameters['name_theather'] = $_session->getName_theather();
                $parameters['name_movie'] = $_session->getName_movie();
                $parameters['date'] = $_session->getDate();
                $parameters['time'] = $_session->getTime();

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
        }
?>

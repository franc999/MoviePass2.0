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

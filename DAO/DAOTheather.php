<?php namespace DAO;

    use Models\Theather as M_Theather;
    use DAO\connection as Connection;
    use PDOException;
         /**
          *
          */
         class DAOTheather
         {
              private $connection;

              function __construct() {

               $this->connection = null;
              }

              /**
               *
               */
              public function create($_theather) {

                   // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
                   $sql = "INSERT INTO theathers (name, adress) VALUES (:name, :adress)";

                   $parameters['name'] = $_theather->getName();
                   $parameters['adress'] = $_theather->getAdress();
                   
                   try {
                         // creo la instancia connection
                         $this->connection = Connection::getInstance();
                         // Ejecuto la sentencia.
                    return $this->connection->ExecuteNonQuery($sql, $parameters);

                    }catch(PDOException $ex) {
                       throw $ex;
                    }
              }
              

              public function addRoom($room, $id_theather){

                    $sql = "UPDATE theathers SET room = :room where id_theather = :id_theather";

                    echo $room->getId_room();
                    $parameters['room'] = $room->getId_room();
                    $parameters['id_theather'] = $id_theather;

                    try {
                         // creo la instancia connection
                         $this->connection = Connection::getInstance();
                         // Ejecuto la sentencia.
                         return $this->connection->ExecuteNonQuery($sql, $parameters);
                    }catch(\PDOException $ex) {
                         throw $ex;
                    }
              }

              /*public function createWroom ($id_theather, $_room){

               $sql = "ALTER TABLE theathers
                       ADD rooms array";

                    $sql = "CREATE TABLE IF NOT EXISTS "

                   $parameters['room'] = $_theather->getName();
                   
                   try {
                         // creo la instancia connection
                         $this->connection = Connection::getInstance();
                         // Ejecuto la sentencia.
                    return $this->connection->ExecuteNonQuery($sql, $parameters);

                } catch(PDOException $ex) {
                       throw $ex;
                  }
              }*/
              
              public function read($_id) {
               
                   $sql = "SELECT * FROM theathers where id_theather = :id";


                   $parameters['id'] = $_id;

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

                   $sql = "SELECT * FROM theathers";

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
              

              public function edit($_theather) { 

                   $sql = "UPDATE theathers SET name = :name";

                   $parameters['name'] = $_theather->getName();
    
                   try {
                        // creo la instancia connection
                     $this->connection = Connection::getInstance();
                    // Ejecuto la sentencia.
                    return $this->connection->ExecuteNonQuery($sql, $parameters);
                    } catch(\PDOException $ex) {
                       throw $ex;
                    }
              }
              
              
              public function delete($_id) {

                   $sql = "DELETE FROM theathers WHERE id_theather = :id";
                   $parameters['id'] = $_id;

                   try {
                         
                         $this->connection = Connection::getInstance();
                         return $this->connection->ExecuteNonQuery($sql, $parameters);

                   } catch(PDOException $Exception) {

                    throw new MyDatabaseException( $Exception->getMessprice( ) , $Exception->getCode( ) );

                }
              }

          /**
            * Transforma el listado de peliculas en
            * objetos de la clase Movie
            */
            protected function mapear($value) {

                $value = is_array($value) ? $value : [];

                $resp = array_map(function($p){
                    
                    return new M_theather($p['id_theather'],$p['name'], $p['adress']);  
                }, $value);
                    
                   return count($resp) > 1 ? $resp : $resp['0'];
            }
         }

?>
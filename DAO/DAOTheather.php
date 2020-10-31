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
                   $sql = "INSERT INTO theathers (name) VALUES (:name)";

                   $parameters['name'] = $_theather->getName();
                   
                   try {
                         // creo la instancia connection
                         $this->connection = Connection::getInstance();
                         // Ejecuto la sentencia.
                    return $this->connection->ExecuteNonQuery($sql, $parameters);

                } catch(PDOException $ex) {
                       throw $ex;
                  }
              }
              
              
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
                     /*    echo '<pre>';
                        print_r($resultSet);*/

                        
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
                    
                    return new M_theather($p['id_theather'], $p['name']);  
                }, $value);
                    
                   return count($resp) > 1 ? $resp : $resp['0'];
            }
         }

?>
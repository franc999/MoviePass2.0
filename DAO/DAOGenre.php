<?php namespace DAO;

    use Models\Genre as M_Genre;
    use DAO\connection as Connection;
    use PDOException;
         /**
          *
          */
         class DAOGenre
         {

              private $connection;

              function __construct() {

               $this->connection = null;
              }

              /**
               *
               */
              public function create($_genre) {

                   // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
                   $sql = "INSERT INTO genre (name) VALUES (:name)";

                   $parameters['name'] = $_genre;

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
               
                   $sql = "SELECT * FROM genre where id_genre = :id";


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

              public function readXname($_name) {
               
                $sql = "SELECT * FROM genre where name = :name";
                $parameters['name'] = $_id;

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

                public function readAll()
                {
                    $sql = "SELECT * FROM genre";
            
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

              /*
              public function readForGenre($genre) {
        
                $sql = "SELECT DISTINCT genre FROM movies";
    
                $parameters['genre'] = $genre;
    
                try {
                    $this->connection = Connection::getInstance();
    
                    $resultSet = $this->connection->execute($sql, $parameters);
                    
                } catch(Exception $ex) {
                    throw $ex;
                }

                if(!empty($resultSet)){
                    
                return $this->mapearGenre($resultSet);
                }
                    
                else
                    return false;
            }

            public function readForName($title) {
               
                $sql = "SELECT * FROM movies where title LIKE :title limit 1";

                $parameters['title'] =$title;
               

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
                   $sql = "SELECT * FROM movies";

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
              

              public function edit($_movie) {

                   $sql = "UPDATE movies SET title = :title, genre = :genre, age = :age";

                   $parameters['title'] = $_movie->getTitle();
                   $parameters['genre'] = $_movie->getGenre();
                   $parameters['age'] = $_movie->getAge();
    
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

                   $sql = "DELETE FROM movies WHERE id_movie = :id";
                   $parameters['id'] = $_id;

                   try {
                         
                         $this->connection = Connection::getInstance();
                         return $this->connection->ExecuteNonQuery($sql, $parameters);

                   } catch(PDOException $Exception) {

                    throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );

                }
              }

          /**
            * Transforma el listado de peliculas en
            * objetos de la clase Movie
            */
            protected function mapear($value) {

                $value = is_array($value) ? $value : [];

                $resp = array_map(function($p){
                    
                    return new M_Genre($p['id_genre'], $p['name']);  
                }, $value);
                    
                   return count($resp) > 1 ? $resp : $resp['0'];
            }
         }
?>

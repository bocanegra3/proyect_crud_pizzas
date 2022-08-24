<?php
/**
 * Clase para manejar DataBase usando PDO.
 * 
 * @author Franco Bocanegra <franco.bocanegra@outlook.com> 
 * @link https://github.com/bocanegra3
 * @version 0.1
 * @copyright 2022 
 */
class Db{
    private $connection;
    /**
     * Establece la conexiòn
     * @return connection
     */
    public function __construct()
    {
        try{
    $dsn = "mysql:dbname=".DATABASE_NAME.";host=".SERVER_NAME;
    $this->connection = new PDO($dsn, USER_NAME, PASSWORD);    
        }   
        catch(PDOException $e){
            die("<strong>------->An error occurred while opening the server...</strong>");
        }
        return $this->connection;
    }
    /**
     * Prepara una Query SQL.
     *
     * @return object
     */
    public function prepare($query)/*esto es la firma*/
    {   
        return $this->connection->prepare($query);
    }
    /**
     * Ejecuta una SQL query.
     *
     * @param [string] $query
     * @return Object
     */
    public function query($query)
    {
        return $this->connection->query($query);/*la flecha esta llamando a un metodo con un atributo*/
    }
    /**
     * Cierra la Conexiòn
     *
     * @return mixed
     */
    public function close()
    {
        $this->connection=null;/*$this es llamar a un atributo o metodo que es parte de la misma clase*/
    }
}
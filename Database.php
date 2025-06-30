<?php


use Dotenv\Dotenv;

// Load environment variables from .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// connect to the database, and execute a query
class Database {

    public $connection;

    public function __construct($config) //when instance is constructed
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {
            $this-> connection = new PDO(
                $dsn, 
                $_ENV['DB_USER'], 
                $_ENV['DB_PASS'], 
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC
            ]
        );
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

    public function query($query, $params = []){

        // Query the database
        $statement = $this->connection->prepare($query);

        // pass params to execute method in form of dynamic array and accept as part of method signature & default to empty array. 
        $statement->execute($params);


        // return $statement->fetch(PDO::FETCH_ASSOC); //give me results as associative array. Whether we call fetch/fetch all, it needs to be dynamic. Instead just return statement.
        return $statement;


    }
}

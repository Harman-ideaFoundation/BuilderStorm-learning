<?php
namespace connection;
class DB
{

    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "builderstorm";
    }

    public function connection()
    {
        try {
            $conn = new \PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);

            // Set PDO to throw exceptions for errors
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            // echo "Connected to the database successfully.";
            return $conn;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}







// $dbname= "mysql:host=localhost;dbname=builderstorm";
// $user = "root";
// $password = "";

// try {
//     $pdo = new PDO($dbname, $user, $password);

//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// } catch (PDOException $e) {

//     echo "Connection failed: " . $e->getMessage();
// }

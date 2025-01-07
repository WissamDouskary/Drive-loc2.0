<?php 
require_once '../classes/conn.php';

class Theme {
    public $theme_id;
    public $name;
    public $description;
    public $CreatedDate;
    private $pdo;

    function __construct() {
        $connection = new DBconnection();
        $this->pdo = $connection->PDOconnect();
    }

    function createTheme(){

    }

    function updateTheme(){

    }

    function deleteTheme(){

    }

    function getAllThemes(){
        
    }
}
?>
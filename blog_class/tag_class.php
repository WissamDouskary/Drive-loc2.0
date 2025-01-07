<?php 
require_once '../classes/conn.php';

class Tag {
    public $tag_id;
    public $name;
    public $CreatedDate;
    private $pdo;

    function __construct(){
        $connection = new DBconnection();
        $this->pdo = $connection->PDOconnect();
    }

    function createTag(){

    }

    function updateTag(){

    }

    function deleteTag(){

    }

    function addMultipleTags(){

    }
    
}

?>
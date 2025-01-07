<?php 
require_once '../classes/conn.php';

class ArticleTag {
    public $article_id;
    public $tag_id;
    public $CreatedDate;
    private $pdo;

    function __construct(){
    $connection = new DBconnection();
    $this->pdo = $connection->PDOconnect();
    }

    function addTagToArticle(){

    }

    function filtrerParTag(){
        
    }
}

?>
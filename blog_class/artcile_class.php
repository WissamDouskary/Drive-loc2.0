<?php 
require_once '../classes/conn.php';

class Article {
    public $article_id;
    public $user_id;
    public $theme_id;
    public $titre;
    public $content;
    public $Approved;
    public $CreatedDate;
    private $pdo;

    function __construct(){
        $connection = new DBconnection();
        $this->pdo = $connection->PDOconnect();
    }

    function CreateArticle(){
        
    }

    function UpdateArticle(){

    }

    function deleteArticle(){

    }

    function ApprouverArticle(){

    }

    function searchByTitle(){

    }

    function ArticlesPagination(){

    }
}
?>
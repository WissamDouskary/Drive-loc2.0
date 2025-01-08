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

    function CreateArticle($user_id, $theme_id, $title, $content){
        $sql = "INSERT INTO article (user_id, theme_id, title, content, Approved, date_creation)
                VALUES (:user_id, :theme_id, :title, :content, 'waiting', CURDATE())";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':theme_id', $theme_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        
        $stmt->execute();

        return $this->pdo->lastInsertId();
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
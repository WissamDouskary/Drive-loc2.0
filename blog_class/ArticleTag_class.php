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

    function addTagToArticle($tag_id, $article_id){
        $sql = "INSERT INTO article_tag (article_id, tag_id, CreatedDate)
                VALUES (:article_id, :tag_id, CURDATE())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':article_id', $article_id);
        foreach($tag_id as $tagID){
            $stmt->bindParam('tag_id', $tagID);
            $stmt->execute();
        }
    }

    function filtrerParTag(){
        
    }
}

?>
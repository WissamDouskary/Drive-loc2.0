<?php
require_once '../classes/conn.php';

class Comments {
    protected $Comments_id;
    protected $content;
    protected $user_id;
    protected $article_id;
    protected $Createddate;
    private $pdo;

    static function getConnection(){
        $connection = new DBconnection();
        return $connection->PDOconnect();
    }

    function __construct($user_id, $article_id, $content){
        $this->pdo = self::getConnection();
        $this->user_id = $user_id;
        $this->article_id = $article_id;
        $this->content = $content;
    }

    function createComment(){
        $sql = "INSERT INTO comments (user_id, article_id, content, date_creation)
                VALUES (:user_id, :article_id, :content, CURDATE())";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':article_id', $this->article_id);
        $stmt->bindParam(':content', $this->content);

        $stmt->execute();
    }

    function updateComments(){

    }

    function deleteComments(){

    }

    static function allCommentsByArticle($article_id){
        $sql = 'SELECT c.*, u.*
                FROM comments c
                LEFT JOIN user u ON c.user_id = u.user_id 
                WHERE article_id = :article_id';

        $stmt = self::getConnection()->prepare($sql);
        $stmt->bindParam(':article_id', $article_id);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
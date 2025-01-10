<?php 
require_once '../classes/conn.php';

class Favori {
    public $favori_id;
    public $user_id;
    public $article_id;
    public $CreationDate;
    private $pdo;

    static function getConnection(){
        $connection = new DBconnection();
        return $connection->PDOconnect();
    }

    function __construct($user_id, $article_id){
        $this->user_id = $user_id;
        $this->article_id = $article_id;
    }

    function AddToFavorite(){
        $sql = 'INSERT INTO favori (user_id, article_id, date_creation)
                VALUES (:user_id, :article_id, CURDATE())';
        $pdo = self::getConnection();
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':article_id', $this->article_id);

        $stmt->execute();

    }

    static function CheckclientFavorites($user_id, $article_id){
        $sql = "SELECT * FROM favori WHERE user_id = :user_id AND article_id = :article_id";

        $pdo = self::getConnection();
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':article_id', $article_id);

        $stmt->execute();

        return $stmt->rowCount();
    }

    static function CountFavorite($article_id){
        $sql = "SELECT * FROM favori WHERE article_id = :article_id";

        $pdo = self::getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam('article_id', $article_id);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static function removeFromfavorite($favori_id){
        $sql = "DELETE FROM favori
                where favori_id = :favori_id";
        $stmt = self::getConnection()->prepare($sql);
        $stmt->bindParam(':favori_id', $favori_id);
        $stmt->execute();
    }

    static function ShowFavoriteList($user_id){
        $sql = "SELECT f.*, a.*, u.user_id
                FROM favori f
                LEFT JOIN article a ON a.article_id = f.article_id
                LEFT JOIN user u ON u.user_id = f.user_id
                WHERE f.user_id = :user_id";
        
        $pdo = self::getConnection();
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':user_id', $user_id);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
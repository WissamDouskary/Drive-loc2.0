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

    function removeFromfavorite(){

    }

    function ShowFavoriteList(){
        
    }
}
?>
<?php 
require_once '../classes/conn.php';

class Tag {
    public $tag_id;
    public $name;
    public $CreatedDate;
    private $pdo;

    static function getConnection(){
        $connection = new DBconnection();
        return $connection->PDOconnect();
    } 

    function __construct(){
        
    }

    function createTag($name){
        $sql = "INSERT INTO tag(name)
                VALUE (:name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }

    function updateTag(){

    }

    function deleteTag(){

    }

    function addMultipleTags($tags) {
        $stmt_check = $this->pdo->prepare("SELECT tag_id FROM tag WHERE name = :tag_name");
        $stmt_insert = $this->pdo->prepare("INSERT INTO tag (name, date_creation) VALUES (:tag_name, CURDATE())");
    
        $lastInsertIds = [];
    
        foreach ($tags as $tag) {
            $stmt_check->bindParam(':tag_name', $tag);
            $stmt_check->execute();
    
            if ($stmt_check->rowCount() == 0) {
                $stmt_insert->bindParam(':tag_name', $tag);
                $stmt_insert->execute();
                $lastInsertIds[] = $this->pdo->lastInsertId();
            } else {
                $existingTag = $stmt_check->fetch(PDO::FETCH_ASSOC);
                $lastInsertIds[] = $existingTag['tag_id'];
            }
        }
    
        return $lastInsertIds;
    }
    

    static function searchByTags($searchInput) {
        $sql = "SELECT at.*, a.*, t.name
                FROM article_tag at 
                LEFT JOIN article a ON a.article_id = at.article_id
                LEFT JOIN tag t ON t.tag_id = at.tag_id
                WHERE t.name LIKE :searchInput";
        $pdo = self::getConnection();
        $stmt = $pdo->prepare($sql);
    
        $forlikeSearch = "%". $searchInput . "%";
        $stmt->bindValue(':searchInput', $forlikeSearch);
    
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
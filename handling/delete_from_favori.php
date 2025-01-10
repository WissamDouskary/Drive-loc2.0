<?php 
require_once '../blog_class/favori_class.php';

if(isset($_GET['article_id'])){
    $article_id = $_GET['article_id'];

    Favori::removeFromfavorite($article_id);

    header('Location: ../blog/favori.php');
    exit();
}


?>
<?php 
session_start();
require_once '../blog_class/favori_class.php';

if($_GET['article_id']){

$article_id = $_GET['article_id'];
$user_id = $_SESSION['user_id'];

$favori = new Favori($user_id, $article_id);

$favori->AddToFavorite();

header('location: ../blog/article.php?article_name=' . $article_id .'&user_id=' . $user_id);
exit();
}
?>
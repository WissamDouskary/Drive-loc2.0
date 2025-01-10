<?php 
session_start(); 
require_once '../blog_class/comments_class.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $article_id = $_GET['article_id'];
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['typedcomment'];

    $comment = new Comments($user_id, $article_id, $comment);
    $comment->createComment();

    header('Location: ../blog/article.php?article_name='. $article_id);
    exit();
}
?>
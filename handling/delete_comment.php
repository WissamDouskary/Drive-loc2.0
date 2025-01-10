<?php 
session_start();

require_once '../blog_class/comments_class.php';

if(isset($_GET['comment_id'])){
    $comment_id = $_GET['comment_id'];

    $Comments = Comments::deleteComments($comment_id);

    header('Location: ../blog/article.php?comment_id='.$comment_id.'&article_name='.$_GET['article_name']);
    exit();
}

?>
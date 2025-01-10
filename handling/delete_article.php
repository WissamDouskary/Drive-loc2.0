<?php 
require_once '../blog_class/artcile_class.php';

if(isset($_GET['article_id'])){
    $article_id = $_GET['article_id'];

    Article::deleteArticle($article_id);

    header('Location: ../blog/myarticles.php');
    exit();
}
?>
<?php
session_start();

require_once '../blog_class/tag_class.php';
require_once '../blog_class/artcile_class.php';
$article = new Article();
$tag = new Tag();

if(isset($_GET['tags'])){
    $tags = explode(',', $_GET['tags']);
    if(!isset($tags)){
        return;
    }else{
        $tag->addMultipleTags($tags);
    }

}

if(isset($_POST['article_submited'])) {
    
    $user_id = $_SESSION['user_id'];
    $article_name = $_POST['artcile_titre'];
    $theme_id = $_POST['article_theme'];
    $article_content = $_POST['article_content'];

    if(!isset($user_id) && !isset($article_name) && !isset($theme_id) && !isset($article_content)){
        return;
    }else{

    
    
    $article->CreateArticle($user_id, $theme_id, $article_name, $article_content);

    header('Location: ../blog/create_article.php');
    exit();

}

}
?>
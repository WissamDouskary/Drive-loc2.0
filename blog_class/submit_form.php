<?php
session_start();

require_once '../blog_class/tag_class.php';
require_once '../blog_class/artcile_class.php';
require_once '../blog_class/ArticleTag_class.php';

$article = new Article();
$tag = new Tag();
$articleTag = new ArticleTag();

if(isset($_POST['article_submited'])){
    
    $tags = explode(',', $_POST['tags-input']);
    $user_id = $_SESSION['user_id'];
    $article_name = $_POST['artcile_titre'];
    $theme_id = $_POST['article_theme'];
    $article_content = $_POST['article_content'];

    $article_id = $article->CreateArticle($user_id, $theme_id, $article_name, $article_content);
    $tag_id = $tag->addMultipleTags($tags);

    $articleTag->addTagToArticle($tag_id, $article_id);
}
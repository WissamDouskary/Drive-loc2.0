<?php 
session_start();
require_once '../blog_class/tag_class.php';
require_once '../blog_class/artcile_class.php';

if(isset($_GET['tagValue'])){
    $searchValue = $_GET['tagValue'];

    if($searchValue == ''){
        $articles = Article::getAllArticles_Tags();
    }else{
        $articles = Tag::searchByTags($searchValue);
    }

    echo json_encode($articles);
}

?>
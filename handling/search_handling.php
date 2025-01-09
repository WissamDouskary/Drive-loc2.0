<?php 
require_once '../blog_class/artcile_class.php';

if(isset($_GET['ArticleTyped'])){
    $searchValue = $_GET['ArticleTyped'];

    if($searchValue === ""){
        $articles = Article::getAllArticles_Tags();
    }else{
        $articles = Article::searchByTitle($searchValue);
    }
    
    echo json_encode($articles);
} else {
    $articles = Article::getAllArticles_Tags();
    echo json_encode($articles);
}

?>
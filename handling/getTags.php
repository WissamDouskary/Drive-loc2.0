<?php
require_once '../blog_class/artcile_class.php';

if (isset($_GET['article_id'])) {
    $article_id = $_GET['article_id'];

    $tags = Article::gettagsForArticle($article_id);

    echo json_encode($tags);
}
?>
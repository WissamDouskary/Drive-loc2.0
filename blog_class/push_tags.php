<?php 
require_once '../blog_class/tag_class.php';

$tag = new Tag();

if(isset($_GET['tags'])) {
    $tags = explode(',', $_GET['tags']);
    $tag->addMultipleTags($tags);
}
?>
<?php
function likeAction()
{
    global $base_url;
    if (isset($_GET["a"]) && isset($_SESSION["users"]) && isset($_GET["id_post"]) && ($_GET["a"] == "create" || $_GET["a"] == "delete")) {
        $action = $_GET["a"];
        $id_user = $_SESSION["users"]["id"];
        $id_post = $_GET["id_post"];
        
        if ($action == "create") {
            createLiked($id_user, $id_post);
        } elseif ($action == "delete") {
            deleteLiked($id_user, $id_post);
        } else {
            echo "Erreur 404 - Action inconnue";
        }
    }
    header("Location: $base_url");
}
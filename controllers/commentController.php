<?php
function createCommentAction($id_post)
{
    global $isConnected;
    global $base_url;
    if (!$isConnected) {
        header("Location: $base_url/?p=login");
        return;
    }
    if (isset($_POST["content"])) {
        $id_user = $_SESSION["users"]["id"];
        $content = $_POST["content"];
        $verif = createComment($id_user, $id_post, $content);
        if ($verif) {
            header("Location: $base_url");
        } else {
            
            echo "Erreur lors de la création du comentaire";
        }
    }
}

<?php
require_once("autoload.php");

global $base_url;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    switch ($page) {
        case 'login':
            showLogin();
            break;
        case 'register':
            Subscription();
            break;
        case 'publish':
            if (!isset($_GET["a"])) {
                echo "Erreur 404 - Action inconnue";
                break;
            }
                $action = $_GET["a"];
                if ($action == "create") {
                    CreatePostAction($id_post);
                } else {
                    echo "Erreur 404 - Action inconnue";
                }
            break;
            case "comment":
               
                $action = $_GET["a"];
                if ($action == "create") {
                    $id_status = $_GET["id_status"];
                    createCommentAction($id_status);
                } else {
                    echo "Erreur 404 - Action inconnue";
                }
                break;
        case 'profile':
            showProfilePage();
            break;
            case 'update':
                UpdateAction();
                break;
        case 'logout':
            logOut();
            break;
        default:
        echo homeAction();
            break;
    }
} else {
    homeAction();
}
?>



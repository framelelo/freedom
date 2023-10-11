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
            showCreatePost();
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
            showHomePage();
            break;
    }
} else {
    showHomePage();
}
?>

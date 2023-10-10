<?php
require_once("autoload.php");

global $base_url;
if (isset($_GET["p"])) {
    $page = $_GET["p"];
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
        case 'comment':
            showPost($_GET['id']);
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

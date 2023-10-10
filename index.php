<?php
require_once("autoload.php");

global $base_url;
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
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
            if (isset($_GET['id'])) {
                showCreatePost($_GET['id']);

            } else {
                header("Location: $base_url");
            }
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

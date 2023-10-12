<?php
session_start();
global $base_url;
$base_url = "http://localhost/freedom";

global $isConnected;
$isConnected = $_SESSION && $_SESSION["users"];
require_once("models/dbModel.php");

require_once("models/authModel.php");
require_once("models/postModel.php");
require_once("models/commentModel.php");
require_once("models/updateModel.php");
require_once("models/friendsModel.php");

require_once("templates/loginpage.php");
require_once("templates/registerpage.php");
require_once("templates/homepage.php");
require_once("templates/profilepage.php");
require_once("templates/updatepage.php");
require_once("templates/friendspage.php");

require_once("controllers/authController.php");
require_once("controllers/homeController.php");
require_once("controllers/postController.php");
require_once("controllers/updateController.php");
require_once("controllers/commentController.php");
require_once("controllers/friendsController.php");



?>
<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");

require_once $_SERVER["DOCUMENT_ROOT"] . "/controllers/frontController.php";

$front = new FrontController($_SERVER["DOCUMENT_ROOT"], $_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"], $_POST);

$front->Render($front, "master", "master", array());
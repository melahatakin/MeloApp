<?php
session_start();
$id = $_GET['id'];

if (($key = array_search($id, $_SESSION['favoriler'])) !== false) {
    unset($_SESSION['favoriler'][$key]);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

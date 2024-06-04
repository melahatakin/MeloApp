<?php
session_start();
$id = $_GET['id'];

if (!isset($_SESSION['favoriler'])) {
    $_SESSION['favoriler'] = array();
}

if (!in_array($id, $_SESSION['favoriler'])) {
    $_SESSION['favoriler'][] = $id;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

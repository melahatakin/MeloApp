<?php
session_start();
$id = $_GET['id'];

if (!isset($_SESSION['sepet'])) {
    $_SESSION['sepet'] = array();
}

if (!in_array($id, $_SESSION['sepet'])) {
    $_SESSION['sepet'][] = $id;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

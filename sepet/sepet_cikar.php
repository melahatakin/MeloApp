<?php
session_start();
$id = $_GET['id'];

if (($key = array_search($id, $_SESSION['sepet'])) !== false) {
    unset($_SESSION['sepet'][$key]);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

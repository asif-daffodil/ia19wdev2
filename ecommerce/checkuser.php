<?php
session_start();
if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['token']) && $_GET['token'] === "ASDfgh123") {
    $_SESSION['name'] = $_GET['name'];
    $_SESSION['email'] = $_GET['email'];
    $_SESSION['role'] = $_GET['role'] ?? "user";
    header("location: ./");
}

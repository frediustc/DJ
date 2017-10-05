<?php
session_start();
try {
    $db = new PDO('mysql:host=localhost;dbname=dj', 'root', '');
} catch (Exception $e) {
    Die('Erreur : ' . $e->getMessage());
}

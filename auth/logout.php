<?php
session_start();
     require_once '../functions/helpers.php';
     require_once '../functions/pdo_connection.php';

     session_destroy();
     redirect('auth/login.php');
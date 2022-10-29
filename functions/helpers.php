<?php

//config
define('BASE_URL', 'http://localhost/BitBlog/');

function redirect($url) 
{    
     header('Location: ' . trim(BASE_URL, '/ ')  . '/' . trim($url, '/'));
     exit;
}
// header('Location: index.php');
// redirect('index.php');

function asset($file) 
{    
     return trim(BASE_URL, '/ ') . '/' . trim($file, '/');
}
// echo asset('assets/css/style.css');

function url($url) 
{    
     return trim(BASE_URL, '/ ') . '/' . trim($url, '/');
}
// echo url('create.php');

function dd($var)
{
     echo '<pre>';
     var_dump($var);
     exit;
}

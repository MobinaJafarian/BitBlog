<?php

require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
require_once '../../functions/auth.php';


if(isset($_GET['cat_id']) && $_GET['cat_id'] !== '')
{
     $query = "DELETE FROM categories WHERE id = ?";
     $statement = $pdo->prepare($query);
     $statement->execute([$_GET['cat_id']]);
}

redirect('panel/category');
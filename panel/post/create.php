<?php
     require_once '../../functions/helpers.php';
     require_once '../../functions/pdo_connection.php';
     require_once '../../functions/auth.php';



     if(isset($_POST['title']) && $_POST['title'] !== '' && isset($_POST['cat_id']) && $_POST['cat_id'] !== '' && isset($_POST['body']) && $_POST['body'] !== '' && isset($_FILES['image']) && $_FILES['image']['name'] !== '') 
     {    

          $query = "SELECT * FROM categories WHERE id = ?;";
          $statement = $pdo->prepare($query);
          $statement->execute([$_POST['cat_id']]);
          $category = $statement->fetch();

          $allowedMimes = ['png', 'jpg', 'gif', 'jpeg'];
          $imageMime = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
          if(!in_array($imageMime, $allowedMimes))
          {
               redirect('panel/post');
          }

          $basePath = dirname(dirname(__DIR__));
          $image = '/assets/images/posts/' . date('Y_m_d_H_i_s') . '.' . $imageMime;
          $image_upload = move_uploaded_file($_FILES['image']['tmp_name'], $basePath . $image);
          if($category !== false && $image_upload !== false)
          {
          $query = "INSERT INTO posts SET title = ?, cat_id = ?, body = ?, image = ?, created_at = NOW() ;";
          $statement = $pdo->prepare($query);
          $statement->execute([$_POST['title'], $_POST['cat_id'], $_POST['body'], $image]);
          }
          redirect('panel/post');
     }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css') ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" media="all" type="text/css">
</head>
<body>
<section id="app">
<?php require_once '../layouts/top-nav.php'; ?>

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
            <?php require_once '../layouts/sidebar.php'; ?>

            </section>
            <section class="col-md-10 pt-3">

                <form action="<?= url('panel/post/create.php') ?>" method="post" enctype="multipart/form-data">
                    <section class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="title ...">
                    </section>
                    <section class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </section>
                    <section class="form-group">
                        <label for="cat_id">Category</label>
                        <select class="form-control" name="cat_id" id="cat_id">
                              <?php

                         $query = "SELECT * FROM categories;";
                         $statement = $pdo->prepare($query);
                         $statement->execute();
                         $categories = $statement->fetchAll();

                         foreach ($categories as $category) { ?>
                             <option value="<?= $category->id ?>"><?= $category->name ?></option>
                             <?php } ?>
                        </select>
                    </section>
                    <section class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="5" placeholder="body ..."></textarea>
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </section>
                </form>

            </section>
        </section>
    </section>

</section>

<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>

<script src="<?= asset('assets/ckeditor/ckeditor.js') ?>"></script>
<script type="text/javascript">
    CKEDITOR.replace('body')
</script>

</body>
</html>
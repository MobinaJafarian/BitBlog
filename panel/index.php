<?php
     require_once '../functions/helpers.php';
     require_once '../functions/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bit Blog Panel</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css') ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" media="all" type="text/css">
</head>
<body>
<section id="app">

     <?php require_once 'layouts/top-nav.php'; ?>

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">

            <?php require_once 'layouts/sidebar.php'; ?>

            </section>
            <section class="col-md-10 pb-3">

                <section style="min-height: 80vh;" class="d-flex justify-content-center align-items-center">
                    <section>
                        <h1>Bit Blog</h1>  
                        <h5>What Is a Blog?
                        A blog (short for “weblog”) is an online journal or informational website run by an individual, group, or corporation that offers regularly updated content (blog post) about a topic.</h5>
                        <h5>It presents information in reverse chronological order and it’s written in an informal or conversational style.</h5>
                    </section>
                </section>

            </section>
        </section>
    </section>


</section>

<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование товара</title>
    <link rel="stylesheet" href="/16/css/bootstrap.min.css">
    <base href="/16/">
</head>
<body>


<div class="container" style="margin: 50px">
    <div class="row">
        <div class="col-sm-4">
            <h1><?= $user['id'] ?></h1>
            <h2><a href="http://localhost/16/img/<?= $user['photo'] ?>" width="700px" height="700px"><img src="http://localhost/16/img/<?= $user['photo'] ?>" width="170px" height="170px"></a></h2>
            <h2><?= $user['name'] ?></h2>
            <h2><?= $user['lastname'] ?></h2>
            <h2><?= $user['phone'] ?></h2>
            <h5><?= $user['timestamp'] ?></h5>
            <?php if ($editable === true) : ?>

                <form enctype="multipart/form-data" action="users/<?= $user['id'] ?>/edit" method="post">


                        <p><input type="file" name="photo" required></p>



                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" name="name" id="name"
                               value="<?= $user['name'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Фамилия</label>
                        <input type="text" class="form-control" name="lastname" id="lastname"
                               value="<?= $user['lastname'] ?>" required>
                    </div>


                    <div class="form-group">
                        <label for="phone">Номер телефона</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                               value="<?= $user['phone'] ?>" required>
                    </div>



                    <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>">
                    <button class="btn btn-primary" type="submit">Редактировать</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>

